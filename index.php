<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Saúde Certa</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/padrao.css" rel="stylesheet">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div id="div_conteudo">
   
    
    <div id="div_login">
   <div id="div_logo_login">
    		<img src="img/logosaudecerta.png" class="logo_medio">
    	</div>
    <form id="frm_login" class="form-horizontal">
        
        <h1>Saúde Certa</h1>
         
          <fieldset> 
            <legend>Login</legend> 
            <div> 
                <label class="control-label campo_form">Nome:<br />
                <input id="txt_login" name="txt_login" type="text" placeholder="" class="form-control" required autofocus> 
                </label>
            </div>
            <div> 
                <label class="control-label campo_form">Senha:<br />
                <input id="txt_login" name="txt_login" type="password" placeholder=""  class="form-control" required autofocus> 
                </label>
            </div>
        </fieldset>
     	<div class="div_btn_form">
         <button type="submit" class="btn btn-info">Entrar</button>
        </div> 
    
        </form>
    </div>

</div>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>