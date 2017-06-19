<?php

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "dbservers2m@dbservers2m", "pwd" => "X28t12r80s", "Database" => "dbwebS2M", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:dbservers2m.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


$tsql= "select int_id_convenio, str_nome_convenio from tbl_convenio";
$getResults = sqlsrv_query($conn, $tsql);

$total  = sqlsrv_num_rows($getResults);
$cont = 0 ;

$json = array();

if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
echo '{"convenios":[';
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
	$separador = '';
	if (++$cont != $total) {
        $separador = ',';
    } 

	$int_id_convenio=$row['int_id_convenio'];
	$str_nome_convenio=$row['str_nome_convenio'];
	echo '{"int_id_convenio":"'.$int_id_convenio.'","str_nome_convenio":"'.$str_nome_convenio.'"}'.$separador ; 
	
}
echo ']}';

?> 