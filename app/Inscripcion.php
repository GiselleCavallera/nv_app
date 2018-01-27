<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'id_user', 'id_taller', 'dia', 'hora', 'inscripto'
    ];
    
    public function scopeInscripcionesDelDictado($query, $idDictado)
    {
        return $query->where('id_dictado',  $idDictado);
    }
}
