<?php
session_start();
require_once("class/conexao.php");

$primeiro_nome = mysqli_real_escape_string($conexao, trim($_POST['primeiro_nome']));
$ultimo_nome = mysqli_real_escape_string($conexao, trim($_POST['ultimo_nome']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$apelido = mysqli_real_escape_string($conexao, trim($_POST['apelido']));
$foto_usuario = mysqli_real_escape_string($conexao, trim($_POST['foto_usuario']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$conf_senha = $_POST['conf_senha'];
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));

if ($senha != $conf_senha) {
	$_SESSION['senhas_diferentes'] = true;
	header('Location: cadastro.php');
	exit;
}

if (empty($primeiro_nome) or empty($ultimo_nome) or empty($cpf) or empty($email) or empty($apelido) or empty($senha) or empty($rua)) {
	$_SESSION['falta_info'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "select count(*) as total from usuarios where cpf = '$cpf' and fk_id_tipo = 3 or email = '$email' and fk_id_tipo = 3";
$result = mysqli_query($conexao, $sql);
$row_ban = mysqli_fetch_assoc($result);

if($row_ban['total'] == 1) {
	$_SESSION['ban'] = true;
	header('Location: cadastro.php');
	exit;
}

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

if (strlen($senha) < 8) {
	$_SESSION['senha_caracteres'] = true;
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


$sql = "insert into usuarios(nome_completo, foto_usuario, apelido, email, cpf, senha, fk_id_rua_user, fk_id_tipo) values ('$primeiro_nome $ultimo_nome', '$foto_usuario', '$apelido', '$email', '$cpf', '$senha', $rua, 2);";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: telaLogin.php');
exit;
?>