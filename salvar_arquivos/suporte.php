<?php
require_once("cabecalho.php");
?>

<div class="container">
	<div class="col-4 mt-5 row">
		<h2>Suporte</h2>
		<br>
		<p>Olá, esta página é destinada ao seu suporte, visamos por meio dela receber suas críticas, opiniões, bugs e até mesmo receber suas dúvidas, para assim respondermo e facilitarmos seu uso como usuário!</p>
	</div>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			<textarea id="textSuporte" placeholder="Digite aqui"></textarea>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-4"></div>
		<div class="col-4 mt-3">
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>	
</div>

<?php
require_once("rodape.php");
?>