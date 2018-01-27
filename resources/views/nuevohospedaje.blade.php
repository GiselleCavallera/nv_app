@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Agregar Nuevo Hospedaje</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('nuevohospedaje') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('localidad') ? ' has-error' : '' }}">
                            <label for="localidad" class="col-md-4 control-label">Localidad</label>

                            <div class="col-md-6">
                                <input id="localidad" type="text" class="form-control" name="localidad" value="{{ old('localidad') }}" required autofocus>

                                @if ($errors->has('localidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('localidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <select name='tipo_hospedaje' class="form-control" required autofocus>
                                    <option value="1">Casa de Familia</option>
                                    <option value="2">Hotel</option>
                                    <option value="3">Otro</option>
                                </select>

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="img1" class="col-md-4 control-label">Imagen 1</label>

                            <div class="col-md-6">
                                <input id="img1" type="file" class="form-control" name="img1" value="{{ old('img1') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="img2" class="col-md-4 control-label">Imagen 2</label>

                            <div class="col-md-6">
                                <input id="img2" type="file" class="form-control" name="img2" value="{{ old('img2') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="img3" class="col-md-4 control-label">Imagen 3</label>

                            <div class="col-md-6">
                                <input id="img3" type="file" class="form-control" name="img3" value="{{ old('img3') }}" autofocus>
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
