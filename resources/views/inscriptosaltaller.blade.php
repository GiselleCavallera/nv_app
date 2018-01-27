@extends('layouts.app')

@section('content')
 <link rel='stylesheet prefetch' href='https://raw.githubusercontent.com/JohnBlazek/codepen-resources/master/3d-carousel/css/stylesheet.css'>
 <link rel="stylesheet" href="{{ asset('css/style_car.css') }}">
    
    <div id="contentContainer" class="trans3d"> 
    <section id="carouselContainer" class="trans3d">
        @foreach($nombres_inscriptos as $inscripto)
            <figure id="item1" class="carouselItem trans3d"><div class="carouselItemInner trans3d" style="font-size: 30px">{{$inscripto}}</div></figure>                    
        @endforeach
    </section>
    </div>
    
   <div style=" text-decoration: none;
	position: fixed;
	bottom: 2px;
	right: 15px;
	overflow: hidden;
	width: 340px;
	height: 100px;
	border: none; 
	text-align: center;
	font-size= 30px;">
    <footer> <font size="5px">{{$nombre_taller}}</font></footer>
    </div>
    
<script src='https://raw.githubusercontent.com/JohnBlazek/codepen-resources/master/3d-carousel/js/libs.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="{{ asset('js/car.js') }}"></script>


@endsection