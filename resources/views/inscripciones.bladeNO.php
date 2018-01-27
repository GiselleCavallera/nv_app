@extends('layouts.app')
@section('content')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}"/>
<script>
@foreach( $talleres as $key => $taller )

$(document).ready(function(){
    var form = $('#form_{{$taller->id}}')
    var data= form.serialize();
    var route = 'aa';
        $.post(route, data, function(result) {
            
            //alert("Inscripto dia:"+result.dia+result.hora+" --------------- Inscripto: "+result.inscripto);
            if(result.dia != "DD/MM/AAAA" && result.inscripto == true)
            {
                $('.s_{{$taller->id}}').val(result.dia+result.hora);
                $('#c_{{$taller->id}}').bootstrapToggle('on'); //nombre del botón
            }
            else{
                if(result.dia != "DD/MM/AAAA" && result.inscripto == false)
                    $('.s_{{$taller->id}}').val(result.dia+result.hora);
                    $('#c_{{$taller->id}}').bootstrapToggle('off');
            }
                //$('.s_{{$taller->id}}').val("22/06/2017 12:00 AM");
                
            //alert("Dia: "+result.dia+' ---------- Hora: '+result.hora);
        });


    $("#{{$taller->id}}").on("click", function(){
        $(".o_{{$taller->id}}").slideToggle();
    });
    
    //Cuando cambiamos el select, tenemos que desactivar la inscripcion
    $('.s_{{$taller->id}}').change(function(){
        //$('.c_{{$taller->id}}').prop("checked", "");
        $('#c_{{$taller->id}}').bootstrapToggle('off');
        //ver si acà hay que ejecutar la desinscripcion
    });
    
    $("#c_{{$taller->id}}").change(function(){
        //alert("primera");
        if($(this).prop('checked'))
        {
            //alert("chequeado!!!");
            var form= $('#form_{{$taller->id}}');
            var data= form.serialize();
            var route = form.attr('action');
            
            
            $.post(route, data, function(result) {
                if(result){
                    if(result.grabado=="verdadero"){
                        //alert("La grabacion se hizo correctamente. Cantidad de inscriptos: "+result.cant_de_inscriptos);
                    }
                    else{
                            alert("Cupos agotados para este dictado, por favor selecciona otro.");
                            //Poner el boton en deschequeado
                            $('#c_{{$taller->id}}').bootstrapToggle('off');
                            //REALIZAR PREGUNTA
                            $('#preguntas_{{$taller->id}}').hide(1);
                            
                            //alert("mm");
                            
                            //FIN REALIZAR PREGUNTA
                        
                    }
                }
                else{
                    alert("Error #200");
                }
            });

            //REALIZAR PREGUNTA
            $('#preguntas_{{$taller->id}}').show(1);
            //FIN REALIZAR PREGUNTA
        }
        else{
            //alert("Deschequeado!!");
            var form= $('#form_{{$taller->id}}');
            var data= form.serialize();
            var route = 'desinscribir';
              
            $.post(route, data, function(result) {
                    if(result){
                        //alert("Desinscripto "+result.actualizado);
                        //$("#btn_{{$taller->id}}").text('Inscripto');
                        //$("#btn_{{$taller->id}}").removeClass('btn-primary');
                        //$("#btn_{{$taller->id}}").addClass('btn-success');
                    }
                    else{
                        alert("Error #201");
                    } 
            });

            //REALIZAR PREGUNTA
            $('#preguntas_{{$taller->id}}').hide(1);
            //FIN REALIZAR PREGUNTA
        }
    });



});
@endforeach

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $( "select" ).change(function() {
            var mismoHorario = false;
            $( "select" ).each(function() {
                var i=0;
                var a = $(this).val();
                //por cada opcion seleccionada voy a chequear que alguno de los demás combo no tengan seleccionada la misma.
                $( "select" ).each(function(){
                    if(a == $(this).val()){
                        //alert("encontró igual: " + a);
                        i++;
                    }
                });
                if(mismoHorario == false){
                    if(i >= 2){
                        mismoHorario = true;
                        //alert("paso por aca");
                    }
                }
            });
            if(mismoHorario)
                alert("Te estas por inscribir a talleres que se van a dar el mismo día y a la misma hora");
         
        });
    });  
</script>




