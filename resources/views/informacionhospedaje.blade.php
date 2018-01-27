@extends('layouts.appmap')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading"><h4>INFORMACION DE TU HOSPEDAJE</h4></div>  
                <br>              
                <div class="row">
                    <div class="col-sm-12" > 
                        <div class="col-sm-12"> <b>Nombre:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $nombrehospedaje }}</div>
                        <br>
                        <div class="col-sm-12"> <b>Direccion:</b>&nbsp;&nbsp;&nbsp; {{ $direccionhospedaje }}</div>
                    </div>
                    <br>

                </div>
                <!-- <div class="row">
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
                </div>-->

                <div id="map">
                        
                </div>
                <br>
                <div class="form-group">
                    <div class="col-xs-12" style="text-align:center">
                        <a href="{{ route('home') }}" class="btn btn-primary">Menú Principal</a>
                    </div><br><br><br>
                </div>
                
                <script>   
                   // mostrarInicialmente();
                </script>    
            </div>
        </div>
    </div>
</div>


<script>      

        //initMap();
        /*function initMap() {
            document.getElementById('map').style.display='block';
            
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 4,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
        }   */  


    /*mostrarInicialmente();
                            
    function mostrarInicialmente()
    {
        var pin = ["http://maps.google.com/mapfiles/ms/micons/blue-dot.png", ""];    

        var latitud= [ -31.416255, -31.415271, -31.416901];
        var longitud= [-62.091803, -62.094163, -62.093552];
//                latitud[0]= -31.416255;
//                longitud[0]= -62.091803;
//                latitud[1]= -31.416089;
//                longitud[1]= -62.098771;

        var opcionesDeMapa = {
            rotateControl: true,
            scrollwheel: false,
            mapTypeControl: true,
            center: new google.maps.LatLng(125.80, -08.30),
            //zoom: 15,
            //position: new google.maps.LatLng(30.80, -02.30),
            mapTypeId: google.maps.MapTypeId.ROADMAP //SATELITE, HYBRID, ROADMAP, TERRAIN
        };  
        // instancia un nuevo objeto Map
        var mapa = new google.maps.Map(document.getElementById("map"), opcionesDeMapa);    

        var bounds = new google.maps.LatLngBounds(); 
        var colorPin = ['','',''];    //'ms/micons/blue-dot.png','ms/micons/blue-dot.png','markerS.png'
                        
        
        for (var i = 0; i < 3; i++){
                var puntoMark = new google.maps.LatLng(latitud[i],longitud[i]);
                bounds.extend(puntoMark);          
                
                if(i== 0)
                {
                    var marcador = new google.maps.Marker({
                                    position: puntoMark,
                                    map: mapa,
                                    icon: pin[i],
                                }); 
                }
        }
                        
        mapa.fitBounds(bounds);
    }*/

            
</script>
@endsection