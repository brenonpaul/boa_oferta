<?php
session_start();

include("class/conexao.php");

$foto_produto = mysqli_real_escape_string($conexao, trim($_POST['foto_produto']));
$nome_produto = mysqli_real_escape_string($conexao, trim($_POST['nome_produto']));
$preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));
$mercado = mysqli_real_escape_string($conexao, trim($_POST['mercado']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$data_visu = mysqli_real_escape_string($conexao, trim($_POST['data_visu']));


$result_produto = "SELECT * FROM produtos WHERE id_produto = $_GET[id]";  
$resultado_produto = mysqli_query($conexao, $result_produto);

while($row_produto = mysqli_fetch_assoc($resultado_produto)){

	if ($foto_produto == '') {
		$foto_produto = $row_produto['foto_produto'];
	}

	if (empty($nome_produto) or empty($preco) or empty($mercado) or empty($categoria) or empty($data_visu)){
		$_SESSION['falta_info'] = true;
		header('Location: alterarProduto.php');
		exit;
	}


	$sql = "UPDATE produtos SET foto_produto = '$foto_produto', nome_produto = '$nome_produto', preco = '$preco', fk_id_mercado = '$mercado', fk_id_categoria = '$categoria', data_visu = '$data_visu' WHERE  id_produto = '$_GET[id]';";

	if($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}

	$conexao->close();
	header('Location: seuPerfil.php');
	exit;

}



?>