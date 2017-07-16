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

     for($i=0; $rs = $query->fetch(); $i++){
     
     		$str_result .= "[\"". $rs["hora"] ."\",". str_replace(',', '.', $rs["temperaturaAmbiente"]) .",". str_replace(',', '.', $rs["temperaturaCorporal"] )."],";

	}
?>

<div style="display: none;">
<textarea name="str_banco" id="str_banco" > <?php echo $str_result ?> </textarea>
</div>

<script type="text/javascript">

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});

</script>

    <div id="myfirstchart" style="height: 250px;"></div>


</html>