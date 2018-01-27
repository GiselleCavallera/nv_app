@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Nueva Reflexión</h4></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('nuevareflexion') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-xs-12 col-md-3 form-group{{ $errors->has('sala') ? ' has-error' : '' }}">
                                Fecha de publicación:
                                <div id="sandbox-container">
                                    <input type="text" id="fecha_publicacion" class="form-control" name="fecha_publicacion">
                                </div>
                            </div>
                            
                            <textarea rows="10" name="ta_reflexion" style="width:100%"></textarea>
                            <br>
                            <br>

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

                        </div>
                    </form>
                </div>
                <br>
                <br>


                
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