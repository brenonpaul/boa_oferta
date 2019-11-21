<?php
session_start();
include("class/conexao.php");

$foto_produto = mysqli_real_escape_string($conexao, trim($_POST['foto_produto']));
$nome_produto = mysqli_real_escape_string($conexao, trim($_POST['nome_produto']));
$preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));
$unidade = mysqli_real_escape_string($conexao, trim($_POST['unidade']));
$mercado = mysqli_real_escape_string($conexao, trim($_POST['mercado']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$data_visu = mysqli_real_escape_string($conexao, trim($_POST['data_visu']));
$data_visu = date('d/m/y', strtotime($data_visu));
date_default_timezone_set('America/Sao_Paulo');

$data_cadastro = date('d/m/y');
$preco=str_replace(",",".",$preco);


if (empty($nome_produto) or empty($preco) or empty($data_visu) or $mercado == 'Selecione o mercado' or $categoria == 'Selecione a categoria') {
	$_SESSION['falta_info'] = true;
	header('Location: cadastroProduto.php');
	exit;
}


$sql = "insert into produtos (foto_produto, nome_produto, data_visu, data_cadastro, preco, fk_id_mercado, fk_id_categoria, fk_cpf, curtida, descurtida) values ('$foto_produto', '$nome_produto', '$data_visu', '$data_cadastro', '$preco $unidade', (select id_mercado from mercados where nome_mercado = '$mercado'), (select id_categoria from categorias where nome_categoria = '$categoria'), (select cpf from usuarios where email = '$_SESSION[usuario]'), 0, 0);";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: index.php');
exit;
?>