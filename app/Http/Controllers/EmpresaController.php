<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function empresas() {
        return view("admin.empresas", ["empresas" => Empresa::all()]);
    }

    public function editarEmpresa(Request $req, Empresa $empresa) {
        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);
        return view("empresa.editarEmpresa", ["empresa" => $empresa, "usuario" => $usuario]);
    }

    public function editarEmpresaAdmin(Request $req, Empresa $empresa) {
        return view("admin.editarEmpresa", ["empresa" => $empresa]);
    }

    public function perfil(Request $req) {
        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);
        return view("empresa.perfil", ["empresa" => $empresa, "usuario" => $usuario]);
    }

    public function editandoEmpresaUsuario(Request $req) {

        $empresa = Empresa::find($req->idEmp);
        $empresa->nombre = $req->nombre;
        $empresa->descripcion = $req->descripcion;
        $empresa->save();

        $usuario = User::find($req->idUsu);
        $usuario->email = $req->email;
        $usuario->save();

        return redirect()->route("empresa.perfil");
    }

    public function borrarPerfil(Request $req) {
        $usuario = User::find(Auth::user()->idUsu);
        Empresa::find($usuario->empresa()[0]->idEmp)->delete();
        $usuario->delete();
        return redirect()->route("out");
    }

    public function editandoEmpresa(Request $req) {

        $empresa = Empresa::find($req->idEmp);

        $empresa->nombre = $req->nombre;
        $empresa->descripcion = $req->descripcion;
        $empresa->save();

        return view("admin.empresas", ["empresas" => Empresa::all()]);
    }

    public function borrarEmpresa(Request $req, Empresa $empresa) {
        $empresa->delete();
        return view("admin.empresas", ["empresas" => Empresa::all()]);
    }
}
