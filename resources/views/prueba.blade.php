@extends('layouts.app')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Nuevo Taller</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('nuevotaller') }}" >
                        {{ csrf_field() }}

                        
                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>

                                @if ($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sala') ? ' has-error' : '' }}">
                            <label for="sala" class="col-md-4 control-label">Sala</label>

                            <div class="col-md-6">
                                <input id="sala" type="text" class="form-control" name="sala" value="{{ old('sala') }}" required autofocus>

                                @if ($errors->has('sala'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sala') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                            <label for="fecha" class="col-md-4 control-label">Fecha</label>

                            <div class="col-md-6">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }}">
                            <label for="duracion" class="col-md-4 control-label">Duración</label>

                            <div class="col-md-6">
                                <input id="duracion" type="text" class="form-control" name="duracion" value="{{ old('duracion') }}" required autofocus>

                                @if ($errors->has('duracion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duracion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('orador') ? ' has-error' : '' }}">
                            <label for="orador" class="col-md-4 control-label">Orador</label>

                            <div class="col-md-6">
                                <input id="orador" type="text" class="form-control" name="orador" value="{{ old('orador') }}" required autofocus>

                                @if ($errors->has('orador'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('orador') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control datepicker" name="date">
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Grabar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



