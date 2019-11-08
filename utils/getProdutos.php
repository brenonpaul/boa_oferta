<?php
    include("../class/conexao.php");

    if (isset($_GET['cat'])) {
        $result_produto = "SELECT * FROM produtos, categorias, mercados, usuarios WHERE fk_id_mercado = id_mercado AND fk_cpf = cpf AND fk_id_categoria = id_categoria and id_categoria = $_GET[cat] ORDER BY data_visu DESC";
    } else {
        $result_produto = "SELECT * FROM produtos, mercados, usuarios WHERE fk_id_mercado= id_mercado AND fk_cpf=cpf ORDER BY data_visu DESC";	
    }

    // $result_produto = "SELECT id_produto, nome_produto, preco, likes, foto_produto, nome_mercado, nome_completo, data_visu FROM produtos, mercados, usuarios WHERE fk_id_mercado= id_mercado AND fk_cpf=cpf ORDER BY data_visu DESC";
	$resultado_produto = mysqli_query($conexao, $result_produto);
    
    $response = array();
    while($row = mysqli_fetch_assoc($resultado_produto)){
        $response[] = $row;
    }

    echo json_encode($response);
    exit;
?>