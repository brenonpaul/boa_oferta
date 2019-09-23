<?php
	require_once "cabecalho.php";
?>

<div class="container" style="margin-top: 3%">
	<div class="row">	
		<?php
			$cont= 0;
			while ($cont <3) {
				$cont++;
				echo ('<div class="col recentes">
							<div class="row">
								<img src="imagens/pera.jpg" class="imgRecentes">
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Produto: Pera</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Preço: R$5,00/kilo</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Mercado: BIG</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Postado por: Girlberto</h6>
							</div>
					</div>
					<div class="col-1"></div>');
				if ($cont ===3) {	
					echo ('<div class="col recentes">
							<div class="row">
								<img src="imagens/pera.jpg" class="imgRecentes">
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Produto: Pera</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Preço: R$5,00/kilo</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Mercado: BIG</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Postado por: Girlberto</h6>
							</div>
						</div>');
				}
			}		?>			
	</div>		
</div>
	</div>
<div class="container" style="margin-top: 6%; margin-bottom: 10%;">
	<div class="row">
		<?php
			$cont= 0;
			while ($cont <3) {
				$cont++;
				echo ('<div class="col recentes">
							<div class="row">
								<img src="imagens/pera.jpg" class="imgRecentes">
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Produto: Pera</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Preço: R$5,00/kilo</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Mercado: BIG</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Postado por: Girlberto</h6>
							</div>
					</div>
					<div class="col-1"></div>');
				if ($cont ===3) {	
					echo ('<div class="col recentes">
							<div class="row">
								<img src="imagens/pera.jpg" class="imgRecentes">
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Produto: Pera</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Preço: R$5,00/kilo</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Mercado: BIG</h6>
							</div>
							<div class="row textoMaisRecentes">
								<h6>- Postado por: Girlberto</h6>
							</div>
						</div>');
				}
			}		?>
	</div>
</div>	

<?php
	require_once "rodape.php";
?>