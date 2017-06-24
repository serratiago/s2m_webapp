<?php
include("php/cabecalho.php");
?>
<div id="div_conteudo">

   
<div class="panel panel-info">

 <div class="panel-heading">
    <h3 class="panel-title">Paciente Acompanhamento</h3>
  </div>
  <div class="panel-body">
  
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


    <div id="curve_chart" style="width: 900px; height: 500px"></div>
</div>
</div>
</div>

<?
include("php/rodape.php");
?>