<?php
    include("../class/conexao.php");
    echo $_GET['id'];

    $condicao = " id_produto=".$_GET['id'];

    $result_produto = "UPDATE produtos SET deslikes = deslikes + 1 WHERE ".$condicao;
	$resultado_produto = mysqli_query($conexao, $result_produto);

    exit;
?>