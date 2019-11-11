<?php
    include("../class/conexao.php");
    if (!isset($_SESSION)) {
    	session_start();

    }	

 $result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
 $resultado_usuario = mysqli_query($conexao, $result_usuario);

 while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
 	

    $condicao = " id_produto=".$_GET['id'];

    $result_produto = "UPDATE produtos SET likes = likes + 1 WHERE ".$condicao;
	$resultado_produto = mysqli_query($conexao, $result_produto);
	echo $condicao;
}
    exit;
?>