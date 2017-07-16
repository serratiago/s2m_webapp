<html lang="br">
<head>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	<script src="../js/morris.js-0.5.1/morris.js"></script>

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
	<link rel="stylesheet" href="../js/morris.js-0.5.1/morris.css">
</head>
<body>
<?php
include 'config.php';
include 'conexao.php';

$SQL = "SELECT [int_id_log_monitor],[hr_data_log_monitor],[int_num_batimento_log_monitor],";
$SQL .= "[int_num_temp_Corporal_log_monitor] FROM ";
$SQL .= "(SELECT TOP (30) [int_id_log_monitor],[hr_data_log_monitor],[int_num_batimento_log_monitor],";
$SQL .= "[int_num_temp_Corporal_log_monitor] ";
$SQL .= "FROM [dbo].[tbl_monitor] order by [int_id_log_monitor] desc)";

	$str_result = "";

 	$result = $conn->query($SQL)->fetchAll();

	$numrows = count($result);
	$count = 0;

     foreach ($result as $row){

     		$hr_data_log_monitor = str_replace(',', '.', $row["hr_data_log_monitor"]);
     		$int_num_batimento_log_monitor = str_replace(',', '.', $row["int_num_batimento_log_monitor"]);
     		$registro = $row["hr_data_log_monitor"];

	     		 if (++$count == $numrows) {
	        			$str_result .= "{y:'".$registro."',a:'". $hr_data_log_monitor ."',b:". $int_num_batimento_log_monitor  ."}";
				    } else {
				        $str_result .= "{y:'".$registro."',a:'". $hr_data_log_monitor ."',b:". $int_num_batimento_log_monitor  ."},";
				    }
			
	}
?>

<div id="div_chart" style="height: 250px; width: 450px"></div>

</html>

<script type="text/javascript">

new Morris.Line({
  // ID of the element in which to draw the chart.
	element: 'div_chart',
  	data: [<?php echo $str_result ?>],
    stacked: true,
  	//xLabelFormat: function(x) { return ''; },
  	xkey: 'y',
  	ykeys: ['b'],
  	labels: ['Batimentos/Minuto'],
  	parseTime: false
});

</script>