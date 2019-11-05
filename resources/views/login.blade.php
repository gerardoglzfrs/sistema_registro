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
@include('alertas.error_user')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 10px;">
            <div class="card card-signin my-5" style="padding-top: 30px;">
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
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Usuario" name="username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
                        </div>
                        {!! Form::submit('Ingresar',['class'=>'btn btn-lg btn-success btn-block text-uppercase']) !!}
                    {!! Form::close() !!} 
                    <hr class="my-4"> 
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

