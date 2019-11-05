{!! Form::open(['method'=>'POST', 'id'=>'reg_user']) !!}
@csrf
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <div class="form-group">    
        <input type="text" id="area" name="area" placeholder="area" class="form-control" required>
    </div>

    <div class="form-group">
        <input type="text" id="tipo_usuario" name="tipo_usuario" placeholder="tipo_usuario" class="form-control" required>
    </div>

    <div class="form-group">    
        <input type="text" id="nom_usuario" name="nom_usuario" placeholder="Nombre de usuario" class="form-control" required>
    </div>

    <div class="form-group">
        <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control" required>
    </div>
        
    <button type="submit" id="btn_create" name="btn_create" class="btn btn-success" value="add">Guardar</button>    
{{ Form::close() }}