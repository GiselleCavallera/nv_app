@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <!--<h3 class="text-primary">PREGUNTAS</h3> --> 
                <div class="panel-heading"><h4>PREGUNTAS</h4></div>
                
                <div  class="panel-body"> 
                	<table class="table table-bordered" id="MyTable">      		
                  		<tbody>
                   		 	@foreach($preguntas as $pregunta)
                        	<tr>
                        		<td class="text-center">{{ $contador++}}</td>
            	                <td class="text-left">{{ $pregunta->pregunta}}</td>
                        	</tr>
                    		@endforeach
                  		</tbody>      		
                	</table>
                	<br>
                	<div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                        <a href="{{ route('dictadoslistado') }}" >&nbsp;&nbsp;<img src="../images/iconos/back.jpg"></a> 
                    </div>
                	<!--<div class="form-group">
                        <div class="col-xs-12" style="text-align:center">
                            <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                        </div>
                    </div> -->
                	<br><br>
            	</div>
    	 </div>
    </div>
</div>
@endsection