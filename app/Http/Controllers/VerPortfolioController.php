<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Plantilla;
use App\Models\PlantillaUsuario;

class VerPortfolioController extends Controller
{
    public function visualizarPorfolio($codigo){
       $porfolio = PlantillaUsuario::where('url', $codigo)->first();
       return verPlantilla($porfolio);
    }
    public function visualizarCurso(Plantilla $plantilla,Curso $detalle ){
        return verCurso($plantilla,$detalle);
    }
}
