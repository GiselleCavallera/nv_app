@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white">
    <div class="col-md-12" style="float: center">
        <p class="text-primary" style="text-align: center; font-size: 35px" >{{ $nombre_taller }}</p> 
    </div>
    <div id= "insc" style="width:100%; margin:0 auto">
    	@if($msj == "")
      <table class="table table-bordered" id="MyTable">      		
      		<tbody>
       		 	@foreach($nombres_inscriptos as $nombre)
            	<tr>
            	    <td class="text-left">{{ $contador++ }}</td>
	                <td class="text-left">{{ $nombre }}</td>
            	</tr>
        		@endforeach
      		</tbody>      		
    	</table>
     
      @else
      <p>{{ $msj }}</p>
      @endif

	</div>
	<br><br>
</div>
</div>
@endsection