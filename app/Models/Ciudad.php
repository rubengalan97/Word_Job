<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudad';
    protected $primaryKey = 'idCiu';
    public $timestamps = false;

    protected $fillable = ['ciudad'];

    //Relaciones

        //Relaciones con las ofertas

        public function ofertas() {
            return $this->hasMany('App\Models\Oferta', 'idCiu', 'idCiu')->get();
        }


}
