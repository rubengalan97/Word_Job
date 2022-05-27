<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\User;
use App\Models\Empresa;

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
}
