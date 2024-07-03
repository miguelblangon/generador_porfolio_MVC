<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutPlantillaUsuarioRequest;
use App\Models\AboutPlantillaUsuario;
use App\Models\PlantillaUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutPlantillaUsuarioController extends Controller
{
    private function provincias(){
        return DB::table('provincias')->select('idProvincia','Provincia')->pluck('Provincia','idProvincia')->toArray();
    }
    private function municipios( $provincia ){
        return DB::table('municipios')->select('idMunicipio','Municipio')->where('idProvincia',$provincia)->pluck('Municipio','idMunicipio')->toArray();
    }



    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-about-plantilla-usuario|edit-about-plantilla-usuario|delete-about-plantilla-usuario', ['only' => ['index','show']]);
        $this->middleware('permission:create-about-plantilla-usuario', ['only' => ['create','store']]);
        $this->middleware('permission:edit-about-plantilla-usuario', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-about-plantilla-usuario', ['only' => ['destroy']]);
    }
    public function index(){
        $user = Auth::user();
        $array = [];

        if ($user->hasRole('Super Admin')) {
            $model = AboutPlantillaUsuario::orderBy('id','DESC')->get(['id','plantilla_usuario_id','url_foto','nombre_completo','email']);
            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }

        if ($user->hasRole('User')) {
            $plantilla = PlantillaUsuario::where('user_id',Auth::id());
            $model = AboutPlantillaUsuario::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get(['id','plantilla_usuario_id','url_foto','nombre_completo','email']);

            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }


        return view('about.index', [
            'models' => $array
        ]);
    }
    public function create(){

        return view('about.create',[
                    'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
                    'provincias'=>$this->provincias()
                    ]);
    }
    public function store(AboutPlantillaUsuarioRequest $request){
        $id = Auth::id();
        $archivo= subida_ficheros($request->file('imagen'),'public/usuarios/'.$id );
        $info= $request->all();
        unset($info['imagen']);
        $info['url_foto']=$archivo['ruta'];
        AboutPlantillaUsuario::create($info);
        return redirect()->route('about_me.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }
    public function edit(AboutPlantillaUsuario $about_me ){
        return view('about.edit',[
                    'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
                    'provincias'=>$this->provincias(),
                    'poblacion'=>$this->municipios($about_me->provincial),
                    'model'=>$about_me
                    ]);
    }
    public function update(Request $request ,AboutPlantillaUsuario $about_me ){
        proteccion($about_me->plantillaUsuario->user_id);
        $request->validate([
            'plantilla_usuario_id'=>'required',
            'imagen'=>'nullable|image|max:1024|extensions:jpg,jpeg,png',
            'nombre_completo'=>'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'provincial'=>'required|string',
            'poblacion'=>'required|string',
            'num_contacto'=>'required|string',
            'nacimiento'=>'required|string',
            'dip_viajar'=>'required|string',
            'incorporacion'=>'required|string',
        ]);
        $info=$request->all();
        if (!isset($info['imagen']) )  {
            unset($info['imagen']);
        }else {
            Storage::delete($about_me->url_foto);
            $archivo= subida_ficheros($request->file('imagen'),'public/usuarios/'.$about_me->plantillaUsuario->user_id );
            $info['url_foto']=  $archivo['ruta'];
            unset($info['imagen']);
        }
        $about_me->update($info);
         return redirect()->route('about_me.edit',$about_me->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }
    public function destroy(AboutPlantillaUsuario $about_me): RedirectResponse
    {
        proteccion($about_me->plantillaUsuario->user_id);
        Storage::delete( $about_me->url_foto);

        $about_me->delete();

        return redirect()->route('about_me.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }

}
