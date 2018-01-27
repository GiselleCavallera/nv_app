@extends('layouts.app')
 

@section('content')
<script>
    $(document).ready(function(){
        var intId = 1;
        $("#agregar").click(function(){
            intId ++;
            var fieldWrapper = $("<div class=\"row\" id=\"field" + intId + "\" style=\"padding-left:15px\"/>");
            var fFecha = $("<div class=\"col-xs-3 form-group\"><div id=\"sandbox-container\"><input type=\"text\" id=\"fecha_" + intId + "\" class=\"form-control\" name=\"fecha_" + intId + "\"></div></div><div class=\"col-xs-1\"></div>"); 
            var fHora = $("<div class=\"col-xs-3 form-group\"><select name=\"hora_" + intId + "\" class=\"form-control\" required autofocus><option value=\"00:00\">00:00</option><option value=\"00:30\">00:30</option><option value=\"01:00\">01:00</option><option value=\"01:30\">01:30</option><option value=\"02:00\">02:00</option><option value=\"02:30\">02:30</option><option value=\"03:00\">03:00</option><option value=\"03:30\">03:30</option><option value=\"04:00\">04:00</option><option value=\"04:30\">04:30</option><option value=\"05:00\">05:00</option><option value=\"05:30\">05:30</option><option value=\"06:00\">06:00</option><option value=\"06:30\">06:30</option><option value=\"07:00\">07:00</option><option value=\"07:30\">07:30</option><option value=\"08:00\">08:00</option><option value=\"08:30\">08:30</option><option value=\"09:00\">09:00</option><option value=\"09:30\">09:30</option><option value=\"10:00\">10:00</option><option value=\"10:30\">10:30</option><option value=\"11:00\">11:00</option><option value=\"11:30\">11:30<option value=\"12:00\">12:00</option><option value=\"12:30\">12:30</option><option value=\"13:00\">13:00</option><option value=\"13:30\">13:30</option><option value=\"14:00\">14:00</option><option value=\"14:30\">14:30</option><option value=\"15:00\">15:00</option><option value=\"15:30\">15:30</option><option value=\"16:00\">16:00</option><option value=\"16:30\">16:30</option><option value=\"17:00\">17:00</option><option value=\"17:30\">17:30</option><option value=\"18:00\">18:00</option><option value=\"18:30\">18:30</option><option value=\"19:00\">19:00</option><option value=\"19:30\">19:30</option><option value=\"20:00\">20:00</option><option value=\"20:30\">20:30</option><option value=\"21:00\">21:00</option><option value=\"21:30\">21:30</option><option value=\"22:00\">22:00</option><option value=\"22:30\">22:30</option><option value=\"23:00\">23:00</option><option value=\"23:30\">23:30</option></select></div><div class=\"col-xs-1\"></div>");
            var fSala = $("<div class=\"col-xs-3 form-group\"><input id=\"sala_" + intId + "\" type=\"text\" class=\"form-control\" name=\"sala_" + intId + "\" required autofocus></div>");

            var removeButton = $("<div class=\"col-xs-1 form-group remove\" style=\"padding-left: 20px\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 2em\"></span></div>");
            removeButton.click(function() {
                $(this).parent().remove();
            });
            fieldWrapper.append(fFecha);
            fieldWrapper.append(fHora);
            fieldWrapper.append(fSala);
            fieldWrapper.append(removeButton);
            $("#contenedor_variable").append(fieldWrapper);


            $('#sandbox-container input').datepicker({
                format: "dd/mm/yyyy",
                language: "es",
                autoclose: true
            });
    });
});
</script>
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


                        <div class="row" style="padding-left:30px" >
                            <div class="row">
                                <div class="col-xs-3"><label for="fecha" >Fecha</label></div>
                                <div class="col-xs-1"></div>
                                <div class="col-xs-3"><label for="hora" >Hora</label></div>
                                <div class="col-xs-1"></div>
                                <div class="col-xs-4"><label for="sala" >Sala</label></div>
                            </div>

                            <div class="row" >
                                <div class="col-xs-3 form-group{{ $errors->has('sala') ? ' has-error' : '' }}">
                                    <div id="sandbox-container">
                                        <input type="text" id="fecha_1" class="form-control" name="fecha_1">
                                    </div>
                                </div>
                                <div class="col-xs-1"></div>

                                <div class="col-xs-3 form-group{{ $errors->has('hora') ? ' has-error' : '' }}">
                                
                                        <select name='hora_1' class="form-control" required autofocus>
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>

                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                </div>
                                <div class="col-xs-1"></div>


                                <div class="col-xs-4 form-group{{ $errors->has('sala') ? ' has-error' : '' }}">
                                    <input id="sala_1" type="text" class="form-control" name="sala_1" value="{{ old('sala') }}" required autofocus>
                                </div>
                                <div id="contenedor_variable"></div><!--Final del contenedor Variable jona-->
                            </div>  
                            <div class="row">
                                <div class="col-xs-5"></div>
                                <div class="agregar col-xs-2" id="agregar" ><span class="glyphicon glyphicon-plus-sign" style="font-size: 4em"></span></div>
                                <div class="col-xs-5"></div>
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
                       
                        <!--ORADORES-->
                        <div class="form-group{{ $errors->has('orador') ? ' has-error' : '' }}">
                            <label for="orador" class="col-md-4 control-label">Orador</label>
                            <div class="col-md-6">
                                <select name='orador' class="form-control" required autofocus>
                                    @foreach( $oradores as $key => $orador )
                                    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                                        <option value="{{$orador->id}}">
                                            {{$orador->name}}
                                        </option>
                                    </div>
                                    @endforeach
                                </select>
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

  
