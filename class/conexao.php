
<?php
define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('bd', 'boa_oferta');

$conexao = mysqli_connect(host, usuario, senha, bd) or die ('Não foi possível conectar');