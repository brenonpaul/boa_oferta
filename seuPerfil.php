<?php
require_once("cabecalho.php");
require_once("class/conexao.php");
session_start();
?>

<div class="container">
	<h2 class="mt-4 text-center mb-3">Seu Perfil</h2>

	<div class="row">
		<div class="col-3">
			<?php 
			$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
			$resultado_usuario = mysqli_query($conexao, $result_usuario);



			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>



				<img src="imagens/<?php echo $row_usuario['foto_usuario']?>" class="caixaPerfil" style="width: 260px">

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

					echo utf8_encode($consulta->nome_estado);

				}

				?>

			</h6>

			<h6 class="mt-4 mb-4"><strong>Cidade:</strong> <?php 
			
			$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
			$sql = "SELECT nome_cidade from  cidades, bairros, ruas, usuarios where id_cidade = fk_id_cidade and id_bairro = fk_id_bairro and id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' AND apelido = '$row_usuario[apelido]'";
			$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
			while($consulta = $resultado->fetch_object()){

				echo utf8_encode($consulta->nome_cidade);

			}

			?>

		</h6>

		<h6 class="mt-4 mb-4"><strong>Bairro:</strong> <?php 

		$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
		$sql = "SELECT nome_bairro from bairros, ruas, usuarios where id_bairro = fk_id_bairro and id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' AND apelido = '$row_usuario[apelido]'";
		$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
		while($consulta = $resultado->fetch_object()){

			echo utf8_encode($consulta->nome_bairro);

		}

		?>

	</h6>

	<h6 class="mt-4 mb-4"><strong>Sua rua:</strong> <?php 			
	$usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
	$sql = "SELECT nome_rua from ruas, usuarios WHERE id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' and apelido = '$row_usuario[apelido]'";
	$resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
	while($consulta = $resultado->fetch_object()){

		echo utf8_encode($consulta->nome_rua);

	}

	?>

</h6>

<?php
}	  
?>
</div>




</div>



<?php
	


?>







</div>

</div>

<?php
require_once("rodape.php");
	?>