<?
include("php/cabecalho.php");
?>
<div id="div_conteudo">
   
<div class="panel panel-info">

 <div class="panel-heading">
    <h3 class="panel-title">Paciente</h3>
  </div>
  <div class="panel-body">
   
  
<form class="form-horizontal form_interno">
  <fieldset>
    <legend>Cadastro</legend>
    <div class="form-group">
      <label for="txt_Nome" class="col-lg-2 control-label lbl_form">Nome</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="txt_Nome" placeholder="Nome do paciente">
      </div>
     </div>
      <div class="form-group">
       <label for="txt_RG" class="col-lg-2 control-label  lbl_form">RG</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="txt_RG" placeholder="Docomento de identidade">
      </div>
      </div>
      <div class="form-group">
        <label for="txt_telefone" class="col-lg-2 control-label  lbl_form">Telefone</label>
      <div class="col-lg-10">
        <input type="tel" class="form-control" id="txt_telefone" placeholder="Número do telefone" pattern="\(\d{2}\)\d{4}-\d{4}" >
      </div>
      </div>
      <div class="form-group">
          <label for="txt_dt_nascimento" class="col-lg-2 control-label  lbl_form">Nascimento</label>
      <div class="col-lg-10">
        <input type="date" class="form-control" id="txt_dt_nascimento" placeholder="##/##/####">
      </div>
      </div>
       <div class="form-group">
          <label for="txt_peso" class="col-lg-2 control-label lbl_form">Peso</label>
      <div class="col-lg-10">
        <input type="number" class="form-control" id="txt_peso" placeholder="Peso em KG">
      </div>
      </div>
      	<div class="div_btn_form">
         <button type="submit" class="btn btn-info">Cadastrar</button>
        </div>
     
    </div>
    </fieldset>
    </form>
    

  </div>
  
</div>
    
    
</div>

<?
include("php/rodape.php");
?>