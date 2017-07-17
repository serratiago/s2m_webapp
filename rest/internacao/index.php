<?php
include '../../php/config.php';
include '../../php/conexao.php';

if(isset($_GET['registropaciente'])) {
	$registropaciente = $_GET['registropaciente'];

	$tsql= "select int_id_paciente,str_nome_paciente, int_sexo_paciente,int_dt_nascimento_paciente,str_nome_convenio,";
	$tsql .= "str_nome_medico,int_id_andar_quarto,int_num_quarto from viw_internacao ";
	$tsql .= "where str_registro_paciente=".$registropaciente;

}else{
	$tsql= "select int_id_paciente,str_nome_paciente, int_sexo_paciente,int_dt_nascimento_paciente,str_nome_convenio,";
	$tsql .= "str_nome_medico,int_id_andar_quarto,int_num_quarto from viw_internacao ";

}


 	$result = $conn->query($tsql)->fetchAll();
	$numrows = count($result);
	$count = 0;

	$json = '{"internacao":[';

	if($numrows<0){

    foreach ($result as $row){

	$str_nome_paciente = utf8_encode($row['str_nome_paciente']);
	$str_nome_convenio =  utf8_encode($row['str_nome_convenio']);
	$int_sexo_paciente = utf8_encode($row['int_sexo_paciente']);
	$int_dt_nascimento_paciente = utf8_encode($row['int_dt_nascimento_paciente']);
	$str_nome_medico = utf8_encode($row['str_nome_medico']);
	$int_num_andar_quarto = utf8_encode($row['int_id_andar_quarto']);
	$int_num_quarto = utf8_encode($row['int_num_quarto']);

	$json .= '{"str_nome_paciente":"'.$str_nome_paciente.'","str_nome_convenio":"'.$str_nome_convenio.'",'; 
	$json .= '"int_sexo_paciente":"'.$int_sexo_paciente.'","int_dt_nascimento_paciente":"'.$int_dt_nascimento_paciente.'",'; 
	$json .= '"str_nome_medico":"'.$str_nome_medico.'","int_id_andar_quarto":"'.$int_num_andar_quarto.'",'; 
	$json .= '"int_num_quarto":"'.$int_num_quarto.'"},'; 
	
	}
	}else{
		$json .= '{"resposta":"0"},'; 
	}

$json .= ']}';
echo str_replace(',]}', ']}', $json);
?> 