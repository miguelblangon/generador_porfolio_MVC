<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('generar_nombre')) {
    function generar_nombre($extension){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, 10).'.'.$extension;
    }

}
if (!function_exists('extraer_zip')) {
    function extraer_zip($entrada,$salida){
        $zip = new ZipArchive();
    	    if ($zip->open( storage_path('app/'.$entrada) ) !== true) {
    	    throw new \Exception('Could not download zip file');
	    }
        $zip->extractTo(base_path($salida));
	    $zip->close();
    }

}
if (!function_exists('subida_ficheros')) {
    function subida_ficheros($archivo ,$carpeta,$nombre_custom=null ){
         $path= $archivo->storeAs($carpeta,$nombre_custom ?? $archivo->getClientOriginalName());
         //obtener nombre de la carpeta.
         $name_file = pathinfo($path, PATHINFO_FILENAME);
        return [
            'nombre_completo'=> $nombre_custom ?? $archivo->getClientOriginalName(),
            'nombre'=>$name_file,
            'ruta'=>$path
        ];
    }

}

if (!function_exists('delTree')) {
    function delTree($dir) {

        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir")  delTree($dir."/".$object); else unlink($dir."/".$object);
            }
          }
          reset($objects);
          rmdir($dir);
        }

    }


}
if (!function_exists('proteccion')) {
    function proteccion($id){
        $user = Auth::user();
        if ($id!= $user->id && $user->hasRole('User') ) {
            abort(403,'PERMISOS INSUFICIENTES');
        }
    }


}
if (!function_exists('provincia')) {
    function provincia(int $provincia){
        return DB::table('provincias')->select('Provincia')->where('idProvincia',$provincia)->first()->Provincia;

    }
}
if (!function_exists('municipio')) {
    function municipio(int $municipio){
        return DB::table('municipios')->select('Municipio')->where('idMunicipio',$municipio)->first()->Municipio;

    }
}

if (!function_exists('verPlantilla')) {

    function verPlantilla(\App\Models\PlantillaUsuario $porfolio){
        $cursos = $porfolio->cursos;
        $categorias = $cursos->map(function ($array) {return collect($array)->only(['categoria'])->unique()->all();});
        $categorias = array_map("unserialize", array_unique(array_map("serialize", $categorias->toArray())));

        return view('plantilla.plantillas_aplicacion.'.$porfolio->plantilla->nombre.'.index',[
            'introduccion'=>$porfolio->introduccionPlantillaUsuario,
            'about'=>$porfolio->aboutPlantillaUsuario,
            'habilidades'=>$porfolio->habilidades,
            'estudios'=>$porfolio->estudios,
            'experiencias'=>$porfolio->experiencias,
            'cursos'=>$cursos,
            'categorias'=>$categorias,
            'servicios'=>$porfolio->servicios,
            'secciones'=> \App\Models\Seccion::all(),

        ]);
    }

}


if (!function_exists('verCurso')) {
    function verCurso(\App\Models\Plantilla $plantilla,\App\Models\Curso $detalle){
        return view('plantilla.plantillas_aplicacion.'.$plantilla->nombre.'.detalles',[
            'curso'=>$detalle,
            'about'=>$detalle->plantillaUsuario->aboutPlantillaUsuario
        ]);

    }

}












