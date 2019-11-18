<?php
session_start();

include("class/conexao.php");


$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

if (isset($_SESSION['usuario'])) {

	$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
	$resultado_usuario = mysqli_query($conexao, $result_usuario);

	while($row_usuario = mysqli_fetch_assoc($resultado_usuario))
	{

		$sql = "DELETE FROM produtos WHERE fk_cpf = '$cpf';";

		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		if ($row_usuario['fk_id_tipo'] == 3) {
			$sql2 = "DELETE FROM usuarios WHERE cpf = '$cpf';";
			if($conexao->query($sql2) === TRUE) {

			}
		}else{
			$sql2 = "DELETE FROM usuarios WHERE cpf = '$cpf' and senha = '$senha';";

			if($conexao->query($sql2) === TRUE) {
				session_destroy();
			}
		}
	}
}


$conexao->close();

header('Location: index.php');
exit;
?>