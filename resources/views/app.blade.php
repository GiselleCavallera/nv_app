<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Administración Abierto</title>
    @section('styles_laravel')
    
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/datatable-bootstrap.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    @show
    @yield('my_styles')
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/jquery.js') }}"></script> 
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script> 
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('js/datatable-bootstrap.js') }}"></script> 
    <script>
        $(document).ready(function(){
            $('#MyTable').dataTable();
        });
    </script>

    @yield('my_scripts')
</body>
</html>
