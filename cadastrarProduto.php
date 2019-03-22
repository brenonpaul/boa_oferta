<?php
	require_once "cabecalho.php";
?>



	<div class="container">
		<h3 class="mt-5" style="text-align: center;">Cadastrar Produto</h3>
		<div class="row col-7 ml-5">
			<div class="input-group mb-3 mt-5">
				<div class="input-group-prepend">
    					<span class="input-group-text" id="inputGroupFileAddon01"><img src="#"></span>
  				</div>
  			<div class="custom-file">
    			<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    			<label class="custom-file-label" for="inputGroupFile01">Clique aqui para selecionar a imagem do produto</label>
  			</div>
			</div>
		</div>
		<div class="row col-7 ml-5">
			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroup-sizing-default">Nome do Produto:</span>
  				</div>
  				<input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
			</div>
		</div>
		<div class="row col-7 ml-5">
			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroup-sizing-default">Preço do Produto:</span>
  				</div>
  				<input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
			</div>
		</div>
		<div class="row col-7 ml-5">
			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroup-sizing-default">Mercado:</span>
  				</div>
  				<input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
			</div>
		</div>
		<div class="row col-5 ml-5">
			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroup-sizing-default">Data de vizualização do preço:</span>
  				</div>
  				<input type="date" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	</div>




<?php
	require_once "rodape.php";
?>
