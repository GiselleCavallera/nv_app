<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Hospedaje;
use App\Taller;
use App\Dictado;
use App\Inscripcion;
use App\Reflexion;
use App\Archivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    
     /* Create a new controller instance.
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
        $nombre_usuario = Auth::User()->name;
        $tipo_usuario = Auth::User()->tipoUsuario;
        //$tipo_usuario =1;
        
        if ($tipo_usuario == 1) {
            //Es usuario Administardor
            return view('paneladministrador');
        }
        if ($tipo_usuario == 2 or $tipo_usuario == 10) {
            //Es usuario Hospedador
            return view('panelorador');
        }
        if ($tipo_usuario == 3) {
             $participa_sorteo = 0;
            $inscripto = DB::table('inscriptos')->where('nombre', $nombre_usuario)->get();

            if($inscripto[0]->periodoPago == 1 && Carbon::now()->format('d-m-Y') == '21-08-2017'){   
                $participa_sorteo = 1;
            }

            return view('panelhospedado')->with('participa_sorteo', $participa_sorteo);
        }
        else
            return view('error');
    }

    public function getNuevoHospedaje(){
        return view('nuevohospedaje');
    }
    public function saveNuevoHospedaje(Request $request){
        $direccion = $request->input('direccion');
        $localidad = $request->localidad;
        $tipo = $request->tipo_hospedaje;
        
        //Imagen1
        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            //Obtenemos el nombre del archivo
            $nombreFile1 = 'HOSPEDAJE_'.Carbon::now()->format('i-s').'_'.$file1->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile1, \File::get($file1));
        }
        else
            $nombreFile1 = 'default.jpg';

        //Imagen2
        if($request->hasFile('img2'))
        { 
            $file2 = $request->file('img2');
            //Obtenemos el nombre del archivo
            $nombreFile2 = 'HOSPEDAJE_'.Carbon::now()->format('i-s').'_'.$file2->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile2, \File::get($file2));
        }
        else
            $nombreFile2 = 'default.jpg';

        //Imagen3
        if($request->hasFile('img3'))
        {
            $file3 = $request->file('img3');
            //Obtenemos el nombre del archivo
            $nombreFile3 = 'HOSPEDAJE_'.Carbon::now()->format('i-s').'_'.$file3->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile3, \File::get($file3));
        }
        else
            $nombreFile3 = 'default.jpg';
        
        $coordenadas = 'coordenadas';



        $hospedaje = new Hospedaje;
        $hospedaje->direccion = $direccion;
        $hospedaje->localidad = $localidad;
        $hospedaje->tipo = $tipo;
        $hospedaje->img1 = $nombreFile1;
        $hospedaje->img2 = $nombreFile2;
        $hospedaje->img3 = $nombreFile3;
        $hospedaje->coordenadas = $coordenadas;
        $hospedaje->save();

        //Mostrar un alert


        //redireccionar al panel de control
    }

    public function getInformacionHospedaje(){
        //Buscar el hospedaje de este usuario

        return view('informacionhospedaje');
    }

    public function getInscripciones(){
        $talleres = DB::table('talleres')->get();
        $dictados = DB::table('dictados')->get();
        //$dictados_final = array();

        //foreach ($dictados as $dic){
        //    $cantidad_de_inscriptos = DB::table('inscripciones')->where('id_dictado', $dic->id)->where('inscripto', '1')->count();
            //echo($dic->cupos. "------ Inscriptos: ".$cantidad_de_inscriptos);
        //    if($dic->cupos > $cantidad_de_inscriptos)
        //        array_push($dictados_final, $dic);
           
        //}
        

        //echo("<br><br>++++++++++++++++++++++++++++++++++<br><br>");
        //print('<pre>');
        //print_r($dictados_final);
        //print('</pre><br><br><br>');
        //fin - limitacion de cupos
        
        
        
        $oradores = DB::table('users')->where('tipoUsuario', '2')->orWhere('tipoUsuario', '10')->get(); //GC 12/08/17 : para NICO que tiene que cargar reflexiones
        //dd($oradores);
        $inscripciones = DB::table('inscripciones')->where('id_user', Auth::user()->id)->get();
        return view('inscripciones', array('talleres' => $talleres, 'oradores' => $oradores, 'dictados' => $dictados, 'inscripciones' => $inscripciones));
    }

    public function getNuevoTaller(){
        $oradores = DB::table('users')->where('tipoUsuario', '2')->get();
        return view('nuevotaller', array('oradores' => $oradores));
    }

    public function saveNuevoTaller(Request $request){
        $titulo = $request->titulo;
        $duracion = $request->duracion;
        $orador = $request->orador;
        $fechas = array($request->fecha_1, $request->fecha_2, $request->fecha_3, $request->fecha_4, $request->fecha_5, $request->fecha_6, $request->fecha_7, $request->fecha_8, $request->fecha_9, $request->fecha_10);
        $horas = array($request->hora_1, $request->hora_2, $request->hora_3, $request->hora_4, $request->hora_5, $request->hora_6, $request->hora_7, $request->hora_8, $request->hora_9, $request->hora_10);
        $salas = array($request->sala_1, $request->sala_2, $request->sala_3, $request->sala_4, $request->sala_5, $request->sala_6, $request->sala_7, $request->sala_8, $request->sala_9, $request->sala_10);
       


        $fechas=array_filter($fechas, "strlen");
        $horas=array_filter($horas, "strlen");
        $salas=array_filter($salas, "strlen");


        
        
        $duracion = $request->duracion;
        $orador = $request->orador;


        $taller = new Taller;
        $taller->titulo = $titulo;
        $taller->duracion = $duracion;
        $taller->orador = $orador;
        
        $taller->save();

        //Recuperamos el id del taller
        $id_taller = $taller->id;

        $i=0;
        foreach ($fechas as $fecha) {
            $dictado = new Dictado;
            $dictado->id_taller = $id_taller;
            $dictado->dia = $fecha;
            $dictado->hora = $horas[$i];
            $dictado->sala = $salas[$i];
            $dictado->cupos = 999;
            $dictado->save();
            $i++;
        }
        
        
        return view('tagregado', array('tallerAgregado' => $taller));


    }

    public function getAsignarHospedaje(){
        return view('asignarhospedaje');
    }

    public function getNuevoOrador(){
        return view('nuevoorador');
    }
    
    public function getPr(){
        return view('pr');
    }

    public function saveNuevoOrador(Request $request){
        $nombre = $request->name;
        $email = $request->email;
        $password = $request->password;
        $tipo = 2; //El tipo de usuario 2 es Orador
        $nombreFile = 'ORADOR_default.jpg';
        if($request->hasFile('img1'))
        {
            $file1 = $request->file('img1');
            //Obtenemos el nombre del archivo
            $nombreFile = 'ORADOR_'.Carbon::now()->format('i-s').'_'.$file1->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile, \File::get($file1));
        }
        
        $orador = new User;
        $orador->name= $nombre;
        $orador->email= $email;
        $orador->password= bcrypt($password);
        $orador->tipoUsuario = $tipo;
        $orador->foto = $nombreFile;
        $orador->save();
        return view('oagregado', array('oradorAgregado' => $orador));

    }

    public function saveInscripciones(Request $request){
        //$item = array('Nombre' => 'jona', 'Edad' => '28');
        //$resultado=Input::get('nombre');
        //return Response::json(['nombre'=>'Jonatan', 'edad'=>'28']);
        //$nombre = $this->input->post('taller_1');
        //echo($request->taller_1);
        $dictado = $request->input('select_dictado');
        $user = $request->input('id_user');
        $taller = $request->input('id_taller');
        $fecha =substr($dictado,0,10);
        $hora = substr($dictado,10,9);
        $hora2 = substr($dictado,11,5);

        
        
        
        $inscripcion = new Inscripcion;
        $dto = DB::table('dictados')->where('id_taller', $taller)->where('dia', $fecha)->where('hora', $hora2)->get();

        //JJOO Inicio
        $grabado="falso";
        $cantidad_de_inscriptos = DB::table('inscripciones')->where('id_dictado', $dto[0]->id)->where('inscripto', '1')->count();
        $dictado_2 = DB::table('dictados')->where('id', $dto[0]->id)->get();
        
        if($cantidad_de_inscriptos < $dictado_2[0]->cupos){
            if(!$inscripcion::where('id_user', $user)->where('id_taller', $taller)->update(['id_dictado' => $dto[0]->id, 'dia' => $fecha, 'hora' => $hora, 'inscripto' => 1]))
            {
                $inscripcion = new Inscripcion;
                $inscripcion->id_user = $user;
                $inscripcion->id_taller = $taller;
                $inscripcion->id_dictado = $dto[0]->id;
                $inscripcion->dia = $fecha;
                $inscripcion->hora = $hora;
                $inscripcion->inscripto = true;
                $inscripcion->save();
            }
            $grabado = "verdadero";
        }
        else{
                $grabado = "falso";
        }
        //JJOO fin
            


        return(array('cant_de_inscriptos'=>$cantidad_de_inscriptos, 'grabado'=>$grabado, 'cupos'=>$dictado_2[0]->cupos));
        //return("aa");
        //$respuesta="asaaaa";
        //return $respuesta;
        //$u=array('nombre'=>'Jonatan', 'edad'=>'28');
        //return('aa' => $u);
        //array('tallerAgregado' => $taller)
        
        /*$talleres = array($request->taller_1, $request->taller_2, $request->taller_3, $request->taller_4, $request->taller_5, $request->taller_6, $request->taller_7, $request->taller_8, $request->taller_9, $request->taller_10, $request->taller_11, $request->taller_12, $request->taller_13, $request->taller_14, $request->taller_15, $request->taller_16, $request->taller_17, $request->taller_18, $request->taller_19, $request->taller_20, $request->taller_21, $request->taller_22, $request->taller_23, $request->taller_24, $request->taller_25, $request->taller_26, $request->taller_27, $request->taller_28, $request->taller_29, $request->taller_30, $request->taller_31, $request->taller_32, $request->taller_33, $request->taller_34, $request->taller_35, $request->taller_36, $request->taller_37, $request->taller_38, $request->taller_39, $request->taller_40, $request->taller_41, $request->taller_42, $request->taller_43, $request->taller_44, $request->taller_45, $request->taller_46, $request->taller_47, $request->taller_48, $request->taller_49, $request->taller_50);
        $titulosdetalleres = array($request->titulo_taller_1, $request->titulo_taller_2, $request->titulo_taller_3);
        $fechasyhoras = array($request->s_1, $request->s_2, $request->s_3, $request->s_4, $request->s_5, $request->s_6, $request->s_7, $request->s_8, $request->s_9, $request->s_10, $request->s_11, $request->s_12, $request->s_13, $request->s_14, $request->s_15, $request->s_16, $request->s_17, $request->s_18, $request->s_19, $request->s_20, $request->s_21, $request->s_22, $request->s_23, $request->s_24, $request->s_25, $request->s_26, $request->s_27, $request->s_28, $request->s_29, $request->s_30, $request->s_31, $request->s_32, $request->s_33, $request->s_34, $request->s_35, $request->s_36, $request->s_37, $request->s_38, $request->s_39, $request->s_40, $request->s_41, $request->s_42, $request->s_43, $request->s_44, $request->s_45, $request->s_46, $request->s_47, $request->s_48, $request->s_49, $request->s_50);
        $inscripciones = array($request->c_1, $request->c_2, $request->c_3, $request->c_4, $request->c_5, $request->c_6, $request->c_7, $request->c_8, $request->c_9, $request->c_10, $request->c_11, $request->c_12, $request->c_13, $request->c_14, $request->c_15, $request->c_16, $request->c_17, $request->c_18, $request->c_19, $request->c_20, $request->c_21, $request->c_22, $request->c_23, $request->c_24, $request->c_25, $request->c_26, $request->c_27, $request->c_28, $request->c_29, $request->c_30, $request->c_31, $request->c_32, $request->c_33, $request->c_34, $request->c_35, $request->c_36, $request->c_37, $request->c_38, $request->c_39, $request->c_40, $request->c_41, $request->c_42, $request->c_43, $request->c_44, $request->c_45, $request->c_46, $request->c_47, $request->c_48, $request->c_49, $request->c_50);
        $talleres = array_filter($talleres, "strlen");
        $fechasyhoras = array_filter($fechasyhoras, "strlen");
        $inscripciones = array_filter($inscripciones, "strlen");
        $titulosdetalleres = array_filter($titulosdetalleres, "strlen");
        
        $inscnoinsc = array();

        while ($fechayhora = current($fechasyhoras)) {
            $dia =substr($fechayhora,0,10);
            $hora = substr($fechayhora,10,9);
            $i=key($fechasyhoras);
            


            $inscripcion = new Inscripcion;
            $inscripcion->id_user = Auth::User()->id;
            $inscripcion->id_taller = $talleres[$i];
            $inscripcion->dia = $dia;
            $inscripcion->hora = $hora;
            $inscripto=0;
            
            if($request->has('c_'.intval($i + 1)))
                {
                    $inscripcion->inscripto = true; 
                    $inscripto=1;
                }
            else
                $inscripcion->inscripto = false;
            
            $inscnoinsc[$i] = $inscripto;

            $inscripcion->save();


            /*print('<br> INDICE: '.$i);
            print('<br> DIA: '.$dia);
            print('<br> HORA: '.$hora);        
            print('<br> USER: '.Auth::User()->id);        
            print('<br> TALLER: '.$talleres[$i]);        
            print('<br> INSCRIPTO: '.$variable);         
            print('<br> ----------------------- ');        
            

            next($fechasyhoras);
        }
        
        return view('iagregada', array('inscnoinsc' => $inscnoinsc), array('titulosdetalleres' => $titulosdetalleres));
        */
    }
    public function consultarInscripciones()
    {
         return view('consultarinscripciones');
    }

    public function aa(Request $request){
        $inscripciones = DB::table('inscripciones')->where('id_user', Auth::user()->id)->where('id_taller', $request->id_taller)->get();
        $dia='DD/MM/AAAA';
        $hora='HH:MM';
        $inscripto = false;
        foreach ($inscripciones as $inscrip) {
            $dia = $inscrip->dia;
            $hora = $inscrip->hora; 
            $inscripto = $inscrip->inscripto; 
        }
        
        
        return(array('dia' => $dia, 'hora' => $hora, 'inscripto' => $inscripto));    
    }

    public function desinscribir(Request $request){
        $user = $request->input('id_user');
        $taller = $request->input('id_taller');
        $actualizado = 'vacio';

        $inscripcion = new Inscripcion;
        if($inscripcion::where('id_user', $user)->where('id_taller', $taller)->update(['inscripto' => 0]))
            $actualizado = 'correcto';
        
        return (array('actualizado' => $actualizado));
    }

    public function getNuevaReflexion(){
        return view('nuevareflexion');
    }

    public function saveNuevaReflexion(Request $request){
        $contenido_reflexion = $request->input('ta_reflexion');
        $fecha_publicacion_reflexion = $request->input('fecha_publicacion');

        $reflexion = new Reflexion;
        $reflexion->id_orador = Auth::User()->id;
        $reflexion->reflexion = $contenido_reflexion;
        $reflexion->fecha_publicacion = $fecha_publicacion_reflexion;
        $reflexion->publicado = false;
        $reflexion->save();

        return view('ragregada');
    }

    public function reflexiones(){

       

        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'¡Hola, Mundo!');
        $pdf->Output();

    }

    public function getSubirArchivosTaller(){
        $talleres = DB::table('talleres')->where('orador', Auth::User()->id)->get();
        
        return view('subirarchivostaller', array('talleres' => $talleres));
    }

    public function saveSubirArchivosTaller(Request $request){
        
        $id_taller = $request->taller;
        
        if($request->hasFile('archivo1'))
        {
            $file1 = $request->file('archivo1');
            //Obtenemos el nombre del archivo
            $nombreFile1 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.str_replace(" ", "-", $file1->getClientOriginalName());
            \Storage::disk('local')->put($nombreFile1, \File::get($file1));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile1;
            $archivo->save();
        }
        if($request->hasFile('archivo2'))
        {
            $file2 = $request->file('archivo2');
            //Obtenemos el nombre del archivo
            $nombreFile2 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file2->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile2, \File::get($file2));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile2;
            $archivo->save();
        }
        if($request->hasFile('archivo3'))
        {
            $file3 = $request->file('archivo3');
            //Obtenemos el nombre del archivo
            $nombreFile3 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file3->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile3, \File::get($file3));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile3;
            $archivo->save();
        }
        if($request->hasFile('archivo4'))
        {
            $file4 = $request->file('archivo4');
            //Obtenemos el nombre del archivo
            $nombreFile4 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file4->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile4, \File::get($file4));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile4;
            $archivo->save();
        }
        if($request->hasFile('archivo5'))
        {
            $file5 = $request->file('archivo5');
            //Obtenemos el nombre del archivo
            $nombreFile5 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file5->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile5, \File::get($file5));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile5;
            $archivo->save();
        }
        if($request->hasFile('archivo6'))
        {
            $file6 = $request->file('archivo6');
            //Obtenemos el nombre del archivo
            $nombreFile6 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file6->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile6, \File::get($file6));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile6;
            $archivo->save();
        }
        if($request->hasFile('archivo7'))
        {
            $file7 = $request->file('archivo7');
            //Obtenemos el nombre del archivo
            $nombreFile7 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file7->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile7, \File::get($file7));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile7;
            $archivo->save();
        }
        if($request->hasFile('archivo8'))
        {
            $file8 = $request->file('archivo8');
            //Obtenemos el nombre del archivo
            $nombreFile8 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file8->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile8, \File::get($file8));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile8;
            $archivo->save();
        }
        if($request->hasFile('archivo9'))
        {
            $file9 = $request->file('archivo9');
            //Obtenemos el nombre del archivo
            $nombreFile9 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file9->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile9, \File::get($file9));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile9;
            $archivo->save();
        }
        if($request->hasFile('archivo10'))
        {
            $file10 = $request->file('archivo10');
            //Obtenemos el nombre del archivo
            $nombreFile10 = 'FILE_'.$id_taller.'_'.Carbon::now()->format('i-s').'_'.$file10->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile10, \File::get($file10));

            $archivo = new Archivo;
            $archivo->id_taller = $id_taller;
            $archivo->nombre = $nombreFile10;
            $archivo->save();
        }

        return view('aagregado');

    }

    public function getSubirArchivos(){
        return view('subirarchivos');
    }

    public function saveSubirArchivos(Request $request){

        
        {
            $file1 = $request->file('archivo1');
            //Obtenemos el nombre del archivo
            $nombreFile1 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.str_replace(" ", "-", $file1->getClientOriginalName());
            \Storage::disk('local')->put($nombreFile1, \File::get($file1));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile1;
            $archivo->save();
        }
        if($request->hasFile('archivo2'))
        {
            $file2 = $request->file('archivo2');
            //Obtenemos el nombre del archivo
            $nombreFile2 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file2->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile2, \File::get($file2));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile2;
            $archivo->save();
        }
        if($request->hasFile('archivo3'))
        {
            $file3 = $request->file('archivo3');
            //Obtenemos el nombre del archivo
            $nombreFile3 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file3->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile3, \File::get($file3));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile3;
            $archivo->save();
        }
        if($request->hasFile('archivo4'))
        {
            $file4 = $request->file('archivo4');
            //Obtenemos el nombre del archivo
            $nombreFile4 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file4->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile4, \File::get($file4));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile4;
            $archivo->save();
        }
        if($request->hasFile('archivo5'))
        {
            $file5 = $request->file('archivo5');
            //Obtenemos el nombre del archivo
            $nombreFile5 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file5->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile5, \File::get($file5));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile5;
            $archivo->save();
        }
        if($request->hasFile('archivo6'))
        {
            $file6 = $request->file('archivo6');
            //Obtenemos el nombre del archivo
            $nombreFile6 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file6->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile6, \File::get($file6));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile6;
            $archivo->save();
        }
        if($request->hasFile('archivo7'))
        {
            $file7 = $request->file('archivo7');
            //Obtenemos el nombre del archivo
            $nombreFile7 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file7->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile7, \File::get($file7));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile7;
            $archivo->save();
        }
        if($request->hasFile('archivo8'))
        {
            $file8 = $request->file('archivo8');
            //Obtenemos el nombre del archivo
            $nombreFile8 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file8->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile8, \File::get($file8));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile8;
            $archivo->save();
        }
        if($request->hasFile('archivo9'))
        {
            $file9 = $request->file('archivo9');
            //Obtenemos el nombre del archivo
            $nombreFile9 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file9->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile9, \File::get($file9));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile9;
            $archivo->save();
        }
        if($request->hasFile('archivo10'))
        {
            $file10 = $request->file('archivo10');
            //Obtenemos el nombre del archivo
            $nombreFile10 = 'FILE_0_'.Carbon::now()->format('i-s').'_'.$file10->getClientOriginalName();
            \Storage::disk('local')->put($nombreFile10, \File::get($file10));

            $archivo = new Archivo;
            $archivo->id_taller = 0;
            $archivo->nombre = $nombreFile10;
            $archivo->save();
        }

        return view('aagregado');
    }


    /*public function getArchivosTalleres(){  //comente gc 15/07
        //Hay que ver a que talleres está inscripta la presona y nostrarle todos los arcivos disponibles 
        $userId = Auth::User()->id;
        $inscripciones = DB::table('inscripciones')->where('id_user', $userId)->get();
        $archivos = array(null);
        $archivosDeTalleres = array();

        $talleres = DB::table('talleres')->get();
       
        foreach ($inscripciones as $inscripcion) {
            if( $inscripcion->inscripto == 1){
                //buscar en en la tabla de archivos todos los archivos de este taller
                $archivos = DB::table('archivos')->where('id_taller', $inscripcion->id_taller)->get();
                
                $aux=array();

                //esto lo hacemos para ponerle claves numericas al array
                
                foreach ($archivos as $key => $a){
                    $aux[] = $a->nombre;
                }
                
                $archivosDeTalleres = array_merge($archivosDeTalleres, $aux);
            }

        }

        //Recuperamos los archivos generales
        $archivosGenerales = DB::table('archivos')->where('id_taller', '-1')->get();

        //return(print_r($talleres));
        return view('archivostalleres', array('archivosDeTalleres' => $archivosDeTalleres, 'talleres' => $talleres, 'archivosGenerales' => $archivosGenerales));
    }*/
    
    //gc 15/07
    public function getArchivosTalleres(Request $request, $idTaller){
        //Hay que ver a que talleres está inscripta la presona y nostrarle todos los arcivos disponibles 
        //dd($idTaller);
        $userId = Auth::User()->id;
        $inscripciones = DB::table('inscripciones')->where('id_user', $userId)->where('id_taller', $idTaller)->get();
        $archivos = array(null);
        $archivosDeTalleres = array();
        $talleres = DB::table('talleres')->get();
        
        $inscripcion_taller=  DB::table('inscripciones')->where('id_taller', $idTaller)->where('id_user', $userId)->get();        
        
        if(count($inscripcion_taller) > 0)
        {
            $idDictado= $inscripcion_taller[0]->id_dictado; //devuelve un taller solo!!!        

            $tallerSeleccionado= Taller::find($idTaller);
            $dictado_taller= Dictado::find($idDictado);

            $fecha_ho= date('d-m-Y H:i:s');
            $fecha_hora_aho= strtotime ( '-3 hour' , strtotime ($fecha_ho) ) ;
            $fecha_hora_ahora= date('d/m/Y H:i:s'); //date('d/m/Y H:i:s',$fecha_hora_aho);  // date('d/m/Y H:i:s',$fecha_hora_aho);

            $fecha_datos= preg_split('// ', $fecha_hora_ahora);
            $fecha_hoy=  substr($fecha_hora_ahora, 0, 10); //dd($fecha_hoy);//$fecha_datos[0]; 
            $fecha_hoy_si= date('d/m/Y');//strtotime ($fecha_hoy);
            $hora_hoy= substr($fecha_hora_ahora, 11, 8);  
            $hora_hoy_hora= substr($hora_hoy, 0, 2); 

            $fecha_dictado= $dictado_taller->dia;
            $fecha_dictado_si= strtotime ("", strtotime ($fecha_dictado) ) ;
            $hora_dictado= substr($dictado_taller->hora, 0, 5);
            $hora_dictado_hora= substr($dictado_taller->hora, 0, 2);
            
            $dia_hoy = substr($fecha_hoy, 0, 2);
            $mes_hoy = substr($fecha_hoy, 3, 2);
            $anio_hoy = substr($fecha_hoy, 6, 4); 
            
            $dia_dictado = substr($fecha_dictado, 0, 2);
            $mes_dictado = substr($fecha_dictado, 3, 2);
            $anio_dictado = substr($fecha_dictado, 6, 4);
            
            //dd($fecha_hoy_si.'  '. $fecha_dictado_si);
            
            //if($fecha_hoy >= $fecha_dictado)
            if($anio_hoy >= $anio_dictado and $mes_hoy >= $mes_dictado)
            {
                if($dia_hoy >= $dia_dictado or $mes_hoy > $mes_dictado)
                {
                    //dd($fecha_hoy_si.'  '. $fecha_dictado_si);
                    
                    if($hora_hoy_hora >= $hora_dictado_hora || $dia_hoy > $dia_dictado or $mes_hoy > $mes_dictado )
                    {
                        //foreach ($inscripciones as $inscripcion) {
                            if( $inscripcion_taller[0]->inscripto == 1){
                                //buscar en en la tabla de archivos todos los archivos de este taller
                                $archivos = DB::table('archivos')->where('id_taller', $inscripcion_taller[0]->id_taller)->get();
                                    
                                $aux=array();
        
                                //esto lo hacemos para ponerle claves numericas al array                        
                                foreach ($archivos as $key => $a){
                                    $aux[] = $a->nombre;
                                }
                                
                                $archivosDeTalleres = array_merge($archivosDeTalleres, $aux);
                            }
        
                        //}
                            
                        //Recuperamos los archivos generales
                        /*$archivosGenerales = DB::table('archivos')->where('id_taller', 0)->get();*/ //gc 22/07/2017
                            
                        //NOTA del usuario
                        $nota= DB::table('notas')->where('idInscripto', Auth::User()->idInscripto)->where('idDictado', $idDictado)->get();
                        //dd($nota);
                            
                        if(count($nota) >= 1)
                        {
                            $texto_nota= $nota[0]->texto;
                        }
                        else {
                            $texto_nota= "";
                        }
                        // fin nota
        
                        //dd($tallerSeleccionado->id .'  '.$idDictado);
                        return view('archivostalleres', array('archivosDeTalleres' => $archivosDeTalleres, 'talleres' => $talleres, /*'archivosGenerales' => $archivosGenerales,*/ 'tallerSeleccionado' => $tallerSeleccionado, 'idDictado' => $idDictado, 'nota' => $texto_nota));
        
                    }
                    else
                    {
                        //if($fecha_hoy == $fecha_dictado)
                        //dd($hora_hoy_hora.'  '.$hora_dictado_hora);
                        return view('mensajeErrorHoraTaller');
                        //dd('mensaje todavia no es la hora');
                    }
                }
                else{
                    return view('mensajeErrorDiaTaller');
                    //dd('mensaje no es el día correcto');
                }
                
            }
            else 
            {
                return view('mensajeErrorDiaTaller');
                //dd('mensaje no es el día correcto');
            }
        }
        else {
            return view('mensajeErrorNoInscriptoTaller');
           // dd('mensaje no estas inscripto al taller');
        }

    }
    
    public function getArchivosGenerales(Request $request){        
        //Recuperamos los archivos generales
        $archivosGenerales = DB::table('archivos')->where('id_taller', 0)->get();

        //dd($archivosGenerales);

        return view('archivosgeneral', array('archivosGenerales' => $archivosGenerales));
    }

    public function getTalleres(){
        return view('paneltalleres');
    }
    
    
    //panel tallerista gc 15/07

    public function dictadosListado(){
        $userId = Auth::User()->id;

        $talleresDictados= array();
        $tall_dict= array();

        $talleres= DB::table('talleres')->where('orador', $userId)->get();//PUEDE TRAER MÁS DE 1!

        
        for($i= 0; $i < count($talleres); $i++) {
            
            $dictados= Dictado::idTaller($talleres[$i]->id)->orderBy('dia')->get();

            foreach ($dictados as $dictado) {
                $tall_dict[0]= $talleres[$i]->id;
                $tall_dict[1]= $talleres[$i]->titulo;
                $tall_dict[2]= $dictado->id;
                $tall_dict[3]= $dictado->dia;
                $tall_dict[4]= $dictado->hora;

                array_push($talleresDictados, $tall_dict);
            }
        }
            
        return view('dictados')->with('dictados', $talleresDictados);

        /*$taller= DB::table('talleres')->where('orador', $userId)->get();//trae un solo taller!!!

        //SI o si tiene dictados!!!
        $dictados= Dictado::idTaller($taller[0]->id)->orderBy('dia')->get();

        return view('dictados')->with('dictados', $dictados)->with('nombreTaller', $taller[0]->titulo);*/
    }


    public function getOradores(){
        return view('listadooradores');
    }

    //panel nueva interfaz  gc 15/07

    public function getPanelInscriptos(){
        return view('panelInscriptos');
    }
    
    //REDES SOCIAES GC 12/08/17
    public function getRedes(){
        return view('redessociales');
    }

}
