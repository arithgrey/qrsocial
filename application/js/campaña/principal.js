$(document).on("ready", function(){

	now = $('.now').val();	

	loadcamp();
	listaropciones();



	/***/
	$('.guardarcambios').click(function(){

		urledit = now+"index.php/api/camprest/editcamp/format/json";
						
		$.post(urledit , $('#edita_campa').serialize(),{dataType:"json"})
		.done(function(data){
			
			$('.reporteedit').append("<p>"+data+"</p>");
			$('#dlg_new_menu').foundation('reveal', 'close');
			loadcamp();
			listaropciones();
			

		});



	});


	
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
				
				posturl = now + "index.php/api/camprest/validaregistro/format/json";

					
					$.post(posturl , $('#registra_campa').serialize(),{dataType:"json"})
					.done(function(data){
						
						$('.reporegistro').html(data);
						loadcamp();
						listaropciones();

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

								direct = now+"/index.php/camp/opciones?camp="+idcampaña+"&name="+nombre;

								listado +="<tr><td>"+idcampaña+"</td><td><a href='"+direct+"'>"+nombre+"<a></td><td>"+descripcion+"</td><td>"+fecharegistro+"</td><td>"+redsocial+""+"<td><label onclick='editcam();'> Editar ✎  </label></td></tr>";
								
							}
							$('.listacampañas').html(listado);	
							

							

						
						}).fail(function(){
							alert( "error" );
						});


}

function listaropciones(){


	/*Listar nombres de las campañas actuales*/
	listadocampname =now+"index.php/api/camprest/presentanombreidcamp/format/json";
	$.post(listadocampname , {dataType : "json"}).done(function(data){
			
		elemento ="";		
		for (var a = 0; a < data.length; a++) {
			
			idcamp =  data[a].idcampaña;
			nombre = data[a].nombre;
			
			
			elemento+= "<option value='"+idcamp+"'>"+nombre+"</option>";

		}
		$('.campedit').html(elemento);			

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