<?php
session_start();
include("class/conexao.php");

$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

	$sql = "DELETE FROM curtidas where fk_id_prod_curt = '$_GET[id]';";

	if($conexao->query($sql) === TRUE){
	$_SESSION['status_cadastro'] = true;

}

	$sql2 = "DELETE FROM descurtidas where fk_id_prod_desc = '$_GET[id]';";
	
	if($conexao->query($sql2) === TRUE){
	$_SESSION['status_cadastro'] = true;

}

	if ($row_usuario['fk_id_tipo'] == 1){

		$sql3 = "DELETE FROM produtos WHERE id_produto = '$_GET[id]';";
	}else{

		$sql3 = "DELETE FROM produtos WHERE id_produto = '$_GET[id]' and fk_cpf = '$row_usuario[cpf]';";
	}

if($conexao->query($sql3) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}


$conexao->close();

if ($row_usuario['fk_id_tipo'] == 1){
header('Location: index.php');
}else{
	header('Location: seuPerfil.php');

	}
}
exit;
?>