$(document).ready(onReady);

function onReady(){
	console.log('hola');
	var $calcul = $('#calcul');
	$('.num').on('click', function(event){
		console.time('event');
		var buto = $(event.target);
		var valor = buto.val();
	    var valor_calcul = $calcul.val();
		$calcul.val(valor_calcul+valor);
		//var valor_calcul = $('#calcul').val();
		//$('#calcul').val(valor_calcul+valor);

		console.timeEnd('event');
	});
	$('#borrarTot').on('click', function(event){
		console.time('event');
		var buto = $(event.target);
		var valor = "";
	    var valor_calcul = $calcul.val();
		$calcul.val(valor);
		//var valor_calcul = $('#calcul').val();
		//$('#calcul').val(valor_calcul+valor);

		console.timeEnd('event');
	});
	$('#borrarCaracter').on('click', function(event){
		console.time('event');
		var buto = $(event.target);
	    var valor_calcul = $calcul.val();
		valor_calcul = valor_calcul.substring(0, valor_calcul.length-1);
		$calcul.val(valor_calcul);
		//var valor_calcul = $('#calcul').val();
		//$('#calcul').val(valor_calcul+valor);
		console.log($calcul.val());
		console.timeEnd('event');
	});		
}
/*
var val = 0,
$elm = $('#calcul');
console.time('color');
for( var i=0; i<10000; i++)
{
	$('#calcul').css('background','#ff00'+val);
	//$elm.css('background','#ff00'+val);
	val = (val<10)? (val+1):0;
}
console.timeEnd('color');

}*/