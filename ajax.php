<?php
	include "/FirePHPCore/fb.php";
	include "funcions.php";

	$total = 0;	
	if(isset($_GET["operar"]) && $_GET["contenidor"] != ""){		
		$total = calcular($_GET["contenidor"]);
	}

	$error = false;
	if($total === false){
		$error = true;
	}

	$resposta = array(
				"error"=>$error,
				"total"=>$total
				);

	echo json_encode($resposta);
