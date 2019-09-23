<?php
    session_start();
    require_once("class/conexao.php");
    if (empty($_SESSION['usuario'])) {
        require_once("cabecalho.php");
         echo "<h1 class='text-danger text-center mt-5' style='border: 2px dotted'>Para cadastrar um produto você deve estar logado!</h1>";
         ?>
         <div class="row justify-content-center mt-4">
         <a href="telaLogin.php"><button class="btn button-center btn-success">Logar-se</button></a>
     </div>
     <div class="row justify-content-center mt-1">
         <a href="cadastro.php"><button class="btn btn-primary" >Cadastrar-se</button></a>
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
                    <h3 class="title has-text-grey-dark">Cadastrando produto</h3>

                    <?php
                    error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['falta_info']):  
                    ?>
                    <div class="notification is-info">
                        <p>Preencha todos os campos!</p>
                    </div>
                    <?php 
                    endif;
                    unset($_SESSION['falta_info']);
                    ?>

                    <div class="box">
                        <form action="cadastrarProduto.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Foto de Produto</label>
                                    <input type="file" name="foto_produto" class="input is-large"  accept="image/png, image/jpeg" multiple />
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                     <label id="labelCadastro">Nome do Produto</label>
                                    <input name="nome_produto" type="text" class="input is-large" placeholder="Exemplo: Maça, Iogurte, Carne">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                     <label id="labelCadastro">Especificação do produto</label>
                                    <input name="marca_produto" type="text" class="input is-large" placeholder="Marca, tipo, etc.">
                                </div>
                            </div>

                             <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Preço do produto</label>
                                    <input name="preco" type="number" class="input is-large" placeholder="Com vírgula. Ex.: 5,00 ou 5,50">
                                </div>
                            </div>


                             <div class="field">
                                <div class="control">
                                    <label id="labelCadastro">Mercado onde viu o produto</label>    
                                    <select class="input is-large" name="mercado" style="color: rgb(74, 74, 74);">
                                    <option>Selecione o mercado</option>                             
                                    <?php 
                                        $sql = 'select nome_mercado from mercados;';
                                        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                        while($consulta = $resultado->fetch_object()){
                                    ?>
                                    <option>
                                        <?php
                                            echo utf8_encode($consulta->nome_mercado);
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
                                    <label id="labelCadastro">Categoria do produto</label>    
                                    <select class="input is-large" name="categoria" style="color: rgb(74, 74, 74);">
                                    <option>Selecione a categoria</option>                             
                                    <?php 
                                        $sql = 'select nome_categoria from categorias;';
                                        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                        while($consulta = $resultado->fetch_object()){
                                    ?>
                                    <option>
                                        <?php
                                            echo utf8_encode($consulta->nome_categoria);
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
                                     <label id="labelCadastro">Data que você viu</label>
                                    <input name="data_visu" class="input is-large" type="date" placeholder="Senha">
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
<?php } ?>