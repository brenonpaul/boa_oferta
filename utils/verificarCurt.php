<?php
 include("../class/conexao.php");
session_start();
$id_produto=$_GET['produto_id'];


 $result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
 $resultado_usuario = mysqli_query($conexao, $result_usuario);

 while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

 	$valor="SELECT COUNT(*) FROM `curtidas` WHERE `fk_cpf_curt` = '$row_usuario[cpf]'  AND `fk_id_prod_curt` = $id_produto";
 		$resultado_valor = mysqli_query($conexao, $valor);

    		while($row_valor = mysqli_fetch_assoc($resultado_valor)){
    			$numero=$row_valor['COUNT(*)'];
					$response = $numero;
    				echo json_encode($response);
   
   			}

    }
	

?>
