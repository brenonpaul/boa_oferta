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
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));

$sql = "select count(*) as total from usuarios where cpf = '$cpf'";
$result = mysqli_query($conexao, $sql);
$row_cpf = mysqli_fetch_assoc($result);

if($row_cpf['total'] == 1) {
	$_SESSION['cpf_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "select count(*) as total from usuarios where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row_email = mysqli_fetch_assoc($result);

if($row_email['total'] == 1) {
	$_SESSION['email_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "select count(*) as total from usuarios where apelido = '$apelido'";
$result = mysqli_query($conexao, $sql);
$row_apelido = mysqli_fetch_assoc($result);

if($row_apelido['total'] == 1) {
	$_SESSION['apelido_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "insert into usuarios(nome_completo, foto_usuario, apelido, email, cpf, senha, fk_id_est_user,fk_id_cid_user, fk_id_bairro_user, fk_id_rua_user) values ('$nome_completo', '$foto_usuario', '$apelido', '$email', $cpf, '$senha', (select id_estado from estados where nome_estado = '$estado'), (select id_cidade from cidades where nome_cidade = '$cidade'), (select id_bairro from bairros where nome_bairro = '$bairro'), (select id_rua from ruas where nome_rua = '$rua'));";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: telaLogin.php');
exit;
?>