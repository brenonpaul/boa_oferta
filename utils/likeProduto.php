<?php
    include("../class/conexao.php");

    $condicao = " id_produto=".$_GET['id'];

    $result_produto = "UPDATE produtos SET likes = likes + 1 WHERE ".$condicao;
	$resultado_produto = mysqli_query($conexao, $result_produto);

    exit;
?>