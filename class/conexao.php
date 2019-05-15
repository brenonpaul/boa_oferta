<?php

$host = "localhost";
$usuario = "aluno";
$senha = "aluno";
$bd = "boa-oferta";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>
