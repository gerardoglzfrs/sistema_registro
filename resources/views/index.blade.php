<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap css-->
    <link rel="stylesheet" type="text/css"  id="bootstrap-css" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>Sistema de registro</title>
</head>

<body>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token1">
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a>Sistema</a>
                    <div class="cerrar">
                    <div id="close-sidebar"><i class="fas fa-times"></i></div>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                    <img class="img-responsive " style="width: 60px; height:40px;" src="{{ asset("img/logotec.png") }}" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ Auth::user()->area }}</strong></span>
                        <span class="user-role">{{ Auth::user()->tipo_usuario }}</span>
                        <span class="user-status"><i class="fas  fa-circle"></i><span> Online</span></span>
                    </div>
                </div>

                <!-- sidebar-search incluir aqui -->
            @switch(Auth::user()->area)
                @case('Servicio social')
                    @include('opciones.ss')
                    @break
                @case('Recepción')
                    @include('opciones.cc')
                    @break
                @case('Supervición')
                    @include('opciones.sa')
                @break
                    @break
                @default
            @endswitch
            </div>

        <!-- sidebar-content (Iconos)-->
            <div class="sidebar-footer">
                <a data-toggle="modal" data-target="#modalConfirm"><i class="fa fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <!-- Contenido principal -->
    <main class="page-content">
        <div class="container" id="contenido_principal">

        </div>
    </main>
</div>

<!--Modal-->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <div class="modal-content text-center">
            <div class="modal-header d-flex justify-content-center">
              <p class="heading">¿Estas seguro de salir?</p>
            </div>
           <!--Footer-->
            <div class="modal-footer flex-center">
              <a href="{{ url('/logout') }}" class="btn  btn-outline-success" style="width: 50px;">Si</a>
              <a class="btn  btn-danger waves-effect" style="color: white;" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<!--End model-->
<script src="{{ asset("js/jquery.slim.min.js") }}"></script>
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/funciones.js") }}"></script>
<script src="{{ asset("js/datatables.min.js") }}"></script>

@php
    if(Auth::user()->area=='Servicio social'){
        echo '<script>menu(1)</script>';
    }else if(Auth::user()->area=='Recepción'){
        echo '<script>menu(3)</script>';
    }else {
        echo '<script>menu(6)</script>';
    }
@endphp

</body>
</html>

    