<?php
	require_once "cabecalho.php";
	require_once "class/conexao.php";
?>

<div class="container mt-4">
	<div class="row">	
		<?php
			$result_produto = "SELECT * FROM categorias ORDER BY nome_categoria ASC";
			$resultado_produto = mysqli_query($conexao, $result_produto);

			while($row_produto = mysqli_fetch_assoc($resultado_produto)){
				

				echo ("<div class='col-2 recentes mt-4 rounded border border-secondary'>
							<div class='row'>");
							?>
							<img src="imagens/categorias/<?php echo $row_produto['foto_produto']?>" class='imgProd rounded border-secondary'>
							<?php
							echo ("</div>
							<div class='row pl-2' pr-2>");
							?>
							<h6><strong> Produto:</strong> <?php echo utf8_encode($row_produto['nome_produto']); ?></h6>
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

                        			echo utf8_encode($consulta->nome_mercado);
								?>
							</h6>
							<?php
								
							echo("</div>
							<div class='row pl-2' pr-2>");
							?>
								<h6><strong> Postado por:</strong> 
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
