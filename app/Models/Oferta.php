<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'oferta';
    protected $primaryKey = 'idOfe';
    public $timestamps = false;

    protected $fillable = ['descripcion'];

    //Relaciones

        //Relacion con las empresas

        public function empresas() {
            return $this->belongsTo('App\Models\Empresa', 'idEmp', 'idEmp')->get();
        }

        //Relaciones con las ciudades

        public function ciudades() {
            return $this->belongsTo('App\Models\Ciudad', 'idCiu', 'idCiu')->get();
        }

        //Relacion con las solicitudes

        public function solicitudes() {
            return $this->belongsToMany('App\Models\User', 'solicitud', 'idOfe', 'idUsu')->get();
        }

        public function estado($idOfe, $idUsu){
            // var_dump(DB::table('solicitud')->select('estado')->where('idOfe', $idOfe)->where('idUsu', $idUsu)->get()[0]);exit();
            return DB::table('solicitud')->select('estado')->where('idOfe', $idOfe)->where('idUsu', $idUsu)->get()[0]; 
        }

}
