<?php
require_once("cabecalho.php");
session_start();
?>

<div class="container">
	<h2 class="mt-4 text-center mb-3">Seu Perfil</h2>
	<div class="row">
	</div>
	<div class="row">
		<div class="col-4">
			<?php 
            	$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
            	$resultado_usuario = mysqli_query($conexao, $result_usuario);

            

            	while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
			?>

			
	
				<img src="imagens/<?php echo $row_usuario['foto_usuario']?>" class='imgProd rounded border-secondary'>
				<h6><strong>Apelido</strong> <?php echo $row_usuario['apelido']; ?></h6>
				<h6><strong>Nome:</strong> <?php echo $row_usuario['nome_completo']; ?></h6>
				<h6><strong>E-mail:</strong> <?php echo $row_usuario['email']; ?></h6>
				<h6><strong>Endereço:</strong> <?php echo $endereco[''] ?></h6>
			<?php
			}	  
            ?>
		</div>
	</div>
	
			
</div>

<?php
require_once("rodape.php");
?>