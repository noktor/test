<?php
	include "/FirePHPCore/fb.php";

	function validar_nombre($cadena){
		$es_valid = true;
		for($i=0; $i < strlen($cadena) && $es_valid==true; $i++){
		//	FB::send('volta '.$i);
		//	FB::send($es_valid);
			if(is_numeric($cadena[$i])){
				$es_valid = false;
		//		echo $es_valid;
				FB::send('no és vàlida, iteració: '.$i);				
				break;
			} else {
				FB::send('iteració: '.$i);
			}
		}
		return $es_valid;
	}

	if(isset($_POST['contenidor'])){
		$contenidor = $_POST['contenidor'];
	}

	$esvalid1 = false;
	$esvalid2 = false;
	if(isset($_POST["operar"]) && isset($_POST["operacio"]) && $_POST["contenidor"] != ""){
		$operacio=$_POST["operacio"];
		$contenidor_aux = explode($operacio,$_POST["contenidor"]);
		$num1 = $contenidor_aux[0];
		$num2 = $contenidor_aux[1];

		$esvalid1 = validar_nombre($num1);
		$esvalid2 = validar_nombre($num2);
		if($esvalid1 && $esvalid2){
			$total = 0;
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

?>

<html>
	<head>
		<meta charset="UTF-8">
		<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
		<script src="js/calculadora.js" type="text/javascript"></script>
		<title>
			Calculadora
		</title>
		<script>
		
		</script>
	</head>
	<body>
		<form action="index.php" method="POST">
			<input id="calcul" type="text" placeholder="0" name="contenidor" value="<?php if(isset($total)){ echo $total; }?>"/>
			<!--missatge de validació -->
			<?php 
			if(isset($_POST['operar'])){
				if($esvalid1 == false || $esvalid2 == false){ 
					echo "La calculadora nomès accepta nombres i símbols matemàtics.";
				}
			} 
			?>
			<br>
			<!--numeros 1-2-3 -->
			<input class="num" type="button" name="1" value="1"/>
			<input class="num" type="button" name="2" value="2"/>
			<input class="num" type="button" name="3" value="3"/>
			<!--sumar-->			
			<input class="num" type="button" name="operacio" value="+" checked="true">+</input><br>		
			<!--numeros 4-5-6 -->			
			<input class="num" type="button" name="4" value="4"/>
			<input class="num" type="button" name="5" value="5"/>
			<input class="num" type="button" name="6" value="6"/>
			<!--restar-->			
			<input class="num" type="button" name="operacio" value="-"/>-</input><br>	
			<!--numeros 7-8-9 -->			
			<input class="num" type="button" name="7" value="7"/>
			<input class="num" type="button" name="8" value="8"/>
			<input class="num" type="button" name="9" value="9"/>
			<!--multiplicar-->			
			<input class="num" type="button" name="operacio" value="*"/>*</input><br>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--numero 0 -->			
			<input class="num" type="button" name="0" value="0"/>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
			<!--dividir-->
			<input class="num" type="button" name="operacio" value="/"/>/</input>						
			<input id="borrarTot" type="button" name="operacio" value="borrar tot"/>/</input>						
			<input id="borrarCaracter" type="button" name="operacio" value="borrar caràcter"/>/</input>						
			<!--calcular-->			
			<button type="submit" name="operar">=</button>
		</form>
		<?php
			/*if(isset($contenidor)){
				echo "contenidor: <b>".$contenidor."</b><br>";
				echo "num1: <b>".$num1."</b><br>";
				echo "num2: <b>".$num2."</b><br>";
			}*/
		?>
	</body>
</html>
