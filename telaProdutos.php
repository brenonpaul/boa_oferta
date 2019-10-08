<?php
require_once "cabecalho.php";
require_once "class/conexao.php";
?>

<div class="container mt-4">
	<?php

	if (isset($_GET['cat'])) {
		$result_produto = "SELECT * FROM produtos, categorias where fk_id_categoria = id_categoria and id_categoria = $_GET[cat] ORDER BY data_visu DESC";
		$sql = "select count(*) as total from produtos,categorias where fk_id_categoria = id_categoria and id_categoria = $_GET[cat]";
		$result = mysqli_query($conexao, $sql);
		$row_existe = mysqli_fetch_assoc($result);

		if($row_existe['total'] == 0) {
			echo "<h4 class='text-center bg-danger text-white mt-5 rounded p-3'>
			Ainda não existe nenhum produto nessa categoria. Que tal ser o primeiro a cadastrar?
			</h4>";
			echo "<div class='row justify-content-center mt-3'>
			<a href='cadastroProduto.php'><button class='btn button-center btn-success'>Cadastrar Produto</button></a>
			</div>";
			exit;
		}
	}else{
		$result_produto = "SELECT * FROM produtos ORDER BY data_visu DESC";
		
	}

	$resultado_produto = mysqli_query($conexao, $result_produto);


	
	?>
	<div class="row">	
		<?php
		while($row_produto = mysqli_fetch_assoc($resultado_produto)){
			

			echo ("<div class='col-2 recentes mt-4 rounded border border-secondary'>
				<div class='row'>");
				?>
				<img src="imagens/alimentos/<?php echo $row_produto['foto_produto']?>" class='imgProd rounded border-secondary'>
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
								<h6><strong> Postado por:</strong> 
									<?php
									$sql = "SELECT apelido FROM usuarios, produtos WHERE fk_cpf = cpf and fk_cpf = '$row_produto[fk_cpf]';"; 
									
									$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
									$consulta = $resultado->fetch_object(); 

									echo ($consulta->apelido);
									?>
								</h6>
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


						<?php

						require_once "rodape.php";
						?>