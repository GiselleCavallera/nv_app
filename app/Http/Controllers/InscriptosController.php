<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscripto;
use App\User;
use App\Hospedaje;
use App\Dictado;
use App\Mail\BienvenidoAbierto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Inscripcion;
use Illuminate\Support\Facades\DB;

class InscriptosController extends Controller
{
  //Muestra el listado de pasteles
    public function index()
    {
      //$inscriptos= Inscripto::get();
      return view('abiertoHome');//->with('inscriptos', $inscriptos);
    }

    //Crear un pastel
    public function create()
    {
      return view('inscriptos.create');
    }

    //Redirige al Administrador
    public function alAdministrador(Request $request)
    {
     switch($request->get('opciones'))
      {
        case 0:
              if($request->get('nombre') == "")
              {
                $inscriptos= Inscripto::all()->sortBy('localidad');
              }
              else {        
                $inscriptos= Inscripto::nombre($request->get('nombre'))->orderBy('localidad')->get();
              }
            break;
        case 1:
            $inscriptos= Inscripto::pagaronEntregaron()->orderBy('localidad')->get();
            break;
        case 2:
            $inscriptos= Inscripto::noPagaronNada()->orderBy('localidad')->get();
            break;
        case 3:
            $inscriptos= Inscripto::localidad($request->get('nombre'))->orderBy('localidad')->get();
            break;
        case 4:
            $inscriptos= Inscripto::iglesia($request->get('nombre'))->orderBy('localidad')->get();
            break;
        case 5:
            $inscriptos= Inscripto::patente($request->get('nombre'))->orderBy('localidad')->get();
            break;
        default:
            break;
      }
      
      return view('administrador.listadoInscriptos')->with('inscriptos', $inscriptos)->with('opcion', $request->get('opciones'));
    }
    

    //Este metodo es donde, despues de haber entrado a create, se reciben los
    //datos y se guardan en la base de datos
    public function store(Request $request)
    {
		
	    /*if($request->input('nombre') != "" && $request->input('dni') != "" && $request->input('edad') != "" && 
		$request->input('telefono') != "" && $request->input('email') != "" && $request->input('localidad') != "" && 
		$request->input('provincia') != "" && $request->input('iglesia'))
		{*/
			/*$inscripto= Inscripto::create($request->all());*/
			

      $users= User::all();
      $mail_registrado= 0;

      for($i=0; $i < count($users); $i++)
      {
          if($users[$i]->email == $request->input('email'))
          {
              $mail_registrado++;
          }
      }

      if($mail_registrado == 0)
      {
          $inscripto= new Inscripto();
          $inscripto->nombre= $request->input('nombre');
          $inscripto->dni= $request->input('dni');
          $inscripto->edad= $request->input('edad');
          $inscripto->telefono= $request->input('telefono');
          $inscripto->email= $request->input('email');
          $inscripto->localidad= $request->input('localidad');
          $inscripto->provincia= $request->input('provincia');
          $inscripto->iglesia= $request->input('iglesia');

          //$inscripto->password=  bcrypt($request->input('dni')); 
          //$inscripto->tipoUsuario= 3;
          $inscripto->idHospedaje= 0;

          $inscripto->montoPago= 0;
          $inscripto->tipoPago= "  ";
          $inscripto->detallePago= "  ";
          $inscripto->periodoPago= 0;
          $inscripto->pagoTodo= 0;
          $inscripto->comprobantePago= "";

          $inscripto->save();
          
          $user= new User();
          $user->name= $request->input('nombre');
          $user->email= $request->input('email');
          $user->password=  bcrypt($request->input('dni')); 
          $user->tipoUsuario= 3;
          $user->idInscripto= ($inscripto->id+0);
          
          $user->save();

          $mensaje= "Ya estás inscripto al Abierto!!";

          if($request->ajax())
          {
            Mail::to($inscripto->email)->send(new BienvenidoAbierto($inscripto->nombre));
          } 
        /*}
        else {
          $mensaje= "Debes completar todos los campos para poder inscribirte.";
        }*/
      }
      else {
        $mensaje= "El mail detallado ya se ha registrado.";
      }
      
		
		if($request->ajax())
		{
			return $mensaje;
		}
		else {
			return $mensaje/*"Ha habido un error. Intentalo nuevamente!"*/;
		}

    /*  if($guardo)
      {
        //Alert::message('Se ha registrado con éxito.', 'info');
        return response()->json(array('status' => 'ok', 'code'=>200, 'message'=>'El registro ha sido guardado'));
      } else {
        Alert::message('Error!', 'danger');
      }*/

      /*try {
        // lógica para hacer la inserción
        return response()->json(array('status' => 'ok', 'code'=>200, 'message'=>'El registro ha sido guardado'));
      } catch(Exception $e) {
          return response()->json(array('status' => 'error', 'code'=>400, 'message'=>$e->getMessage())); //$e->getMessage() sólo para versión en desarrollo, puede cambiarse después por algo como 'Un error ha ocurrido'
      }*/
    }

