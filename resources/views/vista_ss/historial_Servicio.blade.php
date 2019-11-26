<div style="display: none;" id="error"></div>
@include('alertas.user_found')
@include('alertas.user_notFound')
<div style="display: inline">
    <h4>Registrar alumno</h4>
    <p>Para registrar un nuevo alumno, ingrese su número de control.</p>
        {!! Form::open(['class'=>'form-inline md-form mr-auto mb-4', 'method'=>'POST']) !!}
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_Service">
            <input class="form-control mr-sm-2" type="text" id="num_control" placeholder="Número de control" pattern="[0-9]{8}" maxlength="8" required>
            {!! Form::submit('Aceptar',['class'=>'btn btn-outline-success btn-rounded btn-md my-0', 'id'=>'registrarServicio']) !!}
        {!! Form::close() !!}
</div>

@if (isset($datos)&&count($datos)>0)
<div id="mostrarDatos" style="display: none;">
    <table class="table table-responsive" style="font-size: 11px;">
        <thead>
            <tr class="table-primary text-center">
                <th colspan="7">INFORMACION DEL ALUMNO</th>
            </tr>
            <tr class="table-info">
                <th>#</th>
                <th>Numero de control</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Carrera</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody id="alumnosSerEv">
          <tr>
              @foreach ($datos as $dato)
                {!! Form::open(['method'=>'POST', 'id'=>'agregar']) !!}
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_agregar">
                    <td>1</td>
                    <td><input id="numControl" type="text" class="field left" readonly size="8" style="border: none; box-shadow: none;" value="{{ $dato->no_de_control }}"></td>
                    <td><input id="nombre" type="text" class="field left" readonly style="border: none; box-shadow: none;" value="{{ $dato->nombre_alumno }}"></td>
                    <td><input id="ape_p" type="text" class="field left" readonly style="border: none; box-shadow: none;" value="{{ $dato->apellido_paterno }}"></td>
                    <td><input id="ape_m" type="text" class="field left" readonly style="border: none; box-shadow: none;" value="{{ $dato->apellido_materno }}"></td>
                    <td><input id="carrera" type="text" class="field left" readonly size="35" style="border: none; box-shadow: none;" value="{{ $dato->nombre_carrera }}"></td>
                    <td class="text-center"><button type="submit" onclick="agregar();" title="Registrar" ><span class="fa fa-save"></span></button></td>
                {!! Form::close() !!}
              @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endif


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
                <th>Horas acumuladas</th>
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
            url: "{{ url('newStudent') }}",
            method: 'POST',
            data: {
            num_control:num_control
            },
            beforeSend: function(){
            $("#contenido_principal").html("<div class='loader'>Loading...</div>");
            },
            success: function(respuesta){
            $('#contenido_principal').html(respuesta);
            $('#mostrarDatos').show();
            }
        });
    }
});

function agregar(){
    var token = $('#token_agregar').val();
    var numControl = $('#numControl').val();
    var nombre = $('#nombre').val();
    var ape_p = $('#ape_p').val();
    var ape_m = $('#ape_m').val();
    var carrera = $('#carrera').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': token },
        url: "{{ url('registrar') }}",
        method: 'POST',
        data:{
            num_control: numControl,
            nombre: nombre,
            ape_p: ape_p,
            ape_m: ape_m,
            carrera: carrera,
        },
        beforeSend: function(){
            $("#contenido_principal").html("<div class='loader'>Loading...</div>");
        },
        success: function(respuesta){
            menu(2);
        }
    });
}


$(document).ready(function(){
    var tabla = $("#alumnosReg");
    var ruta= "{{ url('alumnosReg') }}";
    var contador = 0;
    $.get(ruta, function(res){
      $(res).each(function(key,value){
        contador=contador+1;
        if (value.horas==null && value.minutos==null) {
            value.horas=0;
        }
        value.horas = parseInt(value.horas)+(Math.trunc(value.minutos/60));
        var rest = 480-value.horas;
        tabla.append("<tr> <td>"+contador+"</td><td id='altimg"+contador+"'><img onerror='alterna("+contador+");' src='"+value.foto+"' style='width: 50px;  height: 50px;'></td><td>"+value.num_control+"</td><td>"+value.nombre+"</td><td>"+value.ape_p+"</td> <td>"+value.ape_m+"</td><td>"+value.carrera+"</td><td>"+value.area+"</td><td>"+value.inicio_serv+"</td> <td>"+value.horas+"</td> <td>"+rest+"</td>  ");
      });
    });
});

function alterna(contador){
    contador = "#altimg"+contador;
    $(contador).html("<img style='width: 50px;  height: 50px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9VL5EX1RHB-K4sJ7kjE7AEwMMLKNBc9KWi3PT5HBmCIkwga8P' />");
  }
</script>
