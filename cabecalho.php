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
    <script src="js/jquery_3_3_1.js"></script>
    <script src="js/popper_1_14_7.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <nav class="navbar navbar-expand-lg navbar-dark row" style="background: #fe7e15;">
        <a class="navbar-brand ml-2" href="index.php" style="float: left; width: 15%;"><img src="imagens/logo/logo.png" class="w-75"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active ml-3">
                <a class="nav-link" href="index.php"><h5>Home</h5> <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item active ml-3">
                <a class="nav-link" href="categorias.php"><h5>Categorias</h5></a>
            </li>
            <li class="nav-item active ml-3">
                <a class="nav-link" href="cadastroProduto.php"><h5>Cadastrar Produto</h5></a>
            </li>
            <li class="nav-item active ml-3">
                <a class="nav-link" href="telaProdutos.php"><h5>Produtos</h5></a>
            </li>
            <li class="nav-item active ml-3">
                <a class="nav-link" href="suporte.php"><h5>Suporte Técnico</h5></a>
            </li>
            <li class="nav-item active ml-3">
                <a class="nav-link" href="seuPerfil.php"><h5>Seu Perfil</h5></a>
            </li>
        </ul>

<?php
            if(isset($_SESSION['usuario'])) {  
                ?>     
                <div id="caixaLogin" class="my-2 my-lg-0">
                    <a href="class/logout.php">
                       <button id="botaoLogin">Logout</button>
                   </a>
                   <?php 
                   $usuario = $_SESSION['usuario'];
                   $sql = "select nome_completo from usuarios where email = '$usuario' ;";
                   $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                   while($consulta = $resultado->fetch_object()){
                    ?>
                    <p style="color: black; text-align: center;">
                        Olá 
                        <?php
                        echo ($consulta->nome_completo);
                        ?>
                        
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
<div class="w-100 row d-flex justify-content-center mt-1">
    <form class="form-inline my-2 my-lg-0" action="busca.php" method="post">
      <input class="form-control" type="search" name="buscar" placeholder="Busque por um produto" aria-label="Pesquisar" style="border-radius: 5px 0px 0px 5px">
      <button class="btn my-2 my-sm-0" type="submit" id="buscar">Buscar</button>
  </form>
</div>
</head>
<body style="background: #f8f9fa">