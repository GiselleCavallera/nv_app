@extends('layouts.app')
@section('content')

<script type="text/javascript">

    $(document).ready(function(){
        var alMenosUno = false;
        @foreach( $archivosGenerales as $key => $archivoG )
            var archivo = "{{$archivoG->nombre}}"; 
            var arreglo = archivo.split('_');
           
            var nombreArchivoConExtension = arreglo[3];
            var nombreArchivo = nombreArchivoConExtension.split('.');
            var na = nombreArchivo[0];            
            
            $("#archivos_general").append('<li><a href="../../public/images/upload/{{$archivoG->nombre}}" style="font-size: 1em; "><img src="images/iconos/descarga_de_archivos.jpg"/>  '+ na.replace(/-/gi, " ") +'</a></li>');
            alMenosUno = true;
            
        @endforeach
        if(alMenosUno == false)
            $("#archivos_general").append('<h3>No hay archivos para mostrar</h3>');
        });
</script>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center"><h4> DOCUMENTOS DEL ABIERTO</h4></div>
                <div class="panel-body">
                	<!--Para los archivos generales-->
                        <form class="form-horizontal"  id="form_generales" method="POST" action="#">
                            {{ csrf_field() }}
                            <!--<div class="row" id="general" style="background-color: #3097D1; color: white"  >
                                <div style="float: left"><h3>Archivos Generales</h3></div>
                                <div style="float: right"><span class="glyphicon glyphicon-circle-arrow-down" style="font-size: 4em; "></span></div>
                            </div>-->
                            <div class="row o_general" style="background-color: #F8F8FF">
                                <div class="col-xs-12">
                                    <ul class="nav nav-pills nav-stacked archivos" id="archivos_general">
                                        
                                    </ul>
                                </div>
                                <br>                            
                        	</div>
                        	<br>
                    	</form>
                    	<!--Acá metió mano el jona el 16/07/2017 13:02 hs-->
                		<div class="form-group">
                            <div class="col-xs-12" style="text-align:center">
                                <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                            </div><br><br><br>
                        </div>
                        <!--Fin-->
                </div>
            </div>
        </div>
    </div>

@endsection