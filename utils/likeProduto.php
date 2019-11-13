<?php
include("../class/conexao.php");
if (!isset($_SESSION)) {
	session_start();

}	

$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

	$verif_curt = "SELECT count(*) as total FROM curtidas WHERE fk_id_prod = '$_GET[id]' AND fk_cpf_curt = '$row_usuario[cpf]';";
	
	$verificar_curtida = mysqli_query($conexao, $verif_curt);
	$row_curt = mysqli_fetch_assoc($verificar_curtida);

	if ($row_curt['total'] == 0) {
		
		$cad_curt = "INSERT INTO curtidas(fk_id_prod, fk_cpf_curt) VALUES ('$_GET[id]', '$row_usuario[cpf]');";
		$cadastrar_curtida = mysqli_query($conexao, $cad_curt);




		$result_produto = "UPDATE produtos SET likes = likes +1 WHERE id_produto = '$_GET[id]'";
		$resultado_produto = mysqli_query($conexao, $result_produto);

	}else{

		$cad_curt = "DELETE FROM curtidas WHERE fk_id_prod = '$_GET[id]' and fk_cpf_curt = '$row_usuario[cpf]';";
		$cadastrar_curtida = mysqli_query($conexao, $cad_curt);




		$result_produto = "UPDATE produtos SET likes = likes -1 WHERE id_produto = '$_GET[id]'";
		$resultado_produto = mysqli_query($conexao, $result_produto);

		$_GET['descurtir'] = "-2";


	}
}
exit;
?>