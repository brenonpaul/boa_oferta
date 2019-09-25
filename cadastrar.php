<?php
session_start();

include("class/conexao.php");

$nome_completo = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
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

if (empty($nome_completo) or empty($cpf) or empty($email) or empty($apelido) or empty($senha) or $estado == 'Estado residente' or $cidade == 'Cidade residente' or $bairro == 'Bairro residente' or $rua == 'Rua residente') {
	$_SESSION['falta_info'] = true;
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

$sql = "insert into usuarios(nome_completo, foto_usuario, apelido, email, cpf, senha, fk_id_rua_user) values ('$nome_completo', '$foto_usuario', '$apelido', '$email', $cpf, '$senha', $rua);";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: telaLogin.php');
exit;
?>