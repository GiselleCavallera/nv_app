<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hospedaje extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'direccion', 'localidad', 'tipo', 'img1', 'img2', 'img3', 'coordenadas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     public function scopeNombre($query, $nombre)
    {
        return $query->where('nombre', "like", "%$nombre%");
    }
    
}
