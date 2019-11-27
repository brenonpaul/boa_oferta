<?php
session_start();
include("../class/conexao.php");

$textoSuporte = mysqli_real_escape_string($conexao, trim($_POST['textoSuporte']));

if (empty($textoSuporte)) {
	$_SESSION['falta_info'] = true;
	header('Location: ../view/suporte.php');
	exit;
}


$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario))
{
	$sql = "INSERT INTO suporte(desc_suporte, fk_cpf_sup) values ('$textoSuporte', '$row_usuario[cpf]')";
}

if($conexao->query($sql) === TRUE) {
	$_SESSION['suporte_cadastrado'] = true;
}

$conexao->close();

header('Location: ../view/suporte.php');
exit;
?>