@extends('layout.app')

@section('title', 'Bienvenido')

@include('alertas.error_user')

<!--Custom style login-->
<link rel="stylesheet" type="text/css" href="{{ asset("css/login.css") }}">

@section('content')
<!--Login-->    
<body style="background: #328cec; background: linear-gradient(to right, #91f1e6ea, rgb(123, 126, 129));">
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 10px;">
            <div class="card card-signin my-5">
                <br>   
                	<div class="d-flex justify-content-center">
                            <div class="brand_logo_container">
                                <img src="{{ asset("img/logotec.png") }}" class="brand_logo" alt="Logo">
                            </div>
                        </div>
                        <br><br>
                <div class="card-body">
                    <br><br>
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
</body>
    
@endsection
