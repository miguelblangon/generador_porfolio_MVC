<?php

namespace App\Http\Controllers;

use App\Models\AntiSpan;
use Illuminate\Http\Request;

class AntiSpanController extends Controller
{
    public function addIp(Request $request):void {
            AntiSpan::firstOrCreate(['ip'=>$request->ip()],
            [
                'ip'=>$request->ip(),
                'navegador'=>$request->header('User-Agent'),
            ]);
    }
    //Proximas funcionalidades proteccion por mac
    public function addMac(){
        //Saber en que sistema estamos si en windwos o linux
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            echo 'Este un servidor usando Windows!';
        } else {
            echo 'Este es un servidor que no usa Windows!';
        }

    }
}
