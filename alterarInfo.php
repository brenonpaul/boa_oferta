<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("class/conexao.php");
if ($_GET['info'] <1 or $_GET['info'] >4) {
    header('Location: index.php');
}
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
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <img src="imagens/logo/logo.png" id="logo" style="width: 30%; margin-bottom: 1%;">

                    <?php
                    if ($_GET['info'] == 4){
                        echo "<h3 class='title has-text-grey-dark'>Alterar Senha</h3>";
                    }else{
                        echo "<h3 class='title has-text-grey-dark'>Alterar Informações</h3>";
                    }

                    $result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
                    $resultado_usuario = mysqli_query($conexao, $result_usuario);

                    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

                        error_reporting(0);
                        ini_set(“display_errors”, 0 );
                        if ($_SESSION['falta_info']):  
                            ?>

                        <div class="notification is-danger">
                            <p>Existe um campo em branco! Todos eles devem ser devidamente preenchidos, exceto o campo "foto de perfil".</p>
                        </div>

                    <?php 
                    endif;
                    unset($_SESSION['falta_info']);
                    if ($_SESSION['email_existe']):
                    ?>

                        <div class="notification is-danger">
                            <p>O E-mail escolhido já existe. Informe outro e tente novamente.</p>
                        </div>

                    <?php 
                    endif;
                    unset($_SESSION['email_existe']);
                    if ($_SESSION['apelido_existe']):
                    ?>

                        <div class="notification is-danger">
                            <p>O Apelido escolhido já existe. Informe outro e tente novamente.</p>
                        </div>

                    <?php 
                    endif;
                    unset($_SESSION['apelido_existe']);
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['senha_caracteres']):  
                    ?>

                        <div class="notification is-danger">
                            <p>A senha deve ter no minímo 4 caracteres.</p>
                        </div>

                    <?php 
                    endif;
                    unset($_SESSION['senha_caracteres']);
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['senhas_diferentes']):  
                    ?>

                        <div class="notification is-danger">
                            <p>As senhas não batem!.</p>
                        </div>

                    <?php 
                    endif;
                    unset($_SESSION['senhas_diferentes']);
                    ?>

                    <div class="box">
                        <form action="infoPessoal.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php
                    if($_GET['info'] == 1) {
                    ?>

                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Foto de Perfil</label>
                                    <input type="file" name="foto_usuario" class="input is-large"  accept="image/*" multiple />
                                </div>
                            </div>

                    <?php
                    }elseif($_GET['info'] == 2){
                    ?>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Nome Completo</label>
                                    <input name="nome_completo" type="text" class="input is-large" placeholder="Exemplo: João da Silva" value="<?php echo $row_usuario['nome_completo']; ?>">
                                </div>
                            </div>               
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">E-mail</label>
                                    <input name="email" type="email" class="input is-large" value="<?php echo $row_usuario['email']; ?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                  <label id="labelCadastro">Apelido</label>
                                    <input name="apelido" type="text" class="input is-large" placeholder="Nome nas postagens" value="<?php echo $row_usuario['apelido']; ?>">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Senha</label>
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>

                    <?php
                    }if ($_GET['info'] == 3){
                    ?>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Estado residente</label>
                                    <select name="estado" id="estado" class="input is-large" style="color: rgb(74, 74, 74);">  

                                    <?php
                                    $select = $con->prepare("SELECT * FROM estados ORDER BY nome_estado ASC");
                                    $select->execute();
                                    $fetchAll = $select->fetchAll();
                                    foreach($fetchAll as $estados) {
                                        echo '<option value="'.$estados['id_estado'].'">'.$estados['nome_estado'].'</option>';
                                    } 
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Cidade residente</label>
                                    <select name="cidade" id="cidade" class="input is-large" style="color: rgb(74, 74, 74);">
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Bairro residente</label>
                                    <select name="bairro" id="bairro" class="input is-large" style="color: rgb(74, 74, 74);">
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Rua residente</label>
                                    <select name="rua" id="rua" class="input is-large" style="color: rgb(74, 74, 74);">
                                    </select>
                                </div>
                            </div>  

                    <?php 
                    }if($_GET['info'] ==4){       
                    ?>

                            <div class="field">
                                <div class="control">
                                   <label id="labelCadastro">Antiga Senha</label>
                                   <input name="senha" class="input is-large" type="password" placeholder="Senha">
                               </div>
                           </div>
                           <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Nova Senha</label>
                                    <input name="novaSenha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Confirmar Nova Senha</label>
                                    <input name="confNovaSenha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                    <?php }
                    ?>

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Alterar</button>
                        </form>
                        <a href="seuPerfil.php">
                            <button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Voltar à tela de perfil</button>
                        </a>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<script>
    $("#estado").on("change",function(){
        var idEstado = $("#estado").val();
        $.ajax({
            url: 'configEnd.php',
            type: 'POST',
            data:{id_est:idEstado},
            beforeSend: function(){
                $("#cidade").html("Carregando...");
            },
            success: function(data){
                $("#cidade").html(data);
            },
            error: function(data){
                $("#cidade").html("Houve um erro ao carregar");
            }
        });
    });

    $("#cidade").on("change",function(){
        var idCidade = $("#cidade").val();
        $.ajax({
            url: 'configEnd.php',
            type: 'POST',
            data:{id_cid:idCidade},
            beforeSend: function(){
                $("#bairro").html("Carregando...");
            },
            success: function(data){
                $("#bairro").html(data);
            },
            error: function(data){
                $("#bairro").html("Houve um erro ao carregar");
            }
        });
    });

    $("#bairro").on("change",function(){
        var idBairro = $("#bairro").val();
        $.ajax({
            url: 'configEnd.php',
            type: 'POST',
            data:{id_bairro:idBairro},
            beforeSend: function(){
                $("#rua").html("Carregando...");
            },
            success: function(data){
                $("#rua").html(data);
            },
            error: function(data){
                $("#rua").html("Houve um erro ao carregar");
            }
        });
    });

    $("#rua").on("change",function(){
        var idRua = $("#rua").val();
        $.ajax({
            url: 'configEnd.php',
            type: 'POST',
            data:{id_rua:idRua}

        });
    });
</script>


