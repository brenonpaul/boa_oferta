<?php
require_once("cabecalho.php");
if (empty($_SESSION)) {
	session_start();
}
?>

<div class="container">
	<div class="col-4 mt-5 row">
		<h2>Suporte</h2>
		<br>
		<p>Olá, esta página é destinada ao seu suporte, visamos por meio dela receber suas críticas, opiniões, bugs e até mesmo receber suas dúvidas, para assim respondermos e facilitarmos o seu uso.</p>
	</div>

	<?php
		error_reporting(0);
                    ini_set(“display_errors”, 0 );
                    if ($_SESSION['suporte_cadastrado']):  
                        ?>
                        <div class="alert alert-primary" role="alert">
                            <p class="text-center">Seu problema foi informado à nossa equipe!</p>
                        </div>
                        <?php 
                    endif;
                    unset($_SESSION['suporte_cadastrado']);
	?>
	<form action="cadastrarSuporte.php" method="post">
		<div class="row">
			<div class="col-4"></div>
			<div class="col-4">
				<textarea id="textSuporte" class="rounded" name="textoSuporte" placeholder="Digite aqui"></textarea>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-4"></div>
			<div class="col-4 mt-3">
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</div>	
	</form>
</div>

<?php
require_once("rodape.php");
?>