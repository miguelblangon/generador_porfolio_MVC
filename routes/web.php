<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/code_mailer', [App\Http\Controllers\CodeAuthPasswordController::class, 'sendPassword'])->name('code_mailer')->middleware('checkip');
Route::post('/code_autentication', [App\Http\Controllers\CodeAuthPasswordController::class, 'autenticationCode'])->name('code_autentication')->middleware('checkip');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    //Admins
    'roles' => App\Http\Controllers\RoleController::class,
    'users' => App\Http\Controllers\UserController::class,
    'plantillas' => App\Http\Controllers\PlantillaController::class,
    'secciones' => App\Http\Controllers\SeccionController::class,
    //Usuarios
    'porfolio' => App\Http\Controllers\PlantillaUsuarioController::class,
    'introduccion' => App\Http\Controllers\IntroduccionPlantillaUsuarioController::class,
    'about_me' => App\Http\Controllers\AboutPlantillaUsuarioController::class,
    'habilidad' => App\Http\Controllers\HabilidadController::class,
    'estudio' => App\Http\Controllers\EstudioController::class,
    'experiencias'=>App\Http\Controllers\ExperienciaController::class,
    'cursos'=>App\Http\Controllers\CursoController::class,
    'servicios'=>App\Http\Controllers\ServicioController::class,

]);
Route::get('/plantillas/{plantilla}/detalles/{detalle}', [App\Http\Controllers\PlantillaController::class, 'detallesPlantillas'])->name('plantillas.detalles');
//Ajax
Route::get('/ajax-poblaciones/{id?}', [App\Http\Controllers\AjaxController::class, 'poblaciones'])->name('ajax-poblaciones');
