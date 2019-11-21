<?php
session_start();
require_once("class/conexao.php");

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: telaLogin.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$sql = "select count(*) as total from usuarios where email = '$usuario' and fk_id_tipo = 3";
$result = mysqli_query($conexao, $sql);
$row_ban = mysqli_fetch_assoc($result);

if($row_ban['total'] == 1) {
	$_SESSION['ban'] = true;
	header('Location: telaLogin.php');
	exit;
}


$query = "select email from usuarios where email = '{$usuario}' and senha = ('{$senha}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
    exit(); 
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: telaLogin.php');
    exit();
}