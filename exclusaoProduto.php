
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
                    <h3 class="title has-text-grey-dark">Excluindo Produto</h3>

                    <div class="box">
                        <form action="excluirProduto.php?id=<?php echo($_GET[id]) ?>" method="POST">
                    <div class="field">
                        <div class="control">
                           <label id="labelCadastro">Senha</label>
                           <input name="senha" type="password" class="input is-large" placeholder="Sua senha">
                       </div>
                   </div>
                   <button type="submit" class="button is-block is-danger is-large is-fullwidth">Excluir</button>
               </form>
               <a href="index.php"><button class="button is-block is-link is-fullwidth" style="margin-top: 4%; background-color: #28a745;">Voltar à tela inicial</button></a>
           </div>
       </div>
   </div>
</div>
</section>
</body>

</html>
