$(document).on("ready", function(){

	/**Cargamos lista de los tipos de cuentas en el sistema**/
	$('.planes-disponibles').ready(function(){		

		urlnow = $('.now').val();
		urlformada = urlnow +"index.php/api/cuentarest/listcuenta/format/json";

		var jqxhr = $.ajax({

				type: "POST",
				url: urlformada,										
				dataType: "json"	

			}).done(function(data){
				
				if (data["numeroelementos"]>0){
					
					datos = data["elementos"];
					dinamicelemts = "<div class='large-4 columns'> <label for='right-label' class='right inline'> Planes disponibles</label></div><select name='tipocuenta' class='large-8 columns'>";
					for (var a = 0; a < datos.length; a++) {
						
						tipocuenta = datos[a].idTipo_cuenta;
						nombre = datos[a].nombre;
						dinamicelemts+= "<option value="+ tipocuenta +">"+ nombre+"</option>";
					}					
					dinamicelemts+="</select><div class='row'><button class='large-5 columns' >Elegir</button></div>";

					$(".select-tipos-cuenta").html(dinamicelemts);

				}else{
					$(".select-tipos-cuenta").html("Los datos de la lista no han sido cargados");		
				}

			}).fail(function() {
				alert( "error" );
			});



	});


	/*Termina la carga del script*/
});