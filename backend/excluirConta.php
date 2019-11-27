<?php
session_start();
require_once("../class/conexao.php");

if (isset($_POST['cpf'])) {
	$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
}

if (isset($_POST['senha'])) {
	$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
}


if (isset($_SESSION['usuario'])) {

	$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
	$resultado_usuario = mysqli_query($conexao, $result_usuario);

	while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

		if ($row_usuario['fk_id_tipo'] == 1 and isset($_POST['cpf_lib'])) {

			$sql = "DELETE FROM usuarios WHERE cpf = '$_POST[cpf_lib]';";

			if($conexao->query($sql) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}

		}else{

			$sql2 = "UPDATE produtos, curtidas SET curtida = curtida -1 WHERE id_produto = fk_id_prod_curt AND fk_cpf_curt = '$cpf';";

			if($conexao->query($sql2) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql3 = "UPDATE produtos, descurtidas SET descurtida = descurtida -1 WHERE id_produto = fk_id_prod_desc AND fk_cpf_desc = '$cpf';";

			if($conexao->query($sql3) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql4 = "DELETE FROM curtidas WHERE fk_id_prod_curt = (SELECT id_produto FROM produtos WHERE fk_cpf = '$cpf');";

			if($conexao->query($sql4) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql10 = "DELETE FROM descurtidas WHERE fk_id_prod_desc = (SELECT id_produto FROM produtos WHERE fk_cpf = '$cpf');";

			if($conexao->query($sql10) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql8 = "DELETE  FROM curtidas WHERE fk_cpf_curt = '$cpf';";

			if($conexao->query($sql8) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql9 = "DELETE  FROM descurtidas WHERE fk_cpf_desc = '$cpf';";

			if($conexao->query($sql9) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql5 = "DELETE  FROM descurtidas WHERE fk_id_prod_desc = (SELECT id_produto FROM produtos WHERE fk_cpf = '$cpf');";

			if($conexao->query($sql5) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql = "DELETE FROM produtos WHERE fk_cpf = '$cpf';";

			if($conexao->query($sql) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}


			$sql6 = "DELETE FROM suporte WHERE fk_cpf_sup = '$cpf';";

			if($conexao->query($sql6) === TRUE){
				$_SESSION['status_cadastro'] = true;
			}
			

			if ($row_usuario['fk_id_tipo'] == 1){

				$sql7 = "UPDATE usuarios SET fk_id_tipo = 3, apelido = '--' where cpf = '$cpf';";

				if($conexao->query($sql7) === TRUE) {
				}

			}else{

				$sql7 = "DELETE FROM usuarios WHERE cpf = '$cpf' and senha = '$senha';";

				if($conexao->query($sql7) === TRUE) {
					session_destroy();
				}
			}
		}
	}
}
?>
<script>
	location.href='../view/index.php';
	localStorage.clear();
</script> 
<?php exit('Redirecionando...'); ?>