<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'idUsu';
    public $timestamps = false;

    protected $fillable = ['email', 'password', 'imagen', 'ultimos_estudios', 'descripcion', 'rol'];
    protected $hidden = ['password'];

    //Relaciones

        //Relaciones con las solicitudes

        public function solicitudes() {
            return $this->belongsToMany('App\Models\Oferta', 'solicitud', 'idUsu', 'idOfe')->get();
        }

        public function empresa() {
            return $this->hasOne('App\Models\Empresa', 'idUsu', 'idUsu')->get();
        }

    }
