<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once("class/conexao.php");
if (isset($_SESSION['usuario'])) {

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastre-se</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/bulma.min.css" />
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <script type="text/javascript" src="js/jquery_3_3_1.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</head>
<body> 

<?php
  if (isset($_SESSION['usuario'])){
    
  $result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
  $resultado_usuario = mysqli_query($conexao, $result_usuario);

  while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
?>

  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <img src="imagens/logo/logo.png" id="logo" style="width: 30%; margin-bottom: 1%;">
          <h3 class="title has-text-grey-dark">Excluindo conta</h3>
          <div class="box">
            <form action="excluirConta.php" method="POST">

            <?php 
            if ($row_usuario['fk_id_tipo'] == 1) { 
            if (isset($_GET['ativar']) and $_GET['ativar'] == 1) {
            ?>
            <div class="field">
                <div class="control">
                  <label id="labelCadastro">CPF</label>
                  <input name="cpf_lib" id="cpf" type="text" class="input is-large" placeholder="Apenas números" value="<?php echo $_GET['cpf'] ?>">
                </div>
              </div>

            <?php 
              }else{ 
            ?>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">CPF</label>
                  <input name="cpf" id="cpf" type="text" class="input is-large" placeholder="Apenas números" value="<?php echo $_GET['cpf'] ?>">
                </div>
              </div>
              <?php }}else{
              ?>
              <div class="field">
                <div class="control">
                  <label id="labelCadastro">CPF</label>
                  <input name="cpf" id="cpf" type="text" class="input is-large" placeholder="Apenas números">
                </div>
              </div>

              <?php }
              ?>

              <script>
                $(document).ready(function () { 
                  var $campoCpf = $("#cpf");
                });
              </script>
              <script>
                $(document).ready(function () { 
                  var $campoCpf = $("#cpf");
                  $campoCpf.mask('000.000.000-00', {reverse: true});
                });
              </script>

              <?php 
              if ($row_usuario['fk_id_tipo'] != 1){
              ?>

              <div class="field">
                <div class="control">
                  <label id="labelCadastro">Senha</label>
                  <input name="senha" type="password" class="input is-large" placeholder="Sua senha">
                </div>
              </div>

              <?php }
              ?>

              <button type="submit" class="button is-block is-danger is-large is-fullwidth">Excluir</button>
            </form>
            <a href="index.php">
              <button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Voltar à tela inicial</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php  
    }
  } 
?>
</body>
</html>
<?php
}else{
  header('Location: index.php');

}
?>