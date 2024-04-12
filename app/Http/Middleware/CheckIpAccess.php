<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AntiSpanController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIpAccess
{
    private $antiSpanController;


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,AntiSpanController $antiSpanController): Response
    {
        return   back(); //$next($request);
    }
}
