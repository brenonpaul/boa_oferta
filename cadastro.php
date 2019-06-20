<?php
require_once "cabecalho.php";
require_once "class/conexao.php";
?>
	<div class="container">
		<h3 class="mt-5" style="text-align: center; margin-bottom: 2%;">Criar Conta</h3>		
		<div class="caixaDeInputs">
			<div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">Nome de Usuário:</span>
		  				</div>
		  				<input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
					</div>
				</div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">E-mail:</span>
		  				</div>
		  				<input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
					</div>
				</div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">CPF:</span>
		  				</div>
		  				<input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
					</div>
				</div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">Estado:</span>
		  				</div>
		  				<select class="form-control" id="exampleFormControlSelect1">		     						
		     			<?php 
		     				$sql = 'select nome_estado from estados;';
		     				$resultado = $mysqli->query($sql) OR trigger_error($mysqli->error, E_USER_ERROR);
		     				while($consulta = $resultado->fetch_object()){
		     			?>
		     			<option>
		     				<?php
		     					echo $consulta->nome_estado;
		     				?>
		     			</option>
		     			<?php
		     				}
		     			?>
						</select>
					</div>
				</div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">Escolher Senha:</span>
		  				</div>
		  				<input type="password" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
					</div>
				</div>
				<div class="row col-7 ml-5">
					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="inputGroup-sizing-default">Confirmar Senha:</span>
		  				</div>
		  				<input type="password" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-default">
					</div>
				</div>
				<div class="row col-5 ml-5">		
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</div>	
		</div>
 	</div>

<?php
 	require_once("rodape.php");

?>