$(document).on("ready", function(){

	now = $('.now').val();		
	loadcamp();
	listaropciones();
	$("#campanias_menu").attr("class","active campanias_menu");
	
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

		listado="<table><thead><tr><th><h5>#</h5></th><th><h5>Campaña</h5></th><th><h5>Descripción</h5></th>	<th><h5>Fecha de registro</h5></th>	<th><h5>Evento</h5></th><th><h5>Configuración</h5></th> </tr> </thead> <tbody>";
									
							for (var a = 0; a < data.length; a++) {									
								idcampaña = data[a].idcampaña; 		
								nombre = data[a].nombre;
								descripcion = data[a].descripcion;
								fecharegistro = data[a].fecharegistro;
								redsocial  = data[a].evento;

								direct = now+"/index.php/camp/opciones?camp="+idcampaña+"&name="+nombre;
								listado +="<tr><td>"+idcampaña+"</td> <td><a href='"+direct+"'>"+nombre+"</a></td>"+
										  "<td>"+descripcion.slice(0,200)+"<a class='seguir_leyendo' id='"+idcampaña+"'> .... Seguir leyendo </a> </td><td>"+fecharegistro+"</td><td>"+redsocial+""+"</td>"+
										  "<td><a><div class='editcamp' id="+idcampaña+"> Editar <img src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "'>  </div></a></td></tr>";								
							}					
							listado+=" </tbody></table>";		
							llenaelementoHTML('#listacampañas' , listado);

							$(".editcamp").click(editarcampania);
							$(".seguir_leyendo").click(seguirleyendo);

		
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


function seguirleyendo(e){

	
	id= e.target.id;
	url ="";
	$('#dlg_detalles_camp').foundation('reveal','open');


		url = $(".now").val()+"index.php/api/camprest/getdescriptioncampbyid/format/json";

		$.get(url ,{"idcamp" : id} ).done(function(data){
			descripcion = data[0].descripcion;

			$("#seguirleyendotext").html(descripcion);

		}).fail(function(){

			alert("fail getnamecampbyid");

		});


}