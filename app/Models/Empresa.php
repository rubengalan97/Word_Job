<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';
    protected $primaryKey = 'idEmp';
    public $timestamps = false;

    protected $fillable = ["nombre", "imagen", "descripcion"];

    //Relaciones

        //Relaciones con las ofertas

        public function ofertas() {
            return $this->hasMany('App\Models\Oferta', 'idEmp', 'idOfe')->get();
        }

}
