@extends('layouts.app')

@section('content')

<script>
    $(document).ready(function(){
        var intId = 0;
        $("#agregar").click(function(){
            if(intId < 10)
            {
                intId ++;
                var fieldWrapper = $("<div class=\"row\" style=\"border: none\" id=\"field" + intId + "\" style=\"padding-left:15px\"/>");
                var archivoNuevo = $("<div class=\"col-xs-10\" style=\"border: none\"><label for=\"archivo" + intId + "\" class=\"col-xs-3\">Archivo " + intId + "</label><div><input id=\"archivo" + intId + "\" accept=\"application/pdf,image/jpg\" type=\"file\"  class=\"col-xs-9\" name=\"archivo" + intId + "\" value=\"{{ old('archivo" + intId + "') }}\" autofocus></div></div>"); 
                var removeButton = $("<div class=\"col-xs-1 remove\" style=\"padding-left: 50px ; border: none\"><span class=\"glyphicon glyphicon-trash\" style=\"font-size: 2em\"></span></div>");
    


                removeButton.click(function() {
                    $(this).parent().remove();
                });

                fieldWrapper.append(archivoNuevo);
                fieldWrapper.append(removeButton);

                $("#contenedor_variable").append(fieldWrapper);
            }
            else
                alert("No es posible subir más de 10 archivos.");
        });

    });
</script>




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Cargar archivos al taller</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('subirarchivostaller') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <!--TALLERES-->
                        <div class="form-group{{ $errors->has('taller') ? ' has-error' : '' }}">
                            <label for="taller" class="col-md-4 control-label">Taller</label>
                            <div class="col-md-6">
                                <select name='taller' class="form-control" required autofocus>
                                    @foreach( $talleres as $key => $taller )
                                    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                                        <option value="{{$taller->id}}">
                                            {{$taller->titulo}}
                                        </option>
                                    </div>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div id="contenedor_variable" class="row" ></div>

                        <div class="row">
                            <div class="col-xs-5"></div>
                            <div class="agregar col-xs-2" id="agregar" >
                                 <img src="images/iconos/nuevoarchivo.png"><!--  <span class="glyphicon glyphicon-plus-sign" style="font-size: 4em"></span>-->
                            </div>
                            <div class="col-xs-5"></div>
                        </div>

                        <input type="hidden" name="id_taller" value="{{$taller->id}}">

                        <div class="form-group">
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-primary">
                                    Grabar
                                </button>
                            </div>
                           
                            <div class="col-xs-3"></div>
                        </div>
                        <br>
                         <div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
                            <a href="{{ route('home') }}" >&nbsp;&nbsp;<img src="images/iconos/back.jpg"></a> 
                        </div>
                        <!--<div class="col-xs-3">
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                Menú Principal
                            </a>
                        </div>-->
                    </form>
                </div>
                <br>
                <br>


                
            </div>
        </div>
    </div>
</div>
@endsection