    //Muestra una vista que utiliza el inscripto que se desea editar
    public function edit($id)
    {
      $inscripto= Inscripto::find($id);
      $hospedaje= Hospedaje::find($inscripto->idHospedaje);

      if($hospedaje != null)
      {
        $nombreHospedaje= $hospedaje->nombre;
      }
      else {
        $nombreHospedaje= "Sin hospedaje asignado.";
      }

      return view('administrador.edit')->with('inscripto', $inscripto)->with('nombreHospedaje', $nombreHospedaje);
    }

    //Permite editar la informacion y regresarla al controlador para que efectue los cambios
    public function update(Request $request, $id)
    {

      $inscripto= Inscripto::find($id);
      $inscripto->nombre= $request->input('nombre')."  ";
      $inscripto->dni= $request->input('dni');
      $inscripto->edad= $request->input('edad');
      $inscripto->telefono= $request->input('telefono')."  ";
      $inscripto->email= $request->input('email')."  ";
      $inscripto->localidad= $request->input('localidad');
      $inscripto->provincia= $request->input('provincia')."  ";
      $inscripto->iglesia= $request->input('iglesia');
      $inscripto->montoPago= $request->input('montoPago')+0;
      $inscripto->tipoPago= $request->input('tipoPago')."  ";
      $inscripto->detallePago= $request->input('detallePago')."  ";
      $inscripto->periodoPago= $request->input('periodoPago');
      $inscripto->pagoTodo= $request->input('pagoTodo');

      $guardo= $inscripto->save();

      if($request->hasFile('img1'))
      {
          $file1 = $request->file('img1');
          //Obtenemos el nombre del archivo
          $nombreFile1 = 'PAGO_'.$id.".".$file1->getClientOrigialExtension();
          \Storage::disk('local')->put($nombreFile1, \File::get($file1));

          dd('PAGO_'.$id.".".$file1->getClientOrigialExtensions());
      }
      else {
        dd("noo");
      }

      /*if($guardo)
      {
        $inscriptos= Inscripto::all()->sortBy('localidad');
        //return 'Grabo!!!';
        return redirect('controlInscriptos')->with('inscriptos', $inscriptos);
      }*/
    }

    // Esta es la segunda opcion
    public function destroy($idInscripto)
    {
        Inscripto::destroy($idInscripto);

        //User::deleteUser($idInscripto);

        return 'destroyedd!!!!';
        //return redirect()->route('abiertoHome');
        $inscriptos= Inscripto::all()->sortBy('localidad');
        return redirect('controlInscriptos')->with('inscriptos', $inscriptos);
    }



