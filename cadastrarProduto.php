<?php
session_start();
include("class/conexao.php");

$foto_produto = mysqli_real_escape_string($conexao, trim($_POST['foto_produto']));
$nome_produto = mysqli_real_escape_string($conexao, trim($_POST['nome_produto']));
$preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));
$mercado = mysqli_real_escape_string($conexao, trim($_POST['mercado']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$data_visu = mysqli_real_escape_string($conexao, trim($_POST['data_visu']));


if (empty($nome_produto) or empty($preco) or empty($data_visu) or $mercado == 'Selecione o mercado' or $categoria == 'Selecione a categoria') {
	$_SESSION['falta_info'] = true;
	header('Location: cadastroProduto.php');
	exit;
}


/*$sql = "insert into usuarios(nome_completo, foto_usuario, apelido, email, cpf, senha, fk_id_est_user,fk_id_cid_user, fk_id_bairro_user, fk_id_rua_user) values ('$nome_completo', '$foto_usuario', '$apelido', '$email', $cpf, '$senha', (select id_estado from estados where nome_estado = '$estado'), (select id_cidade from cidades where nome_cidade = '$cidade'), (select id_bairro from bairros where nome_bairro = '$bairro'), (select id_rua from ruas where nome_rua = '$rua'));";
*/
$sql = "insert into produtos (foto_produto, nome_produto, data_visu, preco, fk_id_mercado, fk_id_categoria) values ('$foto_produto', '$nome_produto', '$data_visu', $preco, (select id_mercado from mercados where nome_mercado = '$mercado'), (select id_categoria from categorias where nome_categoria = '$categoria'));";
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: index.php');
exit;
?>