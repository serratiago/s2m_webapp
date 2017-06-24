<?php
$SQL = "SELECT SELECT int_id_msg, CONCAT(DATEPART(HOUR,dt_data_rec_msg),':', DATEPART(MINUTE,dt_data_rec_msg)) as hora";
$SQL .= " , pacienteId, temperaturaAmbiente, temperaturaCorporal FROM tbl_iot_monitor";
$str_result = "";

	$query = $conn->prepare($SQL);
    $query->execute();
 
     for($i=0; $rs = $query->fetch(); $i++){

     	if ($str_result != ""){
     			$str_result .=",";
     	}
     
     		$str_result .= "['". $rs["hora"] ."','". $rs["temperaturaAmbiente"] ."','". $rs["temperaturaCorporal"] ."']";

	}
?>
<input type="text" name="str_banco" id="str_banco">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     
           google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Hora');
      data.addColumn('string', 'Temperatura Ambiente');
      data.addColumn('string', 'Temperatura Corporal');


      data.addRows([document.getElementById('str_banco').Value]);

      var options = {
        chart: {
          title: 'Temperaturas',
          subtitle: 'Acompanhamento em tempo real'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }

    </script>


    <div id="linechart" style="width: 900px; height: 500px"></div>