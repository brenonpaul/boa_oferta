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
                    <h3 class="title has-text-grey-dark">Alterar Informações do Produto</h3>

                    <?php
                    $result_produto = "SELECT id_produto, fk_cpf, fk_id_mercado ,fk_id_categoria, foto_produto, nome_produto, data_cadastro, data_visu, preco, likes, deslikes from produtos, usuarios where fk_cpf = cpf and email = '$_SESSION[usuario]' and id_produto = $_GET[id]";  
                    $resultado_produto = mysqli_query($conexao, $result_produto);
                    while($row_produto = mysqli_fetch_assoc($resultado_produto)){
                        ?>

                        <div class="box">
                            <form action="infoProduto.php?id=<?php echo($_GET[id]) ?>" method="POST">
                                <div class="field">
                                    <div class="control">
                                        <label id="labelCadastro">Foto do Produto</label>
                                        <input type="file" name="foto_produto" class="input is-large"  accept="image/png, image/jpeg" multiple />
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label id="labelCadastro">Nome do Produto</label>
                                        <input name="nome_produto" type="text" class="input is-large" value="<?php echo $row_produto['nome_produto']; ?>">
                                    </div>
                                </div>             
                                <div class="field">
                                    <div class="control">
                                        <label id="labelCadastro">Preço</label>
                                        <input name="preco" type="text" type="number" class="input is-large" value="<?php echo $row_produto['preco']; ?>">
                                    </div>
                                </div>                           
                                <div class="field">
                                    <div class="control">
                                        <label id="labelCadastro">Mercado</label>    
                                        <select class="input is-large" name="mercado" style="color: rgb(74, 74, 74);">
                                            <?php
                                            $sql = "SELECT nome_mercado FROM mercados, produtos WHERE fk_id_mercado = id_mercado AND fk_id_mercado = $row_produto[fk_id_mercado];"; 

                                            $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                            $consulta = $resultado->fetch_object(); 

                                            echo '<option value="'.$row_produto['fk_id_mercado'].'">'.$consulta->nome_mercado.'</option>';
                                            $select = $con->prepare("SELECT * FROM mercados ORDER BY nome_mercado ASC");
                                            $select->execute();
                                            $fetchAll = $select->fetchAll();
                                            foreach($fetchAll as $mercados) {
                                                echo '<option value="'.$mercados['id_mercado'].'">'.$mercados['nome_mercado'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label id="labelCadastro">Categoria</label>    
                                        <select class="input is-large" name="categoria" style="color: rgb(74, 74, 74);">
                                            <?php
                                            $sql = "SELECT nome_categoria FROM categorias, produtos WHERE fk_id_categoria = id_categoria AND fk_id_categoria = $row_produto[fk_id_categoria];"; 

                                            $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                                            $consulta = $resultado->fetch_object(); 

                                            echo '<option value="'.$row_produto['fk_id_categoria'].'">'.$consulta->nome_categoria.'</option>';
                                            $select = $con->prepare("SELECT * FROM categorias ORDER BY nome_categoria ASC");
                                            $select->execute();
                                            $fetchAll = $select->fetchAll();
                                            foreach($fetchAll as $categorias) {
                                                echo '<option value="'.$categorias['id_categoria'].'">'.$categorias['nome_categoria'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label id="labelCadastro">Data que você viu</label>
                                        <input name="data_visu" class="input is-large" type="text" value="<?php echo $row_produto['data_visu']; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="button is-block is-link is-large is-fullwidth">Alterar</button>
                            </form>
                            <a href="seuPerfil.php"><button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Voltar à tela de perfil</button></a>
                            <?php
                        }
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
            url: 'configEnd_alt.php',
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
            url: 'configEnd_alt.php',
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
            url: 'configEnd_alt.php',
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
            url: 'configEnd_alt.php',
            type: 'POST',
            data:{id_rua:idRua}

        });
    });
</script>


