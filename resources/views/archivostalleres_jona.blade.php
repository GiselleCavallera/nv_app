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
        var tallerId = arreglo[1];
        var nombreArchivoConExtension = arreglo[3];
        var nombreArchivo = nombreArchivoConExtension.split('.');
        var na = nombreArchivo[0];
        

        if( tallerId == '{{$taller->id}}' ){
            $("#archivos_{{$taller->id}}").append('<li><a href=images/upload/{{$archivo}} style="font-size: 3em; "><span class="glyphicon glyphicon-cloud-download"></span>  '+ na.replace(/-/gi, " ") +'</a></li>');
            alMenosUno = true;
        }
    @endforeach
    if(alMenosUno == false)
        $("#archivos_{{$taller->id}}").append('<h3>No hay archivos para mostrar</h3>');
});
@endforeach
</script>
<script type="text/javascript">

    $(document).ready(function(){
        var alMenosUno = false;
        @foreach( $archivosGenerales as $key => $archivoG )
            var archivo = "{{$archivoG}}"; 
            var arreglo = archivo.split('_');
            // Por la estructura de nombres de los archivos subidos sabemos que en la posición cero de array tenemos la palabra "FILE"
            // y en la posición uno tenemos el id del taller, en la posición 3 tengo el nombre del archivo con la extensión
            var tallerId = arreglo[1];
            var nombreArchivoConExtension = arreglo[3];
            var nombreArchivo = nombreArchivoConExtension.split('.');
            var na = nombreArchivo[0];
            

            if( tallerId == '0' ){
                $("#archivos_general").append('<li><a href=images/upload/{{$archivoG}} style="font-size: 3em; "><span class="glyphicon glyphicon-cloud-download"></span>  '+ na.replace(/-/gi, " ") +'</a></li>');
                alMenosUno = true;
            }
        @endforeach
        if(alMenosUno == false)
            $("#archivos_general").append('<h3>No hay archivos para mostrar</h3>');
        });
</script>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Archivos para los talleres</h4></div>
                <div class="panel-body">
                    
                        @foreach( $talleres as $key => $taller )
                        <form class="form-horizontal"  id="form_{{$taller->id}}" method="POST" action="{{ route('inscripciones') }}">
                            {{ csrf_field() }}
                            <div class="row" id="{{$taller->id}}" style="background-color: #3097D1; color: white"  >
                                <div style="float: left"><h3>Taller: {{$taller->titulo}}</h3></div>
                                <div style="float: right"><span class="glyphicon glyphicon-circle-arrow-down" style="font-size: 4em; "></span></div>
                            </div>
                            <div class="row o_{{$taller->id}}" style="background-color: #F8F8FF">
                                <div class="col-xs-12">
                                    <ul class="nav nav-pills nav-stacked archivos" id="archivos_{{$taller->id}}">
                                        
                                    </ul>
                                </div>
                                <br>
                            </form>
                        </div>
                        <br>
                        @endforeach
                        
                        <!--Para los archivos generales-->
                        <form class="form-horizontal"  id="form_generales" method="POST" action="#">
                            {{ csrf_field() }}
                            <div class="row" id="general" style="background-color: #3097D1; color: white"  >
                                <div style="float: left"><h3>Archivos Generales</h3></div>
                                <div style="float: right"><span class="glyphicon glyphicon-circle-arrow-down" style="font-size: 4em; "></span></div>
                            </div>
                            <div class="row o_general" style="background-color: #F8F8FF">
                                <div class="col-xs-12">
                                    <ul class="nav nav-pills nav-stacked archivos" id="archivos_general">
                                        
                                    </ul>
                                </div>
                                <br>
                            </form>
                        </div>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
