<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/datatable-bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> <!-- decia 3.3.7 -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Abierto San Francisco</title>
    
    <!-- Styles GC 17/07/17-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">   

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   
    <style>
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
          }

        #contact { /* reflexiones */
        background: white; /*url("../../public/images/fondo2014medio.jpg");*/ /*Fotoreflexionesvert3.jpg*/
        background-repeat: repeat;
        background-attachment: fixed;
        background-position: center;
        /*background-size: cover;*/
        /*-webkit-background-size: cover;*/
        -moz-background-size: cover;
        -o-background-size: cover;
        }

        .contact-form {
            width: 80%;
            margin: 0 auto;
            text-align: justify;
        }


        .contact-form p {

        }   

        .contact-form input.text, .contact-form textarea,  .newsletter .email {
            width: 100%;
            margin-bottom: 10px; /*30px */
            padding: 10px;
            background-color: transparent;
            border: 1px solid #777;
            border-radius: 0.5px;
            outline: none;
            color: #000;
        }
        .contact-form input.more_btn{
            width: 100%;
            margin-bottom: 10px; /*30px */
            padding: 15px;
            background-color: white; /* cambié GC */
            border: 1px solid #777;
            border-radius: 2px;
            outline: none;
            color: black; /* cambié GC */
            font-weight: bold;
        }

        .contact-form textarea {
            height: 150px;
        }

        .contact-form input.more_btn, .newsletter .email {
            margin: 0;
        }

        .contact-form p {
            margin: 2px 0 2px;  
            color: #000;
            font-size: 12px;
            font-weight: 500;
            /*text-transform: uppercase;*/
        }
        
        #inicioapp {  /*inicio */
        background: url("/images/FONDO850powerCompleto.png");
        background-position: center top;
        /*background-repeat: repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;*/
        }
        
        /*#app { /* inicio
        background: url("../../public/images/FondoAppChico2.jpg");
        }*/
        
        /*-- Team --*/
        .team {
            background-color: #F5F5F5;
        }

        .team-grid{
            text-align:center;
            padding: 0 1px;
        }

        .team-grid h4 {
            font-size: 30px;
            font-weight: 100;
            color: #FFF;
            margin-bottom: 30px;
        }

        .pic {
            max-width: 300px;
            max-height: 300px;
            position: relative;
            overflow: hidden;
            display: inline-block;
            animation: anima 2s;
            -webkit-animation: anima 2s;
            -moz-animation: anima 2s;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }

        .pic .pic-image, .pic-caption, .pic:hover .pic-caption, .pic:hover img {
            -webkit-transition: all 0.5s ease-in;
            -moz-transition: all 0.5s ease-in;
            -o-transition: all 0.5s ease-in;
            transition: all 0.5s ease-in;
        }

        .pic-image {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .pic-caption {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            padding: 4.5em 1em 0;
            text-align: center;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=($opacity * 100))";
            filter: alpha(opacity=0);
            -moz-opacity: 0;
            -khtml-opacity: 0;
            opacity: 0;
        }

        .top-to-bottom {
            bottom: 50%;
            left: 0;
        }

        .team-grid:hover .pic .top-to-bottom {
            left: 0;
            bottom: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=($opacity * 100))";
            filter: alpha(opacity=100);
            -moz-opacity: 1;
            -khtml-opacity: 1;
            opacity: 1;
            z-index: 9999;
        }

        .pic-caption h5{
            font-size: 1.5em;
            color: #fff;
            margin: 0 0 .5em;
            text-transform: capitalize;
        }

        .pic-caption p{
            line-height: 1.8em;
            color: #E4E4E4;
        }

        .stack img {
            width: 100%;
            height: auto;
            vertical-align: bottom;
            border: 10px solid #fff;
            border-radius: 3px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -o-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -o-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -ms-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
        }

        .stack:last-of-type {
            margin-right: 0;
        }

        .stack.twisted:before {
            -webkit-transform: rotate(4deg);
            -moz-transform: rotate(4deg);
            transform: rotate(4deg);
            -moz-transform: rotate(4deg);
            -o-transform: rotate(4deg);
        }

        .stack.twisted:after {
            -webkit-transform: rotate(-4deg);
            -moz-transform: rotate(-4deg);
            transform: rotate(-4deg);
            -ms-transform: rotate(-4deg);
            -o-transform: rotate(-4deg);
        }

        .stack:hover:before, .stack:hover:after,.team-grid:hover .stack:before,.team-grid:hover .stack:after{
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            transform: rotate(0deg);
            -o-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
        }

        .stack:before, .stack:after {
            content: "";
            border-radius: 3px;
            width: 100%;
            height: 100%;
            position: absolute;
            border: 10px solid #fff;
            left: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -ms-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -o-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
            -webkit-transition: 0.5s all ease-out;
            -moz-transition: 0.5s all ease-out;
            transition: 0.5s all ease-out;
            -o-transition: 0.5s all ease-out;
            -ms-transition: 0.5s all ease-out;
        }

        .stack:before {
            top: 4px;
            z-index: -10;
        }

        .stack:after {
            top: 8px;
            z-index: -20;
        }

        .stack {
            float: none;
            width: 92%;
            margin:3% 0% 8% 4%;
            position: relative;
            z-index: 1;
        }

        .social {
            text-align: center;
        }

        ul.social-icons li {
            display: inline-block;
        }

        ul.social-icons li a {
            display: inline-block;
            width: 30px;
            height: 30px;
            background: url("../images/img-sprite.png") no-repeat 0px 0px;
            background-size: 200px;
        }

        ul.social-icons li a.facebook:hover {
            background-position: 0px -33px;
        }

        ul.social-icons li a.twitter {
            background-position: -35px 0px;
        }

        ul.social-icons li a.twitter:hover {
            background-position: -35px -33px;
        }

        ul.social-icons li a.googleplus {
            background-position: -69px 0px;
        }

        ul.social-icons li a.googleplus:hover {
            background-position: -69px -33px;
        }

        ul.social-icons li a.instagram {
            background-position: -102px 0px;
        }

        ul.social-icons li a.instagram:hover {
            background-position: -102px -33px;
        }

        ul.social-icons li a.youtube {
            background-position: -135px 0px;
        }

        ul.social-icons li a.youtube:hover {
            background-position: -135px -33px;
        }

        /*-- //Team --*/
        
        /* PRUEBA */
        .form-group input[type="checkbox"] {
                display: none;
            }
            
            .form-group input[type="checkbox"] + .btn-group > label span {
                width: 20px;
            }
            
            .form-group input[type="checkbox"] + .btn-group > label span:first-child {
                display: none;
            }
            .form-group input[type="checkbox"] + .btn-group > label span:last-child {
                display: inline-block;   
            }
            
            .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
                display: inline-block;
            }
            .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
                display: none;   
            }
        }
        /* FIN PRUEBA */
        
    </style>
</head>
<body>
    <div id="app" style="background-color: white">
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
                        <img src="/public/images/logo mail.png" style="display: inline-block;"/> 
                        
                         @if (Auth::guest())
                            Abierto San Francisco
                        @else
                        Hola {{ Auth::user()->name }}!!
                        @endif
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
                                            Cerrar Sesi贸n
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

    
</body>
</html>
