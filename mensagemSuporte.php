<?php
require_once("cabecalho.php");
?>

<div class="container">
	<table class="table table-striped table-responsive mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuário</th>
      <th scope="col">Informação</th>
    
    </tr>
  </thead>
  <tbody>
  	<?php
	$result_suporte = "SELECT * FROM suporte";
	$resultado_suporte = mysqli_query($conexao, $result_suporte);
	$cont = 0;
	while($row_suporte = mysqli_fetch_assoc($resultado_suporte)){
		$cont++;
	?>
    <tr>
      <th scope="row"><?php echo "$cont"; ?></th>
      <td>

      	<?php
        $sql = "SELECT apelido FROM usuarios WHERE cpf = '$row_suporte[fk_cpf_sup]';";
        $resultado = $conexao->query($sql) OR trigger_error($conexao->error, E_USER_ERROR);
        if($consulta = $resultado->fetch_object()){
            echo ($consulta->apelido);
        }
        ?>

       </td>
      <td><?php echo $row_suporte['desc_suporte']; ?></td>
   
    </tr>
    <?php 
}
?>
  </tbody>
</table>
</div>

<?php
require_once("rodape.php");
?>