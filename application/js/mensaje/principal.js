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
			$("#registrointemporalbtn").show();
			$("#registrotemporal").show();
			
		}else{
			estadopresente  = 0;
			$('#asignarhora').show();
			$("#registrointemporalbtn").hide();
			$("#registrotemporal").hide();
		}				
	});


	$("#asignar_fecha_hora").click(function(){

		if (estadopresentefechahora == 0 ) {

			estadopresentefechahora  = 1;
			$('#presentesiempre').hide();
			$('#camposfechas').show();
			$("#registrotemporal").show();
			$("#registrointemporalbtn").hide();

		}else{

			estadopresentefechahora  = 0;
			$('#presentesiempre').show();
			$('#camposfechas').hide();
			$("#registrointemporalbtn").hide();
			$("#registrotemporal").hide();
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



function navmenucampania(e){
	
	
	switch(e){

		case "mensajes_facebook":
			
			$("#secction_facebook").show();
			$("#secction_twitter").hide();			
			$("#primeros_pasosseccion").hide();			
			$("#datos_campañaseccion").hide();


			$("#mensajes_facebook").attr("class","active secction_facebook");
			$(".mensaje_twitter").attr("class","mensaje_twitter");			
			$(".primeros_pasos").attr("class","primeros_pasos");
			$(".datos_campaña").attr("class","datos_campaña");


			break;

		case "mensaje_twitter":

			$("#secction_twitter").show();
			$("#secction_facebook").hide();			
			$("#primeros_pasosseccion").hide();			
			$("#datos_campañaseccion").hide();

			$(".mensaje_twitter").attr("class","active mensaje_twitter");
			$("#mensajes_facebook").attr("class","secction_facebook");
			$(".primeros_pasos").attr("class","primeros_pasos");
			$(".datos_campaña").attr("class","datos_campaña");

			break;

		case "primeros_pasos":	

			$("#primeros_pasosseccion").show();			
			$("#secction_twitter").hide();
			$("#secction_facebook").hide();						
			$("#datos_campañaseccion").hide();

			$(".primeros_pasos").attr("class","active primeros_pasos");
			$(".mensaje_twitter").attr("class","mensaje_twitter");
			$("#mensajes_facebook").attr("class","secction_facebook");
			$(".datos_campaña").attr("class","datos_campaña");

			$(document).foundation('joyride', 'start');

			break;

		case "datos_campaña":	

			$("#datos_campañaseccion").show();	
			$("#primeros_pasosseccion").hide();			
			$("#secction_twitter").hide();
			$("#secction_facebook").hide();	

			$(".datos_campaña").attr("class","active datos_campaña");
			$(".primeros_pasos").attr("class","primeros_pasos");
			$(".mensaje_twitter").attr("class","mensaje_twitter");
			$("#mensajes_facebook").attr("class","secction_facebook");
						

			break;
		default:
			alert("default");
			break;	

	}

}