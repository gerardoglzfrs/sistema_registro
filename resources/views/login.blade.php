<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap css-->
    <link rel="stylesheet" type="text/css"  id="bootstrap-css" href="{{ asset("css/bootstrap.min.css") }}">   
    <!--Custom style login-->
    <link rel="stylesheet" type="text/css" href="{{ asset("css/login.css") }}">
    <title>Login</title>
</head>

<body style="background: #328cec; background: linear-gradient(to right, #91f1e6ea, rgb(123, 126, 129));">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 5px;">
            <div class="card card-signin my-5" style="padding-top: 20px;">
                <div class="d-flex justify-content-center"  style="padding-top: 30px;">
                    <div class="brand_logo_container">
                        <img src="{{ asset("img/logotec.png") }}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                
                <div class="card-body"  style="padding-top: 90px;">
                    <h5 class="card-title text-center" style="margin-bottom: 15px;"><strong>CONTROL DE ACCESO</strong></h5>
                    <hr class="my-4"> 
                    {!! Form::open(['route'=>'log.store', 'method'=>'POST']) !!}
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Usuario" name="username" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        </div>
                        @include('alertas.error_user')
                        {!! Form::submit('Ingresar',['class'=>'btn btn-lg btn-success btn-block text-uppercase']) !!}
                    {!! Form::close() !!} 
                    <hr class="my-3"> 
                    <div>
                        <p style="font-size: 12px;" class="text-center">©2019 Sistema de registros</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

