<?php

$con = new PDO("mysql:host=localhost;dbname=boa_oferta", "root", "");
	$con->exec('SET CHARACTER SET utf8');


$pegaBairros = $con->prepare("SELECT * FROM bairros, cidades WHERE fk_id_cidade = id_cidade and id_cidade = '".$_POST['id_cid']."'");
	$pegaBairros->execute();

		$fetchAll = $pegaBairros->fetchAll();

		foreach ($fetchAll as $bairros) {
			echo '<option>'.$bairros['nome_bairro'].'</option>';
		}
?>