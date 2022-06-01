<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Ciudad;

class OfertaController extends Controller
{
    public function ofertas(Request $req) {
        return view("usuario.ofertas", ["ofertas" => Oferta::all()]);
    }

    public function aceptarOferta(Request $req) {
        $user = User::find($req->idUsu);
        $user->belongsToMany('App\Models\Oferta', 'solicitud', 'idUsu', 'idOfe')->attach($req->idUsu, ["idOfe" =>$req->idOfe]);
        return view("usuario.ofertas", ["ofertas" => Oferta::all()]);
    }

    public function ofertasAdmin(Request $req) {
        return view("admin.ofertas", ["ofertas" => Oferta::all()]);
    }

    public function editarOferta(Request $req, Oferta $oferta) {
        return view("admin.editarOferta", ["oferta" => $oferta, "empresas" => Empresa::all(), "ciudades" => Ciudad::all()]);
    }

    public function borrarOferta(Request $req, Oferta $oferta) {
        $oferta->delete();
        return view("admin.ofertas", ["ofertas" => Oferta::all()]);
    }

    public function editandoOferta(Request $req) {

        $oferta = Oferta::find($req->idOfe);
        $oferta->idEmp = $req->empresa;
        $oferta->descripcion = $req->descripcion;
        $oferta->idCiu = $req->ciudad;
        $oferta->save();
        
        return view("admin.ofertas", ["ofertas" => Oferta::all()]);

    }
}
