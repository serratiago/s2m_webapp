<?php
include 'config.php';
include 'conexao.php';

$SQL = "SELECT top(100) int_id_msg, CONCAT(DATEPART(HOUR,dt_data_rec_msg),':', DATEPART(MINUTE,dt_data_rec_msg)) as hora";
$SQL .= " , pacienteId, temperaturaAmbiente, temperaturaCorporal FROM tbl_iot_monitor";
$str_result = "";

	$query = $conn->prepare($SQL);
    $query->execute();
 	$numrows =  $query->rowCount();

     for($i=0; $rs = $query->fetch(); $i++){

     
     		$str_result .= "['". $rs["hora"] ."',". str_replace(',', '.', $rs["temperaturaAmbiente"]) .",". str_replace(',', '.', $rs["temperaturaCorporal"] )."]";

     		if($numrows != $i){
				$str_result .= ",";
     		}

	}
?>
<textarea name="str_banco" id="str_banco" > <?php echo $str_result ?> </textarea>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Hora');
      data.addColumn('number', 'Temperatura Ambiente');
      data.addColumn('number', 'Temperatura Corporal');

  	String_dados = "[". document.getElementById('str_banco').value ."]";
  
      data.addRows(JSON.parse(String_dados));

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