<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeccionRequest;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeccionController extends Controller
{
    private $path='secciones';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-seccion|edit-seccion|delete-seccion', ['only' => ['index','show']]);
        $this->middleware('permission:create-seccion', ['only' => ['create','store']]);
        $this->middleware('permission:edit-seccion', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-seccion', ['only' => ['destroy']]);

    }
    public function parametrosCosulta(){
        return ['id','seccion'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $array = [];
        $model = Seccion::orderBy('id','DESC')->get($this->parametrosCosulta());
        foreach ($model as  $value) {
            $array[]= $value->row;
        }
        return view($this->path.'.index', [ 'models' => $array ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeccionRequest $request)
    {
        $info= $request->all();
        Seccion::create($info);
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seccion $seccione)
    {
        return view($this->path.'.edit',[ 'model'=>$seccione ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeccionRequest $request, Seccion $seccione){
        $info=$request->all();
        $seccione->update($info);
         return redirect()->route($this->path.'.edit',$seccione->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccione)
    {
        $seccione->delete();
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
