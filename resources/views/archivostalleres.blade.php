@extends('layouts.app')
@section('content')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/propias.css') }}"/>
<script>
@foreach( $talleres as $key => $taller )
$(document).ready(function(){
    
    $("#{{$taller->id}}").on("click", function(){
        $(".o_{{$taller->id}}").slideToggle();
    });
    

    $('.s_{{$taller->id}}').change(function(){
        $('#c_{{$taller->id}}').bootstrapToggle('off');
    });

    // Completamos los Formularios de los talleres con los archivos correspondientes
    var alMenosUno = false;
    @foreach( $archivosDeTalleres as $key => $archivo )
        var archivo = "{{$archivo}}"; 
        var arreglo = archivo.split('_');
        // Por la estructura de nombres de los archivos subidos sabemos que en la posición cero de array tenemos la palabra "FILE"
        // y en la posición uno tenemos el id del taller, en la posición 3 tengo el nombre del archivo con la extensión
        //var tallerId = arreglo[1]; 16/07
        var nombreArchivoConExtension = arreglo[3];
        var nombreArchivo = nombreArchivoConExtension.split('.');
        var na = nombreArchivo[0];
        

        //if( tallerId == '{{$taller->id}}' ){
            $("#archivos_{{$taller->id}}").append('<li><a href="../../public/images/upload/{{$archivo}}" style="font-size: 1em; "><img src="../images/iconos/descarga_de_archivos.jpg"/>  '+ na.replace(/-/gi, " ") +'</a></li>');
            alMenosUno = true;
        //}
    @endforeach
    if(alMenosUno == false)
        $("#archivos_{{$taller->id}}").append('<h3>No hay archivos para mostrar</h3>');
});
@endforeach
</script>
<script type="text/javascript">
    
</script>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center"><h4> {{strtoupper($tallerSeleccionado->titulo)}}</h4></div>
                <div class="panel-body">
                        <form class="form-horizontal"  id="form_{{$taller->id}}" method="POST" action="{{ route('inscripciones') }}">
                            {{ csrf_field() }}
                            <!--<div class="row" id="{{$taller->id}}" style="background-color: #3097D1; color: white"  >
                                <div style="float: left"><h3>Taller: {{$taller->titulo}}</h3></div>
                                <div style="float: right"><span class="glyphicon glyphicon-circle-arrow-down" style="font-size: 4em; "></span></div>
                            </div>-->
                            <div class="row o_{{$taller->id}}" style="background-color: #F8F8FF">
                                <div class="col-xs-12">
                                    <ul class="nav nav-pills nav-stacked archivos" id="archivos_{{$taller->id}}">
                                        
                                    </ul>
                                </div>
                                <br>
                            </div>  
                        </form>
                        
                        <br>
                        
                        <form class="form-horizontal"  id="form_generales" method="POST" action="{{ route('savenota', [$tallerSeleccionado->id, $idDictado])}}"> 
                        {{ csrf_field() }}
                            <div class="row o_{{$taller->id}}">
                                <div class="col-xs-12">
                                    <p> MIS NOTAS (1000 caracteres)</p>
                                    <p> 
                                    <textarea id="nota" name="nota" rows="7" cols="90" maxlength="1000" class="form-control" required autofocus> {{$nota}}</textarea> 
        
                                    <input id="idTaller" name="idTaller" type="hidden" class="form-control" value="{{ $tallerSeleccionado->id }}"> 
                                    <input id="idDictado" name="idDictado" type="hidden" class="form-control" value="{{ $idDictado }}"> 
                                    </p>
                                    <!--<div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                                        <a href="{{ route('inscripciones') }}" ><img src="../images/iconos/back.jpg"/></a>  
                                    </div>-->
                                    <div id="bt_crear" style="float:right; display:inline-block;">
                                        <button type="submit" style="display: inline-block;" class="btn btn-primary">Guardar</button>
                                    </div>
                                    <!-- <div id="bt_guardar" style="float:right; display:none;">
                                        <button type="submit" style="display: inline-block;" class="btn btn-primary">Guardar</button>
                                    </div>-->
                                </div>
                            </div>
                        </form>
                        
                        <form class="form-horizontal"  id="form_generales" method="POST" action="{{ route('savepregunta', [$tallerSeleccionado->id, $idDictado])}}"> 
                        {{ csrf_field() }}
                            <div class="row o_{{$taller->id}}"> <!--  style="background-color: #F8F8FF" -->
                                <div class="col-xs-12">
                                    <p> PREGUNTA (para el tallerista)</p>
                                    <p> 
                                    <textarea id="pregunta" name="pregunta" rows="2" cols="70" maxlength="180" class="form-control" required autofocus> </textarea> 

                                    <input id="idTaller" name="idTaller" type="hidden" class="form-control" value="{{ $tallerSeleccionado->id }}"> 
                                    <input id="idDictado" name="idDictado" type="hidden" class="form-control" value="{{ $idDictado }}"> 
                                    <!--<input id="pregunta" name="pregunta" type="text" class="" style="width: 75%" required> -->
                                    </p>
                                    <!--<a href="" class="btn btn-info btn-xs">
	                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
	                                </a>-->
	                                <div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                                        <a href="{{ route('inscripciones') }}" ><img src="../images/iconos/back.jpg"/></a>  <!--style="color:#f2418e"
                                        <!--<a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>-->
                                    </div>
                                    <div style="float:right; display:inline-block;">
                                        <button type="submit" style="display: inline-block;" class="btn btn-primary">Enviar</button>
                                    </div>
                                    <br>
                                </div>
                                <br>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
