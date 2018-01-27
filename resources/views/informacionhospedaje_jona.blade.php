@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading"><h4>Información de Hospedaje</h4></div>
                <div class="row">
                    <div class="col-sm-6" >
                        <div class="col-sm-12">Estos son los datos de tu hospedaje <strong>{{ Auth::user()->name }}</strong></div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="col-sm-12"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" > 
                        <div class="col-sm-12">Direccion:</div>
                        <div class="col-sm-12">Localidad:</div>
                        <div class="col-sm-12">Tipo:</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-12">***colocar dirección***</div>
                        <div class="col-sm-12">***colocar localidad***</div>
                        <div class="col-sm-12">***colocar tipo***</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail"><img src="images/upload/default.jpg" alt="..."></a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail"><img src="images/upload/default.jpg" alt="..."></a>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail"><img src="images/upload/default.jpg" alt="..."></a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12" >    
                        <iframe src="https://www.google.com/maps/d/embed?mid=1uJzeOQyXiHHaZZ0UuCKTpbbyO08" width="100%" height="400px"></iframe>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection