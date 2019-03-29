<?php
	require_once "cabecalho.php";
?>

	<div class="container">
		<h3 class="mt-5" style="text-align: center; margin-bottom: 2%;">Entrar</h3>		
		<div class="caixaDeInputs">
			<div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-2" style="border: 2px solid  ; border-radius: 5px;">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">Usuário:</span>
		  				</div>
		  				<input type="text" class="form-control">
					</div>
				</div>
				
				
				
	
				<div class="row col-7 ml-5">
					<div class="input-group mb-3"  style="border: 2px solid ; border-radius: 5px;">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">Senha:</span>
		  				</div>
		  				<input type="password" class="form-control">
					</div>
				</div>
				<div class="row col-5 ml-5">		
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</div>	
		</div>
 	</div>


<?php
	require_once "rodape.php";
?>