<?php
include("../class/conexao.php");
if (!isset($_SESSION)){
	session_start();
}	

$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

	$verif_desc = "SELECT count(*) as total FROM descurtidas WHERE fk_id_prod_desc = '$_GET[id]' AND fk_cpf_desc = '$row_usuario[cpf]';";
	
	$verificar_descurtida = mysqli_query($conexao, $verif_desc);
	$row_desc = mysqli_fetch_assoc($verificar_descurtida);

	if ($row_desc['total'] == 0) {
		
		$cad_desc = "INSERT INTO descurtidas(fk_id_prod_desc, fk_cpf_desc) VALUES ('$_GET[id]', '$row_usuario[cpf]');";
		$cadastrar_descurtida = mysqli_query($conexao, $cad_desc);

		$result_produto = "UPDATE produtos SET deslikes = deslikes +1 WHERE id_produto = '$_GET[id]'";
		$resultado_produto = mysqli_query($conexao, $result_produto);

	}else{

		$cad_desc = "DELETE FROM descurtidas WHERE fk_id_prod_desc = '$_GET[id]' and fk_cpf_desc = '$row_usuario[cpf]';";
		$cadastrar_descurtida = mysqli_query($conexao, $cad_desc);




		$result_produto = "UPDATE produtos SET deslikes = deslikes -1 WHERE id_produto = '$_GET[id]'";
		$resultado_produto = mysqli_query($conexao, $result_produto);


	}
}
exit;
?>