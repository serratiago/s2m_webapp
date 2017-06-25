<?php
include("php/cabecalho.php");
?>
<div id="div_conteudo">

   
<div class="panel panel-info">

 <div class="panel-heading">
    <h3 class="panel-title">Pacientes</h3>
  </div>
  <div class="panel-body">
  
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="20%">Registro</th>
      <th width="20%">Nome</th>
      <th width="20%">Sexo</th>
      <th width="20%">Idade</th>
       <th width="20%">&nbsp;</th>
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
	 <tr class="info">
	      <td><?php echo $rs['str_registro_paciente']; ?></td>
	      <td><?php echo $rs['str_nome_paciente']; ?></td>
	      <td><?php echo $sexo; ?></td>
	      <td><?php echo $data; ?></td>
	      <td><img src="img/lupa.png"></td>
	   </tr>

  </tbody>
</table>
<div id="div_reload">
</div>

</div>
</div>
</div>

<script type="text/javascript">

 $(document).ready(function(){
 setInterval(function(){reload_monitor()},5000);
 });


function reload_monitor(){
$.ajax({url: "php/dados_reload.php", success: function(result){
        $("#div_reload").html(result);
    }});

}



</script>
<?
include("php/rodape.php");
?>