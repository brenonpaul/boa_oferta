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
							<img src="imagens/categorias/<?php echo $row_produto['foto_categoria']?>" class='imgProd rounded border-secondary'>
							<?php
							echo ("</div>
							<div class='row pl-2' pr-2>");
							?>
							<h6><strong> <?php echo utf8_encode($row_produto['nome_categoria']); ?></strong></h6>
							<?php	
							echo("</div>
							<div class='row pl-2' pr-2>");

							
							
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
