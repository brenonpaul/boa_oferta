<?php
session_start();

include("class/conexao.php");

$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));


$sql = "DELETE FROM produtos WHERE fk_cpf = '$cpf';";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}



if($conexao->query($sql2) === TRUE) {
	session_destroy();
}

$conexao->close();

header('Location: index.php');
exit;
?>