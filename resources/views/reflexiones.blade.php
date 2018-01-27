@extends('layouts.app')

@section('content')
<div class="contact" id="contact" style="height: 100%">
	<div class="container">

		<div class="contact-form">
			 @foreach($reflexiones as $reflexion)
		 		
			 		<p><font style="color: black"> {{date('d/m/Y', strtotime($reflexion->fecha))}}</font></p>
			 		
				 <!-- <p> </p> -->
			 	 <h3 class="text-center"> <font style="color: #8BCC00">{{ $reflexion->titulo }}</font></h3>
			 	 <p><font style="color: black"> {{ $reflexion->contenido }} </font></p>
			 	 <br>
			 @endforeach
		</div>
		<div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
            <a href="{{ route('home') }}" >&nbsp;&nbsp;<img src="images/iconos/back.jpg"></a> 
        </div>
		<!--Acá metió mano el jona el 16/07/2017 12:45 hs
		<div class="form-group">
            <div class="col-xs-12" style="text-align:center">
                <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
            </div><br><br><br>
        </div>
        Fin-->
	</div>
</div>
@endsection
