<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
    public function misOfertas(Request $req) {

        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);

        return view("empresa.misOfertas", ["ofertas" => $empresa->ofertas()]);
    }

    public function crearOferta(Request $req) {

        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);

        return view("empresa.crearOferta", ['empresa' => $empresa, 'ciudades' => Ciudad::all()]);
    }

    public function creandoOferta(Request $req) {

        $oferta = new Oferta;
        $oferta->idEmp = $req->idEmp;
        $oferta->descripcion = $req->descripcion;
        $oferta->idCiu = $req->ciudad;
        $oferta->save();

        $empresa = Empresa::find($req->idEmp);

        return view("empresa.misOfertas", ["ofertas" => $empresa->ofertas()]);

    }

    public function solicitudesEmpresa(Request $req) {

        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);

        return view("empresa.solicitudes", ["solicitudes" => $empresa->ofertas()]);

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

    public function borrarOfertaEmpresa(Request $req, Oferta $oferta) {
        $oferta->delete();
        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);

        return view("empresa.solicitudes", ["solicitudes" => $empresa->ofertas()]);
    }

    public function editandoOferta(Request $req) {

        $oferta = Oferta::find($req->idOfe);
        $oferta->idEmp = $req->empresa;
        $oferta->descripcion = $req->descripcion;
        $oferta->idCiu = $req->ciudad;
        $oferta->save();
        
        return view("admin.ofertas", ["ofertas" => Oferta::all()]);

    }

    public function cambiarEstado(Request $req) {

        $oferta = oferta::find($req->idOfe);
        $oferta->belongsToMany('App\Models\User', 'solicitud', 'idOfe', 'idUsu')->detach($req->idusu);
        $oferta->belongsToMany('App\Models\User', 'solicitud', 'idOfe', 'idUsu')->attach($req->idUsu,["estado"=>$req->estado]);

        $usuario = User::find(Auth::user()->idUsu);
        $empresa = Empresa::find($usuario->empresa()[0]->idEmp);

        return view("empresa.solicitudes", ["solicitudes" => $empresa->ofertas()]);

    }
}
