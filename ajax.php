<?php
	include "/FirePHPCore/fb.php";
	include "funcions.php";

	$total = 0;
	$error = 0;
	$resposta_php = array(
					"error"=>$error,
					"total"=>$total
					);
	if(isset($_GET["operar"]) && $_GET["contenidor"] != ""){		
		$resposta = calcular($_GET["contenidor"]);
	}

//	if($resposta["total"] === false){
//		$error = 1;
//	}

	$resposta = array(
				"error"=>$resposta["error"],
				"total"=>$resposta["total"]
				);

	echo json_encode($resposta);
