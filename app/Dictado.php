<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictado extends Model
{
    protected $table = 'dictados';

    protected $fillable = [
        'id_taller', 'dia', 'hora'
    ];
    
     public function scopeIdTaller($query, $idTaller)
    {
        return $query->where('id_taller', $idTaller);
    }
}
