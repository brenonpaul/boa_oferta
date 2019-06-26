<?php
	require_once "cabecalho.php";
	require_once "class/conexao.php";
?>



	<div class="container">
		<h3 class="mt-5" style="text-align: center;">Cadastrar Produto</h3>

		<div class="caixaDeInputs" id="caixaDeInputsCadProd" style="border: 1px solid black">
			<div class="row col-7 ml-5">
				<div class="input-group mb-3 mt-5">
					<div class="input-group-prepend">
	    					<span class="input-group-text" id="inputGroupFileAddon01"><img src="#"></span>
	  				</div>
	  			<div class="custom-file">
	    			<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
	    			<label class="custom-file-label" for="inputGroupFile01" style="z-index: 0;">Adicionar Imagem</label>
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
  				<select class="form-control" id="exampleFormControlSelect1">		     						
		     			<?php 
		     				$sql = 'select nome_mercado from mercados;';
		     				$resultado = $mysqli->query($sql) OR trigger_error($mysqli->error, E_USER_ERROR);
		     				while($consulta = $resultado->fetch_object()){
		     			?>
		     			<option>
		     				<?php
		     					echo $consulta->nome_mercado;
		     				?>
		     			</option>
		     			<?php
		     				}
		     			?>
						</select>
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

</div>

</div>




<?php
	require_once "rodape.php";
?>
