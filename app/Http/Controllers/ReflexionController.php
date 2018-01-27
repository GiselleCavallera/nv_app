<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reflexion;

use Carbon\Carbon;
use DateTime;


class ReflexionController extends Controller
{
    

	public function create()
    {
      return view('nuevareflexion');
    }

    public function getNuevaReflexion(){
        return view('nuevareflexion');
    }

    public function listadoReflexiones() //Request $request
    {
        
        $reflexiones= Reflexion::all()->sortBy('titulo');        
        
        return view('listadoreflexiones')->with('reflexiones', $reflexiones);
    }

    public function saveReflexion(Request $request){
        //dd($request->input('fecha'));
        $fe= date ( 'Y-m-d H:i:s' ,  strtotime ($request->input("fecha")));
        
        
        $dia=substr($request->input("fecha"), 0, 2);
        $mes=substr($request->input("fecha"), 3, 2);
        $anio=substr($request->input("fecha"), 6, 4);
        $fe= $anio.'-'.$mes.'-'.$dia;
        //dd($fe);
        
        $titulo = strtoupper($request->input('titulo'));
        $fecha =  new DateTime($fe);  //$fecha = new DateTime($request->input("fecha"));
        $contenido= $request->input('contenido');
        
        $reflexion = new Reflexion();
       	$reflexion->titulo = $titulo;
       	$reflexion->fecha = $fecha->format('Y/m/d');
       	$reflexion->contenido = $contenido.' ';
        
        $reflexion->save();
        
        $reflexiones= Reflexion::all()->sortBy('titulo');
        return view('listadoreflexiones')->with('reflexiones', $reflexiones);
    }

    public function mostrarListado(Request $request)
    {
      //dd($request->get('nombre'));
      /*if($request->get('nombre') == "")
      {
        $hospedajes= Hospedaje::all()->sortBy('nombre');
      }
      else {        
        $hospedajes= Hospedaje::nombre($request->get('nombre'))->orderBy('nombre')->get();
      }
      
      return view('hospedaje')->with('hospedajes', $hospedajes);*/
    }

    //muestra una vista que utiliza el hospedaje que se desea editar
    public function edit($id)
    {
      $reflexion= Reflexion::find($id);
      return view('editreflexion')->with('reflexion', $reflexion);
    }

    //Permite editar la informacion y regresarla al controlador para que efectue los cambios
    public function update(Request $request, $id)
    {
    	$titulo = strtoupper($request->input('titulo'));
        $fecha = new DateTime($request->input('fecha'));
        $contenido= $request->input('contenido');
        
        $reflexion = Reflexion::find($id);
       	$reflexion->titulo = $titulo;
       	$reflexion->fecha = $fecha->format('Y/m/d');
       	$reflexion->contenido = $contenido.' ';
        
        $reflexion->save();

        $reflexiones= Reflexion::all()->sortBy('titulo');
        return view('listadoreflexiones')->with('reflexiones', $reflexiones);
    }

    public function destroy($idReflexion)
    {           
        Reflexion::destroy($idReflexion);

        $reflexiones= Reflexion::all()->sortBy('titulo');
        return redirect('listadoreflexiones')->with('reflexiones', $reflexiones);
    }

    
    public function reflexionesInscriptos(Request $request)
    {            
        $reflexiones= Reflexion::all()->sortByDesc('fecha');
        return view('reflexiones')->with('reflexiones', $reflexiones);
    }
}
