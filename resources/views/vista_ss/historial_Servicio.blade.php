<div style="display: inline">
    <h4>Registrar alumno</h4>
    <p>Ingresa el numero de control del alumno</p>
        {!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_Service">
            <input class="form-control mr-sm-2" type="text" id="num_control" placeholder="Número de control" pattern="[0-9]{8}" maxlength="8" required>
            {!! Form::submit('Aceptar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'registrarServicio']) !!}
        {!! Form::close() !!}
</div>

<table class="table table-responsive table-hover" style="font-size: 10px;">
        <thead>
            <tr class="table-primary text-center">
                <th colspan="8">INFORMACION DEL ALUMNO</th>
                <th colspan="3">ESTADO DE SERVICIO</th>
            </tr>
            <tr class="table-info text-cente">
                <th>#</th>
                <th>Foto</th>
                <th>Numero de control</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Carrera</th>
                <th>Area</th>
                <th>Inicio de servicio</th>
                <th>Horas acomuladas</th>
                <th>Horas restantes</th>
            </tr>
        </thead>
        <tbody id="alumnosReg">
           
        </tbody>
    </table>
    
<script>
$('#registrarServicio').click(function(event){
    event.preventDefault();
    var num_control = $('#num_control').val();
    var token_Service = $('#token_Service').val();
        
    $.ajax({
        headers: {'X-CSRF-TOKEN': token_Service},
        url: "{{ url('nuevo_servicio') }}",
        method: 'POST',
        data: {
        num_control:num_control
        },
        beforeSend: function(){
        $("#contenido_principal").html("<img src='img/ajax-loader.gif')'>");
        },
        success: function(respuesta){
        //$("#contenido_principal").html(respuesta);
        menu(2);
        }
    });
});

$(document).ready(function(){
    var tabla = $("#alumnosReg");
    var ruta= "{{ url('alumnosReg') }}";
    var contador = 0;
    $.get(ruta, function(res){
      $(res).each(function(key,value){
        contador=contador+1;
        tabla.append("<tr> <td>"+contador+"</td><td id='altimg"+contador+"'><img onerror='alterna("+contador+");' src='"+value.foto+"' style='width: 50px;  height: 50px;'></td><td>"+value.num_control+"</td><td>"+value.nombre+"</td><td>"+value.ape_p+"</td> <td>"+value.ape_m+"</td><td>"+value.carrera+"</td><td>"+value.area+"</td><td>"+value.inicio_serv+"</td> <td>10</td> <td>470</td>  ");
      });
    });
});

function alterna(contador){
    contador = "#altimg"+contador;
    $(contador).html("<img style='width: 50px;  height: 50px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9VL5EX1RHB-K4sJ7kjE7AEwMMLKNBc9KWi3PT5HBmCIkwga8P' />");
  }
</script>
        