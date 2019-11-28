<?php
session_start();
require_once("../class/conexao.php");

if(empty($_SESSION['usuario'])){
  require_once("cabecalho.php");
?>

  <h2 class="text-danger text-center mt-5">Para cadastrar um produto você deve estar logado!</h2> 
  <div class="row justify-content-center mt-4">
    <a href="telaLogin.php"><button class="btn button-center btn-succes" style="background-color: #a52a2a; color: white;">Logar-se</button></a>
  </div>
  <div class="row justify-content-center mt-1">
    <a href="cadastro.php"><button class="btn" >Cadastrar-se</button></a>
  </div>
<?php
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastre-se</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="../css/bulma.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body> 
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <img src="../imagens/logo/logo.png" id="logo" style="width: 30%; margin-bottom: 1%;">
          <h3 class="title has-text-grey-dark">Cadastrando produto</h3>

          <?php
          error_reporting(0);
          ini_set(“display_errors”, 0 );
          if ($_SESSION['falta_info']):  
          ?>

          <div class="notification is-danger">
            <p>Preencha todos os campos!</p>
          </div>

          <?php 
          endif;
          unset($_SESSION['falta_info']);
          ?>

          <div class="box">
            <form action="../backend/cadastrarProduto.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Foto do Produto</label>
                  <input type="file" name="foto_produto" class="input is-large"  accept="image/*" multiple />
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">O que é o produto?</label>
                  <input name="nome_produto" type="text" class="input is-large" placeholder="Específique a marca e/ou modelo">
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Preço</label>
                  <input name="preco" type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="input is-large" placeholder="Com vírgula. Ex.: 5,00">
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Unidade de medida do preço (opcional)</label>
                  <input name="unidade" type="text" class="input is-large" placeholder="Exemplo: Kg">
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Mercado onde viu o produto</label>    
                  <select class="input is-large" name="mercado" style="color: rgb(74, 74, 74);">
                    <option>Selecione o mercado</option> 

                  <?php 
                  $sql = 'SELECT nome_mercado FROM mercados ORDER BY nome_mercado;';
                  $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                  while($consulta = $resultado->fetch_object()){

                    echo ("<option>".$consulta->nome_mercado."</option>");     
                  }
                  ?>

                  </select>
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Categoria do produto</label>    
                  <select class="input is-large" name="categoria" style="color: rgb(74, 74, 74);">
                    <option>Selecione a categoria</option>                             
                  <?php 
                  $sql = 'select nome_categoria from categorias;';
                  $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                  while($consulta = $resultado->fetch_object()){
                  
                    echo ("<option>".$consulta->nome_categoria."</option>");   
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Data que você viu o produto</label>
                  <input name="data_visu" class="input is-large" type="date">
                </div>
              </div>
              <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
            </form>
            <a href="index.php">
              <button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Voltar à tela inicial</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<?php } 
?>