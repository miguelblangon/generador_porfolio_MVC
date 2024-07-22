<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntroduccionPlantillaUsuarioRequest;
use App\Models\IntroduccionPlantillaUsuario;
use App\Models\PlantillaUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IntroduccionPlantillaUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-introduccion-plantilla-usuario|edit-introduccion-plantilla-usuario|delete-introduccion-plantilla-usuario', ['only' => ['index','show']]);
        $this->middleware('permission:create-introduccion-plantilla-usuario', ['only' => ['create','store']]);
        $this->middleware('permission:edit-introduccion-plantilla-usuario', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-introduccion-plantilla-usuario', ['only' => ['destroy']]);
    }
    public function index(){
      //  try {
            $user = Auth::user();
            $array = [];

            if ($user->hasRole('Super Admin')) {
                $model = IntroduccionPlantillaUsuario::orderBy('id','DESC')->get(['id','plantilla_usuario_id','nombre','url_foto','frase_introductoria']);
                foreach ($model as  $value) {
                    $array[]= $value->row;
                }
            }

            if ($user->hasRole('User')) {
                $plantilla = PlantillaUsuario::where('user_id',Auth::id())->get();
                $model = IntroduccionPlantillaUsuario::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get(['id','plantilla_usuario_id','nombre' ,'url_foto','frase_introductoria']);
                foreach ($model as  $value) {
                    $array[]= $value->row;
                }
            }


            return view('introduccion.index', [
                'models' => $array
            ]);

       /* } catch (\Throwable $th) {
            return view('introduccion.index', [
                'models' => []
            ]);
        }
            */

    }
    public function create(){

        return view('introduccion.create',['coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray()]);
    }
    public function store(IntroduccionPlantillaUsuarioRequest $request){
        $id = Auth::id();
        $archivo= subida_ficheros($request->file('imagen'),'public/usuarios/'.$id );
        $info= $request->all();
        unset($info['imagen']);
        $info['url_foto']=$archivo['ruta'];
        IntroduccionPlantillaUsuario::create($info);

        return redirect()->route('introduccion.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }
    public function edit(IntroduccionPlantillaUsuario $introduccion ){
        return view('introduccion.edit',[
                    'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
                    'model'=>$introduccion
                    ]);
    }
    public function update(Request $request ,IntroduccionPlantillaUsuario $introduccion ){
        proteccion($introduccion->plantillaUsuario->user_id);
        $request->validate([
            'plantilla_usuario_id' => 'required',
            'frase_introductoria' =>'required|string|max:250',
            'imagen' => 'nullable|image|max:1024|extensions:jpg,png'
        ]);
        $info=$request->all();
        if (!isset($info['imagen']) )  {
            unset($info['imagen']);
        }else {
            Storage::delete($introduccion->url_foto);
            $archivo= subida_ficheros($request->file('imagen'),'public/usuarios/'.$introduccion->plantillaUsuario->user_id );
            $info['url_foto']=  $archivo['ruta'];
            unset($info['imagen']);
        }
        $introduccion->update($info);
         return redirect()->route('introduccion.edit',$introduccion->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    public function destroy(IntroduccionPlantillaUsuario $introduccion): RedirectResponse
    {
        proteccion($introduccion->plantillaUsuario->user_id);

        Storage::delete($introduccion->url_foto);

        $introduccion->delete();

        return redirect()->route('introduccion.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
