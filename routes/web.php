<?php

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
    'roles' => App\Http\Controllers\RoleController::class,
    'users' => App\Http\Controllers\UserController::class,
    'porfolio' => App\Http\Controllers\PlantillaUsuarioController::class,
    'plantillas' => App\Http\Controllers\PlantillaController::class,
]);
Route::get('/plantillas/{plantilla}/detalles/{detalle}', [App\Http\Controllers\PlantillaController::class, 'detallesPlantillas'])->name('plantillas.detalles');
