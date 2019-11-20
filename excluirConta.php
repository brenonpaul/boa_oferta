<?php
session_start();
require_once("class/conexao.php");

$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

if (isset($_SESSION['usuario'])) {

	$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
	$resultado_usuario = mysqli_query($conexao, $result_usuario);

	while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

		$sql = "DELETE FROM produtos WHERE fk_cpf = '$cpf';";

		if($conexao->query($sql) === TRUE){
			$_SESSION['status_cadastro'] = true;
		}


		$sql2 = "UPDATE produtos, curtidas SET likes = likes -1 WHERE id_produto = fk_id_prod_curt AND fk_cpf_curt = '$cpf';";

		if($conexao->query($sql2) === TRUE){
			$_SESSION['status_cadastro'] = true;
		}


		$sql3 = "DELETE FROM curtidas WHERE fk_cpf_curt = '$cpf';";

		if($conexao->query($sql3) === TRUE){
			$_SESSION['status_cadastro'] = true;
		}


		if ($row_usuario['fk_id_tipo'] == 3){

			$sql4 = "DELETE FROM usuarios WHERE cpf = '$cpf';";
			if($conexao->query($sql4) === TRUE) {
			}

		}else{

			$sql4 = "DELETE FROM usuarios WHERE cpf = '$cpf' and senha = '$senha';";
			if($conexao->query($sql4) === TRUE) {
				session_destroy();
			}
		}
	}
}

$conexao->close();

header('Location: index.php');
exit;
?>