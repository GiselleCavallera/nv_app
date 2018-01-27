@extends('layouts.app')

@section('content')
<!--INICIO PARTICIPACION EN EL SORTEO-->
    @if($participa_sorteo == 1)
    <div id="participacion_sorteo">
        <img  src="images/sorteo_iphone.jpg" class="img-responsive" />    
    </div>
    @EndIf
<!--FIN PARTICIPACION EN EL SORTEO-->    
<div class="inicioapp" id="inicioapp">  <!--style:"height:100%;"-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 <div style=" text-decoration: none;
    	position: fixed;
    	bottom: 0.3px;
    	overflow: hidden;
    	width: 100%;
    	height: 250px;
    	border: none; 
    	text-align: center;
    	font-size= 30px;">
    <div class="dummy">
        <div class="col-sm-4" style="text-align: center; background-color:#EA0E7D; display: inline-block; width: 33%; float: left;">
            <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none; float: center">
                <div style="text-decoration: none; float:center">
                	<img src="images/iconos/hospedaje150_z.png"  style="float: center">
                	
                </div>
            </a>
        </div>
        <div class="col-sm-4" style="text-align: center; text-decoration: none; background-color: #8BCC00; display: inline-block; width: 33%; float: left;">
            <a href="{{ route('oradoreslistado') }}" style="text-decoration: none; float: center">
                <div style="text-decoration: none; float:center">
                	<img src="images/iconos/oradores150_z.png" style="float: center">
                	
                </div>
            </a>
        </div> 
        <div class="col-sm-4" style="text-align: center; background-color: #0084C0; display: inline-block; width: 34%; float: left;">
            <a href="{{ route('inscripciones') }}" style="text-decoration: none; float: center">
                <div style="text-decoration: none; float:center">
                	<img src="images/iconos/talleres150_z.png"  style="float: center">
                	
                </div>
            </a>
        </div>                   
    </div>
    <div class="dummy">
        <div class="col-sm-4" style="text-align: center; background-color: #8BCC00; display: inline-block; width: 33%; float: left;">
            <a href="{{ route('archivosgenerales') }}" style="text-decoration: none; float: center">
                <div style="text-decoration: none; float:center">
                	<img src="images/iconos/documentos150_z.png"  style="float: center">
                	
                </div>
            </a>
        </div>
        <div class="col-sm-4" style="text-align: center; text-decoration: none; background-color: #0084C0; display: inline-block; width: 33%; float: left;">
            <a href="{{ route('reflexionesinscriptos') }}" style="text-decoration: none; float: center">
                <div style="text-decoration: none; float:center">
                	<img src="images/iconos/reflexiones150_z.png"  style="float: center">
                	
                </div>
            </a>
        </div> 
        <div class="col-sm-4" style="text-align: center; background-color: #8BCC00; display: inline-block; width: 34%; float: left;">
            <a href="{{ route('redessociales') }}" style="text-decoration: none; float: center">
                <div style="text-decoration: none; float:center">            
                	<img src="images/iconos/redesymas150_z.png"  style="float: center">
                
                </div>
            </a>
        </div>                   
    </div>
</div>
</div>

    
    
    
    
    
    
     <!-- GC 10/08/17 
    
    <br><br><br><br><br><br><br> 
    <br><br><br>
    <div>
        <div style="text-align: center; float: left;">
            <a href="{{ route('oradoreslistado') }}" style="text-decoration: none">
                <div style="text-decoration: none">
                    <img src="images/iconos/oradores70.png">
                    <br><font color="black"><b>&nbsp;&nbsp;ORADORES</b></font>
                </div>
            </a>
        </div>
        <div style="text-align: center; float: right;">
            <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none">
                <div style="text-decoration: none">
                    <img src="images/iconos/hospedaje70.png">
                    <br><font color="black"><b>HOSPEDAJE&nbsp;&nbsp;</b></font>
                </div>
            </a>
        </div>
    </div>
    <br><br><br><br><br>
    <div class="row">
        <div class="row" style="align:center;">
            <div class="col-sm-1" style="text-align: center; text-decoration: none; display: inline-block; width:5%">
                   
            </div>
            <div class="col-sm-4" style="text-align: center; text-decoration: none; display: inline-block; width:27%">
                    <a href="{{ route('inscripciones') }}" style="text-decoration: none">
                    <div>
                        <img src="images/iconos/talleres70.png">
                        <br><font color="black"><b>TALLERES</b></font>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-4 " style="text-align: center; text-decoration: none; display: inline-block; width:27%">
                <a href="{{ route('reflexionesinscriptos') }}" style="text-decoration: none">
                    <div>
                        <img src="images/iconos/reflexiones70.png">
                        <br><font color="black"> <b>REFLEXIONES </b></font>
                    </div>
                </a>
            </div>
            
            <div class="col-sm-4 " style="text-align: center; text-decoration: none; display: inline-block; width:27%">
                     <a href="{{ route('archivosgenerales') }}" style="text-decoration: none">
                    <div style="text-decoration: none">
                        <img src="images/iconos/documentos70.png">
                        <br><font color="black"><b>DOCUMENTOS</b></font>
                    </div>
                </a>
            </div>
            <div class="col-sm-1" style="text-align: center; text-decoration: none; display: inline-block; width:5%">
                   
            </div>
            <br><br>
        </div>
    </div> -->
    
    
    
    <!--<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading" style="text-align: center"><h1>Hola <strong>{{ Auth::user()->name }}!!</strong></h1></div>

                <br>
                <div class="row">
                    <div class="col-sm-6" style="text-align: center">
                        <a href="{{ route('informacionhospedaje') }}" style="text-decoration: none">
                            <div style="text-decoration: none">
                                <img src="images/iconos/hospedaje150.png">
                                <br><font color="black"><b>HOSPEDAJE</b></font>
                            </div>
                        </a>
                    </div>
                    <br>
                    <div class="col-sm-6" style="text-align: center; text-decoration: none">
                            <a href="{{ route('inscripciones') }}" style="text-decoration: none">
                            <div>
                                <img src="images/iconos/talleres150.png">
                                <br><font color="black"><b>TALLERES</b></font>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6 " style="text-align: center; text-decoration: none">
                        <a href="{{ route('reflexionesinscriptos') }}" style="text-decoration: none">
                            <div>
                                <img src="images/iconos/reflexiones150.png">
                                <br><font color="black"> <b>REFLEXIONES </b></font>
                            </div>
                        </a>
                    </div>
                    <br>
                    <div class="col-sm-6 " style="text-align: center; text-decoration: none">
                             <a href="{{ route('archivosgenerales') }}" style="text-decoration: none">
                            <div style="text-decoration: none">
                                <img src="images/iconos/documentos150.png">
                                <br><font color="black"><b>DOCUMENTOS</b></font>
                            </div>
                        </a>
                    </div>
                    
                </div><br>

            </div>
        </div>
    </div> -->
</div>
@endsection