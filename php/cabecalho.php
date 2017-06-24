<?php
include 'config.php';
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Saúde Certa</title>

    <!-- Bootstrap -->
    <link href="css/padrao.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
 	<script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/funcoes.js"></script>
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <div id="div_cabecalho">
 
 
  <div id="div_logo_cabecalho">
    <img src="../img/logo_safe2med.png" class="logo_pequeno_cabecalho">
   </div>
   <div id="div_menu">
   
  <nav class="navbar navbar-inverse nav_menu">
  <div class="container-fluid">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="#">Menu</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
      
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Acolhimento
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="paciente.php">Cadastro de paciente</a></li>
            <li class="divider"></li>
            <li><a href="paciente_consulta.php">Consulta pacientes</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Médico
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
           <li><a href="paciente_consulta.php">Consulta pacientes</a></li>
            <li class="divider"></li>
            <li><a href="medico.php">Precrição</a></li>
           
          </ul>
        </li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Farmácia
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
           <li><a href="farmacia.php">Dispensação</a></li>
            <li class="divider"></li>
            <li><a href="farmacia_paciente.php">Precrição</a></li>
           
          </ul>
        </li>
  
        
    
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <button type="submit" class="btn btn-default">Pesquise</button>
      </form>
   
    </div> 
   
  </div>
   
</nav>

   </div>
  </div>