@include('alertas.users/update')
<h4 class="text-center">Usuarios del sistema</h4>
<hr class="my-4"> 
<!--Formulario -->
<div style="display: none;" id="msj_success"></div>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <table class="table table-responsive table-hover display"  id="tabla_usuarios" style="font-size: 14px;">
          <thead>
            <tr class="table-info">
                  <th>#</th>
                  <th>Area</th>
                  <th>Tipo de usuario</th>
                  <th>Nombre</th>
                  <th>Opción</th>
              </tr>
          </thead>
          <tbody id="tabla_user">
            
          </tbody>    
      </table>
    </div>
    <div class="col-sm-5">
      <div id="form_update" class="container">
        <h6>Editar usuario</h6>
          {!! Form::open() !!}
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          <input type="hidden" id="id">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">    
                    <label for="" style="font-size: 1em;">Area:</label>
                    <input type="text" id="area" readonly name="area" class="form-control" required>
                  </div>  
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="" style="font-size: 1em;">Tipo de usuario</label>
                    <input type="text" id="tipo_usuario" readonly name="tipo_usuario" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label for="" style="font-size: 1em;">Nombre de usuario</label>
                <input type="text" id="nom_usuario" name="nom_usuario" class="form-control" required>
              </div>
      
              <div class="form-group">
                <label for="" style="font-size: 1em;">Escriba la contraseña</label>
                <input type="password" id="password1" name="password1" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="" style="font-size: 1em;">Confirme la contraseña</label>
                <input type="password" id="password2" name="password2" class="form-control">
              </div>
        
              <button type="submit" disabled id="btn_update" name="btn_create" class="btn btn-success" value="add">Actualizar</button>    
          {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

<script>
  //Editar datos
  function edit(btn){
   var token = $("#token").val();
   var id = btn.value;
   var ruta = "edit/"+id;
   $.get(ruta, function(res){
     var id = $('#id').val(res.id);
     var area = $('#area').val(res.area);
     var tipo_usuario = $('#tipo_usuario').val(res.tipo_usuario);
     var nom_usuario = $('#nom_usuario').val(res.nom_usuario);
     var password = $('#password').val(res.password);
   });
   $('#form_update').show();
   $('#btn_update').prop('disabled', false);
  }

  //Actualizar usuario
$("#btn_update").click(function(event){
  event.preventDefault();
  var token = $("#token").val();
  var id = $('#id').val();
  var nom_usuario = $('#nom_usuario').val();
  var password1 = $('#password1').val();

  var negacion = "La contraseña no conicide";
  var psw1 = $("[name=password1]").val();
  var psw2 = $("[name=password2]").val();
  var span = $('<span style="display:block;font-size:1em;margin:0px 0 10px; margin-top: 8px; padding:5px 0 5px 11px;width:200px;"></span>').insertAfter(password2);
  span.hide();

  if (psw1 != psw2) {
    span.show().removeClass();
    span.text(negacion).addClass('negacion');	
  }else{
    $.ajax({
      headers: {'X-CSRF-TOKEN': token},
      url: "update/"+id,
      method: 'PUT',
      dataType: 'JSON',
      data: {
        nom_usuario: nom_usuario,
        password: password1
      },
      beforeSend: function(){
        $("#contenido_principal").html("<div class='loader'>Loading...</div>");
      },
      success: function(respuesta){
        menu(5);
          $(document).ready(function(){
            setTimeout(function(){
            $("#msj_success").show().html("<div class='alert alert-success' role='alert'>Datos actualizados correctamente</div>").fadeOut(3000);
            });
        });
      }
    });
  }
 });

   //Mostrar usuario
  $(document).ready(function(){
   var tabla_user = $("#tabla_user");
   var route = "{{ url('show') }}";
   var contador = 0;
   $.get(route, function(res){
     $(res).each(function(key,value){
       contador=contador+1;
       tabla_user.append("<tr> <td>"+contador+"</td> <td>"+value.area+"</td><td>"+value.tipo_usuario+"</td><td>"+value.nom_usuario+"</td><td class='text-center'> <button value="+value.id+" title='Editar' onclick='edit(this);'><span class='fa fa-edit'></span></button></td> </tr>");
     });
   });
  });

</script>

<style>
  .negacion{background:#ffcccc; border:1px solid red}
</style>