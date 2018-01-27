@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <!-- <h3 class="text-primary">DICTADOS</h3>  -->
                <div class="panel-heading"><h4>DICTADOS </h4></div>  
                <div  class="panel-body"> 
                	<table class="table table-bordered">
                  		<thead>
                    		<tr>
                    		    <th class="text-center">Taller</th>
            		            <th class="text-center">Fecha</th>
            		            <th class="text-center">Hora</th>
            		            <th class="text-center">Ver</th>
                    		</tr>
                  		</thead>
                  		<tbody>
                   		 	@foreach($dictados as $dictado)
                        	<tr>
            	                <td class="text-center">{{ $dictado[1] }}</td> <!-- Titulo del Taller -->
            	                <td class="text-center">{{ $dictado[3] }}</td> <!-- $dictado->dia --> <!-- Día del Taller -->
            	                <td class="text-center">{{ $dictado[4] }}</td><!-- $dictado->hora --> <!-- Hora del Taller -->
            
                                <td class="text-center">	                            
                                    <a href="{{ url('/preguntaslistado/'.$dictado[2]) }}" class="btn btn-default btn-xs"> <!--url('/preguntaslistado/'.$dictado->id)-->
                                        <img src="images/iconos/preguntaschico.png"><!--  <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>-->
                                    </a>
                                    <a href="{{ url('/inscriptostaller/'.$dictado[2]) }}" class="btn btn-default btn-xs"> <!-- url('/inscriptostaller/'.$dictado->id)-->
                                        <img src="images/iconos/inscriptoschico.png"><!--<span class="glyphicon glyphicon-user" aria-hidden="true"></span>-->
                                    </a>
                                    <a href="{{ url('/inscriptostallersimple/'.$dictado[2]) }}" class="btn btn-default btn-xs"> <!-- url('/inscriptostaller/'.$dictado->id)-->
                                        <img src="images/iconos/listado.png"><!--<span class="glyphicon glyphicon-user" aria-hidden="true"></span>-->
                                    </a>
                                </td>
                        	</tr>
                    		@endforeach
                  		</tbody>      		
                	</table>
                	<div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                        <a href="{{ route('home') }}" >&nbsp;&nbsp;<img src="images/iconos/back.jpg"></a> 
                    </div>
                	<!--<div class="form-group">
                        <div class="col-xs-12" style="text-align:center">
                            <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                        </div>
                    </div> -->
                	<br>
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection