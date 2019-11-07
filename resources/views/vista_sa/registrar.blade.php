<h4 class="text-center">Registro de usuarios</h4>
<hr class="my-4"> 
<!--Formulario -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-5">
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
    </div>
    
    <div class="col-sm-7">
        <table class="table table-responsive table-hover display"  id="tabla_usuarios" style="font-size: 14px;">
            <thead>
              <tr class="table-info">
                    <th>#</th>
                    <th>Area</th>
                    <th>Tipo de usuario</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="tabla_user">
              
            </tbody>    
        </table>
    </div>
  </div>
</div>

  


<script>
  //Agregar usuario
    $("#btn_create").click(function(event){
      event.preventDefault();
      var area = $('#area').val();
      var tipo_usuario = $('#tipo_usuario').val();
      var nom_usuario = $('#nom_usuario').val();
      var password = $('#password').val();
      var token = $("#token").val();
      
        $.ajax({
          headers: {'X-CSRF-TOKEN': token},
          url: "{{ url('add') }}",
          method: 'post',
          data: {
            area: area,
            tipo_usuario: tipo_usuario,
            nom_usuario: nom_usuario,
            password: password
          },
          beforeSend: function(){
            $("#contenido_principal").html("<img src='img/ajax-loader.gif')'>");
          },
          success: function(respuesta){
            menu(6);
          } 
         });
   });

   //Mostrar usuario
   $(document).ready(function(){
    var tabla_user = $("#tabla_user");
    var route= "{{ url('show') }}";
    var contador = 0;
    $.get(route, function(res){
      $(res).each(function(key,value){
        contador=contador+1;
        tabla_user.append("<tr> <td>"+contador+"</td> <td>"+value.area+"</td><td>"+value.tipo_usuario+"</td><td>"+value.nom_usuario+"</td><td>"+value.password+"</td> <td class='text-center'> <a href='#editar'><span class='fa fa-edit'></span></a> <a href='#borrar'><span  class='fa fa-trash'></span></a></td> </tr>");
      });
    });
   });


</script>