    public function updateInscripto(Request $request, $id)
    {
        if($request->hasFile('img1'))
          {
              $file1 = $request->file('img1');
              //Obtenemos el nombre del archivo
              $nombreFile1 = 'PAGO_'.$id.".".$file1->getClientOriginalExtension();
              \Storage::disk('local')->put($nombreFile1, \File::get($file1));
          }
          else {
             $nombreFile1 = "";
          }

        $inscripto= Inscripto::find($id);
        $inscripto->nombre= $request->input('nombre')."  ";
        $inscripto->dni= $request->input('dni');
        $inscripto->edad= $request->input('edad');
        $inscripto->telefono= $request->input('telefono')."  ";
        $inscripto->email= $request->input('email')."  ";
        $inscripto->localidad= $request->input('localidad');
        $inscripto->provincia= $request->input('provincia')."  ";
        $inscripto->iglesia= $request->input('iglesia');
        $inscripto->montoPago= $request->input('montoPago')+0;
        $inscripto->tipoPago= $request->input('tipoPago')."  ";
        $inscripto->detallePago= $request->input('detallePago')."  ";
        $inscripto->periodoPago= $request->input('periodoPago');
        $inscripto->pagoTodo= $request->input('pagoTodo');
        $inscripto->comprobantePago= $nombreFile1;
        $inscripto->patenteAuto= $request->input('patente');

        $guardo= $inscripto->save();
          

        if($guardo)
        {
          $inscriptos= Inscripto::all()->sortBy('localidad');
          //return 'Grabo!!!';
          return redirect('controlInscriptos')->with('inscriptos', $inscriptos);
        }
    }

    public function updateInscriptoHospedaje(Request $request, $idHospedaje, $idInscripto)
    {
      $inscripto= Inscripto::find($idInscripto);
      $inscripto->idHospedaje= $idHospedaje;
      $guardo= $inscripto->save();
      if($guardo)
      {
        if($request->ajax())
        {
           
          $inscriptos= Inscripto::all()->sortBy('localidad');  
          return redirect('asignarhospedaje')->with('inscriptos', $inscriptos);
        }  
      }        
    }


    public function listadoInscriptos(Request $request)
    {
        //dd($request->get('nombre'));
        if($request->get('nombre') == "")
        {
          $inscriptos= Inscripto::all()->sortBy('localidad');
        }
        else {        
          $inscriptos= Inscripto::nombre($request->get('nombre'))->orderBy('localidad')->get();
        }
        
        return view('asignarhospedaje')->with('inscriptos', $inscriptos);
    }


    public function consultaHospedaje(Request $request, $idInscripto)
    {
        $inscripto= Inscripto::find($idInscripto);

        $hospedaje= Hospedaje::find($inscripto->idHospedaje);

        if($hospedaje != null)
        {
            return view('consultahospedaje')->with('inscripto', $inscripto)->with('nombreHospedaje', $hospedaje->nombre);
        }
        else {
            return view('mensajesinhospedaje');
        }
        
    }
    
