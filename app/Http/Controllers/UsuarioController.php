<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;
use App\Models\Empresa;

class UsuarioController extends Controller
{

    public function perfil(Request $req) {
        return view("usuario.perfil", ["usuario" => User::find($req->idUsu)]);
    }

    public function editarPerfil(Request $req) {
        return view("usuario.editarPerfil", ["usuario" => User::find($req->idUsu)]);
    }

    public function guardarPerfil(Request $req, $idUsu) {

        $user = User::find($idUsu);
        $user->imagen = $req->imagen;
        $user->ultimos_estudios = $req->ultimos_estudios;
        $user->descripcion = $req->descripcion;
        $user->save();

        return view("usuario.perfil", ["usuario" => User::find($req->idUsu)]);
    }
}
