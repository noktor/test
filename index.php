<?php
	include "/FirePHPCore/fb.php";
	include "funcions.php";

	$total = 0;
	if(isset($_GET["operar"]) && $_GET["contenidor"] != ""){		
		$total = calcular($_GET["contenidor"]);
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
		<form action="index.php" method="GET">
			<input id="calcul" type="text" placeholder="0" name="contenidor" value="<?php if(isset($total)){ echo $total; }?>"/>
			<!--missatge de validació -->
			<span id="error"><?php 
			if(isset($_GET['operar'])){
				if($total === false){ 
					echo "La calculadora nomès accepta nombres i símbols matemàtics.";
				}
			} 
			?>
			</span>
			<br>
			<!--numeros 1-2-3 -->
			<input class="num" type="button" name="1" value="1"/>
			<input class="num" type="button" name="2" value="2"/>
			<input class="num" type="button" name="3" value="3"/>
			<!--sumar-->			
			<input class="num" type="button" name="operacio" value="+" checked="true"></input><br>		
			<!--numeros 4-5-6 -->			
			<input class="num" type="button" name="4" value="4"/>
			<input class="num" type="button" name="5" value="5"/>
			<input class="num" type="button" name="6" value="6"/>
			<!--restar-->			
			<input class="num" type="button" name="operacio" value="-"/></input><br>	
			<!--numeros 7-8-9 -->			
			<input class="num" type="button" name="7" value="7"/>
			<input class="num" type="button" name="8" value="8"/>
			<input class="num" type="button" name="9" value="9"/>
			<!--multiplicar-->			
			<input class="num" type="button" name="operacio" value="*"/></input><br>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--numero 0 -->			
			<input class="num" type="button" name="0" value="0"/>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
			<!--dividir-->
			<input class="num" type="button" name="operacio" value="/"/></input>						
			<input id="borrarTot" type="button" name="operacio" value="borrar tot"/></input>						
			<input id="borrarCaracter" type="button" name="operacio" value="borrar caràcter"/></input>						
			<!--calcular-->			
			<button id="operar" type="submit" name="operar">=</button>
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
