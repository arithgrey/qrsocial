$(document).on("ready", function(){

    $("#calendario_general td a").click(getday);
    getzonasbytipo(""); 
	listmensajes();
	listmensajestwitter();
	loadtiposzonas();

	$("#registrointemporalbtn").click(registrointemporal);
	$("#mensaje_camp").show();
	$("#mensaje_camp").attr("class","active mensaje_camp");

	$("#registrotwitter").click(registrotwitterf);
	
	$("#statusmsjedit").change(formoptionsfacebook);

});

var fechas_list = [];
var b = 0; 
function getday(evento){
        dia = evento.target.text;
        
        if($(evento.delegateTarget).attr("class")=="cal_dia_seleccionado")
            $(evento.delegateTarget).attr("class","");

        else
            $(evento.delegateTarget).attr("class","cal_dia_seleccionado");
        fechas_list[b]= dia;
        $('#txt_dias_sel').attr("value",$('.cal_dia_seleccionado').length);
        return false;
}


function loadtiposzonas(){

    url= $(".now").val() +  "index.php/api/zonasrest/loadtiposzonas/format/json";
    $.get(url).done(function(data){


        reporte="";

        for (a = 0; a < data.length; a++) {
            
            reporte+="<option value='"+ data[a].idTipo_zona+ "'>"+ data[a].nombre+"</option>";

        }
        
        $("#tipozona").append(reporte);


    }).fail(function(){

        alert("Error");
    });

}

function getzonasbytipo(e){

	tipozona = e.value;
	if (e == "") {
		tipozona = "all";  
	}

	url = $(".now").val()+ "index.php/api/zonasrest/getzonasbytipo/format/json"; 

	$.get(url , {"tipozona" : tipozona}).done(function(data){

		r="";
		for (var a = 0; a < data.length; a++) {
					
			r += "<option value ='"+ data[a].idzona +"'>"+ data[a].zonanombre +"</option>";
		}
		$(".zona").html(r);

	}).fail(function(){
		alert(error);		
	});


}


function registrointemporal(){

	url = $(".now").val()+ "index.php/api/mensajerest/registrointemporalmsjfb/format/json"; 
	$.post(url , $("#mensajefbform").serialize()  )
		.done(function(data){
			
			if (data == 1) {

				$("#p_repotemporal").html("Mensaje de Facebook Registrado con éxito.!");
				$("#descripcion").val("");


				listmensajes(); 	
				listmensajestwitter();
			}else{
				$("#p_repotemporal").html("Falla en el registro");	
			}						

	}).fail(function(){
			alert("fail");

	});	

	return false;
}

function listmensajes(){

	url= $(".now").val() +  "index.php/api/mensajerest/listmensajebycuenta/format/json";	
	$.get(url , $("#mensajefbform").serialize() )
		.done(function(data){

		repo ="<table>"+
		"<tr id='title_table_msj'>"+
		"<td id=''>#</td>"+
		"<td id=''>Descripcion</td> "+
		"<td id=''>URL 	</td> "+
		"<td id=''>Disponible</td> "+
		"<td id=''>QR Formado </td> "+
		"<td id=''>Fecha de Registro</td>"+
		"<td id=''>Zona</td>"+
		"<td id=''>Detalles</td> </tr>";
		
			for (var a = 0; a < data.length; a++) {


				if (data[a].social == "F") {

					estado =  "";					
					if (data[a].status ==  1) {

						estado ="Habilitado";
					}else if ( data[a].status ==  2 ) {
						estado ="Habilitado con hora y fecha";
					}else{
						estado ="Inhabilitado";
					}


					repo+="<tr><td>"+data[a].idmensaje+"</td>";				
					repo+="<td>"+data[a].mensajedescripcion+"</td>";				
					repo+="<td id='url_f'>"+data[a].urlformada+"</td>";				
					imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[a].urlformada;
					repo+="<td>"+estado+" </td>"; 	
					repo+="<td><a href='"+imgurl+"'><img src='"+imgurl+"'> </a></td>"; 
					repo+="<td>"+data[a].fecharegistro+"</td>";										
					repo+="<td>"+data[a].zonanombre+"</td>";	
					repo+="<td class='config_msj_id' id='"+ data[a].idmensaje +"' ><a id='"+ data[a].idmensaje +"' >Configuración <img src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "'> </a></td></tr>";									
				
				}	

					
				
			}
		

		repo+="</table>";
		
		$("#listmensajes").html(repo);

		$(".config_msj_id").click(configmensajeacct);
		

	}).fail(function(){
		alert("Fail ajax");
	});

}



