@extends('layout.app')

@section('title', 'Agregar')

@include('layout.navbar')

@section('content')

<!--Instruccion-->
<h4 class="text-center">Registrate es gratis</h4>
<h6 class="text-center">Una vez realizado tu registro tendras el privilegio de ofertar tus productos en nuestro sitio.</h6><br>

<!--Formulario-->
<div class="container">
    @csrf
    {!! Form::open(['route'=>'cc.store', 'method'=>'POST', 'role' => 'form']) !!}
        <div class="form-group">    
                           <input type="text" name="nombre" placeholder="Nombre" class="form-control"  required>
                        </div>
                        <div class="form-group">    
                            <input type="text" name="apellido_p" placeholder="Apellido paterno" class="form-control" required>
      s                  </div>
    
                        <div class="form-group">    
                            <input type="text" name="apellido_m" placeholder="Apellidos materno" class="form-control" required>
                        </div>
    
                    <div class="form-group">    
                        <input type="text" name="area" placeholder="area" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <input type="email" name="correo" placeholder="Correo" class="form-control" required>
                    </div>
                
                    <div class="form-group">    
                        <input type="text" name="nom_usuario" placeholder="Username" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <input type="text" name="password" placeholder="Password" class="form-control" required>
                    </div>
                
                    <center><button type="submit" class="btn btn-primary">Guardar</button></center>
        
{{ Form::close() }}
@endsection