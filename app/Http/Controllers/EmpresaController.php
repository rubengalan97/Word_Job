<?php

namespace App\Http\Controllers;

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

        return view("admin.editarEmpresa", ["empresa" => $empresa]);
    }

    public function editandoEmpresa(Request $req) {

        $empresa = Empresa::find($req->idEmp);

        $empresa->nombre = $req->nombre;
        $empresa->imagen = $req->imagen;
        $empresa->descripcion = $req->descripcion;
        $empresa->save();

        return view("admin.empresas", ["empresas" => Empresa::all()]);
    }

    public function borrarEmpresa(Request $req, Empresa $empresa) {
        $empresa->delete();
        return view("admin.empresas", ["empresas" => Empresa::all()]);
    }
}
