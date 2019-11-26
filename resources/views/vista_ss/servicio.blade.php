<div style="display: none;" id="error"></div>
@include('alertas.user_notFound')
<h4>Iniciar servicio</h4>
<p>Para iniciar y finalizar el proceso ingrese el numero de control.</p>
{!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_Service">
    <input class="form-control mr-sm-2" type="text" id="num_control" placeholder="Número de control" pattern="[0-9]{8}" maxlength="8" required>
    {!! Form::submit('Iniciar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'inicioServ']) !!}
{!! Form::close() !!}

<table class="table table-responsive table-hover" style="font-size: 11px;">
    <thead>
        <tr class="table-primary text-center">
            <th colspan="6">INFORMACION DEL ALUMNO</th>
            <th>ESTADO</th>
            <th colspan="4">REGISTRO</th>
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
            <th>Total</th>
        </tr>
    </thead>
    <tbody id="alumnosServ" style="font-size: 10px;">

    </tbody>
</table>

<script>
$('#inicioServ').click(function(event){
    event.preventDefault();
    var num_control = $('#num_control').val();
    var token_Service = $('#token_Service').val();

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
            headers: {'X-CSRF-TOKEN': token_Service},
            url: "{{ url('inicioServ') }}",
            method: 'POST',
            data: {
            num_control:num_control
            },
            beforeSend: function(){
            $("#contenido_principal").html("<div class='loader'>Loading...</div>");
            },
            success: function(respuesta){
            //$("#contenido_principal").html(respuesta);
            menu(1);
            }
        });
    }
});

$(document).ready(function(){
    var tabla = $("#alumnosServ");
    var ruta= "{{ url('alumnosServ') }}";
    var contador = 0;
    $.get(ruta, function(res){
      $(res).each(function(key,value){
        contador=contador+1;
        if(value.hora_sal==null){
            value.hora_sal='<span style="color: green;"><b>En espera</b></span>'
            value.total='<span style="color: blue;"><b>Contando...</b></span>'
        }
        tabla.append("<tr> <td>"+contador+"</td><td id='altimg"+contador+"'><img src='"+value.foto+"' onerror='alterna("+contador+");' style='width: 50px;  height: 50px;'></td><td>"+value.num_control+"</td><td>"+value.nombre+"</td><td>"+value.ape_p+"</td> <td>"+value.ape_m+"</td><td>"+value.carrera+"</td><td>"+value.fecha+"</td><td>"+value.hora_ent+"</td>  <td>"+value.hora_sal+"</td> <td>"+value.total+"</td> </tr>");
       });
    });
});

function alterna(contador){
    contador = "#altimg"+contador;
    $(contador).html("<img style='width: 50px;  height: 50px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9VL5EX1RHB-K4sJ7kjE7AEwMMLKNBc9KWi3PT5HBmCIkwga8P' />");
}
</script>
