<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripto;
use App\User;
use App\Hospedaje;
use App\Nota;
use App\Mail\BienvenidoAbierto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Inscripcion;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function saveNota(Request $request, $idTaller, $idDictado)
    {
    	$idInscripto = Auth::User()->idInscripto;

    	$nota= DB::table('notas')->where('idInscripto', $idInscripto)->where('idDictado', $idDictado)->get();

    	if(count($nota) == 1)
    	{
    		$nota_existente= Nota::find($nota[0]->id);
    		$nota_existente->texto= $request->input('nota');
    		$nota_existente->save();
    	}
    	else {
    		$nota_existente= new Nota();
    		$nota_existente->texto= $request->input('nota');
    		$nota_existente->idDictado= $idDictado;
    		$nota_existente->idInscripto= $idInscripto;
    		$nota_existente->save();
    	}
    	
        return redirect('archivostalleres/'.$idTaller);
    }
}
