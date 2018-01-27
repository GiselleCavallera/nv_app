@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Los archivos fueron cargados exitosamente</h4></div>
                <div class="panel-body">
                    
                    
                    
                    <!--Acá metió mano el jona el 16/07/2017 14:02 hs-->
                	<div class="form-group">
                        <div class="col-xs-12" style="text-align:center">
                            <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                        </div><br><br><br>
                    </div>
                    <!--Fin-->
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
