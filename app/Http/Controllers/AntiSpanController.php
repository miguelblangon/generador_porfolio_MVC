<?php

namespace App\Http\Controllers;

use App\Models\AntiSpan;
use Illuminate\Http\Request;

class AntiSpanController extends Controller
{
    public function addIp($acceso):void {
            $acceso->intentos+=1;
            $acceso->save();

    }
    public function blockIp($model):void {
        if ($model->intentos > 6) {
            $model->es_bloq= 1;
            $model->save();
        }
    }
    public function searchForIp(string $ip):AntiSpan|null {
        return AntiSpan::where('ip',$ip)->first();
    }
}
