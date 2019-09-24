
<?php
define('host', 'localhost');
define('usuario', 'aluno');
define('senha', 'aluno');
define('dbname', 'boa_oferta');

$conexao = mysqli_connect(host, usuario, senha, dbname) or die ('Não foi possível conectar');

