$(document).on("ready", function(){
	
	$("#cuentas_configuracion").show();
	$("#planesdisponibles").hide();
	$("#ayuda_config").hide();
	$("#contra_config").hide();
	$("#usuarios_config").hide();
	$("#ayuda_config").hide();


});

function despliegamenu(evt){

	 	switch(evt){	 		
			case "cuenta":
				$("#cuentas_configuracion").show();
				$("#planesdisponibles").hide();
				$("#usuarios_config").hide();
				$("#ayuda_config").hide();
				$("#contra_config").hide();

				break;
			case "password":

				$("#cuentas_configuracion").hide();
				$("#usuarios_config").hide();
				$("#planesdisponibles").hide();
				$("#ayuda_config").hide();
				$("#contra_config").show();

				
				break;	
					
			case "pagos":

				$("#cuentas_configuracion").hide();
				$("#usuarios_config").hide();
				$("#planesdisponibles").show();
				$("#ayuda_config").hide();
				$("#contra_config").hide();

				
				break;	
			case "ayuda":				
				$("#cuentas_configuracion").hide();
				$("#usuarios_config").hide();
				$("#planesdisponibles").hide();
				$("#ayuda_config").show();
				$("#contra_config").hide();

				break;

			case "usuarios":
				$("#cuentas_configuracion").hide();
				$("#usuarios_config").show();
				$("#planesdisponibles").hide();
				$("#ayuda_config").hide();
				$("#contra_config").hide();
				break;			
			
			default:

			break;				
				
		}
	


}