<?php

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "dbservers2m@dbservers2m", "pwd" => "X28t12r80s", "Database" => "dbwebS2M", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:dbservers2m.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


$tsql= "select int_id_convenio, str_nome_convenio from tbl_convenio";
$getResults = sqlsrv_query($conn, $tsql);

if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
$json = '{"convenios":[';
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
	$separador = '';

	$int_id_convenio= utf8_encode($row['int_id_convenio']);
	$str_nome_convenio=  utf8_encode($row['str_nome_convenio']);
	$json .= '{"int_id_convenio":"'.$int_id_convenio.'","str_nome_convenio":"'.$str_nome_convenio.'"},'; 
	
}
$json .= ']}';
echo str_replace(',]}', ']}', $json);
?> 