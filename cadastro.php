<?php
    session_start();
    require_once("class/conexao.php");
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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Crie sua conta</h3>
                    <?php
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['usuario_existe']):  
                    ?>
                    <div class="notification is-info">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php 
                    endif;
                    unset($_SESSION['usuario_existe']);
                     ?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome_completo" type="text" class="input is-large" placeholder="Nome e sobrenome" autofocus>
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <input name="cpf" type="text" class="input is-large" placeholder="CPF(apenas números)" autofocus>
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <input name="email" type="email" class="input is-large" placeholder="E-mail" autofocus>
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <input name="apelido" type="text" class="input is-large" placeholder="Apelido(como será chamado)" autofocus>
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                  <select class="input is-large" name="estado" style="color: #696969">                                  
                                    <?php 
                                        $sql = 'select nome_estado from estados;';
                                        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                        while($consulta = $resultado->fetch_object()){
                                    ?>
                                    <option>
                                        <?php
                                            echo utf8_encode($consulta->nome_estado);
                                        ?>
                                    </option>
                                    <?php
                                     }
                                       ?>
                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                  <select class="input is-large" name="cidade" style="color: #696969">                                  
                                    <?php 
                                        $sql = 'select nome_cidade from cidades;';
                                        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                        while($consulta = $resultado->fetch_object()){
                                    ?>
                                    <option>
                                        <?php
                                            echo utf8_encode($consulta->nome_cidade);
                                        ?>
                                    </option>
                                    <?php
                                     }
                                       ?>
                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                  <select class="input is-large" name="bairro" style="color: #696969">                                  
                                    <?php 
                                        $sql = 'select nome_bairro from bairros;';
                                        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                        while($consulta = $resultado->fetch_object()){
                                    ?>
                                    <option>
                                        <?php
                                            echo utf8_encode($consulta->nome_bairro);
                                        ?>
                                    </option>
                                    <?php
                                     }
                                       ?>
                                    </select>
                                </div>
                            </div>


                            <div class="field">
                                <div class="control">
                                  <select class="input is-large" name="rua" style="color: #696969">                                  
                                    <?php 
                                        $sql = 'select nome_rua from ruas;';
                                        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                        while($consulta = $resultado->fetch_object()){
                                    ?>
                                    <option>
                                        <?php
                                            echo utf8_encode($consulta->nome_rua);
                                        ?>
                                    </option>
                                    <?php
                                     }
                                       ?>
                                    </select>
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <input type="file" name="foto_usuario" class="input is-large"  accept="image/png, image/jpeg" placeholder="Foto de Perfil" multiple />
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                             <a href="telaLogin.php"><button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Logar-se</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>