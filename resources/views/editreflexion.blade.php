@extends('app')

@section('content')
<div class="container">
<br><br><br><br>
    <div class="row">
        <div class="col-md-10" >
            <div class="panel panel-default">
                <div class="panel-heading"><h4>EDITAR REFLEXION</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal"  id="form_generales" method="POST" action="{{ route('updatereflexion', [$reflexion->id])}}">
            		{{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{$reflexion->titulo }}" required autofocus>

                                @if ($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Fecha</label>

                            <div class="col-md-6">
                               <div id="sandbox-container">
                                    <input type="text" id="fecha" class="form-control" name="fecha" value="{{$reflexion->fecha}}" required autofocus>
                                </div>
                                @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                         

                        <div class="form-group{{ $errors->has('Contenido') ? ' has-error' : '' }}">
                            <label for="contenido" class="col-md-4 control-label">Mensaje</label>

                            <div class="col-md-6">
                                <textarea id="contenido" name="contenido" rows="8" cols="90" class="form-control" required autofocus> {{ $reflexion->contenido }}</textarea> 


                                @if ($errors->has('contenido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contenido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
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
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="datetimepicker\js\bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
	$('#sandbox-container input').datepicker({
	    format: "dd/mm/yyyy",
	    language: "es",
	    autoclose: true
	});
</script>
@endsection

