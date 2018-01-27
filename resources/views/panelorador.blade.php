@extends('layouts.app')

@section('content')

<div class="inicioapp" id="inicioapp" style:"height:100%;">
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div style=" text-decoration: none;
    	position: fixed;
    	bottom: 0.2px;
    	overflow: hidden;
    	width: 100%;
    	height: 150px;
    	border: none; 
    	text-align: center;
    	font-size= 30px;">
        
        <div class="dummy" style="width: 100%;">

            <div class="col-sm-4" style="text-align: center; background-color:#EA0E7D; display: inline-block; width: 33%; float: left;
            ">
                <a href="{{ route('subirarchivostaller') }}" style="text-decoration: none; float: center">
                    <div style="text-decoration: none; float:center">
                    	<img src="images/iconos/documentos120.png"  style="float: center">
                    	<br><br>
                    </div>
                </a>
            </div>
            <div class="col-sm-4" style="text-align: center; text-decoration: none; background-color: #8BCC00; display: inline-block; width: 34%; float: left;">
                <a href="{{ route('dictadoslistado') }}" style="text-decoration: none; float: center">
                    <div style="text-decoration: none; float:center">
                    	<img src="images/iconos/talleres120.png" style="float: center">
                    	<br><br>
                    </div>
                </a>
            </div> 
            <div class="col-sm-4" style="text-align: center; background-color: #0084C0; display: inline-block; width: 33%; float: left;">
                <a href="@if (Auth::user()->tipoUsuario == 2) {{ route('reflexionesinscriptos') }} @else {{ route('listadoreflexiones') }} @endif " style="text-decoration: none; float: center">
                    <div style="text-decoration: none; float:center">
                    	<img src="images/iconos/reflexiones120.png"  style="float: center">
                    	<br><br>
                    </div>
                </a>
            </div>                   
        </div>
    
    </div>
</div>
    <!--
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center"><h1><strong>ABIERTO 2017</strong>!!</h1></div>
                
                <br>
                <div class="row" style="float:center">
                    <div class="col-sm-12" style="text-align: center; text-decoration: none">
                        <a href="{{ route('listadoreflexiones') }}" style="text-decoration: none">
                            <div style="text-decoration: none">
                                <span class="glyphicon glyphicon-th-list" style="font-size:6em"></span>
                                <br>Reflexiones
                            </div>
                        </a>
                    </div>
                </div>
                 <br>
                <div class="row" style="float:center">
                    <div class="col-sm-12 " style="text-align: center; text-decoration: none">
                        <a href="{{ route('subirarchivostaller') }}" style="text-decoration: none">
                            <div style="text-decoration: none">
                                <span class="glyphicon glyphicon-file" style="font-size:6em"></span>
                                <br>Subir Archivos
                            </div>
                        </a>
                    </div>
                </div>
                 <br>
               <div class="row" style="float:center">
                    <div class="col-sm-12 " style="text-align: center; text-decoration: none">
                        <a href="{{ route('dictadoslistado') }}">
                            <span class="glyphicon glyphicon-list-alt" style="font-size:6em"></span>
                            <br>        
                            Dictados del Taller        
                        </a>
                    </div>
               </div>
                <br>
            </div>
        </div>
    </div> -->
@endsection