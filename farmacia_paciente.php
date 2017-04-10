<?
include("php/cabecalho.php");
?>
<div id="div_conteudo">

   
<div class="panel panel-info">
         <div class="panel-heading">
        <h3 class="panel-title">Paciente</h3>
        </div>
      <div class="panel-body">
        <h3>Data: 25/03/2017</h3>
        <b>Paciente:</b> Carlos Eduaro<br />
        <b>Prontuário:</b> 002<br />
        <b>Leito:</b> 322<br />
        
      </div>
</div>

<div class="panel panel-info">
 <div class="panel-heading">
    <h3 class="panel-title">Prescrição</h3>
  </div>
  <div class="panel-body">
  
<table id="tbl_prescricao" class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Hora</th>
      <th>Prescrição</th>
      <th>Dose</th>
      <th>Via</th>
      <th>Frequência</th>
      <th>Horários</th>
      <th>Observações</th>
      <th>Ação</th>
    </tr>
  </thead>
  <tbody>
    <tr class="info">
      <td>14:45</td>
      <td>Novalgina</td>
      <td>5ml</td>
      <td>Oral</td>
      <td>6 horas</td>
      <td></td>
      <td></td>
      <td><button type="submit" class="btn btn-info">OK</button></td>
    </tr>

    <tr class="danger">
      <td>14:45</td>
      <td>Novalgina</td>
      <td>5ml</td>
      <td>Oral</td>
      <td>6 horas</td>
      <td></td>
      <td></td>
      <td><button type="submit" class="btn btn-info">OK</button></td>
    </tr>

    <tr class="danger">
      <td>14:45</td>
      <td>Novalgina</td>
      <td>5ml</td>
      <td>Oral</td>
      <td>6 horas</td>
      <td></td>
      <td></td>
      <td><button type="submit" class="btn btn-info">OK</button></td>
      
    </tr>
    <tr class="info">
      <td>14:45</td>
      <td>Novalgina</td>
      <td>5ml</td>
      <td>Oral</td>
      <td>6 horas</td>
      <td></td>
        <td></td>
      <td><button type="submit" class="btn btn-info">OK</button></td>
    </tr>

  </tbody>
</table>

</div>

</div>
    
</div>
<script>
function add_linha(){
	
	
	var table = document.getElementById("tbl_prescricao");
	
	// Create an empty <tr> element and add it to the 1st position of the table:
	n = table.rows.length;

	var row = table.insertRow(n);
	row.className = "info";
	
	i = 0;
	while (i < 7) {
		cell1 = row.insertCell(i);
		cell1.setAttribute("contenteditable", "true");
		i ++;
	}

}
</script>
<?
include("php/rodape.php");
?>