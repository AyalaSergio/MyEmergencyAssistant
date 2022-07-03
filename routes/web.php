<?php

use App\Http\Controllers\pacienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paisController;
use App\Http\Controllers\usuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name("login.usuario");

Route::get('/dashboard', function(){
    return view('dashboard');
})->name("usuario.dashboard");
// RUTA PARA TOMAR Y PUBLICAR INSERCION EN MYSQL , ES OBLIGATORIO USAR GET Y POST.
Route::get('guardarPais', [paisController::class, 'ajaxRequestPais']);
Route::post('guardarPais', [paisController::class, 'guardarPais'])->name("ajaxGuardar.pais");

// RUTA PARA TOMAR Y PUBLICAR INSERCION EN MYSQL DE PERSONA, USUARIO Y PACIENTE.
// Route::get("guardarUsuario", [pacienteController::class, ''])



// RUTAS PARA USUARIO
Route::get("/buscarUsuario", [usuarioController::class, 'ajaxRequestUsuario']);
Route::post('AjaxbuscarUsuario', [usuarioController::class, 'AjaxbuscarUsuario'])->name("AjaxbuscarUsuario");
