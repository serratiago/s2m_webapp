<?php
include("php/cabecalho.php");
?>
<div id="div_conteudo">

   
<div class="panel panel-info">

 <div class="panel-heading">
    <h3 class="panel-title">Pacientes</h3>
  </div>
  <div class="panel-body">
  
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Registro</th>
      <th>Quarto</th>
      <th>Nome</th>
      <th>Situação</th>
      <th>Responsável</th>
    </tr>
  </thead>
  <tbody>

<?php

if (!$conn || !mssql_select_db($db_banco, $conn)) {
    die('Unable to connect or select database!');
}


$SQL = 'SELECT int_id_paciente, str_nome_paciente, int_sexo_paciente, int_dt_nascimento_paciente';
$SQL .=' FROM tbl_paciente';

$result = mssql_query($SQL);

if (!mssql_num_rows($result)) {

while ($rs =mssql_fetch_assoc($result)){                           
	 ?>
	 <tr class="info">
	      <td>113</td>
	      <td>quarto</td>
	      <td><?php echo $rs['str_nome_paciente']; ?></td>
	      <td>Acolhimento</td>
	      <td>Carlos Eduardo</td>
	   </tr>
	<?
	}
	?>
   
  </tbody>
</table>

</div>
</div>
</div>

<?
include("php/rodape.php");
?>