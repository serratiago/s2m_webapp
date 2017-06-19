<?
include("php/config.php");
include("php/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Safe2Med</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/padrao.css" rel="stylesheet">
    
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(){
	$('#errolog').hide(); //Esconde o elemento com id errolog
	$('#frm_login').submit(function(){ 	//Ao submeter formulário
		var login=$('#txt_login').val();	//Pega valor do campo email
		var senha=$('#txt_senha').val();	//Pega valor do campo senha
		$.ajax({			//Função AJAX
			url:"login.php",			//Arquivo php
			type:"post",				//Método de envio
			data: "login="+login+"&senha="+senha,	//Dados
   			success: function (result){			//Sucesso no AJAX
                		if(result==1){						
                			location.href='restrito.php'	//Redireciona
                		}else{
                			$('#errolog').show();		//Informa o erro
                		}
            		}
		})
		return false;	//Evita que a página seja atualizada
	})
})
</script>
  </head>
  <body>
<div id="div_conteudo">
   <center>
   <br><br><br><br><br><br><br>
   <img src="img/logo_safe2med.png">
   <br><br><br>
   <b>Safe2Med</b>
   <br><br>
   <a href="http://Safe2Med.com">safe2med.com</a>

    <!--
    <div id="div_login">
   <div id="div_logo_login">
    		<img src="img/logosaudecerta.png" class="logo_medio">
    	</div>
    <form id="frm_login" class="form-horizontal" method="Post">
        
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
                <input id="txt_senha" name="txt_senha" type="password" placeholder=""  class="form-control" required autofocus> 
                </label>
            </div>
        </fieldset>
     	<div class="div_btn_form">
         <button id="btn_envia_login" type="submit" class="btn btn-info">Entrar</button>
        </div> 
    
        </form>
    </div>

</div>

-->
</center>
  </body>
</html>