<!DOCTYPE html>
<html>
<head>
	<title>Boas Ofertas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<nav style="border: 2px solid black">
		<div class="row">
			<div class="col-1"></div>
			<div class="col-3">
				<img src="imagens/logo.jpg" id="logo">
			</div>
			<div class="col-4" style="margin-top: 3%">
				<form>
					<div class="input-group mb-4">
		  				<input type="search" class="form-control" style="padding: 8%" placeholder="Busque por um alimento, supermercado, etc..." aria-label="Recipient's username" aria-describedby="button-addon2">
		  				<div class="input-group-append">
		   				 	<button class="btn btn-outline-secondary" type="button" id="button-addon2" value="buscar">Buscar</button>
		  				</div>
					</div>
				</form>
			</div>			
			<div class="col-3">
				<form id="caixaLogin">     
					<div class="form-group">
                           <input type="submit" class="btnSubmit" id="botaoLogin" value="Login" />
                    </div>
                    <div class="form-group" style="margin-left: 3%">
                        <a href="#" class="ForgetPwd">Cadastrar-se</a>
                    </div>
                    <div class="form-group" style="margin-left: 3%">
                        <a href="#" class="ForgetPwd">Esqueceu sua senha?</a>
                    </div>
                </form>				
			</div>
		</div>
		<div class="row" id="menu">
			<div class="col-2" id="itemMenu"><a href="index.php"><h5>Home</h5></a></div>
			<div class="col-2" id="itemMenu"><a href="categorias.php"><h5>Categorias</h5></a></div>
			<div class="col-2" id="itemMenu"><a href="cadastrarProduto.php"><h5>Cadastrar Produto</h5></a></div>
			<div class="col-2" id="itemMenu"><a href="maisRecentes.php"><h5>Mais Recentes</h5></a></div>
			<div class="col-2" id="itemMenu"><a href="suporteTecnico.php"><h5>Suporte Técnico</h5></a></div>
			<div class="col-2" id="itemMenu"><a href="configDeConta"><h5>Sua conta</h5></a></div>
		</div>
	</nav>
</head>