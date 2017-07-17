<?php
include("php/cabecalho.php");
?>
<div id="div_conteudo">

<div class="panel panel-info">

 <!--<div class="panel-heading">
    <h3 class="panel-title titulo_painel">Paciente</h3>
  </div>-->
<div class="panel-body">
  
<table class="table table-striped table-hover info_paciente">
  <thead>
    <tr>
      <th colspan="4">
        <div id="div_logo_cabecalho">
          <img src="../img/logo_safe2med.png" height="8" class="logo_pequeno_cabecalho">
          </div>
      </th>
      </tr>
    <tr>
      <th>Registro</th>
      <th>Nome</th>
      <th>Sexo</th>
      <th>Idade</th>
    </tr>
  </thead>
  <tbody>

<?php

$SQL = "SELECT int_id_paciente, str_nome_paciente, int_sexo_paciente, int_dt_nascimento_paciente, str_registro_paciente";
$SQL .= " FROM tbl_paciente where int_id_paciente=1";


	$query = $conn->prepare($SQL);
    $query->execute();
    $rs = $query->fetch();
 
     
     if( $rs['int_sexo_paciente'] == 1) {
     	$sexo = "Masculino";
     }else{
		$sexo = "Feminino";
     } 

     $ano = substr($rs['int_dt_nascimento_paciente'],0,4);            
     $mes = substr($rs['int_dt_nascimento_paciente'],4,2);  
     $dia = substr($rs['int_dt_nascimento_paciente'],6,2);  
     $data = $dia."/".$mes."/".$ano;

	 ?>
	 <tr class="info_paciente">
	   <td><?php echo $rs['str_registro_paciente']; ?></td>
	
	      <td><?php echo $rs['str_nome_paciente']; ?></td>
	      <td><?php echo $sexo; ?></td>
	      <td><?php echo $data; ?></td>
	   </tr>

  </tbody>
</table>
<div id="infos_graficos">

	<div id="div_grafico_cardiaco">
	</div>

	<div id="div_grafico_temperatura">
	</div>

</div>

<div id="infos_paciente">
	
</div>

</div>
</div>
</div>

<script type="text/javascript">

reload_grafico();
reload_dados();

 $(document).ready(function(){
 setInterval(function(){reload_grafico()},5000);
 });
$(document).ready(function(){
 setInterval(function(){reload_dados()},5000);
 });
function reload_grafico(){

$.ajax({url: "php/grafico_cardiaco.php", success: function(result){
        $("#div_grafico_cardiaco").html(result);
    }});

$.ajax({url: "php/grafico_temperatura.php", success: function(result){
        $("#div_grafico_temperatura").html(result);
    }});

}

function reload_dados(){

$.ajax({url: "php/dados_monitor.php", success: function(result){
        $("#infos_paciente").html(result);
    }});

}

</script>
<?
include("php/rodape.php");
?>