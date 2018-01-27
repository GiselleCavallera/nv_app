@extends('layouts.app')
@section('content')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/propias.css') }}"/>

<div class="col-xs-2"></div>
<div class="col-xs-8">
    <a href="images/iconos/manual.pdf">Ver pdf</a><br></br>
    <iframe src="images/iconos/manual.pdf"></iframe>
    <a href="images/iconos/imagen_pr.jpg">Ver imagen</a>

</div>
<div class="col-xs-2"></div>
@endsection
