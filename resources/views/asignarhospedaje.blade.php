@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Asignar Hospedaje</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('asignarhospedaje') }}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('hospedado') ? ' has-error' : '' }}">
                            <label for="hospedado" class="col-md-4 control-label">Hospedado</label>

                            <div class="col-md-6">
                                <select name='hospedado' class="form-control" required autofocus>
                                    <!--Traer dinámicamente de la base de datos todos los usuarios que estan como hospedados-->
                                    <option value="1">Usuario 1</option>
                                    <option value="2">Usuario 2</option>
                                    <option value="3">Usuario 3</option>
                                </select>

                                @if ($errors->has('hospedado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hospedado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hospedaje') ? ' has-error' : '' }}">
                            <label for="hospedaje" class="col-md-4 control-label">Hospedaje</label>

                            <div class="col-md-6">
                                <select name='hospedaje' class="form-control" required autofocus>
                                    <!--Traer dinámicamente de la base de datos todos los hospedajes-->
                                    <option value="1">Hospedaje 1</option>
                                    <option value="2">Hospedaje 2</option>
                                    <option value="3">Hospedaje 3</option>
                                </select>

                                @if ($errors->has('hospedaje'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hospedaje') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        


                        <div class="form-group">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-primary">
                                    Grabar
                                </button>
                            </div>
                            <div class="col-xs-3">
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    Menú Principal
                                </a>
                            </div>
                            <div class="col-xs-3"></div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
