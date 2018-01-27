<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reflexion extends Model
{
    protected $table = 'reflexiones';

    protected $fillable = [
        'id_orador', 'reflexion', 'publicado', 'fecha_publicacion'
    ];
}
