<?php

namespace App\Http\Controllers;
use App\Pregunta;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function savePregunta(Request $request, $idTaller, $idDictado)
    {
        //dd($request->input('idDictado')); //{{ url('/savePregunta/'.$tallerSeleccionado->id.'/'.$idDictado) }}   {{ route('savepregunta/'.$tallerSeleccionado->id.'/'.$idDictado) }}
    	$pregunta= new Pregunta();
    	$pregunta->pregunta= $request->input('pregunta').' '; 
    	$pregunta->idDictado= $idDictado;
		$pregunta->save();

        //redireccionar 
        	//return view('mensajeErrorPreguntas');
        return redirect('archivostalleres/'.$idTaller);
    }

    public function listadoPreguntas($idDictado)
    {
    	$preguntas= Pregunta::idDictado($idDictado)->get();
    	$contador= 1;

    	if(count($preguntas) > 0)
    	{
    		return view('listadopreguntas')->with('preguntas', $preguntas)->with('contador', $contador);
    	} else {
    		return view('mensajeErrorPreguntas');
    	}
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($idHospedaje)
    {    
        
    }

}