function listmensajestwitter(){

	url= $(".now").val() +  "index.php/api/mensajerest/listmensajebycuenta/format/json";	
	$.get(url , $("#mensajefbform").serialize() )
		.done(function(data){

		repo ="<table><tr id='title_table_msj_tw' ><p ><td id=''>#</td> <td id=''>Descripcion del QR</td> <td id=''>URL</td> <td >Disponible</td>  <td id=''>QR formado</td> <td id=''>Fecha de Registro</td><td id=''>Zona</td><td id=''>Detalles</td></p> </tr>";
		
			for (var a = 0; a < data.length; a++) {

						estado ="";

						if (data[a].social == "T") {

								status = data[a].status; 
								if (status  == 1 ) {
									estado  ="Habilitado"; 	
								}else if(estado == 2){
									estado  ="Habilitado con Hora y Fecha"; 	
								}else{
									estado  ="InHabilitado"; 	
								}
								imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[a].urlformada;
								repo+="<tr><td>"+data[a].idmensaje+"</td>";				
								repo+="<td>"+data[a].mensajedescripcion+"</td>";										
								repo+="<td>"+data[a].urlformada+"</td>";				
								repo+="<td>"+estado+"</td>";				
								repo+="<td> <a href='"+imgurl+"'> <img src='"+imgurl+"'> </a></td>"; 
								repo+="<td>"+data[a].fecharegistro+"</td>";										
								repo+="<td>"+data[a].zonanombre+"</td>";	
								repo+="<td class='config_msj_id' id='"+ data[a].idmensaje +"' ><a id='"+ data[a].idmensaje +"' >Configuración <img src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "'> </a></td></tr>";									
						}
					

					
				
			}
		

		repo+="</table>";
		
		$("#listmensajestw").html(repo);

		$(".config_msj_id").click(configmensajeacct);
		

	}).fail(function(){
		alert("Fail ajax");
	});

}







function configmensajeacct(evt ){

		idmensaje = evt.target.id;
		campid  = $("#campid").val();
		url = $(".now").val()+"index.php/api/mensajerest/loaddatamensajebyid/format/json";	

		$.get(url , {"idmensaje": idmensaje , "campid" : campid} ).done(function(data){

			descripcion = data[0].descripcion;
			urlmensaje =  data[0].urlformada;
			fecharegistro  = data[0].fecharegistro;
			status = data[0].status;

			imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+urlmensaje;

			$("#descripcionedit").val(descripcion);
			$("#urlmensajeedit").html( "<img src='"+imgurl+"' class='large-12 columns'>" );
			$("#fecharegistro").html(fecharegistro);
			$('#statusmsjedit > option[value="'+status+'"]').attr('selected', 'selected');


		}).fail(function(){

			alert("Error");
		});

		$("#dlg_configmensaje").foundation('reveal','open');		

		$("#idmensajeedit").val(idmensaje);

		$("#updatemensajebtn").click(function(){
			url = $(".now").val()+"index.php/api/mensajerest/updatemensajebyidandaccount/format/json";				
			//alert($("#updatemensaje").serialize());
					
			$.post(url , $("#updatemensaje").serialize())
			.done(function(data){
					

				listmensajes();
				listmensajestwitter();
				$("#dlg_configmensaje").foundation('reveal','close');		

			}).fail(function(){
				alert("Error");
			});


		});

		$("#delmensajebtn").click(function(){


			//alert($("#updatemensaje").serialize() ) ;
			url = $(".now").val()+"index.php/api/mensajerest/delmensajebyid/format/json";	

			$.post(url , {"idmensaje" : idmensaje})
			.done(function(data){
				
					
				if (data == "1") {

					$("#repodel").html("Mensaje eliminado.!");
					$("#dlg_configmensaje").foundation('reveal','close');		
					listmensajes();
					listmensajestwitter();
	
				}else{
					$("#repodel").html("Falla al intentar eliminar mensaje");
					$("#dlg_configmensaje").foundation('reveal','close');		


				}
				
			}).fail(function(){
				alert("Error");
			});


		});





}

function registrotwitterf(){
	
	url = $(".now").val()+ "index.php/api/mensajerest/registrotwitter/format/json"; 
	
	$.post(url , $("#twitterform").serialize()  )
		.done(function(data){
			
			if (data == 1) {

				

				listmensajes(); 
				listmensajestwitter();	
			}else{
				$("#p_repotemporal").html("Falla en el registro");	
			}						

	}).fail(function(){
			alert("fail");

	});	


	return false;
}


function formoptionsfacebook(){
	if ($("#statusmsjedit").val() != 2) {

		$("#horaconfimensaje").hide();
	}else{
		$("#horaconfimensaje").show();	
	}
}