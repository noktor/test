<?php

	//funció que valida que sigui un caracter numeric:
	function validar_nombre($cad){
		$es_valid = true;
		for($i=0; $i < strlen($cad) && $es_valid==true; $i++){
		//	FB::send('volta '.$i);
		//	FB::send($es_valid);
			FB::send("-".$cad[$i]."-");
			if(is_numeric($cad[$i]) || $cad[$i] == "."){
				FB::send('iteració: '.$i);
			} else {
				$es_valid = false;
		//		echo $es_valid;
				FB::send('no és vàlid, caràcter: '.$cad[$i]);
				break;				
			}			
		//	if(!is_numeric($cad[$i])){
		//		$es_valid = false;
		//		echo $es_valid;
		//		FB::send('no és vàlid, caràcter: '.$cad[$i]);
		//		break;
		//	} else {
		//		FB::send('iteració: '.$i);
		//	}
		}
		return $es_valid;
	}

	if(isset($_GET['contenidor'])){
		$contenidor = $_GET['contenidor'];
	}

	function saberCalcul($cadena){
		$symbols = array("+","-","*","/");
		//echo $symbols[0];

		$simbol_operador = false;

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

	function calcular($contenidor){
		$error = 0;
		$total = false;
		$resposta = array(
			"error"=>$error,
			"total"=>$total
			);	
		$operacio=saberCalcul($contenidor);
		if($operacio !== false){
			$contenidor_aux = explode($operacio,$contenidor);
			$num1 = $contenidor_aux[0];
			$num2 = $contenidor_aux[1];
			FB::send($operacio .",". $num1 .",". $num2);
			$esvalid1 = validar_nombre($num1);
			$esvalid2 = validar_nombre($num2);
			FB::send("Són vàlids? ==> Num1: ". $esvalid1 ."Num2: ". $esvalid2);
			if($esvalid1 && $esvalid2){
				if($operacio == "+"){
					$resposta["total"] = $num1 + $num2;
				}
				if($operacio == "-"){
					$resposta["total"] = $num1 - $num2;
				}
				if($operacio == "*"){
					$resposta["total"] = $num1 * $num2;
				}
				if($operacio == "/"){
					$resposta["total"] = $num1 / $num2;
				}		
			} else {
				$resposta["error"] = 1;
			}
		} else {
			//Estat -1 indica que l'usuari nomès ha afegit un nombre:
			$resposta["error"] = -1;
		}
		return $resposta;
	}