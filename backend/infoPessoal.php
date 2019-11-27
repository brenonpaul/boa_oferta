<?php
session_start();
require_once("../class/conexao.php");

$image = $_FILES['foto_usuario']['name'];
//Diretório da imagem
$target = "../imagens/";
$temp = explode(".", $_FILES["foto_usuario"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

echo $newfilename;

$nome_completo = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$apelido = mysqli_real_escape_string($conexao, trim($_POST['apelido']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$novaSenha = mysqli_real_escape_string($conexao, trim($_POST['novaSenha']));
$confNovaSenha = mysqli_real_escape_string($conexao, trim($_POST['confNovaSenha']));

if ($image == '') {
	$newfilename = 'usuario.jpg';
}

$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

	if (isset($_FILES['foto_usuario'])){
		$sql = "UPDATE usuarios SET foto_usuario = '$newfilename' WHERE  cpf = '$row_usuario[cpf]';";

		if($conexao->query($sql) === TRUE){

			move_uploaded_file($_FILES['foto_usuario']['tmp_name'], $target.$newfilename);
			
			$_SESSION['status_cadastro'] = true;
		}

		header('Location: ../view/seuPerfil.php');
		exit;


	}elseif (isset($_POST['rua'])){
		$sql = "UPDATE usuarios SET fk_id_rua_user = '$rua' WHERE email ='$_SESSION[usuario]';";

		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		header('Location: ../view/seuPerfil.php');
		exit;


	}elseif(isset($_POST['nome_completo']) or isset($_POST['apelido']) or isset($_POST['email'])){

		if (empty($nome_completo) or empty($email) or empty($apelido) or empty($senha)) {
			$_SESSION['falta_info'] = true;
			header('Location: ../view/alterarInfo.php?info=2');
			exit;
		}



		$sql = "select count(*) as total from usuarios where email = '$email'";
		$result = mysqli_query($conexao, $sql);
		$row_email = mysqli_fetch_assoc($result);

		if($row_email['total'] == 1 and $email != $_SESSION['usuario'] and $email != $row_usuario['email']) {
			$_SESSION['email_existe'] = true;
			header('Location: ../view/alterarInfo.php?info=2');
			exit;
		}


		$sql = "select count(*) as total from usuarios where apelido = '$apelido'";
		$result = mysqli_query($conexao, $sql);
		$row_apelido = mysqli_fetch_assoc($result);

		if($row_apelido['total'] == 1 and $apelido != $row_usuario['apelido']) {
			$_SESSION['apelido_existe'] = true;
			header('Location: ../view/alterarInfo.php?info=2');
			exit;
		}


		$sql = "UPDATE usuarios SET apelido = '$apelido', nome_completo = '$nome_completo', email = '$email' WHERE  cpf = '$row_usuario[cpf]';";

		if($conexao->query($sql) === TRUE){
			$_SESSION['status_cadastro'] = true;
		}

		$conexao->close();

		header('Location: ../view/telaLogin.php');
		exit;


	}elseif (isset($_POST['novaSenha'])){
		
		if ($novaSenha != $confNovaSenha) {
			$_SESSION['senhas_diferentes'] = true;
			header('Location: ../view/alterarInfo.php?info=4');
			exit;
		}

		if (strlen($novaSenha) < 4) {
			$_SESSION['senha_caracteres'] = true;
			header('Location: ../view/alterarInfo.php?info=4');
			exit;
		}

		$sql = "UPDATE usuarios SET senha = '$novaSenha' WHERE cpf = '$row_usuario[cpf]';";



		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		$conexao->close();

		header('Location: ../view/telaLogin.php');
		exit;
	}

}
?>