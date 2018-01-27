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
                var archivoNuevo = $("<div class=\"col-xs-10\" style=\"border: none\"><label for=\"archivo" + intId + "\" class=\"col-xs-3\">Archivo " + intId + "</label><div><input id=\"archivo" + intId + "\" type=\"file\"  class=\"col-xs-9\" name=\"archivo" + intId + "\" value=\"{{ old('archivo" + intId + "') }}\" autofocus></div></div>"); 
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
                <div class="panel-heading"><h4>Cargar archivos (General)</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('subirarchivos') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        
                        
                        <div id="contenedor_variable" class="row" ></div>

                        <div class="row">
                            <div class="col-xs-5"></div>
                            <div class="agregar col-xs-2" id="agregar" ><span class="glyphicon glyphicon-plus-sign" style="font-size: 4em"></span></div>
                            <div class="col-xs-5"></div>
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
                <br>
                <br>


                
            </div>
        </div>
    </div>
</div>
@endsection