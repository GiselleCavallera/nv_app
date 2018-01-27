@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <br><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">SIN HOSPEDAJE</div>
                <div class="panel-body">
                    Esta persona no tiene hospedaje asignado aún.
                </div>
            </div>
        </div>
        <!--Acá metió mano el jona el 16/07/2017 13:18 hs-->
		<div class="form-group">
            <div class="col-xs-12" style="text-align:center">
                <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
            </div>
        </div>
        <!--Fin-->
    </div>
</div>
@endsection