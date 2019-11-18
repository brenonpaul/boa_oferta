  <?php

  require_once("class/conexao.php");
  if(!isset($_SESSION))
    session_start();
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Boa Oferta</title>
    <meta charset="utf-8">
    <!-- os 3 scrips abaixo são necessários por conta do carousel da página index -->
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/jquery_3_3_1.js"></script>
    <script src="js/popper_1_14_7.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
  </head>
  <body style="background: white;">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark" style="background: #fe7e15;">
        <a class="navbar-brand" href="index.php" style="float: left; width: 15%;"><img src="imagens/logo/logo.png" class="w-75"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active ml-3">
              <a class="nav-link" href="index.php" style="font-size: 125%;">Home <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="categorias.php" style="font-size: 125%;">Categorias</a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="cadastroProduto.php" style="font-size: 125%;">Cadastrar Produto</a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="suporte.php" style="font-size: 125%;">Suporte Técnico</a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="sobre.php" style="font-size: 125%;">Sobre</a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="seuPerfil.php" style="font-size: 125%;">Seu Perfil</a>
            </li>
          </ul>

          <?php
          if(isset($_SESSION['usuario'])) { 

           $sql = "select nome_completo, apelido from usuarios where email = '$_SESSION[usuario]' ;";
           $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
           if($consulta = $resultado->fetch_object()){
            ?>
            <p style="color: black; text-align: center;">
              <?php
              echo ($consulta->nome_completo);
              ?>,
              <a href="class/logout.php" style="color: blue;"> sair</a>
            </p>
            <?php
          }
          ?>
          <?php
        }else{
          ?>     
          <div id="caixaLogin" class="my-2 my-lg-0">
            <a href="telaLogin.php">
              <button onclick="document.getElementById('id01').style.display='block'" id="botaoLogin">Login</button>    
            </a>

            <div class="row d-flex justify-content-center">
              <a href="cadastro.php" class="ForgetPwd text-body">Cadastrar-se</a>
            </div>
          <?php    } ?>
        </div>      
      </div>
    </nav>
  </header>
  <div class="w-100 row d-flex justify-content-center mt-1">
    <form class="form-inline my-2 my-lg-0" action="busca.php" method="post">
      <input class="form-control" type="search" name="buscar" placeholder="Busque por um produto" aria-label="Pesquisar" style="border-radius: 5px 0px 0px 5px">
      <button class="btn my-2 my-sm-0" type="submit" id="buscar">Buscar</button>
    </form>
  </div>
  
