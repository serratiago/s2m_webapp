<?php
include 'config.php';
include 'conexao.php';

$SQL = "SELECT int_id_msg, hora, pacienteId, batimento, temperaturaAmbiente, temperaturaCorporal FROM ";
$SQL .= "(SELECT top(100) int_id_msg, batimento, CONCAT(DATEPART(HOUR,DATEADD(HOUR,-3,dt_data_rec_msg)),':', ";
$SQL .= "DATEPART(MINUTE,dt_data_rec_msg)) as hora, ";
$SQL .= " pacienteId, temperaturaAmbiente, temperaturaCorporal FROM tbl_iot_monitor order by int_id_msg desc) tbl ";
$SQL .= "order by int_id_msg asc ";



	$str_result = "";
	$batimentos = "";

	$query = $conn->prepare($SQL);
    $query->execute();
 	$numrows =  $query->rowCount();

     for($i=0; $rs = $query->fetch(); $i++){

     
     		$str_result .= "[\"". $rs["hora"] ."\",". str_replace(',', '.', $rs["temperaturaAmbiente"]) .",". str_replace(',', '.', $rs["temperaturaCorporal"] )."],";

     		$batimentos =  $rs["batimento"];

	}
?>


<div style="display: none;">
<textarea name="str_banco" id="str_banco" > <?php echo $str_result ?> </textarea>
<textarea name="str_banco" id="str_banco_batimentos" > <?php echo $batimentos ?> </textarea>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     


google.charts.load("visualization", "1", {packages:["line"]});
google.charts.setOnLoadCallback(load_page_data);

function load_page_data(){
   	String_dados =  "["+ document.getElementById("str_banco").value +"]";
  	String_dados = String_dados.replace("], ]","]]");
  	String_dados = String_dados.replace("[ [","[[");

    chart_data = JSON.parse(String_dados);
    drawChart(chart_data);
}
   

function drawChart(chart_data) {
    var chart1_data = new google.visualization.DataTable(chart_data);
    var chart1_options = {
        title: chart1_main_title,
        vAxis: {title: chart1_vaxis_title,  titleTextStyle: {color: 'red'}}
    };

    var chart1_chart = new google.visualization.BarChart(document.getElementById('chart1_div'));
    chart1_chart.draw(chart1_data, chart1_options);
}

//    google.charts.load('current', {'packages':['line']});
//    google.charts.setOnLoadCallback(drawChart);


    function drawChart(chart_data) {

    var data = new google.visualization.DataTable(chart_data);
   
	
    //data.addRows(JSON.parse(String_dados));

      var options = {
        chart: {
          title: 'Temperaturas',
          subtitle: 'Acompanhamento em tempo real',
          
        },
        lineWidth: 15,
        width: 650,
        height: 400
      };

      var chart = new google.charts.Line(document.getElementById('linechart'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }


    </script>
<html lang="br">
<div id="div_batimentos"><img src="../img/coracao_icone.png">Atividade cardíaca: <?php echo $batimentos ?> / Minuto</div>

    <div id="linechart" style="width: 650px; height: 400px"></div>
  
</html>