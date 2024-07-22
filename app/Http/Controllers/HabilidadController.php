<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabilidadRequest;
use App\Models\Habilidad;
use App\Models\PlantillaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabilidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-habilidad|edit-habilidad|delete-habilidad', ['only' => ['index','show']]);
        $this->middleware('permission:create-habilidad', ['only' => ['create','store']]);
        $this->middleware('permission:edit-habilidad', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-habilidad', ['only' => ['destroy']]);
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
            $model = Habilidad::orderBy('id','DESC')->get(['id','plantilla_usuario_id','nombre','valor']);
            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }

        if ($user->hasRole('User')) {
            $plantilla = PlantillaUsuario::where('user_id',Auth::id())->get();
            $model = Habilidad::whereBelongsTo($plantilla,'plantillaUsuario')->orderBy('id','DESC')->get(['id','plantilla_usuario_id','nombre','valor']);

            foreach ($model as  $value) {
                $array[]= $value->row;
            }
        }


        return view('habilidad.index', [
            'models' => $array
        ]);
        } catch (\Throwable $th) {
            return view('habilidad.index', [
                'models' => $array
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habilidad.create',['coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabilidadRequest $request)
    {
        $info= $request->all();
        Habilidad::create($info);
        return redirect()->route('habilidad.create')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habilidad $habilidad)
    {
        return view('habilidad.edit',[
            'coleccion'=>PlantillaUsuario::where('user_id',Auth::id())->pluck('nombre','id')->toArray(),
            'model'=>$habilidad
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabilidadRequest $request, Habilidad $habilidad)
    {
        $info=$request->all();
        $habilidad->update($info);
        return redirect()->route('habilidad.edit',$habilidad->id)
        ->with(['message'=>'Registro Actualizado','icon'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habilidad $habilidad)
    {
        proteccion($habilidad->plantillaUsuario->user_id);
        $habilidad->delete();
        return redirect()->route('habilidad.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
