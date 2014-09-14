$(document).on("ready", function(){
	urlnow = $('.now').val();

	/*Registro de cuentas*/
	$('.registrar-cuenta').click(function(){
		

		urlregistro = urlnow + "index.php/api/cuentarest/registro/format/json";

		nombrecuenta = $(".nombre-cuenta").val();
		descripcion= $(".descripcion-cuenta").val();
		tipocuenta = $(".tipocuenta").val();

		if (nombrecuenta.length>0) {

			params = { "nombrecuenta" : nombrecuenta , "descripcion": descripcion , "tipocuenta" : tipocuenta}

			var jqxhr = $.ajax({

					type: "POST",
					url: urlregistro,								
					data: params,		
					dataType: "json"	

				}).done(function(data){
					
					$(".reporte").html(data);			
					$(".nombre-cuenta").val("");
					$(".descripcion-cuenta").val("");
		

				}).fail(function() {
					alert( "error" );
				});

		}else{
					
			 $(".reporte").html("<a><strong>La cuenta no puede registrar si no asigna un nombre</strong></a>");			
		}



		
		


	});


	/**Cargamos lista de los tipos de cuentas en el sistema**/
	$('.planes-disponibles').ready(function(){		

		
		urlformada = urlnow +"index.php/api/cuentarest/listcuenta/format/json";

		var jqxhr = $.ajax({

				type: "POST",
				url: urlformada,										
				dataType: "json"	

			}).done(function(data){
				
				if (data["numeroelementos"]>0){
					
					datos = data["elementos"];
					dinamicelemts = "<div class='large-4 columns'> <label for='right-label'> Planes disponibles</label></div><select  name='tipocuenta' id='tipocuenta' class='tipocuenta large-8 columns'>";
					for (var a = 0; a < datos.length; a++) {
						
						tipocuenta = datos[a].idTipo_cuenta;
						nombre = datos[a].nombre;
						dinamicelemts+= "<option value="+ tipocuenta +">"+ nombre+"</option>";
					}					
					dinamicelemts+="</select>";

					$(".select-tipos-cuenta").html(dinamicelemts);
					$(".form-registro").show();

				}else{

					$('.form-registro').hide();
					$(".select-tipos-cuenta").html("Los datos de la lista no han sido cargados");		
				}

			}).fail(function() {
				alert( "error" );
			});



	});


	/*Termina la carga del script*/
});

