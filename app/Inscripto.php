<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripto extends Model
{
    protected $table= 'inscriptos';


    public function scopeNombre($query, $nombre)
    {
        return $query->where('nombre', "like", "%$nombre%");
    }

    public function scopeHospedados($query, $idHospedaje)
    {
    	return $query->where('idHospedaje', "$idHospedaje");
    }

   /* public function getHospedaje($idHospedaje)
    {
    	$hospedaje= Hospedaje::find($idHospedaje);
    	return $hospedaje;
    }*/

}
