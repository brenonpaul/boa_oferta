
<?php
define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('dbname', 'boa_oferta');

$conexao = mysqli_connect(host, usuario, senha, dbname) or die ('Não foi possível conectar');

