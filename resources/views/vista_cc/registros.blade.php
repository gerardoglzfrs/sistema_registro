{!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_r">
    <input class="form-control mr-sm-2" type="text" id="num_control" placeholder="Número de control" pattern="[0-9]{8}" maxlength="8" required>
    {!! Form::submit('Aceptar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'registrarNC']) !!}
{!! Form::close() !!}

<table class="table table-responsive table-hover" style="font-size: 10px;">
    <thead>
    <tr class="table-primary text-center">
        <th colspan="7">INFORMACION DEL ALUMNO</th>
        <th colspan="5">REGISTRO</th>
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
        <th>Salida</th>
    </tr>
    </thead>
    <tbody id="students_table">

    </tbody>
</table>

<script>
  $('#registrarNC').click(function(event){
    event.preventDefault();
    var num_control = $('#num_control').val();
    var token_r = $('#token_r').val();

    $.ajax({
        headers: {'X-CSRF-TOKEN': token_r},
        url: "{{ url('num_control') }}",
        method: 'POST',
        data: {
            num_control:num_control
        },
        beforeSend: function(){
            $("#contenido_principal").html("<img src='img/ajax-loader.gif')'>");
        },
        success: function(respuesta){
            //$("#contenido_principal").html(respuesta);
            menu(3);
        }
    });
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
            students_table.append("<tr><td>"+contador+"</td><td id='altimg"+contador+"'><img style='width: 50px;  height: 50px;' src="+value.foto+" alt='' onerror='alerta("+contador+")';'></td><td>"+value.num_control+"</td><td>"+value.nombre+"</td><td>"+value.ape_p+"</td><td>"+value.ape_m+"</td><td>"+value.carrera+"</td><td>"+value.fecha+"</td><td>"+value.hora_ent+"</td><td>"+value.hora_sal+"</td></tr>")
        });
    });
  });
  function alerta(contador){
    contador = "#altimg"+contador;
    $(contador).html("<img style='width: 50px;  height: 50px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9VL5EX1RHB-K4sJ7kjE7AEwMMLKNBc9KWi3PT5HBmCIkwga8P' />");
  }
</script>

