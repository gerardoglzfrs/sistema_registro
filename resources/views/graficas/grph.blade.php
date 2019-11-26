@include('alertas.user_notFound')
<script src="{{ asset('js/loader.js') }}"></script>
<script>
function btnshow(value) {
    if (value!="") {
        $("#btn_Consultar").prop("disabled",false);
    }else{
        $("#btn_Consultar").prop("disabled",true);
    }
}
</script>
<div style="display: inline">
    <p>Consultar estadisticas de semestres anteriores</p>
    <form class="form-inline md-form mr-auto mb-4" method="GET">
    <input type="hidden" id="token_Consulta" value="{{ csrf_token() }}">
        <select class="form-control form-control-sm mr-sm-2" name="periodo" id="periodo" onchange="btnshow(this.value)">
        <option value="" selected>Seleccionar periodo</option>
            @php
                for ($i=date("Y"); $i >= 2019; $i--) {
                    echo '<option value="'.$i.'-08-01">AGO-DIC/'.$i.'</option>';
                    echo '<option value="'.$i.'-01-01">ENE-JUN/'.$i.'</option>';
                    }
            @endphp
        </select>
        <button class="btn btn-outline-success btn-sm my-0" id="btn_Consultar" disabled>Consultar</button>
    </form>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-4">
            @if (isset($grph) && isset($periodo))
<table class="table table-responsive table-hover" id="centroComputo" >
        <thead>
        <tr class="table-primary text-center">
                <th colspan="2">Estadisticas del periodo {{ $periodo }}</th>
        </tr>
        <tr class="table-info">
            <th>Carrera</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody id="est_table" style="font-size: 10px;">
            @foreach ($grph as $datos)
                <tr>
                    <td>{{ $datos->carrera }}</td>
                    <td>{{ $datos->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
<div id="table1">
        <table class="table table-responsive table-hover" id="centroComputo" >
            <thead>
            <tr class="table-primary text-center">
                    <th colspan="2">Estadisticas del periodo actual</th>
            </tr>
            <tr class="table-info">
                <th>Carrera</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody id="est_table1" style="font-size: 10px;">

            </tbody>
        </table>
</div>
@endif
        </div>
        <div class="col-sm-8">
@if (isset($query))


<?php
echo "
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart2);
function drawChart2() {
  var data2 = google.visualization.arrayToDataTable([
    ['Mes', 'total']
    ";
    foreach ($query as $query){
        $month_name = date("F", mktime(0, 0, 0, $query->mes, 10));
        echo "
          ,['".$month_name."',".$query->total."]
          ";
    }
echo "
  ]);
  var options = {
    title: 'Area de internet: Reporte ".$periodo."',

    legend: { position: 'bojttom' }

  };
  var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  chart.draw(data2, options);
}
var R;
$(window).resize(function(){
    this.drawChart2();
 });
 window.onclick= function(){
    setTimeout(stop,400);
     R = window.setInterval('Reload()',1);
 }
 function Reload() {
    this.drawChart2();
 }
 function stop(){
     window.clearInterval(R);
 }
</script>
";
?>
@endif
        <div id="curve_chart" class="chart" style="margin: 0; height: 100%"></div>
        </div>
    </div>
</div>

<script>

    $("#btn_Consultar").click(function (){

        var token = $("#token_Consulta").val();
        var periodo = $("#periodo").val();

        $.ajax({
            headers: {'X-CSRF-TOKEN' : token},
            url: "grph/"+periodo,
            method: "GET",
            data: { periodo : periodo },
            beforeSend: function(){
                $("#contenido_principal").html("<div class='loader'> loading... </div>");
            },
            success: function(respuesta){
                $("#contenido_principal").html(respuesta);
                //menu(4);
            }
        });
    });

    $(document).ready(function(){
        var est_table = $("#est_table1");
        var route = "{{ url('showEst') }}";
        $.get(route, function (res){
            $(res).each(function(key,value){
                est_table.append("<tr> <td>"+value.carrera+"</td><td>"+value.total+"</td> </tr>");
            });
        });
    });


</script>

