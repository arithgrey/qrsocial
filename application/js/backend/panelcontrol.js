$(document).on("ready", function(){
	
	$("#cuentas_configuracion").show();
	$("#planesdisponibles").hide();
	$("#ayuda_config").hide();
	$("#contra_config").hide();
	$("#usuarios_config").hide();
	$("#ayuda_config").hide();
	$("#btn_freshcount").click(actualizadatoscuenta);
	$("body").ready(loaddata);
	$("#btn_changepw").click(changepw);

	$("#panelcontrol_menu").attr("class","active panelcontrol_menu");
	usersaccount();

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

function loaddata(){

	url = $(".now").val()+"index.php/api/panelcontrolrest/listdataaccoun/format/json";
	
	$.post( url ).done(function(data){

		nombre = data[0].nombre; 
		compañianombre  = data[0].compañianombre;
		mailcompañia   =  data[0].mailcompañia;
		numerocompañia  = data[0].numerocompañia;
		urlcompañia  =  data[0].urlcompañia;

		$("#nombre_cuenta").val(nombre);
		$("#company_cuenta").val(compañianombre);
		$("#email_cuenta").val(mailcompañia);
		$("#numerotelefonico_cuenta").val(numerocompañia);
		$("#urlcompañia_cuenta").val(urlcompañia);



	}).fail(function(){
		alert("error");
	});

}



function actualizadatoscuenta(){


	url = $(".now").val()+"index.php/api/panelcontrolrest/updatedataaccount/format/json";	
	$.post( url  , $("#form_compani").serialize() ).done(function(data){
		
		if (data == 1) {

			$("#repoupdate").html("Datos registrados, reinicie sesión para ver los cambios");
			loaddata();
		}else{
			$("#repoupdate").html("Falla en el registro");
			loaddata();
		}

	}).fail(function(){
		alert("error");
	});


}


function usersaccount(){

	url = $(".now").val()+"index.php/api/panelcontrolrest/usersaccount/format/json";	
	$.get(url).done(function(data){

		l ="<table><div id='title_sec' >"+
				"<tr>"+					
					"<td><label class='title_lab' >#</label></td>"+
					"<td><label class='title_lab'>Nombre</label></td>"+
					"<td><label class='title_lab'>Correo electrónico <img src='"+ $(".now").val()+'application/img/png/glyphicons-122-message-empty.png'        +"' >   </label></td>"+
					"<td><label class='title_lab'>Fecha de Registro    <img src='"+ $(".now").val()+'application/img/png/glyphicons-46-calendar.png'        +"' >    </label></td>"+
					"<td><label class='title_lab'>Perfil</label></td>"+										
					"<td><label class='title_lab'>Descripción del perfil   <img src='"+ $(".now").val()+'application/img/png/glyphicons-30-notes-2.png'        +"' >  </label></td>"+
				"</tr></div>";
			

			for (var i = 0; i < data.length; i++) {
				
				l+="<tr><td>"+data[i].idusuario+"</td> <td>"+data[i].username +"</td> <td>"+data[i].correoelectronico+"</td>";
				l+="<td>"+data[i].fecharegistro+"</td> <td>"+data[i].nombre+"</td><td>"+data[i].descripcion+"</td></tr>";	
			}
			l+="</table>";

		$("#table_users").html(l);	
		

	}).fail(function(){
		alert("Error db reportar al administrador");
	});

}


function changepw(){

	oldpassword   = $("#oldpassword").val();
	newpassword =  $("#newpassword").val();
	passwordconfirm = $("#passwordconfirm").val();

	oldpasswordpost = ""+CryptoJS.SHA1(oldpassword);
	newpasswordpost  =  ""+CryptoJS.SHA1(newpassword);
	passwordconfirmpost  =  ""+CryptoJS.SHA1(passwordconfirm);

	url = $(".now").val()+"index.php/api/panelcontrolrest/validachange/format/json";

	$.post(url , {
		"oldpasswordpost" : oldpasswordpost, 
		"newpasswordpost" : newpasswordpost,
		"passwordconfirmpost": passwordconfirmpost		

	}).done(function(data){
		
		if (data == true) {			

			$("#oldpassword").val("");
			$("#newpassword").val("");
			$("#passwordconfirm").val("");	
			$("#reporte_change").html("Password modificada.!");

		}else{

			$("#reporte_change").html("Verifique sus datos.!");

		}


	}).fail(function(){
		alert("error");

	});


}