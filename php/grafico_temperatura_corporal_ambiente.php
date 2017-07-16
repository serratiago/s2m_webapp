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

$SQL = "SELECT int_id_msg, hora, pacienteId, temperaturaAmbiente, temperaturaCorporal FROM ";
$SQL .= "(SELECT top(100) int_id_msg, CONCAT(DATEPART(HOUR,DATEADD(HOUR,-3,dt_data_rec_msg)),':', ";
$SQL .= "DATEPART(MINUTE,dt_data_rec_msg)) as hora, ";
$SQL .= " pacienteId, temperaturaAmbiente, temperaturaCorporal FROM tbl_iot_monitor order by int_id_msg desc) tbl ";
$SQL .= "order by int_id_msg asc ";

	$str_result = "";

	$query = $conn->prepare($SQL);
    $query->execute();
 	$numrows =  $query->rowCount();
 	$count = 0;

     for($i=0; $rs = $query->fetch(); $i++){

     		$temperaturaAmbiente = str_replace(',', '.', $rs["temperaturaAmbiente"]);
     		$temperaturaCorporal = str_replace(',', '.', $rs["temperaturaCorporal"]);
     		$hora = $rs["hora"];

     		 if (++$count == $numrows) {
        			$str_result .= "{ y: '".$hora."',a:". $temperaturaAmbiente .",b:". $temperaturaCorporal ."}"
			    } else {
			        $str_result .= "{ y: '".$hora."',a:". $temperaturaAmbiente .",b:". $temperaturaCorporal ."},"
			    }

     		

	}
?>

<div style="display: none;">
<textarea name="str_banco" id="str_banco" > <?php echo $str_result ?> </textarea>
</div>

<div id="div_chart" style="height: 250px;"></div>

</html>

<script type="text/javascript">

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'div_chart',
  data: [document.getElementById("str_banco").value;],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});

</script>