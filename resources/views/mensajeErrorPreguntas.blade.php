@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <br><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">SIN PREGUNTAS</div>
                <div class="panel-body">
                    No hay preguntas aún.
                </div>
                <div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                    <a href="{{ route('dictadoslistado') }}" >&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-left" ></span></a>  <!--style="color:#f2418e"-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection