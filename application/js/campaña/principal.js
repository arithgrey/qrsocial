$(document).on("ready", function(){

	now = $('.now').val();		
	loadcamp();
	listaropciones();



	
$('#registrarcamp').click(function(){

		
			reporte = "";							
			$('.reporegistro').html("");

				posturl = now + "index.php/api/camprest/validaregistro/format/json";
				$.post(posturl , $('#registra_campa').serialize() )
					.done(function(data){
						
						loadcamp();
						listaropciones();
						llenaelementoHTML('.reporegistro' , data);

			}).fail(function(){
				alert("Fallo");
			});

		
	});
	

	/*Termina documeny on ready */
});


function loadcamp(){
	
	url = now + "index.php/api/camprest/loadcampania/format/json";	
	$.get(url).done(function(data){

							listado="";
							for (var a = 0; a < data.length; a++) {									
								idcampaña = data[a].idcampaña; 		
								nombre = data[a].nombre;
								descripcion = data[a].descripcion;
								fecharegistro = data[a].fecharegistro;
								redsocial  = data[a].evento;
								direct = now+"/index.php/camp/opciones?camp="+idcampaña+"&name="+nombre;
								listado +="<tr><td>"+idcampaña+"</td><td><a href='"+direct+"'>"+nombre+"<a></td><td>"+descripcion+"</td><td>"+fecharegistro+"</td><td>"+redsocial+""+"<td><a><div class='editcamp' id="+idcampaña+"> Editar ✎  </div></a></td></tr>";								
							}							
							llenaelementoHTML('.listacampañas' , listado);

							$(".editcamp").click(editarcampania);

		
	}).fail(function(){

	});
}

function listaropciones(){

	/*Listar nombres de las campañas actuales*/
	listadocampname =now+"index.php/api/camprest/presentanombreidcamp/format/json";
	$.get(listadocampname , {dataType : "json"}).done(function(data){
			
		elemento ="";		
		for (var a = 0; a < data.length; a++) {
			
			idcamp =  data[a].idcampaña;
			nombre = data[a].nombre;
			
			
			elemento+= "<option value='"+idcamp+"'>"+nombre+"</option>";

		}
		
		llenaelementoHTML('.campedit' , elemento);

	});


}