<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>TALLERES</h4></div>
                <div class="panel-body">
                    
                        @foreach( $talleres as $key => $taller )
                        <form class="form-horizontal"  id="form_{{$taller->id}}" method="POST" action="{{ route('inscripciones') }}">
                            {{ csrf_field() }}
                            <div class="row" id="{{$taller->id}}" style="background-color: #3097D1; color: white; text-align: center">  
                                <div style="text-align:center; font-size: 1.7em; display:inline-block">{{$taller->titulo}}</div> <!-- gc 21/7/17 -->
                                 <div style="display:inline-block; float: right"><img src="images/iconos/ocultar.jpg" style="padding:3px 3px 0 0 "></div>  <!-- gc 21/7/17 -->
                            </div>
                            <div class="row o_{{$taller->id}}" style="background-color: #F8F8FF">
                                <div class="col-xs-4">

                                    @foreach( $oradores as $key => $orador )
                                        @if($taller->orador == $orador->id)
                                        <h5>{{$orador->name}}</h5>
                                        <div class="foto"><img src="images/upload/{{$orador->foto}}" class="img-responsive img-thumbnail"></div>
                                        @endIf
                                    @endforeach
                                </div>
                                <div class="col-xs-0" ></div>
                                <div class="col-xs-8">
                                    <div class="row" style="font-size: 0.8em;">Duración: {{$taller->duracion}} hs(aprox.)</div>
                                    <div class="row" id="cont_select" >
                                        <select id="select_dictado_{{$taller->id}}" class="s_{{$taller->id}} form-control" name="select_dictado" style="width: 188px">
                                            @foreach( $dictados as $key => $dictado)
                                                @if($dictado->id_taller == $taller->id)
                                                    <option value="{{$dictado->dia}} {{$dictado->hora}}">{{$dictado->dia}} {{$dictado->hora}}</option>
                                                @endIf
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <!--INGRESAR AL TALLER-->
                                    <div class="row">
                                        <div class="xs-col-6">
                                            <div class="checkbox-lg">
                                                <label style="font-size: 27px">
                                                    <input type="checkbox" data-toggle="toggle" disabled id="c_{{$taller->id}}" name="c_{{$taller->id}}" onclick="validar({{$taller->id}})" data-on="Inscripto" data-off="No Inscripto">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="xs-col-6">
                                            <a href="{{ url('/archivostalleres/'.$taller->id)}}" id="preguntas_{{$taller->id}}">
                                                <!--<span class="glyphicon glyphicon-circle-arrow-right" style="font-size:2em"></span> Ingresar-->
                                                <img src="images/iconos/ingresar.jpg"> Ingresar
                                                <input type="hidden" id="id" name="id" value="{{$taller->id}}">
                                            </a>
                                            <!--<a href="#" id="preguntas_{{$taller->id}}" >
                                                <span class="glyphicon glyphicon-question-sign" style="font-size:2em"></span> Realizar pregunta
                                            </a>-->
                                        </div>
                                    </div>
                                    <!--FIN INGRESAR TALLER-->
                                </div>
                                <input type="hidden" name="id_taller" value="{{$taller->id}}">
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                <br>
                            </form>
                        </div>
                        <br>
                        @endforeach
                        <!--Acá metió mano el jona el 16/07/2017 13:08 hs-->
                		<div class="form-group">
                            <div class="col-xs-12" style="text-align:center">
                                <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                            </div><br>
                        </div>
                        <!--Fin-->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"> 

function hola()
{
    alert('holaaaaaaaaaaaaaaaa');
}
    
function validar(idTaller)
{
    alert('hola!!');
    if($('#c_'+id_inscripto).checked= true)   //$('#check_'+id_inscripto).checked= false; 
    {
        alert("chequeado!!!");
        var form= $('#form_'+idTaller);
        var data= form.serialize();
        var route = form.attr('action');
        
        
        $.post(route, data, function(result) {
            if(result){
                if(result.grabado=="verdadero"){
                    //alert("La grabacion se hizo correctamente. Cantidad de inscriptos: "+result.cant_de_inscriptos);
                }
                else{
                        alert("Cupos agotados para este dictado, por favor selecciona otro.");
                        //Poner el boton en deschequeado
                        $('#c_'+idTaller).bootstrapToggle('off');
                        //REALIZAR PREGUNTA
                        $('#preguntas_'+idTaller).hide(1);
                        
                        //alert("mm");
                        
                        //FIN REALIZAR PREGUNTA
                    
                }
            }
            else{
                alert("Error #200");
            }
        });

        //REALIZAR PREGUNTA
        $('#preguntas_'+idTaller).show(1);
        //FIN REALIZAR PREGUNTA
    }
    else{
            alert("Deschequeado!!");
            var form= $('#form_'+idTaller);
            var data= form.serialize();
            var route = 'desinscribir';
              
            $.post(route, data, function(result) {
                    if(result){
                        //alert("Desinscripto "+result.actualizado);
                        //$("#btn_{{$taller->id}}").text('Inscripto');
                        //$("#btn_{{$taller->id}}").removeClass('btn-primary');
                        //$("#btn_{{$taller->id}}").addClass('btn-success');
                    }
                    else{
                        alert("Error #201");
                    } 
            });

            //REALIZAR PREGUNTA
            $('#preguntas_'+idTaller).hide(1);
            //FIN REALIZAR PREGUNTA
        }
}
</script>
@endsection
