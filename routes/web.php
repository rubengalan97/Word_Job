<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\CiudadController;

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

// Rutas para el rol de usuario

Route::group(["prefix" => "usuario", "as" => "usuario.", 'middleware' => 'auth'], function() {
    Route::get('/ofertas', [OfertaController::class, "ofertas"])->name("ofertas");
    Route::get('/misSolicitudes/{idUsu}', [UsuarioController::class, "misSolicitudes"])->name("misSolicitudes");
    Route::get('/perfil/{idUsu}', [UsuarioController::class, "perfil"])->name("perfil");
    Route::get('/aceptarOferta', [OfertaController::class, "aceptarOferta"])->name("aceptarOferta");
    Route::get('/editarPerfil/{idUsu}', [UsuarioController::class, "editarPerfil"])->name("editarPerfil");
    Route::get('/borrarPerfil/{idUsu}', [UsuarioController::class, "borrarPerfil"])->name("borrarPerfil");
    Route::get('/borrarSolicitud', [UsuarioController::class, "borrarSolicitud"])->name("borrarSolicitud");
    
    Route::post('/guardarPerfil/{idUsu}', [UsuarioController::class, "guardarPerfil"])->name("guardarPerfil");
});

// Rutas para el rol de admin

Route::group(["prefix" => "admin", "as" => "admin."], function() {

    //Rutas
    Route::get('/gestion', [UsuarioController::class, "gestion"])->name("gestion");
    Route::get('/solicitudes', [solicitudesController::class, "solicitudes"])->name("solicitudes");

    //Acciones de admin sobre ofertas
    Route::get('/ofertas', [OfertaController::class, "ofertasAdmin"])->name("ofertas");
    Route::get('/editarOferta/{oferta}', [OfertaController::class, "editarOferta"])->name("editarOferta");
    Route::get('/borrarOferta/{oferta}', [OfertaController::class, "borrarOferta"])->name("borrarOferta");

    Route::post('/editandoOferta', [OfertaController::class, "editandoOferta"])->name("editandoOferta");

    //Acciones de admin sobre empresas
    Route::get('/empresas', [EmpresaController::class, "empresas"])->name("empresas");
    Route::get('/editarEmpresa/{empresa}', [EmpresaController::class, "editarEmpresa"])->name("editarEmpresa");
    Route::get('/borrarEmpresa/{empresa}', [EmpresaController::class, "borrarEmpresa"])->name("borrarEmpresa");

    Route::post('/editandoEmpresa', [EmpresaController::class, "editandoEmpresa"])->name("editandoEmpresa");

    //Acciones de admin sobre usuarios
    Route::get('/usuarios', [UsuarioController::class, "usuarios"])->name("usuarios");
    Route::get('/editarUsuario/{usuario}', [UsuarioController::class, "editarUsuario"])->name("editarUsuario");
    Route::get('/borrarUsuario/{usuario}', [UsuarioController::class, "borrarUsuario"])->name("borrarUsuario");

    Route::post('/editandoUsuario', [UsuarioController::class, "editandoUsuario"])->name("editandoUsuario");

});

// Rutas para el rol de empresa

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
