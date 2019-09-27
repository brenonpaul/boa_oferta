<?php
require_once("class/conexao.php");
require_once "cabecalho.php";
?>

<div class="container">
<?php
	//criar conexão
	$buscar = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
		if($buscar){
			$buscar = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
			$result_produto = "SELECT * FROM produtos WHERE nome_produto LIKE '%$buscar%'";
			$resultado_produto = mysqli_query($conexao, $result_produto);

			$sql = "select count(*) as total from produtos where nome_produto LIKE '%$buscar%'";
			$result = mysqli_query($conexao, $sql);
			$row_existe = mysqli_fetch_assoc($result);

			if($row_existe['total'] == 0) {
				echo "<h4 class='text-center bg-danger text-white mt-5 rounded p-3'>
				Ainda não existe nenhum produto com nome semelhante a esse. Que tal ser o primeiro?
				</h4>";
				echo "<div class='row justify-content-center mt-3'>
				<a href='cadastroProduto.php'><button class='btn button-center btn-success'>Cadastrar Produto</button></a>
     			</div>";
				exit;
			}

			?>

		<div class="row pl-5">
			<?php
			while($row_produto = mysqli_fetch_assoc($resultado_produto)){
				

				echo ("<div class='col-2 recentes mt-4 rounded border border-secondary'>
							<div class='row'>");
							?>
							<img src="imagens/<?php echo $row_produto['foto_produto']?>" class='imgRecentes'>
							<?php
							echo ("</div>
							<div class='row pl-2' pr-2>");
							?>
							<h6><strong>- Produto:</strong> <?php echo utf8_encode($row_produto['nome_produto']); ?></h6>
							<?php	
							echo("</div>
							<div class='row pl-2' pr-2>");

							?>
								<h6><strong>- Preço:</strong> R$<?php echo $row_produto['preco']; ?> Kg</h6>
							<?php
							echo("</div>
							<div class='row pl-2' pr-2>");
							?>
							<h6><strong>- Mercado:</strong> 
								<?php
									$sql = "SELECT nome_mercado FROM mercados, produtos WHERE fk_id_mercado = id_mercado AND fk_id_mercado = $row_produto[fk_id_mercado];"; 
									
                   					$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                 					$consulta = $resultado->fetch_object(); 

                        			echo utf8_encode($consulta->nome_mercado);
								?>
							</h6>
							<?php
								
							echo("</div>
							<div class='row pl-2' pr-2>");
							?>
								<h6><strong>- Postado por:</strong> 
									<?php
										$sql = "SELECT apelido FROM usuarios, produtos WHERE fk_cpf = cpf and fk_cpf = $row_produto[fk_cpf];"; 
									
                   					$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                 					$consulta = $resultado->fetch_object(); 

                        			echo utf8_encode($consulta->apelido);
									?>
								</h6>
								<?php
							echo("</div>
							<div class='row pl-2' pr-2>");
							?>
								<h6><strong>- Visto no dia:</strong> <?php echo $row_produto['data_cadastro']; ?></h6>
							<?php
						echo("</div>
							</div>
					<div class='col-1'></div>");
			}
		}
?>
</div>
</div>