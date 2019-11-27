<?php
session_start();
include("../class/conexao.php");

$image = $_FILES['foto_produto']['name'];
//Diretório da imagem
$target = "../imagens/alimentos/";
$temp = explode(".", $_FILES["foto_produto"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
  

if ($image == '') {
	$newfilename = 'imagem.png';
}
	
$nome_produto = mysqli_real_escape_string($conexao, ucfirst($_POST['nome_produto']));
$preco = mysqli_real_escape_string($conexao, ucfirst($_POST['preco']));
$unidade = mysqli_real_escape_string($conexao, ucfirst($_POST['unidade']));
$mercado = mysqli_real_escape_string($conexao, ucfirst($_POST['mercado']));
$categoria = mysqli_real_escape_string($conexao, ucfirst($_POST['categoria']));
$data_visu = mysqli_real_escape_string($conexao, ucfirst($_POST['data_visu']));


$data_cadastro = date('d/m/y');
$preco=str_replace(",",".",$preco);


if (empty($nome_produto) or empty($preco) or empty($data_visu) or $mercado == 'Selecione o mercado' or $categoria == 'Selecione a categoria') {
	$_SESSION['falta_info'] = true;
	header('Location: ../view/cadastroProduto.php');
	exit;
}


$sql = "insert into produtos (foto_produto, nome_produto, data_visu, data_cadastro, preco, fk_id_mercado, fk_id_categoria, fk_cpf, curtida, descurtida) values ('$newfilename', '$nome_produto', '$data_visu', '$data_cadastro', '$preco $unidade', (select id_mercado from mercados where nome_mercado = '$mercado'), (select id_categoria from categorias where nome_categoria = '$categoria'), (select cpf from usuarios where email = '$_SESSION[usuario]'), 0, 0);";
	echo $sql;
	
	


if($conexao->query($sql) === TRUE) {
	move_uploaded_file($_FILES['foto_produto']['tmp_name'], $target.$newfilename);
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: ../view/index.php');
exit;
?>