
<?php
define('host', 'localhost');
define('usuario', 'aluno');
define('senha', 'aluno');
define('dbname', 'boa_oferta');

$conexao = mysqli_connect(host, usuario, senha, dbname) or die ('Não foi possível conectar');
mysqli_set_charset($conexao,"utf8");

	$con = new PDO("mysql:host=localhost;dbname=boa_oferta", "aluno", "aluno");
	$con->exec('SET CHARACTER SET utf8');


