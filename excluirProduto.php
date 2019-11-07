<?php
session_start();

include("class/conexao.php");

$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario))
{

	$sql = "DELETE FROM produtos WHERE id_produto = '$_GET[id]' and fk_cpf = '$row_usuario[cpf]';";

}
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}



if($conexao->query($sql2) === TRUE) {
	session_destroy();
}

$conexao->close();

header('Location: seuPerfil.php');
exit;
?>