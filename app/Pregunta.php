<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table= 'preguntas';
    
     public function scopeIdDictado($query, $idDictado)
    {
        return $query->where('idDictado', $idDictado);
    }
}