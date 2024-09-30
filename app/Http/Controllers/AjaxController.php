<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function poblaciones($id=''){
       if ($id=='') {return['<option value="">Seleccionar...</option>'];}

       $consulta= DB::table('MUNICIPIOS')->select('idMunicipio','Municipio')->where('idProvincia',$id)->pluck('Municipio','idMunicipio')->toArray();
       $array=[];
       foreach ($consulta as $key => $value) {
            $array[]='<option value="'.$key.'">'.$value.'</option>';
        }
        return $array;
    }
}
