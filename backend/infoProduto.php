<?php
session_start();

include("../class/conexao.php");

$image = $_FILES['foto_produto']['name'];
//Diretório da imagem
$target = "../imagens/alimentos/";
$temp = explode(".", $_FILES["foto_produto"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$foto_produto = mysqli_real_escape_string($conexao, trim($_POST['foto_produto']));
$nome_produto = mysqli_real_escape_string($conexao, trim($_POST['nome_produto']));
$preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));
$mercado = mysqli_real_escape_string($conexao, trim($_POST['mercado']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$data_visu = mysqli_real_escape_string($conexao, trim($_POST['data_visu']));


if ($image == '') {
	$newfilename = 'imagem.png';
}

$result_produto = "SELECT * FROM produtos WHERE id_produto = $_GET[id]";  
$resultado_produto = mysqli_query($conexao, $result_produto);

while($row_produto = mysqli_fetch_assoc($resultado_produto)){

	if ($foto_produto == '') {
		$foto_produto = $row_produto['foto_produto'];
	}

	if (empty($nome_produto) or empty($preco) or empty($mercado) or empty($categoria) or empty($data_visu)){
		$_SESSION['falta_info'] = true;
		header('Location: ../view/alterarProduto.php');
		exit;
	}


	$sql = "UPDATE produtos SET foto_produto = '$newfilename', nome_produto = '$nome_produto', preco = '$preco', fk_id_mercado = '$mercado', fk_id_categoria = '$categoria', data_visu = '$data_visu' WHERE  id_produto = '$_GET[id]';";

	if($conexao->query($sql) === TRUE) {
		move_uploaded_file($_FILES['foto_produto']['tmp_name'], $target.$newfilename);
		$_SESSION['status_cadastro'] = true;
	}

	$conexao->close();
	header('Location: ../view/seuPerfil.php');
	exit;

}



?>