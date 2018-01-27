@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h1>Binvenido al Panel de Administración</h1></div>

            <br>
            <div class="row">
                <div class="col-sm-6" style="text-align: center">
                    <a href="{{ route('nuevohospedaje') }}" style="text-decoration: none">
                        <div>
                            <span class="glyphicon glyphicon-header" style="font-size:6em"></span>
                            <br>Nuevo Hospedaje
                        </div>
                    </a>
                </div>
                <div class="col-sm-6" style="text-align: center" >
                    <a href="{{ route('nuevotaller') }}" style="text-decoration: none">
                        <div >
                            <span class="glyphicon glyphicon-cog" style="font-size:6em"></span>
                            <br>Nuevo Taller
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6" style="text-align: center">
                    <a href="{{ route('nuevoorador') }}" style="text-decoration: none">
                        <div>
                            <span class="glyphicon glyphicon-user" style="font-size:6em"></span>
                            <br>Nuevo Orador
                        </div>
                    </a>
                </div>
                <div class="col-sm-6" style="text-align: center">
                    <a href="{{ route('asignarhospedaje') }}" style="text-decoration: none">
                        <div >
                            <span class="glyphicon glyphicon-share-alt" style="font-size:6em"></span>
                            <br>Asignar Hospedaje
                        </div>
                    </a>
                </div>
            </div><br>
             <div class="row">
                <div class="col-sm-6" style="text-align: center">
                    <a href="{{ route('subirarchivos') }}" style="text-decoration: none">
                        <div>
                            <span class="glyphicon glyphicon-file" style="font-size:6em"></span>
                            <br>Cargar archivos
                        </div>
                    </a>
                </div>
                <div class="col-sm-6" style="text-align: center">
                    <a href="{{ route('pr') }}" style="text-decoration: none">
                        <div >
                            <span class="glyphicon glyphicon-share-alt" style="font-size:6em"></span>
                            <br>Acción
                        </div>
                    </a>
                </div>
            </div><br>
            </div>
        </div>
    </div>
</div>
@endsection
