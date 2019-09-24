<?php
	
	require_once("class/con.php");

	$pegaCidades = $con->prepare("SELECT * FROM cidades, estados WHERE fk_id_estado = id_estado and id_estado = '".$_POST['id_est']."'");
	$pegaCidades->execute();

		$fetchAll = $pegaCidades->fetchAll();

		foreach ($fetchAll as $cidades) {
			echo '<option value="'.$cidades['id_cidade'].'">'.$cidades['nome_cidade'].'</option>';
		}

	$pegaBairros = $con->prepare("SELECT * FROM bairros, cidades WHERE fk_id_cidade = id_cidade and id_cidade = '".$_POST['id_cid']."'");
	$pegaBairros->execute();

		$fetchAll = $pegaBairros->fetchAll();

		foreach ($fetchAll as $bairros) {
			echo '<option value="'.$bairros['id_bairro'].'">'.$bairros['nome_bairro'].'</option>';
		}


	$pegaRuas = $con->prepare("SELECT * FROM ruas, bairros WHERE fk_id_bairro = id_bairro and id_bairro = '".$_POST['id_bairro']."'");
	$pegaRuas->execute();

		$fetchAll = $pegaRuas->fetchAll();

		foreach ($fetchAll as $ruas) {
			echo '<option value="'.$ruas['id_rua'].'">'.$ruas['nome_rua'].'</option>';
		}

