@extends('layouts.app')

@section('content')
<div class="container">
  
    <h3 class="text-primary">LISTADO DE REFLEXIONES</h3>
    <br>  
    
    <br>
    <div style="width:50%; display: inline-block;">
     <form class="form-horizontal"  id="form_generales" method="GET" action="{{ route('reflexiones.create')}}"> 
     {{ csrf_field() }}
        <button type="submit"  class="btn btn-default">NUEVA</button>
     </form>
    </div>
    <br><br>

  <div id= "insc" style="width:100%; margin:0 auto">
    <table class="table table-bordered" id="MyTable">
      <thead>
        <tr>
            <th class="text-center">Titulo</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($reflexiones as $reflexion)
            <tr>
                <td class="text-center">{{ $reflexion->titulo }}</td>
                <td class="text-center">{{ $reflexion->fecha }}</td>
                
                <form class="form-horizontal"  id="form_generales" method="POST" action="{{ route('deletereflexion', [$reflexion->id])}}"> 
                {{ csrf_field() }}
                <td class="text-center">
                    <button type="submit" class="btn btn-danger btn-xs">
                        <img src="images/iconos/eliminar1.png"><!-- <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>-->
                    </button>
                    <a href="{{ url('/reflexiones/'.$reflexion->id.'/edit') }}" class="btn btn-info btn-xs">
                        <img src="images/iconos/editar1.png"><!-- <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>-->
                    </a>
                </td>
              </form>
            </tr>
        @endforeach
      </tbody>      
    </table>

   </div>
   <br>
   <div  style=" font-size: 2em; color:#f2418e; display:inline-block;">
        <a href="{{ route('home') }}" >&nbsp;&nbsp;<img src="images/iconos/back.jpg"></a> 
    </div>
   <!--<div class="form-group">
      <div class="col-xs-12" style="text-align:center">
          <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
      </div>
   </div>-->
   <br>
</div>
@endsection