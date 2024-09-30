<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlantillaUsuarioRequest;
use App\Models\Plantilla;
use App\Models\PlantillaUsuario;
use App\Models\Seccion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantillaUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-plantilla-usuario|edit-plantilla-usuario|delete-plantilla-usuario', ['only' => ['index','show']]);
        $this->middleware('permission:create-plantilla-usuario', ['only' => ['create','store']]);
        $this->middleware('permission:edit-plantilla-usuario', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-plantilla-usuario', ['only' => ['destroy']]);
    }
    public function index(){
        $user = Auth::user();
        $array = [];

        if ($user->hasRole('Super Admin')) {
            $model = PlantillaUsuario::orderBy('id','DESC')->get(['id','plantilla_id','user_id','nombre','url']);
            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }

        if ($user->hasRole('User')) {
            $model = PlantillaUsuario::where('user_id', Auth::id())->orderBy('id','DESC')->get(['id','plantilla_id','user_id','nombre','url']);

            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }


        return view('porfolio.index', [
            'models' => $array
        ]);
    }
    public function show(PlantillaUsuario $porfolio){
        return verPlantilla($porfolio);
    }

    public function create(){

        return view('porfolio.create',['coleccion'=>Plantilla::get(['id','nombre'])->pluck('nombre','id')->toArray()]);
    }
    public function store(PlantillaUsuarioRequest $request){
        $info=$request->all();
        $info['user_id']=Auth::id();
        PlantillaUsuario::create($info);
        return redirect()->route('porfolio.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }
    public function edit(PlantillaUsuario $porfolio ){
       proteccion($porfolio->user_id);
        return view('porfolio.edit',[
                    'coleccion'=>Plantilla::get(['id','nombre'])->pluck('nombre','id')->toArray(),
                     'model'=>$porfolio
                    ]);
    }
    public function update(Request $request,PlantillaUsuario $porfolio ){
       proteccion($porfolio->user_id);
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:250',
            'url' => $porfolio->url!=$request->url ? 'required|string|max:250|unique:plantilla_usuarios,url': 'required|string|max:250',
            'plantilla_id' => 'required'
        ]);



        $porfolio->update($validatedData);
        return redirect()->route('porfolio.edit',$porfolio->id)
        ->with(['message'=>'Registro Actualizado con exito','icon'=>'success']);

    }

    public function destroy(PlantillaUsuario $porfolio): RedirectResponse
    {
       proteccion($porfolio->user_id);

        $porfolio->delete();
        return redirect()->route('porfolio.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }






}
