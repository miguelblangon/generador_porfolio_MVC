<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudioRequest;
use App\Models\ExperienciaProfesional;
use App\Models\PlantillaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienciaProfesionalController extends Controller
{
    private $path='experiencia';
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-experiencia|edit-experiencia|delete-experiencia', ['only' => ['index','show']]);
        $this->middleware('permission:create-experiencia', ['only' => ['create','store']]);
        $this->middleware('permission:edit-experiencia', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-experiencia', ['only' => ['destroy']]);
    }
    public function parametrosCosulta(){
        return ['id','plantilla_usuario_id','nombre','year_inicio','year_fin','centro'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $array = [];

        if ($user->hasRole('Super Admin')) {
            $model = ExperienciaProfesional::orderBy('id','DESC')->get($this->parametrosCosulta());
            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }

        if ($user->hasRole('User')) {
            $plantilla = PlantillaUsuario::where('user_id',Auth::id());
            $model = ExperienciaProfesional::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get($this->parametrosCosulta());

            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }


        return view($this->path.'.index', [
            'models' => $array
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->path.'.create',['coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudioRequest $request)
    {
        $info= $request->all();
        ExperienciaProfesional::create($info);
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExperienciaProfesional $experiencia)
    {
        return view($this->path.'.edit',[
            'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
            'model'=>$experiencia
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudioRequest $request, ExperienciaProfesional $experiencia)
    {
        proteccion($experiencia->plantillaUsuario->user_id);
        $info=$request->all();
        $experiencia->update($info);
         return redirect()->route($this->path.'.edit',$experiencia->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExperienciaProfesional $experiencia)
    {
        proteccion($experiencia->plantillaUsuario->user_id);
        $experiencia->delete();
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
