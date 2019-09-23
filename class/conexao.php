
<?php
define('host', 'localhost');
define('usuario', 'aluno');
define('senha', 'aluno');
define('bd', 'boa_oferta');

$conexao = mysqli_connect(host, usuario, senha, bd) or die ('Não foi possível conectar');