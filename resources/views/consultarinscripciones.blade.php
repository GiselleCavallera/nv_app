@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Actualmente te encontras inscripto a los siguientes talleres</h4></div>
                <div class="panel-body">
                    <div class="form-group">
                    
                    <div class="col-xs-12">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                        Menú Principal
                        </a>
                    </div>
                </div>
                </div>
                <br>
                <br>


                
            </div>
        </div>
    </div>
</div>
@endsection
