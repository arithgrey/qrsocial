$(document).on("ready", function(){

	
	/*Load data campaña*/	
	loadndatacampania();
	/*Load all campanias*/
	loadallcampanias();


});

function loadndatacampania(){

	 campid = $("#campid").val();
	 url= $(".now").val()+"index.php/api/camprest/getdescriptioncampbyid/format/json";

	 $.get(url , {"idcamp" : campid})
	 .done(function(data){

	 	nombre = data[0].nombre;
	 	descripcion = data[0].descripcion;

	 	l= "<div class='large-12 columns' ><p id='name_title'>"+nombre+"</p> </div>";
	 	l+= "<div class='large-12 columns' ><p id=''>"+descripcion+"</p> </div>";
	 	$("#data_campania").html(l);



	 }).fail(function(){
	 	alert("Error load campaña");

	 });


}

function loadallcampanias(){

	url = $(".now").val() +"index.php/api/camprest/loadcampania/format/json";	
	$.get(url).done(function(data){

						    listado="<table><tr id='title_t'><td id='title_t_p'>Campaña</td>  <td id='title_t_p'>Acerca de</td></tr> ";
		
							for (var a = 0; a < data.length; a++) {									
								idcampaña = data[a].idcampaña; 		
								nombre = data[a].nombre;								
								descripcion = data[a].descripcion;							

								direct = $(".now").val()+"/index.php/camp/opciones?camp="+idcampaña+"&name="+nombre;
								listado +="<tr><td><a href='"+direct+"'>"+nombre+"</a></td><td>"+ descripcion.slice(0,200) +"....</td></tr>";										  
										  								
							}					
							listado+="</table>";									
							$("#data_campaniaothers").html(listado);

		
	}).fail(function(){

		alert("Error loadallcampanias");
	});


}