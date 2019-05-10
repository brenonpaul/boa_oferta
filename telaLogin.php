             <?php
if(!isset($_SESSION))
    session_start();

//Login de Usários
if(isset($_POST['login'])){

  include('class/conexao.php');
  
  $erro = array();

  // Captação de dados
    $senha = $_POST['password'];
    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);

    // Validação de dados
    if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
        $erro[] = "Preencha seu <strong>e-mail</strong> corretamente.";

    if(strlen($senha) < 6 || strlen($senha) > 16)
        $erro[] = "Preencha sua <strong>senha</strong> corretamente.";

    if(count($erro) == 0){

        $sql = "SELECT senha as senha, cpf as valor 
        FROM usuario 
        WHERE email = '$_SESSION[email]'";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();
        
        if($que->num_rows == 0)
            $erro[] = "Nenhum usuário possui o <strong>e-mail</strong> informado.";

        elseif(strcmp($dado[senha], ($senha)) == 0){
            $_SESSION['UsuarioLogado'] = $dado[valor];
        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
            echo "<script>location.href='teste.php';</script>";
            exit();
            unset($_SESSION['email']);
        }

    }


}
?>

              <div id="id01" class="modal"> <?php 
                        if(isset($erro)) 
                            if(count($erro) > 0){ ?>
                                <div class="alert alert-danger">
                                    <?php foreach($erro as $msg) echo "$msg <br>"; ?>
                                </div>
                            <?php 
                            }
                            ?>
                <form class="modal-content animate" action="teste.php">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>         
                  <div class="containerLogin">
                    <h3 style="text-align: center; margin-bottom: 10%;">Olá, seja bem vindo!</h3>
                    <input type="text" placeholder="Seu e-mail" required class="form-control ml-3" id="inputsLogin">
                    <input type="password" placeholder="Senha" required class="form-control ml-3" id="inputsLogin">
                    <button type="submit" class="btn btn-primary ml-3 mt-4 mb-2" id="botaoEntrarLogin">Entrar</button>
                    <label>
                      <input type="checkbox" checked="checked" name="remember" class="ml-3"> lembrar senha
                    </label>
                     
                    <span  style="float: right;"><a href="#">Esqueceu sua Senha?</a></span>
                
                  </div>
                 
                </form>
              </div>