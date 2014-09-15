$(document).on("ready", function(){

	urlnow = $('.now').val();

	$('.actualizar').click(function(){

		nombre = $('.nombre-edit').val();
		descripcion = $('.descripcion').val();
		estado = $('.estado-cuenta').val();
		edit = $('.edit').val();

		urlupdate  = urlnow + "index.php/api/cuentarest/updatecuenta/format/json";;

		params = { "nombre" : nombre , "descripcion": descripcion , "estado" : estado , "edit" : edit}


			var jqxhr = $.ajax({

					type: "POST",
					url: urlupdate,								
					data: params,		
					dataType: "json"	

				}).done(function(data){
					alert(data);

				}).fail(function() {
					alert( "error" );
				});



	});

	/*Termina el js*/
});