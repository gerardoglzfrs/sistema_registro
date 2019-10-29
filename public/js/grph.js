
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['fecha', 'Alumnos totales que ingresaron al area de internet/laps'],
      ['hola',1]

     /* @foreach($Grph as $p)
        ['{{ $p->fecha }}',{{ $p->alumnos }}],
      @endforeach*/
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

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['carrera', 'total de ingresos']
      /*  @foreach($Grphpie as $pie)
        ,['{{ $pie->carrera }}',{{ $pie->total }}]
        @endforeach*/
        ['sistemas',100]
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