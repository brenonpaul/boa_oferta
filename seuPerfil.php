<?php
require_once("cabecalho.php");
require_once("class/conexao.php");

?>

<div class="container">
	<h2 class="mt-4 text-center mb-3">Seu Perfil</h2>

	<div class="row">
		<div class="col-3 caixaPerfil">
			<?php 
			$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
			$resultado_usuario = mysqli_query($conexao, $result_usuario);



			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>



				<img src="imagens/<?php echo $row_usuario['foto_usuario']?>" style="width: 100%;">

			</div>
			<div class="col-1"></div>
			<div class="col-3 caixaPerfil">
				<h6 class="mt-4 mb-4"><strong>Apelido:</strong> <?php echo $row_usuario['apelido']; ?></h6>
				<h6 class="mt-4 mb-4"><strong>Nome:</strong> <?php echo $row_usuario['nome_completo']; ?></h6>
				<h6 class="mt-4 mb-4"><strong>CPF:</strong> <?php echo $row_usuario['cpf']; ?></h6>
				<h6 class="mt-4 mb-4"><strong>E-mail:</strong> <?php echo $row_usuario['email']; ?></h6>
			</div>
			<div class="col-1"></div>
			<div class="col-3 caixaPerfil">
				<h6 class="mt-4 mb-4"><strong>Estado:</strong> <?php 

				$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
				$sql = "SELECT nome_estado FROM estados, cidades, bairros, ruas, usuarios WHERE id_estado = fk_id_estado AND id_cidade = fk_id_bairro AND id_bairro = fk_id_bairro AND id_rua = fk_id_rua_user AND id_rua = '$row_usuario[fk_id_rua_user]' AND apelido = '$row_usuario[apelido]'";
				$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
				while($consulta = $resultado->fetch_object()){

					echo $consulta->nome_estado;

				}

				?>

			</h6>

			<h6 class="mt-4 mb-4"><strong>Cidade:</strong> <?php 
			
			$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
			$sql = "SELECT nome_cidade from  cidades, bairros, ruas, usuarios where id_cidade = fk_id_cidade and id_bairro = fk_id_bairro and id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' AND apelido = '$row_usuario[apelido]'";
			$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
			while($consulta = $resultado->fetch_object()){

				echo ($consulta->nome_cidade);

			}

			?>

		</h6>

		<h6 class="mt-4 mb-4"><strong>Bairro:</strong> <?php 

		$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
		$sql = "SELECT nome_bairro from bairros, ruas, usuarios where id_bairro = fk_id_bairro and id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' AND apelido = '$row_usuario[apelido]'";
		$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
		while($consulta = $resultado->fetch_object()){

			echo ($consulta->nome_bairro);

		}

		?>

	</h6>

	<h6 class="mt-4 mb-4"><strong>Sua rua:</strong> <?php 			
	$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
	$sql = "SELECT nome_rua from ruas, usuarios WHERE id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' and apelido = '$row_usuario[apelido]'";
	$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
	while($consulta = $resultado->fetch_object()){

		echo ($consulta->nome_rua);

	}

	?>

</h6>

<?php
}	  
?>
</div>
<div class="col-1">
	<button type="button" class="btn btn-danger ">Danger</button>
</div>



</div>



<?php

	$result_produto = "SELECT * from produtos, usuarios where cpf = fk_cpf and email = '$_SESSION[usuario]'  ORDER BY data_visu DESC";
	$resultado_produto = mysqli_query($conexao, $result_produto);


?>
<div class="row">
	<div class="col-11 mt-4" style="border: 1px solid #ccc;"></div>
</div>
<div class="row">	
		<?php
		while($row_produto = mysqli_fetch_assoc($resultado_produto)){
			

			echo ("<div class='col-3 recentes mt-4 rounded border border-secondary'>
				<div class='row'>");
				?>
				<img src="imagens/alimentos/<?php echo $row_produto['foto_produto']?>" class='rounded border-secondary' style="width: 100%; height: 180px">
				<?php
				echo ("</div>
					<div class='row pl-2' pr-2>");
					?>
					<h6><strong> Produto:</strong> <?php echo ($row_produto['nome_produto']); ?></h6>
					<?php	
					echo("</div>
						<div class='row pl-2' pr-2>");

						?>
						<h6><strong> Preço:</strong> R$<?php echo $row_produto['preco']; ?> Kg</h6>
						<?php
						echo("</div>
							<div class='row pl-2' pr-2>");
							?>
							<h6><strong> Mercado:</strong> 
								<?php
								$sql = "SELECT nome_mercado FROM mercados, produtos WHERE fk_id_mercado = id_mercado AND fk_id_mercado = $row_produto[fk_id_mercado];"; 
								
								$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
								$consulta = $resultado->fetch_object(); 

								echo ($consulta->nome_mercado);
								?>
							</h6>
							<?php
							
							echo("</div>
								<div class='row pl-2' pr-2>");
								?>
								
								
								<?php
								echo("</div>
									<div class='row pl-2' pr-2>");
									?>
									<h6><strong> Visto no dia:</strong> <?php echo $row_produto['data_visu']; ?></h6>
									<?php
									echo("</div>
										</div>
										<div class='col-1'></div>");
								}
								?>
							</div>







</div>

</div>

<?php
require_once("rodape.php");
	?>