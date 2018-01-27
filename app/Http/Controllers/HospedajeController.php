<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Hospedaje;
use App\Inscripto;
use App\User;

class HospedajeController extends Controller
{

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


	public function index()
    {
      return view('paneladministrador');
    }

	//Vista para crear un hospedaje
    public function create()
    {
      return view('nuevohospedaje');
    }

    public function mostrarListado(Request $request)
    {
      //dd($request->get('nombre'));
      if($request->get('nombre') == "")
      {
        $hospedajes= Hospedaje::all()->sortBy('nombre');
      }
      else {        
        $hospedajes= Hospedaje::nombre($request->get('nombre'))->orderBy('nombre')->get();
      }
      
      return view('hospedaje')->with('hospedajes', $hospedajes);
    }


    public function mostrarListadoAsignacion(Request $request, $idInscripto)
    {
      //dd($request->get('nombre'));
      if($request->get('nombre') == "")
      {
        $hospedajes= Hospedaje::all()->sortBy('nombre');
      }
      else {        
        $hospedajes= Hospedaje::nombre($request->get('nombre'))->orderBy('nombre')->get();
      }     
      
      return view('hospedajesasignacion')->with('hospedajes', $hospedajes)->with('idInscripto', $idInscripto);
    }


	  //muestra una vista que utiliza el hospedaje que se desea editar
    public function edit($id)
    {
      $hospedaje= Hospedaje::find($id);
      return view('edithospedaje')->with('hospedaje', $hospedaje);
    }

    //Permite editar la informacion y regresarla al controlador para que efectue los cambios
    public function update(Request $request, $id)
    {

      $hospedaje= Hospedaje::find($id);
      $hospedaje->nombre= $request->input('nombre')."  ";
      $hospedaje->direccion= $request->input('direccion')." ";
      $hospedaje->capacidad= $request->input('capacidad')+0;
      $hospedaje->capacidadRestante= $request->input('capacidad')+0;
      $hospedaje->observaciones= $request->observaciones." ";
      
      $guardo= $hospedaje->save();

      if($guardo)
      {
        $hospedajes= Hospedaje::all()->sortBy('nombre');
        //return 'Grabo!!!';
        return redirect('hospedaje')->with('hospedajes', $hospedaje);
      }
    }

    public function destroy($idHospedaje)
    {    
        $inscriptosConHospedaje= Inscripto::hospedados($idHospedaje)->orderBy('nombre')->get();

        dd($idHospedaje);
        foreach ($inscriptosConHospedaje as $inscripto) {
          dd($inscripto->id());
          $inscripto->idHospedaje= 0;
          $inscripto->save();
        }
        Hospedaje::destroy($idHospedaje);

        //return redirect()->route('abiertoHome');
        $hospedajes= Hospedaje::all()->sortBy('nombre');
        return redirect('hospedaje')->with('hospedajes', $hospedajes);
    }

    public function saveNuevoHospedaje(Request $request){
        $direccion = $request->input('direccion');
        $nombre = $request->input('nombre');
        
        $hospedaje = new Hospedaje;
        $hospedaje->direccion = $direccion." ";
        $hospedaje->nombre = $nombre." ";
        $hospedaje->capacidad = $request->capacidad+0;
        $hospedaje->capacidadRestante= $request->capacidad+0;
        $hospedaje->observaciones= $request->observaciones." ";
        $hospedaje->save();

        //redireccionar al listado de hospedajes
        $hospedajes= Hospedaje::all()->sortBy('nombre');
        return redirect('hospedaje')->with('hospedajes', $hospedajes);
    }

    public function listadoHospedados($idHospedaje)
    {
    	$hospedados= Inscripto::hospedados($idHospedaje)->orderBy('nombre')->get();
      $hospedaje= Hospedaje::find($idHospedaje);
    	//dd('hola');
      $contador= 1;

    	return view('hospedados')->with('hospedados', $hospedados)->with('nombreHospedaje', $hospedaje->nombre)->with('capacidadHospedaje', $hospedaje->capacidad)->with('contador', $contador); //son inscriptos
    }


    /*public function getInformacionHospedaje(){
        //Buscar el hospedaje de este usuario

      $idInscripto = Auth::User()->idInscripto;
      //dd($idInscripto);

      $inscripto= Inscripto::find($idInscripto);

      $hospedaje= Hospedaje::find($inscripto->idHospedaje);

      if($hospedaje != null)
      {
        return view('informacionhospedaje')->with('hospedaje', $hospedaje);
      }
      else {
        return view('mensajesinhospedaje');
      }
    }*/
    public function getInformacionHospedaje(){
        //Buscar el hospedaje de este usuario

      $idInscripto = Auth::User()->idInscripto;
      //dd($idInscripto);

      $inscripto= Inscripto::find($idInscripto);
      //dd($inscripto->idHospedaje);
      
      
      $hospedaje= Hospedaje::find($inscripto->idHospedaje);
      //dd($hospedaje);
      
      if($inscripto->idHospedaje != -1) //CHICOS DE LA IGLESIA -> son hospedadores
      {
          $nombre= $hospedaje->nombre;
          $direccion= $hospedaje->direccion;
      }
      else {
          $nombre= 'VOS!!';
          $direccion= 'Tu casa! ;)';
      }

      if($hospedaje != null or $inscripto->idHospedaje == -1)
      {
        return view('informacionhospedaje')->with('nombrehospedaje', $nombre)->with('direccionhospedaje', $direccion);
      }
      else {
        return view('mensajesinhospedaje');
      }
    }


    //VISUALIZACION
    public function mostrarListadoVisualizacion(Request $request)
    {
      //dd($request->get('nombre'));
      if($request->get('nombre') == "")
      {
        $hospedajes= Hospedaje::all()->sortBy('nombre');
      }
      else {        
        $hospedajes= Hospedaje::nombre($request->get('nombre'))->orderBy('nombre')->get();
      }
      
      return view('visualizacion.hospedaje')->with('hospedajes', $hospedajes);
    }

}
