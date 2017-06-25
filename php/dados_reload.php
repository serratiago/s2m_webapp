<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

<?php
include 'config.php';
include 'conexao.php';

$SQL = "SELECT int_id_msg, hora, pacienteId, batimento, temperaturaAmbiente, temperaturaCorporal,umidadeAmbiente FROM ";
$SQL .= "(SELECT top(100) int_id_msg, batimento, CONCAT(DATEPART(HOUR,DATEADD(HOUR,-3,dt_data_rec_msg)),':', ";
$SQL .= "DATEPART(MINUTE,dt_data_rec_msg)) as hora, ";
$SQL .= " pacienteId, temperaturaAmbiente, temperaturaCorporal,umidadeAmbiente FROM tbl_iot_monitor order by int_id_msg desc) tbl ";
$SQL .= "order by int_id_msg asc ";



	$str_result = "";
	$batimentos = "";

	$query = $conn->prepare($SQL);
    $query->execute();
 	$numrows =  $query->rowCount();

     for($i=0; $rs = $query->fetch(); $i++){

     
     		$str_result .= "[\"". $rs["hora"] ."\",". str_replace(',', '.', $rs["temperaturaAmbiente"]) .",". str_replace(',', '.', $rs["umidadeAmbiente"] )."],";

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
	   	String_dados = JSON.parse(String_dados);
	    drawChart(String_dados);
	       
	}

    function drawChart(dados) {

    var data = new google.visualization.DataTable();
	
	data.addColumn('string', 'Hora');
    data.addColumn('number', 'Temperatura Ambiente');
    data.addColumn('number', 'Umidade do ar');

    data.addRows(dados);

      var options = {
        chart: {
          title: 'Temperaturas',
          subtitle: 'Acompanhamento em tempo real',
          
        },
        vAxis: {
            viewWindowMode:'explicit',
            viewWindow: {
              max:100,
              min:5
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