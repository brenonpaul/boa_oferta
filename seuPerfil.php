<?php
require_once("cabecalho.php");
require_once("class/conexao.php");
session_start();
?>

<div class="container">
	<h2 class="mt-4 text-center mb-3">Seu Perfil</h2>
	 	
	<div class="row d-flex justify-content-center">

			<?php 
            	$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
            	$resultado_usuario = mysqli_query($conexao, $result_usuario);

            

            	while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
			?>

			
	
				<img src="imagens/<?php echo $row_usuario['foto_usuario']?>" class='imgProd rounded border border-secondary'>
</div>
<div class="text-center">

				<h6><strong>Apelido:</strong> <?php echo $row_usuario['apelido']; ?></h6>
				<h6><strong>Nome:</strong> <?php echo $row_usuario['nome_completo']; ?></h6>
				<h6><strong>CPF:</strong> <?php echo $row_usuario['cpf']; ?></h6>
				<h6><strong>E-mail:</strong> <?php echo $row_usuario['email']; ?></h6>
				<h6><strong>Endereço:</strong> <?php 
				$end = "SELECT nome_rua from ruas, usuarios WHERE id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]'";
			
                   $usuario = $_SESSION['usuario'];
                   //$sql = "select nome_completo from usuarios where email = '$usuario' ;";
                   $sql = "SELECT nome_rua from ruas, usuarios WHERE id_rua = fk_id_rua_user and id_rua = '$row_usuario[fk_id_rua_user]' and apelido = '$row_usuario[apelido]'";
                   $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
                   while($consulta = $resultado->fetch_object()){
                                   
                        echo utf8_encode($consulta->nome_rua);
                     
                }
             
				?>

			</h6>
			<?php
			}	  
            ?>

     </div>

		
	</div>
	
			
</div>

<?php
require_once("rodape.php");
?>