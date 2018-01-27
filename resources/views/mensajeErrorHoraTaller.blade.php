@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <br><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">HORARIO TALLER</div>
                <div class="panel-body">
                    El taller todav√≠a no empez√≥.
                </div>
                <div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                    <a href="{{ route('inscripciones') }}" >&nbsp;&nbsp;<img src="../images/iconos/back.jpg"></a>  <!--style="color:#f2418e"-->
                    <!--<a href="{{ route('home') }}" class="btn btn-primary">Men®≤ Principal</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection