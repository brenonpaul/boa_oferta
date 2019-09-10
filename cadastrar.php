<?php
session_start();
include("class/conexao.php");

$nome_completo = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$apelido = mysqli_real_escape_string($conexao, trim($_POST['apelido']));
$foto_usuario = mysqli_real_escape_string($conexao, trim($_POST['foto_usuario']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));

$sql = "select count(*) as total from usuarios where cpf = '$cpf' or email = '$email' or apelido = '$apelido'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

//$sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";
$sql = "insert into usuarios(nome_completo, foto_usuario, apelido, email, cpf, senha, fk_id_est_user) values ('$nome_completo', '$foto_usuario', '$apelido', '$email', $cpf, '$senha', (select id_estado from estados where nome_estado = '$estado'));";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: telaLogin.php');
exit;
?>