<?
include("php/cabecalho.php");
?>
<div id="div_conteudo">
<div class="panel panel-info quadro_farmaceutico">
  <div class="panel-heading">
    <h3 class="panel-title">Responsável</h3>
  </div>
  <div class="panel-body">
   Adriano Simões
  </div>
</div>

<div class="panel panel-danger quadro_hora">
  <div class="panel-heading">
    <h3 class="panel-title">Atenção às próximas dispensações</h3>
  </div>
  <div class="panel-body">
    <div class="hora_atual" id="hora_atual"></div>
  </div>
</div>
<br /><br /><br /><br /><br />
<div class="panel panel-info">
 <div class="panel-heading">
    <h3 class="panel-title">Prescrição</h3>
  </div>
  <div class="panel-body">
  
<table id="tbl_prescricao" class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Hora</th>
      <th>Paciente</th>
      <th>Situação</th>
    </tr>
  </thead>
  <tbody>
    <tr class="success">
      <td>14:45</td>
      <td contenteditable="true">Novalgina</td>
      <td contenteditable="true">OK</td>
    </tr>

    <tr class="danger">
      <td>18:45</td>
      <td contenteditable="true">Novalgina</td>
      <td contenteditable="true">Pendente</td>
    </tr>

    <tr class="danger">
      <td>19:45</td>
      <td contenteditable="true">Novalgina</td>
      <td contenteditable="true">Pendente</td>
    </tr>
    <tr class="danger">
      <td>20:45</td>
      <td contenteditable="true">Novalgina</td>
      <td contenteditable="true">Pendente</td>

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




function updateTime(){
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()
    if (minutes < 10){
        minutes = "0" + minutes
    }
    var t_str = hours + ":" + minutes + " ";
    if(hours > 11){
        t_str += "PM";
    } else {
        t_str += "AM";
    }
    document.getElementById('hora_atual').innerHTML = t_str;
}
setInterval(updateTime, 1000);

</script>
<?
include("php/rodape.php");
?>