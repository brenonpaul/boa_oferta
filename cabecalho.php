<!DOCTYPE html>
<html>
<head>
    <title>Boas Ofertas</title>
    <meta charset="utf-8">
    <!-- os 3 scrips abaixo são necessários por conta do carousel da página index -->
    <script src="js/jquery_3_3_1.js"></script>
    <script src="js/popper_1_14_7.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <nav style="border: 2px solid black; background: #fd7e14;">
        <div class="row" style="width: 100%;">
            <div class="col-1"></div>
            <div class="col-3">
                <img src="imagens/logo.png" id="logo">
            </div>
            <div class="col-4 mt-5">
                <form>
                    <div class="input-group mb-4">
                        <input type="search" class="form-control" style="padding: 8%; border: 2px solid black;"
                               placeholder="Busque por um alimento, produto, etc..." aria-label="Recipient's username"
                               aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="buscar" type="button" id="button-addon2"
                                    value="buscar">Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3">
                <form id="caixaLogin" >
                    <div class="form-group">
                        <a href="telaLogin.php">
                            <input type="button" class="btnSubmit" id="botaoLogin" value="Login"/>
                        </a>
                    </div>
                    <div class="form-group ml-2">
                        <a href="cadastro.php" class="ForgetPwd" style="color: black">Cadastrar-se</a>
                    </div>
                    <div class="form-group ml-2">
                        <a href="#" class="ForgetPwd" style="color: black">Esqueceu sua senha?</a>
                    </div>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row" id="menu">
            <a href="index.php" class="col-2" id="itemMenu"><h5>Home</h5></a>
            <a class="nav-link dropdown-toggle col-2" id="itemMenu" data-toggle="dropdown" href="categorias.php"
               role="button" aria-haspopup="true" aria-expanded="false" style="padding-bottom: 0%;"><h5>Categorias</h5></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
            <a href="cadastrarProduto.php" class="col-2" id="itemMenu"><h5>Cadastrar Produto</h5></a>
            <a href="maisRecentes.php" class="col-2" id="itemMenu"><h5>Mais Recentes</h5></a>
            <a href="suporteTecnico.php" class="col-2" id="itemMenu"><h5>Suporte Técnico</h5></a>
            <a href="configDeConta" class="col-2" id="itemMenu"><h5>Seu Perfil</h5></a>
        </div>
    </nav>
</head>
<body style="background: #DCDCDC">