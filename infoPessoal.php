<?php
session_start();

include("class/conexao.php");

$foto_usuario = mysqli_real_escape_string($conexao, trim($_POST['foto_usuario']));
$nome_completo = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$apelido = mysqli_real_escape_string($conexao, trim($_POST['apelido']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$novaSenha = mysqli_real_escape_string($conexao, trim($_POST['novaSenha']));
$confNovaSenha = mysqli_real_escape_string($conexao, trim($_POST['confNovaSenha']));



$result_usuario = "SELECT * FROM usuarios where email = '$_SESSION[usuario]'";  
$resultado_usuario = mysqli_query($conexao, $result_usuario);


while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

	if (isset($_POST['foto_usuario'])) {
		$sql = "UPDATE usuarios SET foto_usuario = '$foto_usuario' WHERE  cpf = '$row_usuario[cpf]';";

		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		header('Location: seuPerfil.php');
		exit;

	}elseif (isset($_POST['rua'])) {
		$sql = "UPDATE usuarios SET fk_id_rua_user = '$rua' WHERE email ='$_SESSION[usuario]';";

		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		header('Location: seuPerfil.php');
		exit;

	}elseif(isset($_POST['nome_completo']) or isset($_POST['apelido']) or isset($_POST['email'])){

		if (empty($nome_completo) or empty($email) or empty($apelido) or empty($senha)) {
			$_SESSION['falta_info'] = true;
			header('Location: alterarInfo.php?info=2');
			exit;
		}


		$sql = "select count(*) as total from usuarios where email = '$email'";
		$result = mysqli_query($conexao, $sql);
		$row_email = mysqli_fetch_assoc($result);

		if($row_email['total'] == 1 and $email != $_SESSION['usuario'] and $email != $row_usuario['email']) {
			$_SESSION['email_existe'] = true;
			header('Location: alterarInfo.php?info=2');
			exit;
		}


		$sql = "select count(*) as total from usuarios where apelido = '$apelido'";
		$result = mysqli_query($conexao, $sql);
		$row_apelido = mysqli_fetch_assoc($result);

		if($row_apelido['total'] == 1 and $apelido != $row_usuario['apelido']) {
			$_SESSION['apelido_existe'] = true;
			header('Location: alterarInfo.php?info=2');
			exit;
		}

		$sql = "UPDATE usuarios SET apelido = '$apelido', nome_completo = '$nome_completo', email = '$email' WHERE  cpf = '$row_usuario[cpf]';";


		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		$conexao->close();

		header('Location: telaLogin.php');
		exit;

	}elseif (isset($_POST['novaSenha'])) {
		
		if ($novaSenha != $confNovaSenha) {
	$_SESSION['senhas_diferentes'] = true;
	header('Location: cadastro.php');
	exit;
}

		$sql = "UPDATE usuarios SET senha = '$novaSenha' WHERE cpf = '$row_usuario[cpf]';";


		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
		}

		$conexao->close();

		header('Location: telaLogin.php');
		exit;
	}

}
?>