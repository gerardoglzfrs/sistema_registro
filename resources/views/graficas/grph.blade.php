@extends('layout.app')

@section('title', 'Graficas')



@section('content3')
<style>
.chart {
  position: relative;
  width: 100%;
  min-height: 450px;
}
.row {
  position: relative;
  margin:0 !important;
}
</style>
<script src="{{ asset("js/loader.js") }}"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['fecha', 'Alumnos totales que ingresaron al area de internet/laps'],
          @foreach($Grph as $p)
            ['{{ $p->fecha }}',{{ $p->alumnos }}],
          @endforeach
        ]);
        var options = {
          title: 'Area de internet: Reporte semanal',
          curveType: 'function',
          legend: { position: 'bottom' },

        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
        $(window).resize(function(){
            chart.draw(data,options);
        });
      }
      </script>
      <script>
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['carrera', 'total de ingresos']
            @foreach($Grphpie as $pie)
            ,['{{ $pie->carrera }}',{{ $pie->total }}]
            @endforeach
          ]);
          var options = {
            title: 'Total semanal por carrera',
            is3D: false,

          };
          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(data, options);

          $(window).resize(function(){
            chart.draw(data,options);
        });
    }
        </script>
        <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div id="curve_chart" class="chart"></div>
        </div>

        <div class="col-md-12">
          <div id="piechart_3d" class="chart"></div>
        </div>
      </div>
@endsection
