<div style="display: inline">
    <h4>Iniciar servicio</h4>
    {!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_Service">
        <input class="form-control mr-sm-2" type="text" id="num_control" placeholder="Número de control" pattern="[0-9]{8}" maxlength="8" required>
        {!! Form::submit('Aceptar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'inicioServ']) !!}
    {!! Form::close() !!}
</div>

<table>
    <tr>
        <th><h3>Fecha:<?php $now = new \DateTime(); echo $now->format(" F j Y"); ?></h3></th>
    </tr>
</table>

<table class="table table-responsive table-hover" style="font-size: 11px;">
    <thead>
        <tr class="table-primary text-center">
            <th colspan="6">INFORMACION DEL ALUMNO</th>
            <th>ESTADO</th>
            <th colspan="3">REGISTRO</th>
        </tr>
        <tr class="table-info">
            <th>#</th>
            <th>Foto</th>
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
    <tbody id="alumnosServ">
      
    </tbody>
</table>

<script>
$('#inicioServ').click(function(event){
    event.preventDefault();
    var num_control = $('#num_control').val();
    var token_Service = $('#token_Service').val();

    $.ajax({
        headers: {'X-CSRF-TOKEN': token_Service},
        url: "{{ url('inicioServ') }}",
        method: 'POST',
        data: {
        num_control:num_control
        },
        beforeSend: function(){
        $("#contenido_principal").html("<img src='img/ajax-loader.gif')'>");
        },
        success: function(respuesta){
        //$("#contenido_principal").html(respuesta);
          menu(1);  
        }
    });
});
    
$(document).ready(function(){
    var tabla = $("#alumnosServ");
    var ruta= "{{ url('alumnosServ') }}";
    var contador = 0;
    $.get(ruta, function(res){
      $(res).each(function(key,value){
        contador=contador+1;
        tabla.append("<tr> <td>"+contador+"</td><td id='altimg"+contador+"'><img src='"+value.foto+"' onerror='alterna("+contador+");' style='width: 50px;  height: 50px;'></td><td>"+value.num_control+"</td><td>"+value.nombre+"</td><td>"+value.ape_p+"</td> <td>"+value.ape_m+"</td><td>"+value.carrera+"</td><td>"+value.fecha+"</td><td>"+value.hora_ent+"</td>  <td>"+value.hora_sal+"</td> ");
      });
    });
});

function alterna(contador){
    contador = "#altimg"+contador;
    $(contador).html("<img style='width: 50px;  height: 50px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9VL5EX1RHB-K4sJ7kjE7AEwMMLKNBc9KWi3PT5HBmCIkwga8P' />");
}
</script>
