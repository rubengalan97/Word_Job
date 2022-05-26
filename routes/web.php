<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\UsuarioController;
// use App\Http\Controllers\EdificioController;

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

Route::group(["prefix" => "usuario", "as" => "usuario.", 'middleware' => 'auth'], function() {
    Route::get('/ofertas', [OfertaController::class, "ofertas"])->name("ofertas");
    Route::get('/misSolicitudes', [SolicitudController::class, "misSolicitudes"])->name("misSolicitudes");
    Route::get('/perfil/{idUsu}', [UsuarioController::class, "perfil"])->name("perfil");
    Route::get('/aceptarOferta', [OfertaController::class, "aceptarOferta"])->name("aceptarOferta");
    Route::get('/editarPerfil/{idUsu}', [UsuarioController::class, "editarPerfil"])->name("editarPerfil");
    Route::post('/guardarPerfil/{idUsu}', [UsuarioController::class, "guardarPerfil"])->name("guardarPerfil");
});

Route::group(["prefix" => "admin", "as" => "admin."], function() {
    Route::get('/empresas', [Empresa::class, "empresas"])->name("empresas");
    Route::get('/ofertas', [Oferta::class, "ofertas"])->name("ofertas");
    Route::get('/solicitudes', [solicitudes::class, "solicitudes"])->name("solicitudes");
    Route::get('/usuarios', [Usuario::class, "usuarios"])->name("usuarios");
});

Route::group(["prefix" => "empresa", "as" => "empresa."], function() {
    Route::get('/misOfertas', [OfertaController::class, "misOfertas"])->name("misOfertas");
    Route::get('/perfil', [EmpresaController::class, "perfil"])->name("perfil");
    Route::get('/solicitudes', [OfertaController::class, "empresas"])->name("empresas");
    Route::get('/usuario', [UsuarioController::class, "usuario"])->name("usuario");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
