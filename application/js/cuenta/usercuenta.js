$(document).on("ready", function(){
	urlnow = $('.now').val();


	loadcuentas();	

});

function loadcuentas(){

	urlformada = urlnow +"index.php/api/cuentarest/listarcuentas/format/json";

			var jqxhr = $.ajax({

				type: "POST",
				url: urlformada,										
				dataType: "json"	

			}).done(function(data){
					
				elementos ="<table class='large-12 columns'><tr><td>Nombre</td> <td>Descripción</td><tr>";	
				for (var a = 0; a < data.length; a++) {
					
					cuenta =data[a].idcuenta;
					nombre = data[a].nombre;
					descripcion = data[a].descripcion;
					status = data[a].status;					
					urlacceso= urlnow +"index.php/cuentas/accessacount?cuenta="+cuenta+"&name="+nombre;					
					elementos+="<tr><td><div data-alert class='alert-box'><a href='"+urlacceso +"' id='name_campania'>" +a +".- "+ nombre+"</a></div></td></tr>";	
				};
				elementos+="</table>";

					$('.lista-cuentas').html(elementos);
				

			}).fail(function() {
				alert( "error" );
			});

}