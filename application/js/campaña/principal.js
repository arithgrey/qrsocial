$(document).on("ready", function(){

	$('.reveal-modal').trigger('click');
	$('.reveal-modal').trigger('click');

	// or directly on the modal
	$('.reveal-modal').foundation('reveal', 'open');
	$('.reveal-modal').foundation('reveal', 'close');


	$('#myModal').foundation('reveal', 'open', 'http://some-url');


// url with extra parameters
$('#myModal').foundation('reveal', 'open', {
    url: 'http://some-url',
    data: {param1: 'value1', param2: 'value2'}
});

// url with custom callbacks
$('#myModal').foundation('reveal', 'open', {
    url: 'http://some-url',
    success: function(data) {
        alert('modal data loaded');
    },
    error: function() {
        alert('failed loading modal');
    }
});


	



	now = $('.now').val();	

	
	/*Listar nombres de las campañas actuales*/
	listadocampname =now+"index.php/api/camprest/presentanombreidcamp/format/json";
	$.post(listadocampname , {dataType : "json"}).done(function(data){
		
		for (var a = 0; a < data.length; a++) {
			
			idcamp =  data[a].idcampaña;
			nombre = data[a].nombre;
			
			$('.campedit').append("<option valeu='"+idcamp+"'>"+nombre+"</option>");	

		}

	});



	/***/
	$('.guardarcambios').click(function(){

		urledit = now+"index.php/api/camprest/editcamp/format/json";
		alert($('#edita_campa').serialize());			
		$.post(urledit , $('#edita_campa').serialize(), {dataType: "json"})
		.done(function(data){

			alert(data);
		});



	});


	loadcamp();
	$('.registrarcampaña').click(function(){

		name = $('.nombrecampaña').val();		
		social = $('.red').val();
		descripcion = $('.descripcion').val();

		reporte = "";

		validationname =validalength( name, 5 , "Nombre asignado a la campaña demaciado corto.!!" );
		/*Validamos nombre de la campaña*/

		if (validationname == 1) {			
			$('.reporegistro').html("");

			/*Registro ajax */
				params = {"name": name, "social" : social , "descripcion" : descripcion}
				posturl = now + "index.php/api/camprest/validaregistro/format/json";


						var jqxhr = $.ajax({

							type: "POST",
							url: posturl,						
							data: params,
							dataType: "json"	

						}).done(function(data){				

							$('.estadoregistro').html(data);
						
						}).fail(function(){
							alert( "error" );
						});


		}else{

			$('.reporegistro').html(validationname);

		}

		/*Termina la función click registro de alimentos*/
	});


	/*Termina documeny on ready */
});


function loadcamp(){

	

		posturl = now + "index.php/api/camprest/loadcampania/format/json";


				var jqxhr = $.ajax({

							type: "POST",
							url: posturl,													
							dataType: "json"	

						}).done(function(data){				

							listado="";
							for (var a = 0; a < data.length; a++) {
									
								idcampaña = data[a].idcampaña; 		
								nombre = data[a].nombre;
								descripcion = data[a].descripcion;
								fecharegistro = data[a].fecharegistro;
								redsocial  = data[a].redsocial;

								listado +="<tr><td>"+idcampaña+"</td><td>"+nombre+"</td><td>"+descripcion+"</td><td>"+fecharegistro+"</td><td>"+redsocial+""+
								"<td><span class='label'><h5>Eliminar</h5></span></td><td><span class='label'><h5>Editar ✍ ✎ ✏ ✐ ✑</h5></span></td></tr>";
							

							}

							$('.listacampañas').html(listado);

						
						}).fail(function(){
							alert( "error" );
						});


}

function validalength( cadena, minimo , mensajefail ){


	if (cadena.length>minimo){
		/*Mensaje ok*/
		return 1; 
	}else{
		/*Mensaje fail*/
		return  mensajefail;
	}


}