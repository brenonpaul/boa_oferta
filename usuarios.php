<?php
require_once "cabecalho.php";
require_once "class/conexao.php";
?>

<div class="container mt-4">
	<h3 class="text-center mb-4">Contas Cadastradas</h3>
	<div class="row pl-5">	
		<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Apelido</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">E-mail</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php
	$result_usuario = "SELECT * FROM usuarios where fk_id_tipo != 1 ORDER BY apelido ASC";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	$cont = 0;
	while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
		$cont++;
	?>
	
    <tr>
      <th scope="row"><?php echo $cont; ?></th>
      <td><?php echo $row_usuario['apelido']; ?></td>
      <td><?php echo $row_usuario['nome_completo']; ?></td>
      <td><?php echo $row_usuario['cpf']; ?></td>
      <td><?php echo $row_usuario['email']; ?></td>
      <td>
      	<?php 
      		if ($row_usuario['apelido'] == '--') {
      	?>
      	<a href="exclusaoConta.php?cpf=<?php echo $row_usuario['cpf']; ?>&ativar=1"><button class="btn btn-sm p-0 float-right">Liberar</button></a>
      	<?php
      		}else{
      	?>
      	<a href="exclusaoConta.php?cpf=<?php echo $row_usuario['cpf']; ?>"><button class="btn btn-sm p-0 float-right">Banir</button></a>
      	<?php
      }
      ?>
     </td>
    </tr>
    </a>
  
	<?php
	 } 
		?>
		</tbody>
</table>
	</div>
</div>	

<?php
require_once "rodape.php";
?>