@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <br><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">FECHA DEL TALLER</div>
                <div class="panel-body">
                    Debes esperar que sea el día en el que te inscribiste.
                </div>
                 <div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                    <a href="{{ route('inscripciones') }}" >&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-left" ></span></a>  <!--style="color:#f2418e"-->
                    <!--<a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection