$(document).on("ready", function(){

	urlnow = $('.now').val();	
	$('#cancelaredicion').click(function(){
		$('#dlg_editar_cuenta').foundation('reveal', 'close');

	});

	


	$('.actualizar').click(function(){

		nombre = $('.nombre-edit').val();
		descripcion = $('.descripcion').val();
		estado = $('.estado-cuenta').val();
		edit = $('.cuentaedit').val();

		urlupdate  = urlnow + "index.php/api/cuentarest/updatecuenta/format/json";

		params = { "nombre" : nombre , "descripcion": descripcion , "estado" : estado , "edit" : edit}


			var jqxhr = $.ajax({

					type: "POST",
					url: urlupdate,								
					data: params,		
					dataType: "json"	

				}).done(function(data){
					
					$('.reporte').html(data);
					$('.cancelar').html("Cuentas");

				}).fail(function() {
					alert( "error" );
				});



	});

	/*Termina el js*/
});

function callform(e){

	$('#edit-cuenta').val(e);

	$('#dlg_editar_cuenta').foundation('reveal', 'open');				
	$('#actualizar').click(function(){
		
		
		urlupdate  = urlnow + "index.php/api/cuentarest/updatecuenta/format/json";					
		$.post(urlupdate , $("#edit_form").serialize()).done(function(data){

			loadcuentas();
			$("#reporte-edicion").html(data);

		}).fail(function(){
			alert("error");
		});



	});	

}