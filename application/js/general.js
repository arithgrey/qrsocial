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
function validalength( cadena, minimo , mensajefail ){

	if (cadena.length>minimo){
		/*Mensaje ok*/
		return 1; 
	}else{
		/*Mensaje fail*/
		return  mensajefail;
	}
}