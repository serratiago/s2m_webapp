<html lang="br">
<head>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	<script src="../js/morris.js-0.5.1/morris.js"></script>

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
	<link rel="stylesheet" href="../js/morris.js-0.5.1/morris.css">
	<link rel="stylesheet" href="../css/padrao.css">
</head>
<body>
<?php
include 'config.php';
include 'conexao.php';

$SQL = "SELECT TOP (1) [int_id_log_monitor],[hr_data_log_monitor],[int_num_batimento_log_monitor],";
$SQL .= "[int_num_temp_Corporal_log_monitor],[int_num_umidade_Ambiente_log_monitor]";
$SQL .= "FROM [dbo].[tbl_monitor] order by [int_id_log_monitor] desc";

	$str_result = "";

 	$result = $conn->query($SQL)->fetchAll();

	$numrows = count($result);
	$count = 0;

     foreach ($result as $row){

     		$registro = $row["int_id_log_monitor"];
     		$hr_data_log_monitor = str_replace(',', '.', $row["hr_data_log_monitor"]);
     		$int_num_batimento_log_monitor = str_replace(',', '.', $row["int_num_batimento_log_monitor"]);
     		$int_num_temp_Corporal_log_monitor = str_replace(',', '.', $row["int_num_temp_Corporal_log_monitor"]);
     		$int_num_umidade_Ambiente_log_monitor= str_replace(',', '.', $row["int_num_umidade_Ambiente_log_monitor"]);
     		$int_num_umidade_Ambiente_log_monitor = str_replace(',', '.', $row["int_num_umidade_Ambiente_log_monitor"]);
	}
?>

		<div class="div_titulos">Dados aferidos às <?php echo $hr_data_log_monitor;?></div>

		<div id="div_info_cardio" class="info_dados">
		<h1 class="info_dados_h1">Atividade Cardíaca</h1>
		<?php echo $int_num_batimento_log_monitor;?>/Minuto
		</div>

		<div id="div_info_tempCorp" class="info_dados">
		<h1 class="info_dados_h1">Temperatura Corporal</h1>
		<?php echo $int_num_temp_Corporal_log_monitor;?>°C
		</div>

		<div id="div_info_tempAmb" class="info_dados">
		<h1 class="info_dados_h1">Temperatura Ambiente</h1>
		<?php echo $int_num_umidade_Ambiente_log_monitor;?>°C
		</div>

		<div id="div_info_UmidadeAmb" class="info_dados">
		<h1 class="info_dados_h1">Umidade relativa do ar</h1>
		<?php echo $int_num_umidade_Ambiente_log_monitor;?>%
		</div>

</html>

