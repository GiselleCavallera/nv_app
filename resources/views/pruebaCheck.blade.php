@extends('app')
@section('content')

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<!--<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}"/> -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>TALLERES</h4></div>
                <div class="panel-body">

                	 <div class="row">
                        <div class="xs-col-6">
                            <div class="checkbox-lg">
                                <label style="font-size: 27px">
                                    <input type="checkbox" data-toggle="toggle" id="c_1" name="c_1" onClick="hola()" data-on="Inscripto" data-off="No Inscripto">
                                </label>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>
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

<script type="text/javascript"> 

function hola()
{
    alert('holaaaaaaaaaaaaaaaa');
}
</script>

@endsection