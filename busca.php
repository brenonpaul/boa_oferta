<?php
require_once("class/conexao.php");
require_once "cabecalho.php";

	//criar conexão
	$buscar = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
		if($buscar){
			$buscar = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
			$result_produto = "SELECT * FROM produtos WHERE nome_produto LIKE '%$buscar%'";
			$resultado_produto = mysqli_query($conexao, $result_produto);
			while($row_produto = mysqli_fetch_assoc($resultado_produto)){
				echo "nome: " . utf8_encode($row_produto['nome_produto']) . "<br>";
				echo "Preco: " . $row_produto['preco'] . "<br>";
				echo "<br><hr>";
			}
		}





?>