<?php
	include "/FirePHPCore/fb.php";

	function validar_nombre($cad){
		$es_valid = true;
		for($i=0; $i < strlen($cad) && $es_valid==true; $i++){
		//	FB::send('volta '.$i);
		//	FB::send($es_valid);
			FB::send("-".$cad[$i]."-");
			if(!is_numeric($cad[$i])){
				$es_valid = false;
		//		echo $es_valid;
				FB::send('no és vàlid, caràcter: '.$cad[$i]);
				break;
			} else {
				FB::send('iteració: '.$i);
			}
		}
		return $es_valid;
	}

	if(isset($_GET['contenidor'])){
		$contenidor = $_GET['contenidor'];
	}

	function saberCalcul($cadena){
		$symbols = array("+","-","*","/");
		//echo $symbols[0];

		$simbol_operador = "";

		foreach ($symbols as $symbol){
			$pos = strrpos($cadena, $symbol);
			if($pos !== false){
				$simbol_operador = $symbol;
				//FB::send("test");
			}		
		}
		//echo $simbol_operador;
		//echo $simbol_operador;	
		//print_r($symbols);
		return $simbol_operador;		
	}

	$esvalid1 = false;
	$esvalid2 = false;
	$total = 0;	
	if(isset($_GET["operar"]) && $_GET["contenidor"] != ""){		
		//$operacio=$_GET["operacio"];
		$operacio=saberCalcul($_GET['contenidor']);
		$contenidor_aux = explode($operacio,$_GET["contenidor"]);
		$num1 = $contenidor_aux[0];
		$num2 = $contenidor_aux[1];
		FB::send($operacio .",". $num1 .",". $num2);
		$esvalid1 = validar_nombre($num1);
		$esvalid2 = validar_nombre($num2);
		FB::send("Són vàlids? ==> Num1: ". $esvalid1 ."Num2: ". $esvalid2);
		if($esvalid1 && $esvalid2){
			if($operacio == "+"){
				$total = $num1 + $num2;
			}
			if($operacio == "-"){
				$total = $num1 - $num2;
			}
			if($operacio == "*"){
				$total = $num1 * $num2;
			}
			if($operacio == "/"){
				$total = $num1 / $num2;
			}		
		}	
	}
	echo json_encode($total);
