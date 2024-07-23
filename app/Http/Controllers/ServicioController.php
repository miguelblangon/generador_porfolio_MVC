<?php

namespace App\Http\Controllers;


use App\Http\Requests\ServicioRequest;
use App\Models\PlantillaUsuario;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    private $path='servicios';
    protected $model;

    public function __construct(Servicio $model)
    {
        $this->middleware('auth');
        $this->middleware('permission:create-servicio|edit-servicio|delete-servicio', ['only' => ['index','show']]);
        $this->middleware('permission:create-servicio', ['only' => ['create','store']]);
        $this->middleware('permission:edit-servicio', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-servicio', ['only' => ['destroy']]);
        $this->model = $model;

    }
    public function parametrosCosulta(){
        return ['id','plantilla_usuario_id','nombre','descripcion','icono'];
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
                $model = Servicio::orderBy('id','DESC')->get($this->parametrosCosulta());
                foreach ($model as  $value) {
                    $array[]= $value->row;
                }
            }

            if ($user->hasRole('User')) {
                $plantilla = PlantillaUsuario::where('user_id',Auth::id())->get();
                $model = Servicio::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get($this->parametrosCosulta());

                foreach ($model as  $value) {
                    $array[]= $value->row;
                }
            }
            return view($this->path.'.index', [
                'models' => $array
            ]);
        } catch (\Throwable $th) {
            //throw $th;
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
    public function store(ServicioRequest $request)
    {
        $info= $request->all();
        Servicio::create($info);
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view($this->path.'.edit',[
            'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
            'model'=>$this->model->findOrFail($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicioRequest $request, $id)
    {
        $model= $this->model->findOrFail($id);
        proteccion($model->plantillaUsuario->user_id);
        $info=$request->all();
        $model->update($info);
         return redirect()->route($this->path.'.edit',$model->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model= $this->model->findOrFail($id);
        proteccion($model->plantillaUsuario->user_id);
        $model->delete();
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
