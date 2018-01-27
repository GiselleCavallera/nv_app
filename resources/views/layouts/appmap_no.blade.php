<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>

    
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatable-bootstrap.css') }}" rel="stylesheet">
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
     


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Abierto San Francisco</title>

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!-- PARA EL MAPA -->
    <style>
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
          }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand">
                        <img src="images/logo mail.png" style="display: inline-block;">
                         Abierto San Francisco
                    </a>
                
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <!-- <li><a href="{{ route('register') }}">Registrate</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>                

        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
    
    <script>

    mostrarCamino('{{$hospedaje->nombre}}', '{{$hospedaje->direccion}}');
                            
    
    function mostrarCamino(nombreHospedaje, direccion)
    {
        if(direccion.indexOf('dpto') > -1)
        {
        	direc= direccion.split('dpto');
        	direccion_hosp= direc[0];
        }
        else {
        	direccion_hosp= direccion;
        }

        if(direccion_hosp.indexOf('calle') > -1)
        {
        	ciudad_provincia=', FRONTERA, SANTA FE';
        }
        else {
        	ciudad_provincia=', SAN FRANCISCO, CÓRDOBA';
        }

        var direccionHospedaje= direccion_hosp+ciudad_provincia+', ARGENTINA';
	    
	    var geocoder = new google.maps.Geocoder();
        geocoder.geocode( { 'address': direccionHospedaje}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();

            dibujar(latitude, longitude);
            }
        });
        
        /*origen= new google.maps.LatLng(-31.416255,-62.091803);
        destino= new google.maps.LatLng(latitude, longitude);*/
	    /*
	    var directionsDisplay = new google.maps.DirectionsRenderer();
	    var directionsService = new google.maps.DirectionsService();
	    
	    var request = {
	        origin: domTom,
	        destination: domAseg,
	        travelMode: 'WALKING',
	        provideRouteAlternatives: true
	        };
	        
	    directionsService.route(request, function(response, status) {
	        if (status == google.maps.DirectionsStatus.OK) {
	            directionsDisplay.setMap(map);
	            directionsDisplay.setDirections(response);
	        } else {
	                alert("No existen rutas entre ambos puntos");
	        }
	    });*/

        
        
    	/*var latitud = -31.416255;
    	var longitud = -62.091803;

    	document.getElementById('map').style.display='block';
        var pin = ["http://maps.google.com/mapfiles/ms/micons/blue-dot.png", ""];  


    	var opcionesDeMapa = {
            rotateControl: true,
            scrollwheel: false,
            mapTypeControl: true,
            center: new google.maps.LatLng(125.80, -08.30),
            //zoom: 15,
            //position: new google.maps.LatLng(30.80, -02.30),
            mapTypeId: google.maps.MapTypeId.ROADMAP //SATELITE, HYBRID, ROADMAP, TERRAIN
        };  

        var mapa = new google.maps.Map(document.getElementById("map"), opcionesDeMapa); 

        var puntoMark = new google.maps.LatLng(latitud,longitud);        

	    marcador = new google.maps.Marker({
	                    position: puntoMark,
	                    map: map,
	                    title: nombreHospedaje,
	                    icon: pin
	            });


        var direccionIglesia= 'GUTIERREZ 2555, SAN FRANCISCO, CÓRDOBA, ARGENTINA';
        var ciudad_provincia= "";

        if(direccion.indexOf('dpto') > -1)
        {
        	direc= direccion.split('dpto');
        	direccion_hosp= direc[0];
        }
        else {
        	direccion_hosp= direccion;
        }

        if(direccion_hosp.indexOf('calle') > -1)
        {
        	ciudad_provincia=', FRONTERA, SANTA FE';
        }
        else {
        	ciudad_provincia=', SAN FRANCISCO, CÓRDOBA';
        }

        var direccionHospedaje= direccion_hosp+ciudad_provincia+', ARGENTINA';

        var directionsDisplay = new google.maps.DirectionsRenderer();
	    var directionsService = new google.maps.DirectionsService();
	    
	    alert('iglesia: '+direccionIglesia+' -  hosp: '+direccionHospedaje);
	    
	    
	    direccionIglesia= 'MITRE 200, SAN FRANCISCO, CORDOBA, ARGENTINA';
	    direccionHospedaje='CASTELLI 2000, SAN FRANCISCO, CORDOBA, ARGENTINA';
	    
	    var request = {
	        origin: direccionIglesia,
	        destination: direccionHospedaje,
	        travelMode: 'DRIVING',
	        provideRouteAlternatives: true
	        };
	        
	    directionsService.route(request, function(response, status) {
	        if (status == google.maps.DirectionsStatus.OK) {
	            directionsDisplay.setMap(map);
	            directionsDisplay.setDirections(response);
	        } else {
	                alert("No existen rutas entre ambos puntos");
	        }
	    });*/

    }
      
    function dibujar(latitudHospedaje, longitudHospedaje)
    {   
        var pin = "http://maps.google.com/mapfiles/ms/micons/blue-dot.png"; 
        var pin2 = "http://maps.google.com/mapfiles/markerH.png";
        var latitud = -31.416255;
    	var longitud = -62.091803;
    	
        var opcionesDeMapa = {
	            center: new google.maps.LatLng(125.80, -08.30),
	            rotateControl: true,
	            scrollwheel: false,
	            mapTypeControl: true,
	            mapTypeId: google.maps.MapTypeId.ROADMAP //SATELITE, HYBRID, ROADMAP, TERRAIN
	        }; 
	        
	    var map = new google.maps.Map(document.getElementById("map"), opcionesDeMapa); 
	    
	    var bounds = new google.maps.LatLngBounds(); 
	    
        var puntoMark2= new google.maps.LatLng(latitudHospedaje,longitudHospedaje); 
        bounds.extend(puntoMark2);
        
        marcador2 = new google.maps.Marker({
                position: puntoMark2,
                map: map,
                title: 'TU HOSPEDAJE',
                icon: pin2
        });

        var infowindowHospedaje = new google.maps.InfoWindow({ content: 'Acá te hospedás :)' });  
        infowindowHospedaje.open(map, marcador2);
        
        google.maps.event.addListener(marcador2, 'click', function() {  
          infowindowHospedaje.open(map, marcador2);
        });
        
        var puntoMark1 = new google.maps.LatLng(latitud,longitud);  
        bounds.extend(puntoMark1); 
        
	    marcador1 = new google.maps.Marker({
	                    position: puntoMark1,
	                    map: map,
	                    title: 'ABIERTO',
	                    icon: pin
	            });
	            
	    var infowindowAbierto = new google.maps.InfoWindow({ content: 'Acá es el ABIERTO!!' });  
        infowindowAbierto.open(map, marcador1);
        
        google.maps.event.addListener(marcador1, 'click', function() {  
          infowindowAbierto.open(map, marcador1);
        }); 

        origen= new google.maps.LatLng(-31.416255,-62.091803);
        destino= new google.maps.LatLng(latitudHospedaje, longitudHospedaje);
	    map.fitBounds(bounds);
	    var directionsDisplay = new google.maps.DirectionsRenderer();
	    var directionsService = new google.maps.DirectionsService();
	    
	    var request = {
	        origin: origen,
	        destination: destino,
	        travelMode: 'DRIVING',
	        provideRouteAlternatives: true
	        };
	        
	    directionsService.route(request, function(response, status) {
	        if (status == google.maps.DirectionsStatus.OK) {
	            directionsDisplay.setMap(map);
	            directionsDisplay.setDirections(response);
	        } /*else {
	                alert("No existen rutas entre ambos puntos");
	        }*/
	    });
    }

    function mostrarInicialmente(nombreHospedaje, direccion)
    {
    	//alert(nombreHospedaje);

        document.getElementById('map').style.display='block';
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
    }
    </script> 
</body>
</html>