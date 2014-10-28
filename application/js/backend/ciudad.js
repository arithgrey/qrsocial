$(document).on("ready", function(){

	loadciudades();

	$('.registro').click(function(){

		ciudad = $('.nombreciudad').val();
		descripcion = $('.descripcion').val();
		
		if (ciudad.length<1 ) {

			$('.reporteregistro').html("<p>El campo nombre es obligatorio<p>");

		}else{

			url = $('.now').val();
			urlpost= url+"index.php/api/ciudadrest/registro/format/json";
			params = { "ciudad" : ciudad , "descripcion": descripcion}
		
			var jqxhr = $.ajax({

				type: "POST",
				url: urlpost,						
				data: params,
				dataType: "json"	

			}).done(function(data){
				
				$('.reporteregistro').html("<a>"+data+"</a>");				
				loadciudades();
				
			
			})
			.fail(function() {
				alert( "error" );
			})
			.always(function() {
				//alert( "complete" );
			});



		}




	});


});


function loadciudades(){

	url = $('.now').val();	
	urlformada= url+"index.php/api/ciudadrest/listcuidad/format/json";	
	
		var jqxhr = $.ajax({

			type: "POST",
			url: urlformada,						
			dataType: "json"	

		}).done(function(data){
			ciudades ="";
			for (var a = 0; a < data.length; a++) {
				
				ciudad = data[a].idciudad;
				ciudades+= data[a].nombre+" <a onclick='eliminaciudad( ciudad )'>→ eliminar</a> <br>";

			};
			$('.listciudades').html(ciudades);
			
		
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});

}
function eliminaciudad(ciudad ){
	
		url = $('.now').val()+"index.php/api/ciudadrest/eliminar/format/json";	

		params = { "ciudad" : ciudad }
		
		var jqxhr = $.ajax({

			type: "POST",
			url: url,						
			data: params,
			dataType: "json"	

		}).done(function(data){
			
			$('.responsedel').html(data);
			loadciudades();
		
		})
		.fail(function() {
			alert( "error" );
		})
		.always(function() {
			//alert( "complete" );
		});
	
	
}
