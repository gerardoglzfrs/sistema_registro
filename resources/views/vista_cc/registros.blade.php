<div style="display: none;" id="error"></div>
@include('alertas.user_notFound')
<div>
  <h4>Registrar entrada</h4>
    {!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_r">
        {!! Form::text('num_control', null, ['class'=>'form-control mr-sm-2', 'id'=>'num_control', 'placeholder'=>'Número de control', 'required', 'pattern'=>'[0-9]{8}', 'maxlength'=>'8']) !!}
        {!! Form::submit('Aceptar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'registrarNC']) !!}
    {!! Form::close() !!}
</div>
 
<div class="container">
  <div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
      <table class="table table-responsive table-hover"style="font-size: 10px;">
      <thead>
        <tr class="table-primary text-center">
            <th colspan="2">EN SERVICIO</th>
        </tr>
        <tr class="table-info">
            <th>Nombre</th>
            <th>A/I</th>
        </tr>
      </thead>
      <tbody id="Activos" style="font-size: 9px;">
      
      </tbody>
    </table>
  </div>
  <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
    <table class="table table-responsive table-hover" style="font-size: 10px;" id="centroComputo" >
        <thead>
        <tr class="table-primary text-center">
            <th colspan="6">INFORMACION DEL ALUMNO</th>
            <th colspan="4">REGISTRO</th>
        </tr>
        <tr class="table-info">
            <th>#</th>
            <th>Perfil</th>
            <th>Numero de control</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Carrera</th>
            <th>Fecha</th>
            <th>Entrada</th>
        </tr>
        </thead>
        <tbody id="students_table" style="font-size: 9px;">
    
        </tbody>
    </table>
  </div>
</div>
</div>  


<script>
  $('#registrarNC').click(function(event){
    event.preventDefault();
    var num_control = $('#num_control').val();
    var token_r = $('#token_r').val();

    if(num_control==""){
      $(document).ready(function(){
      setTimeout(function(){
        $("#error").show().html("<div class='alert alert-danger' role='alert'>Ingrese un número de control</div>").fadeOut(3000);
      });
    });
    }else if(!/^([0-9])*$/.test(num_control)){
        $(document).ready(function(){
      setTimeout(function(){
        $("#error").show().html("<div class='alert alert-danger' role='alert'>Número de control no valido</div>").fadeOut(3000);
      });
    });
    }else if(num_control.length!=8){
    $(document).ready(function(){
      setTimeout(function(){
        $("#error").show().html("<div class='alert alert-danger' role='alert'>Ingrese los 8 digitos</div>").fadeOut(3000);
      });
    });
    }else{
    $.ajax({
        headers: {'X-CSRF-TOKEN': token_r},
        url: "{{ url('num_control') }}",
        method: 'POST',
        data: {
            num_control:num_control
        },
        beforeSend: function(){
            $("#contenido_principal").html("<div class='loader'>Loading...</div>");
        },
        success: function(respuesta){
            //$("#contenido_principal").html(respuesta);
            menu(3);
        }
    });
    }
  });

  $(document).keydown(function(){
    $("#num_control").focus();
  });

  $(document).ready(function(){
    $("#num_control").focus();
    var students_table = $('#students_table');
    var route = "{{ url('showStudents') }}";
    var contador = 0;
    $.get(route, function(res){
        $(res).each(function(key, value){
            contador=contador+1;
            students_table.append("<tr><td>"+contador+"</td><td id='altimg"+contador+"'><img style='width: 50px;  height: 50px;' src="+value.foto+" alt='' onerror='alterna("+contador+")';'></td><td>"+value.num_control+"</td><td>"+value.nombre+"</td><td>"+value.ape_p+"</td><td>"+value.ape_m+"</td><td>"+value.carrera+"</td><td>"+value.fecha+"</td><td>"+value.hora_ent+"</td></tr>")
        });
    });
  });
  function alterna(contador){
    contador = "#altimg"+contador;
    $(contador).html("<img style='width: 50px;  height: 50px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9VL5EX1RHB-K4sJ7kjE7AEwMMLKNBc9KWi3PT5HBmCIkwga8P' />");
  }

  $(document).ready(function(){
    var students_table = $('#Activos');
    var route = "{{ url('online') }}";

    $.get(route, function(res){
        $(res).each(function(key, value){
            if (value.estatus==1) {
              value.estatus = '<div class="text-center"><span style="background: #5cb85c; color: #fff; padding-left: 7px; padding-right: 7px; padding-bottom: 2px; padding-top: 2px; border-radius: 3px;"><b>Activo</b></span></div>';
            }else{
              value.estatus = '<div class="text-center"><span style="background: red; color: #fff; padding-left: 3px; padding-right: 3px; padding-bottom: 2px; padding-top: 2px; border-radius: 3px;"><b>Inactivo</b></span></div>';
            }
            students_table.append("<tr> <td>"+value.nombre+"</td> <td>"+value.estatus+"</td> </tr>");
        });
    });
  }); 
</script>

