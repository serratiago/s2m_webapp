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


$SQL = "SELECT TOP (30) [int_id_log_monitor],[int_id_paciente_log_monitor],[dt_data_log_monitor]";
$SQL .= ",[hr_data_log_monitor],[int_num_batimento_log_monitor],[int_num_temp_Corporal_log_monitor]";
$SQL .= ",[int_num_temp_Ambiente_log_monitor],[int_num_umidade_Ambiente_log_monitor]";
$SQL .= "FROM [dbo].[tbl_monitor] order by int_id_log_monitor";

	$str_result = "";

 	$result = $conn->query($SQL)->fetchAll();

	$numrows = count($result);
	$count = 0;

     foreach ($result as $row){

     		$temperaturaAmbiente = str_replace(',', '.', $row["int_num_batimento_log_monitor"]);
     		$temperaturaCorporal = str_replace(',', '.', $row["int_num_temp_Corporal_log_monitor"]);
     		$hora = $row["int_id_log_monitor"];

	     		 if (++$count == $numrows) {
	        			$str_result .= "{y:'".$hora."',a:". $temperaturaAmbiente .",b:". $temperaturaCorporal ."}";
				    } else {
				        $str_result .= "{y:'".$hora."',a:". $temperaturaAmbiente .",b:". $temperaturaCorporal ."},";
				    }
			
	}
?>
GRAFICO
<div id="div_chart" style="height: 250px; width: 450px"></div>

</html>

<script type="text/javascript">

new Morris.Line({
  // ID of the element in which to draw the chart.
   hoverCallback: function(index, options, content) {
        var data = options.data[index];
        $(".morris-hover").html('<div>Custom label: TESTE </div>');
    },
  xLabelFormat: function(x) { return ''; },
  element: 'div_chart',
  hoverCallback: function(index, options, content) {
        return(content);
    },
  data: [<?php echo $str_result ?>],
  xkey: 'y',
  ykeys: ['a', 'b'],
  stacked: true,
  labels: ['Series A', 'Series B']
});

</script>