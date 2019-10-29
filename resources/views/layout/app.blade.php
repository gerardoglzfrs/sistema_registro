<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootstrap css-->
    <link rel="stylesheet" type="text/css"  id="bootstrap-css" href="{{ asset("css/bootstrap.min.css") }}">   
    <title>SR - @yield('title')</title>
</head>

<body>
<div class="container">
    @yield('content')
</div>
<div class="cotainer">
    @yield('content3')
</div>
        
<script src="{{ asset("font_awesome/all.js") }}"></script>
<script src="{{ asset("js/jquery.slim.min.js") }}"></script>
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/funciones.js") }}"></script>
 
</body>
</html>