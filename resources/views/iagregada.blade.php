@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Inscripciones</h4></div>
                <div class="panel-body"><br>
                    <div class="list-group">
                        
                        <div class="list-group-item active">Ahora estas inscripto a los siguientes talleres:</div>
                        @foreach($inscnoinsc as $key => $inscs)
                            @if($inscnoinsc[$inscs] == 1)
                                <div class="list-group-item">{{$titulosdetalleres[$key]}}</div>
                            @endif
                        @endforeach
                    </div>
                    

                    <div class="col-sm-6" style="text-align: center">
                        <a href="/home">
                            <div >
                                <span class="glyphicon glyphicon-home" style="font-size:6em"></span>
                                <br>Menu Principal
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6" style="text-align: center">
                        <a href="{{ route('consultarinscripciones') }}">
                            <div >
                                <span class="glyphicon glyphicon-list-alt" style="font-size:6em"></span>
                                <br>Consultar Inscripciones
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
