@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading"><h1>Talleres</h1></div>

                <br>
                <div class="row">
                    <div class="col-sm-6 " style="text-align: center; text-decoration: none">
                        <a href="{{ route('inscripciones') }}" style="text-decoration: none">
                            <div style="text-decoration: none">
                                <span class="glyphicon glyphicon-user" style="font-size:6em"></span>
                                <br>Inscripciones
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6" style="text-align: center">
                        <a href="{{ route('archivos') }}" style="text-decoration: none">
                            <div style="text-decoration: none">
                                <span class="glyphicon glyphicon-home" style="font-size:6em"></span>
                                <br>Archivos (General)
                            </div>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6" style="text-align: center; text-decoration: none">
                        <a href="{{ route('consultarinscripciones') }}" style="text-decoration: none">
                            <div>
                                <span class="glyphicon glyphicon-list-alt" style="font-size:6em"></span>
                                <br>Consultar Inscripciones
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6" style="text-align: center; text-decoration: none">
                        <a href="{{ route('archivostalleres') }}" style="text-decoration: none">
                            <div>
                               <span class="glyphicon glyphicon-list-alt" style="font-size:6em"></span>
                                <br>Archivos para los talleres
                            </div>
                        </a>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</div>
@endsection