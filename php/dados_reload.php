<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

<?php
include 'config.php';
include 'conexao.php';

$SQL = "SELECT int_id_msg, hora, pacienteId, batimento, temperaturaAmbiente, temperaturaCorporal,umidadeAmbiente FROM ";
$SQL .= "(SELECT top(890) int_id_msg, batimento, CONCAT(DATEPART(HOUR,DATEADD(HOUR,-3,dt_data_rec_msg)),':', ";
$SQL .= "DATEPART(MINUTE,dt_data_rec_msg)) as hora, ";
$SQL .= " pacienteId, temperaturaAmbiente, temperaturaCorporal,umidadeAmbiente FROM tbl_iot_monitor order by int_id_msg desc) tbl ";
$SQL .= "order by int_id_msg asc ";

	$str_result_ambiente = "";
	$str_result_paciente = "";
	$batimentos = "";

	$query = $conn->prepare($SQL);
    $query->execute();
 	$numrows =  $query->rowCount();

     for($i=0; $rs = $query->fetch(); $i++){

     
     		$str_result_ambiente .= "[\"". $rs["hora"] ."\",". str_replace(',', '.', $rs["temperaturaAmbiente"]) .",". str_replace(',', '.', $rs["umidadeAmbiente"] )."],";

     		$str_result_paciente .= "[\"". $rs["hora"] ."\",". str_replace(',', '.', $rs["temperaturaCorporal"]) ."],";

     		$batimentos =  $rs["batimento"];

	}
?>


<div style="display: none;">
<textarea name="str_banco_ambiente" id="str_banco_ambiente" > <?php echo $str_result_ambiente ?> </textarea>
<textarea name="str_banco_paciente" id="str_banco_paciente" > <?php echo $str_result_paciente ?> </textarea>
<textarea name="str_banco_batimentos" id="str_banco_batimentos" > <?php echo $batimentos ?> </textarea>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     

	google.charts.load("visualization", "1", {packages:["line"]});
	google.charts.setOnLoadCallback(load_page_data);

	function load_page_data(){

	  	String_dados_ambiente =  "["+ document.getElementById("str_banco_ambiente").value +"]";
	  	String_dados_ambiente = String_dados_ambiente.replace("], ]","]]");
	  	String_dados_ambiente = String_dados_ambiente.replace("[ [","[[");
	   	String_dados_ambiente = JSON.parse(String_dados_ambiente);
	    drawChart_ambiente(String_dados_ambiente);


	    String_dados_paciente =  "["+ document.getElementById("str_banco_paciente").value +"]";
	  	String_dados_paciente = String_dados_paciente.replace("], ]","]]");
	  	String_dados_paciente = String_dados_paciente.replace("[ [","[[");
	   	String_dados_paciente = JSON.parse(String_dados_paciente);
	    drawChart_paciente(String_dados_paciente);
	       
	}

    function drawChart_ambiente(dados) {

    var data = new google.visualization.DataTable();
	
	data.addColumn('string', 'Hora');
    data.addColumn('number', 'Temperatura Ambiente');
    data.addColumn('number', 'Umidade do ar');

    data.addRows(dados);

      var options = {
        chart: {
          title: 'Dados do ambiente',
          subtitle: 'Acompanhamento em tempo real',
        },
        lineWidth: 15,
        width: 830,
        height: 360
      };

      var chart = new google.charts.Line(document.getElementById('linechart_ambiente'));
      chart.draw(data, google.charts.Line.convertOptions(options));
    }


    function drawChart_paciente(dados) {

    var data = new google.visualization.DataTable();
	
	data.addColumn('string', 'Hora');
    data.addColumn('number', 'Temperatura Corporal');

    data.addRows(dados);

      var options = {
        chart: {
          title: 'Dados do paciente',
          subtitle: 'Acompanhamento em tempo real',
        },
        lineWidth: 15,
        width: 830,
        height: 360
      };

      var chart = new google.charts.Line(document.getElementById('linechart_paciente'));
      chart.draw(data, google.charts.Line.convertOptions(options));
    }




    </script>
<html lang="br">
<div id="div_batimentos"><img src="../img/coracao_icone.png">Atividade cardíaca: <?php echo $batimentos ?> / Minuto</div>

  <div id="linechart_ambiente" style="width: 830px; height: 360px"></div>
  <br>
  <div id="linechart_paciente" style="width: 830px; height: 360px"></div>
</html>