<?
include("php/config.php");
include("php/conexao.php");

  
  $login=$_POST['login'];	//Pegando dados passados por AJAX
  $senha=$_POST['senha'];
  
  //Consulta no banco de dados
  $sql="select int_id_usuario,int_id_tipo_usuario,str_nome_usuario,str_email_usuario from tbl_usuario where"
  $sql .=" str_email_usuario='".$login."' and str_senha_usuario'".sha1($senha)."'"; 
  $resultados = mysql_query($sql)or die (mysql_error());
  $res=mysql_fetch_array($resultados); //
	if (@mysql_num_rows($resultados) == 0){
		echo 0;	//Se a consulta não retornar nada é porque as credenciais estão erradas
	}
	
	else{
		echo 1;	//Responde sucesso
		if(!isset($_SESSION)) 	//verifica se há sessão aberta
		session_start();		//Inicia seção
		//Abrindo seções
		$_SESSION['int_id_usuario']=$res['int_id_usuario']; 		
		$_SESSION['int_id_tipo_usuario']=$res['int_id_tipo_usuario'];
		$_SESSION['str_nome_usuario']=$res['str_nome_usuario'];	
		$_SESSION['str_email_usuario']=$res['str_email_usuario'];
		exit;	
	}
?>