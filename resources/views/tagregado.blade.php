@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Taller {{$tallerAgregado->titulo}} agregado correctamente</h4></div>
                <div class="panel-body">
                    <div class="col-sm-6" style="text-align: center">
                        <a href="public/home" style="text-decoration: none">
                            <div>
                                <span class="glyphicon glyphicon-home" style="font-size:6em"></span>
                                <br>Menú Principal
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6" style="text-align: center">
                        <a href="{{ route('nuevotaller') }}" style="text-decoration: none">
                            <div >
                                <span class="glyphicon glyphicon-cog" style="font-size:6em"></span>
                                <br>Nuevo Taller
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
