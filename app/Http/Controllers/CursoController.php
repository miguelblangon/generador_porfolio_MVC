<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Models\PlantillaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    private $path='cursos';
    protected $model;

    public function __construct(Curso $curso)
    {
        $this->middleware('auth');
        $this->middleware('permission:create-curso|edit-curso|delete-curso', ['only' => ['index','show']]);
        $this->middleware('permission:create-curso', ['only' => ['create','store']]);
        $this->middleware('permission:edit-curso', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-curso', ['only' => ['destroy']]);
        $this->model = $curso;

    }
    public function parametrosCosulta(){
        return ['id','plantilla_usuario_id','nombre','tutor','year_fin','categoria'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $array = [];

        if ($user->hasRole('Super Admin')) {
            $model = Curso::orderBy('id','DESC')->get($this->parametrosCosulta());
            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }

        if ($user->hasRole('User')) {
            $plantilla = PlantillaUsuario::where('user_id',Auth::id());
            $model = Curso::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get($this->parametrosCosulta());

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
    public function store(CursoRequest $request)
    {
        $info= $request->all();
        Curso::create($info);
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($experiencias)
    {
        $experiencias= $this->model->findOrFail($experiencias);
        return view($this->path.'.edit',[
            'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
            'model'=>$experiencias
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, $cursos)
    {
        $model= $this->model->findOrFail($cursos);
        proteccion($model->plantillaUsuario->user_id);
        $info=$request->all();
        $model->update($info);
         return redirect()->route($this->path.'.edit',$model->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cursos)
    {
        $model= $this->model->findOrFail($cursos);
        proteccion($model->plantillaUsuario->user_id);
        $model->delete();
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
