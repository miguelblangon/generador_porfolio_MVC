<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Plantilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class PlantillaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-plantilla|edit-plantilla|delete-plantilla', ['only' => ['index','show']]);
        $this->middleware('permission:create-plantilla', ['only' => ['create','store']]);
        $this->middleware('permission:edit-plantilla', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-plantilla', ['only' => ['destroy']]);
    }

    public function index(){
        $model = Plantilla::orderBy('id','DESC')->get(['id', 'nombre','ruta_plantilla','ruta_imagen']);
        $array = [];
        foreach ($model as  $value) {
            $array[]= $value->row;
        }


        return view('plantilla.index', [
            'models' =>  $array
        ]);

    }
    public function show($id){
        $plantilla= Plantilla::findOrFail($id);

        return view('plantilla.plantillas_aplicacion.'.$plantilla->nombre.'.index' );
    }
    public function detallesPlantillas(Plantilla $plantilla,Curso $detalle){
        return view('plantilla.plantillas_aplicacion.'.$plantilla->nombre.'.detalles',[
            'curso'=>$detalle,
            'about'=>$detalle->plantillaUsuario->aboutPlantillaUsuario
        ]);
    }
    public function create(){
        return view('plantilla.create');
    }
    public function store(Request $request){
        //Archivo comprimido en zip
        $archivo = subida_ficheros($request->file('files'),'plantillas');
        //Extraer carpeta zip
        extraer_zip($archivo['ruta'],'resources/views/plantilla/plantillas_aplicacion');
        //Borramos carpeta comprimida
        File::delete(storage_path('app/'.$archivo['ruta']));
        //Imagen
        $imagen = subida_ficheros($request->file('imagen'),'public',generar_nombre($request->file('imagen')->getClientOriginalExtension()));
        // Genero un registro en la bd con la ruta de la plantilla y el nombre de la plantilla
        Plantilla::create([
            'nombre'=> $request->name,
            'ruta_plantilla'=>base_path('resources/views/plantilla/plantillas_aplicacion').'/'.$archivo['nombre'],
            'ruta_imagen'=>$imagen['nombre_completo'],
        ]);

        //Creo un directorio en la carpeta public con el nombre de la carpeta
        mkdir(storage_path('app/public').'/'.$archivo['nombre'], 0700);
        //Muevo la subcarpeta de assets de librerias de la ruta views a la ruta de componentes
        rename(base_path('resources/views/plantilla/plantillas_aplicacion').'/'.$archivo['nombre'].'/assets' , storage_path('app/public').'/'.$archivo['nombre'].'/assets');
        //Devuelvo la vista
        return redirect()->route('plantillas.index')
        ->with(['message'=>'Registro Creado con exito','icon'=>'success']);
    }
    public function update(){}
    public function destroy(Plantilla $plantilla){
        File::delete(storage_path('app/public/'.$plantilla->ruta_imagen));
        $nombreDirectorio= explode('/',$plantilla->ruta_plantilla);
        delTree(storage_path('app/public/'.$nombreDirectorio[count($nombreDirectorio)-1]  ));
        delTree($plantilla->ruta_plantilla);
        $plantilla->delete();
        return redirect()->route('plantillas.index')
        ->with(['message'=>'Registro Eliminado con exito','icon'=>'success']);
    }


}
