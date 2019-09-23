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
                    <img src="imagens/logo.png" id="logo" style="width: 30%; margin-bottom: 1%;">
                    <h3 class="title has-text-grey-dark">Crie a sua conta. É grátis!</h3>

                    <?php
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['senhas_diferentes']):  
                    ?>
                    <div class="notification is-info">
                        <p>As senhas não batem!</p>
                    </div>
                    <?php 
                    endif;
                    unset($_SESSION['senhas_diferentes']);
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['falta_info']):  
                    ?>
                    <div class="notification is-info">
                        <p>Existe um campo em branco! Todos eles devem ser devidamente preenchido, exceto o campo "foto de perfil".</p>
                    </div>
                    <?php 
                    endif;
                    unset($_SESSION['falta_info']);
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['cpf_existe']):  
                    ?>
                    <div class="notification is-info">
                        <p>O CPF escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php 
                    endif;
                    unset($_SESSION['cpf_existe']);
                    if ($_SESSION['email_existe']):
                     ?>
                    <div class="notification is-info">
                        <p>O E-mail escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php 
                	endif;
                	unset($_SESSION['email_existe']);
                	if ($_SESSION['apelido_existe']):
                     ?>
                    <div class="notification is-info">
                        <p>O Apelido escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php 
                	endif;
                	unset($_SESSION['apelido_existe']);
                    ?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Nome Completo</label>
                                    <input name="nome_completo" type="text" class="input is-large" placeholder="Exemplo: João da Silva">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Foto de Perfil</label>
                                    <input type="file" name="foto_usuario" class="input is-large"  accept="image/png, image/jpeg" multiple />
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                     <label id="labelCadastro">CPF</label>
                                    <input name="cpf" type="text" class="input is-large" placeholder="Apenas números">
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">E-mail</label>
                                    <input name="email" type="email" class="input is-large">
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                     <label id="labelCadastro">Apelido</label>
                                    <input name="apelido" type="text" class="input is-large" placeholder="Nome nas postagens">
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <form>
                                  <select class="input is-large" name="estado" style="color: rgb(74, 74, 74);">    
                                    <option>Estado residente</option>                             
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
                                    <button type="submit">Enviar</button>
                                </form>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                  <select class="input is-large" name="cidade" style="color: rgb(74, 74, 74);">  
                                   <option>Cidade residente</option>                               
                                    <?php 
                                        $sql = "select nome_cidade from cidades, estados where id_estado = fk_id_estado and nome_estado = '$_POST[estado]';";
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
                                  <select class="input is-large" name="bairro" style="color: rgb(74, 74, 74);">          
                                    <option>Bairro residente</option>                       
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
                                  <select class="input is-large" name="rua" style="color: rgb(74, 74, 74);">  
                                  <option>Rua residente</option>                                
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
                                     <label id="labelCadastro">Senha</label>
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                     <label id="labelCadastro">Confirmar senha</label>
                                    <input name="conf_senha" class="input is-large" type="password" placeholder="Confirmar Senha">
                                </div>
                            </div>

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                        </form>
                             <a href="index.php"><button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Voltar à tela inicial</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>