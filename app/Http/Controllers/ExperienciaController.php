<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienciaRequest;
use App\Models\Experiencia;
use App\Models\PlantillaUsuario;
use Illuminate\Support\Facades\Auth;

class ExperienciaController extends Controller
{
    private $path='experiencias';
    protected $experiencia;

    public function __construct(Experiencia $experiencia)
    {
        $this->middleware('auth');
        $this->middleware('permission:create-experiencia|edit-experiencia|delete-experiencia', ['only' => ['index','show']]);
        $this->middleware('permission:create-experiencia', ['only' => ['create','store']]);
        $this->middleware('permission:edit-experiencia', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-experiencia', ['only' => ['destroy']]);
        $this->experiencia = $experiencia;

    }
    public function parametrosCosulta(){
        return ['id','plantilla_usuario_id','nombre','year_inicio','year_fin','centro'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $array = [];

            if ($user->hasRole('Super Admin')) {
                $model = Experiencia::orderBy('id','DESC')->get($this->parametrosCosulta());
                foreach ($model as  $value) {
                    $array[]= $value->row;
                }
            }
            if ($user->hasRole('User')) {
                $plantilla = PlantillaUsuario::where('user_id',Auth::id())->get();
                $model = Experiencia::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get($this->parametrosCosulta());

                foreach ($model as  $value) {
                    $array[]= $value->row;
                }
            }
            return view($this->path.'.index', [
                'models' => $array
            ]);
        } catch (\Throwable $th) {
            return view($this->path.'.index', [
                'models' => $array
            ]);
        }

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
    public function store(ExperienciaRequest $request)
    {
        $info= $request->all();
         if ( is_null($request->year_fin)) {
            $info['year_fin']='Actualmente';
        }
        Experiencia::create($info);
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($experiencias)
    {
        $experiencias= $this->experiencia->findOrFail($experiencias);
        return view($this->path.'.edit',[
            'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
            'model'=>$experiencias
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExperienciaRequest $request, $experiencias)
    {
        $experiencias= $this->experiencia->findOrFail($experiencias);
        proteccion($experiencias->plantillaUsuario->user_id);
        $info=$request->all();
        if ( is_null($request->year_fin)) {
            $info['year_fin']='Actualmente';
        }
        $experiencias->update($info);
         return redirect()->route($this->path.'.edit',$experiencias->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($experiencias)
    {
        $experiencias= $this->experiencia->findOrFail($experiencias);
        proteccion($experiencias->plantillaUsuario->user_id);
        $experiencias->delete();
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
