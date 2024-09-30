<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;


class NoticiaController extends Controller
{
    private $path='noticias';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-noticia|edit-noticia|delete-noticia', ['only' => ['index','show']]);
        $this->middleware('permission:create-noticia', ['only' => ['create','store']]);
        $this->middleware('permission:edit-noticia', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-noticia', ['only' => ['destroy']]);

    }
    public function parametrosCosulta(){
        return ['id','titulo', 'cuerpo','autor'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $array = [];
        $model = Noticia::orderBy('id','DESC')->get($this->parametrosCosulta());
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
    public function store(NoticiaRequest $request)
    {
        $info= $request->all();
        Noticia::create($info);
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view($this->path.'.edit',[ 'model'=>$noticia ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoticiaRequest $request, Noticia $noticia){
        $info=$request->all();
        $noticia->update($info);
         return redirect()->route($this->path.'.edit',$noticia->id)
         ->with(['message'=>'Registro Actualizado','icon'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route($this->path.'.index')
        ->with(['message'=>'Registro Eliminado','icon'=>'error']);
    }
}
