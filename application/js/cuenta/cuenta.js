$(document).on("ready", function(){
	urlnow = $('.now').val();



	/*Listado de cuentas actuales*/
	loadcuentas();	


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
					loadcuentas();

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

function loadcuentas(){

	urlformada = urlnow +"index.php/api/cuentarest/listarcuentas/format/json";

			var jqxhr = $.ajax({

				type: "POST",
				url: urlformada,										
				dataType: "json"	

			}).done(function(data){
			
		  		
				elementos ="<table><thead><tr><th>Identificador</th><th>Cuenta</th><th>Descripción</th><th>Estado</th></tr></thead><tbody>";
				for (var a = 0; a < data.length; a++) {

					cuenta =data[a].idcuenta;
					nombre = data[a].nombre;
					descripcion = data[a].descripcion;
					status = data[a].status;
					statusdescripcion ="";
					if (status == 1) {

						statusdescripcion ="Activa";
					}else if(status == 2){
						statusdescripcion ="Deshabilitada";
					}else{
						statusdescripcion ="";
					}
					
					elementos+="<tr><td><div data-alert class='alert-box'><a id='editar_cuenta_a' onclick=callform('"+cuenta+"');>"+cuenta+" Editar</a></td><td>"+ nombre+"</td> <td>"+descripcion+"</td><td>"+statusdescripcion+"</td></div> </tr>";

				}
				elementos+="</tbody></table>";
				$('.lista-cuentas').html(elementos);
				

			}).fail(function() {
				alert( "error" );
			});

}