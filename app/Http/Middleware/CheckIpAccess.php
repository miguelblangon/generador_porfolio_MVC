<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AntiSpanController;
use App\Models\AntiSpan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIpAccess
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $antiSpanController = new AntiSpanController();
        $ip = request()->ip();

        //Primero comprobamos que no estan intentando saltarse el flujo y acceder directamente con la pass antigua
        $uri = $request->path();//Obtenemos la url actual
        if ($uri =='/code_autentication') {
            $usuario = $antiSpanController->searchForIp($ip);
            if ($usuario==null || now() > $usuario->updated_at->addMinutes(30) ||  now() > $usuario->created_at->addMinutes(30) ) {
                return redirect()->route('login');
            }
        }
        //hacemos las demas comprobaciones
        $acceso = AntiSpan::firstOrCreate(['ip'=>$ip],
                [  'ip'=>$request->ip(),'navegador'=>$request->header('User-Agent')] );

        if (!$acceso->es_bloq ) {
            $antiSpanController->addIp($acceso);
            $antiSpanController->blockIp($acceso);
            return $next($request);
        }else {
            //desbloquear cuando lleva mas de x tiempo
            $fecha = $acceso->updated_at->addMinutes(30);
            if (now() > $fecha ) {
                $acceso->delete();
            }
            return redirect()->route('login');
        }

    }
}