    public function inscriptosAlTaller($idDictado) //01/08/2017
    {
        $userId = Auth::User()->id;
        $nombres_inscriptos= array();
        $msj= "";

        //$taller= DB::table('talleres')->where('orador', $userId)->get();//trae un solo taller!!! 11/08/2017
        $dictado= Dictado::find($idDictado);
        $taller= DB::table('talleres')->where('id', $dictado->id_taller)->get(); //TRAE EL TALLER CORRECTO

        //$dictados= Dictado::idTaller($taller[0]->id)->orderBy('dia')->get();
        //$dictado= Dictado::find($idDictado);

        $inscripciones= Inscripcion::inscripcionesDelDictado($idDictado)->get();
        //dd($inscripciones);
        if(count($inscripciones) > 0)
        {
          for($i = 0; $i < count($inscripciones); $i++)
          {
              $usuario= User::find($inscripciones[$i]->id_user);

              array_push($nombres_inscriptos, $usuario->name);
          }
        }
        else {
          $msj.= "No hay inscriptos al taller todavía!";
          array_push($nombres_inscriptos, '-'); 
        }
    
        /*array_push($nombres_inscriptos, '-fdgfdg'); 
        array_push($nombres_inscriptos, '-dfg dfgdg '); 
        array_push($nombres_inscriptos, '-dfg dfg df'); 
        array_push($nombres_inscriptos, '-dfg dfg'); 
        array_push($nombres_inscriptos, '-fg dfg '); 
        array_push($nombres_inscriptos, '-fg hgd jytjty'); 
        array_push($nombres_inscriptos, '-u tyu wrr we'); 
        array_push($nombres_inscriptos, '- wer w'); 
        array_push($nombres_inscriptos, '-dfg dfg '); 
        array_push($nombres_inscriptos, 'fgh fg -'); 
        array_push($nombres_inscriptos, '-fgh we'); 
        array_push($nombres_inscriptos, '-et tkytjty e'); 
        array_push($nombres_inscriptos, '-erg ery rt w'); 
        array_push($nombres_inscriptos, '-et eyr w');
        array_push($nombres_inscriptos, '-we etywryw '); 
        array_push($nombres_inscriptos, '-fdgfdg'); 
        array_push($nombres_inscriptos, '-dfg dfgdg '); 
        array_push($nombres_inscriptos, '-dfg dfg df'); 
        array_push($nombres_inscriptos, '-dfg dfg'); 
        array_push($nombres_inscriptos, '-fg dfg '); 
        array_push($nombres_inscriptos, '-fg hgd jytjty'); 
        array_push($nombres_inscriptos, '-u tyu wrr we'); 
        array_push($nombres_inscriptos, '- wer w'); 
        array_push($nombres_inscriptos, '-dfg dfg '); 
        array_push($nombres_inscriptos, 'fgh fg -'); 
        array_push($nombres_inscriptos, '-fgh we'); 
        array_push($nombres_inscriptos, '-et tkytjty e'); 
        array_push($nombres_inscriptos, '-erg ery rt w'); 
        array_push($nombres_inscriptos, '-et eyr w');
        array_push($nombres_inscriptos, '-we etywryw ');*/
        
        return view('inscriptosaltaller')->with('nombres_inscriptos', $nombres_inscriptos)->with('nombre_taller', $taller[0]->titulo)->with('msj', $msj);
    }
    
    
    public function inscriptosAlTallerSimple($idDictado) //01/08/2017
    {
        $userId = Auth::User()->id;
        $nombres_inscriptos= array();
        $msj= "";

        $dictado= Dictado::find($idDictado);
        $taller= DB::table('talleres')->where('id', $dictado->id_taller)->get(); //TRAE EL TALLER CORRECTO

        $inscripciones= Inscripcion::inscripcionesDelDictado($idDictado)->get();
        //dd($inscripciones);
        if(count($inscripciones) > 0)
        {
          for($i = 0; $i < count($inscripciones); $i++)
          {
              $usuario= User::find($inscripciones[$i]->id_user);

              array_push($nombres_inscriptos, $usuario->name);
          }
        }
        else {
          $msj.= "No hay inscriptos al taller todavía!";
          array_push($nombres_inscriptos, '-'); 
        }
        
        return view('inscriptosaltallersimple')->with('nombres_inscriptos', $nombres_inscriptos)->with('nombre_taller', $taller[0]->titulo.' - '.$dictado->dia.' - '.$dictado->hora)->with('msj', $msj)->with('contador', 1);
    }

    //VISUALIZACION
     public function alListado(Request $request)
    {
      //dd($request->get('nombre'));
      if($request->get('nombre') == "")
      {
        $inscriptos= Inscripto::all()->sortBy('localidad');
      }
      else {        
        $inscriptos= Inscripto::nombre($request->get('nombre'))->orderBy('localidad')->get();
      }
      
      return view('visualizacion.listadoInscriptos')->with('inscriptos', $inscriptos);
    }

    //acreditacion
    public function acreditar(Request $request) //03/08/2017
    {
        $idInscripto= $request->id_inscripto;
        $inscripto= Inscripto::find($idInscripto);
        $accion= $request->get('accion_'.$idInscripto);
        
        $inscripto->acreditado= $accion;
        $guardo= $inscripto->save();
        if($request->ajax())
        {
          return $accion;
        }
    }
    
    public function sorteo()
    {
        $inscriptos= DB::table('inscriptos')->where('periodoPago', 1)->where('iglesia', '!=', 'Nueva Vida')->get();
        
        //dd($inscriptos);
        /*if ($inscriptos == 3) {
             $participa_sorteo = 0;
            $inscripto = DB::table('inscriptos')->where('nombre', $nombre_usuario)->get();

            if($inscripto[0]->periodoPago == 1 && Carbon::now()->format('d-m-Y') == '21-08-2017'  && $inscripto[0]->iglesia != 'Nueva Vida'){   
                $participa_sorteo = 1;
            }*/
        return view('sorteo')->with('inscriptos_sorteo', $inscriptos);
        
    }
}

