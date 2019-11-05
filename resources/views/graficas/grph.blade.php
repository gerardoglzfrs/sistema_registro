
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
        vartitle: 'Area de internet: Reporte semanal',
        varcurveType: 'function',
        varlegend: { position: 'bottom' },
      };
      
      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
      chart.draw(data, options);
      
      $(window).resize(function(){
        chart.draw(data,options);
        });
      }
</script>
        
        
<div class="row">
    <div class="col-md-12">
      <div id="curve_chart" class="chart"></div>
    </div>

    <div class="col-md-12">
      <div id="piechart_3d" class="chart"></div>
    </div>
</div>



