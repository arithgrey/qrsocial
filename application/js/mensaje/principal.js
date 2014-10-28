$(document).on("ready", function(){

	var estadopresente = 0;
	var estadopresentefechahora=0;
	var estadopresenteregistro =1;

	$("#registrarmensaje").click(function(){
		
		if (estadopresenteregistro == 0) {

			$("#registro-mensajes").show();
			estadopresenteregistro =1;	

		}else{

			$("#registro-mensajes").hide();	
			estadopresenteregistro =0;

		}
		

	});


	$('#camposfechas').hide();
	$("#exampleCheckboxSwitch").click(function(){
		

		if (estadopresente == 0 ) {

			estadopresente  = 1;
			$('#asignarhora').hide();
		}else{
			estadopresente  = 0;
			$('#asignarhora').show();
		}				
	});


	$("#asignar_fecha_hora").click(function(){

		if (estadopresentefechahora == 0 ) {

			estadopresentefechahora  = 1;
			$('#presentesiempre').hide();
			$('#camposfechas').show();
		}else{
			estadopresentefechahora  = 0;
			$('#presentesiempre').show();
			$('#camposfechas').hide();
		}	

	});


	$("#horainicio").ready(function(){
		e ="";
		a = 0 ; 
		while(a<=23){

			if (a<=12) {

				e+="<option value='"+a+" AM'> "+a+" AM</option>";	
			}else{
				e+="<option value='"+a+" PM'> "+a+" PM</option>";	
			}			
			a++;
		}

		llenaelemento( "#id_hora_inicio" ,e );
		llenaelemento("#id_hora_termino", e);

	});


	$("#minuto").ready(function(){
		e ="";
		a = 1 ; 
		while(a<=59){			

			e+="<option value='"+a+"'> "+a+" AM</option>";				
			a++;
		}
		
		//llenaelemento( "#id_minuto_inicio" ,e );
		//llenaelemento("#id_minuto_termino", e);

	});



});

function llenaelemento(idcomponente , datos){

	$(idcomponente).append(datos);
}
function showpanel(e){

		panel = e.value; 

		switch(panel) {

		    case 1:
				$("#registro-mensajes").show();	        
		        break;
		    case 2:
		        alert("Trabajando.....");
		        break;
		    default:
		    	
		    	alert("Trabajando.....");
		    	break;
	        
		} 



}