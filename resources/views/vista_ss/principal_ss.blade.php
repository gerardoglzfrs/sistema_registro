<div style="display: inline">
    <h4>Nuevo alumno de servicio</h4>
    {!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_Service">
    <input class="form-control mr-sm-2" type="text" id="num_control" placeholder="Número de control" pattern="[0-9]{8}" maxlength="8" required>
    {!! Form::submit('Aceptar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'registrarServicio']) !!}
{!! Form::close() !!}
</div>
<table>
    <tr>
        <th><h3>Fecha:<?php $now = new \DateTime(); echo $now->format("F j Y,"); ?></h3></th>
        <th><h3 id="hora"></h3></th>
    </tr>
</table>


<table class="table table-responsive table-hover">
    <thead>
        <tr class="table-primary text-center">
            <th colspan="5">INFORMACION DEL ALUMNO</th>
            <th>ESTADO</th>
            <th colspan="3">REGISTRO</th>
        </tr>
        <tr class="table-info">
            <th>Numero de control</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Carrera</th>
            <th>A/I</th>
            <th>Fecha</th>
            <th>Entrada</th>
            <th>Salida</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>15690382</td>
            <td>Gerardo</td>
            <td>González</td>
            <td>Flores</td>
            <td>ISC</td>
            <td style="color:green;">Activo</td>
            <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
            <td> <?php $hoy=date("G:i"); echo($hoy);?></td>
            <td>En espera</td>
        </tr>
        <tr>
            <td>15690381</td>
            <td>Carlos</td>
            <td>Escalante</td>
            <td>Hernández</td>
            <td>ISC</td>
            <td style="color:green;" class="">Activo</td>
            <td> <?php $hoy=date("d/m/y"); echo($hoy);?></td>
            <td> <?php $hoy=date("G:i"); echo($hoy);?></td>
            <td>En espera</td>
        </tr>
        <tr>
            <td>15690383</td>
            <td>Emmanuel</td>
            <td>Gomez</td>
            <td>Miron</td>
            <td>ISC</td>
            <td style="color:red;">Inactivo</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
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
                    menu(1);
              }
          });
        });


</script>
