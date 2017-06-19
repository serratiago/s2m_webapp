<?php

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "dbservers2m@dbservers2m", "pwd" => "X28t12r80s", "Database" => "dbwebS2M", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:dbservers2m.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);



$tsql= "select str_nome_paciente, int_sexo_paciente,int_dt_nascimento_paciente,str_nome_convenio,";
$tsql .= "str_nome_medico,int_id_andar_quarto,int_num_quarto from viw_internacao";
$getResults = sqlsrv_query($conn, $tsql);

if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
$json = '{"internacao":[';

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
	
	$str_nome_paciente = utf8_encode($row['str_nome_paciente']);
	$str_nome_convenio =  utf8_encode($row['str_nome_convenio']);
	$int_sexo_paciente = utf8_encode($row['int_sexo_paciente']);
	$int_dt_nascimento_paciente = utf8_encode($row['int_dt_nascimento_paciente']);
	$str_nome_medico = utf8_encode($row['str_nome_medico']);
	$int_id_andar_quarto = utf8_encode($row['int_id_andar_quarto ']);
	$int_num_quarto = utf8_encode($row['int_num_quarto']);

	$json .= '{"str_nome_paciente":"'.$str_nome_paciente.'","str_nome_convenio":"'.$str_nome_convenio.'",'; 
	$json .= '"int_sexo_paciente":"'.$int_sexo_paciente.'","int_dt_nascimento_paciente":"'.$int_dt_nascimento_paciente.'",'; 
	$json .= '"str_nome_medico":"'.$str_nome_medico.'","int_id_andar_quarto":"'.$int_id_andar_quarto.'",'; 
	$json .= '"int_num_quarto":"'.$int_num_quarto.'"},'; 
	
}
$json .= ']}';
echo str_replace(',]}', ']}', $json);
?> 