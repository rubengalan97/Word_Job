<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Ciudad;

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

        if ($req->hasFile('imagen')) {

            $file  = $req->file('imagen');
            $destinationPath = '../img/';
            $fileName = time().'-'.$file->getClientOriginalName();
            $uplopadSuccess = $req->file('imagen')->move($destinationPath, $fileName);

            $user->imagen = $destinationPath.$fileName ?? $user->imagen;
        }

        $user->ultimos_estudios = $req->ultimos_estudios;
        $user->descripcion = $req->descripcion;
        $user->save();
        return view("usuario.perfil", ["usuario" => User::find($req->idUsu)]);
    }

    public function borrarPerfil(Request $req, $idUsu) {
        User::find($idUsu)->delete();
        return redirect()->route("logout");
    }

    public function misSolicitudes(Request $req, $idUsu) {
        $user = User::find($idUsu);
        return view("usuario.misSolicitudes", ["solicitudes" => $user->solicitudes()]);
    }

    public function borrarSolicitud(Request $req) {
        $user = User::find($req->idUsu);
        $user->belongsToMany('App\Models\Oferta', 'solicitud', 'idUsu', 'idOfe')->detach($req->idOfe);
        return view("usuario.misSolicitudes", ["solicitudes" => $user->solicitudes()]);
    }

    public function usuario(Request $req) {
        $user = User::find($req->idUsu);
        $oferta = Oferta::find($req->idOfe);
        return view("empresa.usuario", ["usuario" => $user, "oferta" => $oferta]);
    }

    //Acciones relacionadas con el admin

    public function usuarios() {
        return view("admin.usuarios", ["usuarios" => User::all()]);
    }

    public function editarUsuario(Request $req, User $usuario) {
        return view("admin.editarUsuario", ["usuario" => $usuario]);
    }

    public function gestion(Request $req) {
        return view("admin.gestion");
    }

    public function editandoUsuario(Request $req) {

        $usuario = User::find($req->idUsu);

        $usuario->email = $req->email;

        if ($req->hasFile('imagen')) {

            $req->validate([
                'imagen' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $req->imagen->storeAs('img/', $req->image, 'public');

            $usuario->imagen = $req->imagen;
        }
        $usuario->descripcion = $req->descripcion;
        $usuario->ultimos_estudios = $req->ultimos_estudios;
        $usuario->rol = $req->rol;
        $usuario->save();

        return view("admin.usuarios", ["usuarios" => User::all()]);
    }

    public function borrarUsuario(Request $req, User $usuario) {
        $usuario->delete();
        return view("admin.usuarios", ["usuarios" => User::all()]);
    }


}
