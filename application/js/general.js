$(document).on("ready", function(){

	 $("#registrocontenido").click(showregcontenido);             
	 $("#listadocontenido").click(showlistcontenido);

});

function showregcontenido(){

	$("#registronuevosection").show();
	$("#contenidolistsection").hide();
}
function showlistcontenido(){
	
	$("#registronuevosection").hide();	
	$("#contenidolistsection").show();

}


function redirect(url){

	window.location.replace(url);
}

function alertsusses(mensaje){
	 responsedata+="<div data-alert class='alert-box success radius'>"+mensaje+"<a href='#' class='close'>&times;</a></div>";	
 	return responsedata; 							  
}
function llenaelementoHTML(idelement , data){

	$(idelement).html(data);
} 

function valorHTML(idelement , data){

	$(idelement).val(data);
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

function checkvaldb(inputid , valor){

	if (valor == "1" ) {
			$(inputid).attr("checked", true);
			$(inputid).val("1");
	}else{
			$(inputid).attr("checked", false);
			$(inputid).val("0");
	}

}
function checkandchangeval(idinput){

	if ($(idinput).val() ==  "1") {
			$(idinput).val("0");
			
	}else{
			$(idinput).val("1");
			
	}
}


function generahoras(name){

	l ="<select name='"+name+"' id='"+name+"'>"; 
	for (var a = 0; a <= 23; a++) {

		if (a<12) {

			f= a + " AM";  
			l+="<option value='"+a+"'>"+f+"</option>";
		}else{

			f= a + " PM";  
			l+="<option value='"+a+"'>"+f+"</option>";
		}			
	}

	return l;

}


function loadnumzonasbycount(idallenar){

	url = $(".now").val()+"index.php/api/generalrest/loadnumzonasbycount/format/json";

		$.get(url).done(function(data){

			
			llenaelementoHTML(idallenar , data);

		}).fail(function(){

		});

}

function loadnumcampbycount(idallenar){

	url = $(".now").val()+"index.php/api/generalrest/loadcampbycount/format/json";

		$.get(url).done(function(data){
			
			
			llenaelementoHTML(idallenar , data);

		}).fail(function(){
			
		});

}