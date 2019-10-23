<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap css-->
    <link rel="stylesheet" type="text/css"  id="bootstrap-css" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}">
    <title>SR - @yield('title')</title>
</head>

<body>
    <!--Contenedor principal-->
    <div class="container">
        @yield('content')
    </div>
    <!--Contenedor secundario-->
    <div class="">
        @yield('content2')
    </div>
    
    <script src="{{ asset("js/jquery.slim.min.js") }}"></script>
    <script src="{{ asset("js/popper.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/funciones.js") }}"></script>
    

</body>
</html>