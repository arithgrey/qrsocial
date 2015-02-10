$(document).on("ready", function(){
    
	listmensajes();


	$("#registrointemporalbtn").click(registrointemporal);
	$("#mensaje_camp").show();
	$("#mensaje_camp").attr("class","active mensaje_camp");
	$("#registrotwitter").click(registrotwitterf);	
	$("#statusmsjedit").change(formoptionsfacebook);
	llenacalendariosdef();
	generahorariosdisponibles();
	$(".dcc").click(changevalorinputcheck);

	//url_img_fb = $('.now').val()+ "application/img/png/facebook-128-black.png"; 
	//img_F ="<img id='img_facebook' src='"+url_img_fb+"'>";
	//llenaelementoHTML("#img_fb" , img_F);

});


function registrointemporal(){

	url = $(".now").val()+ "index.php/api/mensajerest/registrointemporalmsjfb/format/json"; 
	
	flaghora = $("#hora_inicio_select").val();
	f=0;
	descripcion = $("#descripcion").val();

			if ( descripcion.length > 0 ) {					
				if (flaghora ==  null) {
					llenaelementoHTML("#p_repotemporal" , "Asigne hora de inicio y termino en el mensaje");	
				}else{
					f =1;
				}
			}else{
				llenaelementoHTML("#p_repotemporal" , "Asigne un mensaje correcto");
			}







	if (f == 0 ) {

	}else{

	horaI  = $("#hora_inicio_select").val();
	horaT = $("#hora_termino_select").val();

	$("#hinicio").val(horaI);
	$("#htermino").val(horaT);
	
	$.post(url , $("#mensajefbform").serialize()  )
		.done(function(data){
			

			if (data == 1) {

				
				llenaelementoHTML("#p_repotemporal" , "Mensaje de Facebook Registrado con éxito.!");
				$("#descripcion").val("");
				$("#descriptioncaption").val("");
				$("#name").val("");
				$("#picture").val("");
				$("#source").val("");
				$("#link").val("");

				listmensajes(); 	
				listmensajestwitter();
				generahorariosdisponibles();


			}else{
				$("#p_repotemporal").html("Falla en el registro");	
			}						

	}).fail(function(){
			alert("fail");

	});	

	}
	
	return false;
}






















/*
function listmensajes(){

	url= $(".now").val() +  "index.php/api/mensajerest/listmensajebycuenta/format/json";	
	$.get(url , $("#mensajefbform").serialize() )
		.done(function(data){

			
		repo ="<table class='large-12 columns' >"+
		"<tr id='title_table_msj'>"+
		"<td><label class='titulo_mensaje'> # </label></td>"+
		"<td><label class='titulo_mensaje'>Mensaje </label></td> "+
		"<td><label class='titulo_mensaje'>Días  Disponibles 	</label></td> "+		
		"<td><label class='titulo_mensaje'>Horario  Disponible </label></td> "+		
		"<td><label class='titulo_mensaje'>Configuración </label></td>"+		
		"<td><label class='titulo_mensaje'>Eliminar </label></td> </tr>";
		
			for (var a = 0; a < data.length; a++) {

				if (data[a].social == "F") {


					L =  data[a].L;
					M =  data[a].M;
					MI =  data[a].MI;
					J =  data[a].J;
					V =  data[a].V;
					S =  data[a].S;
					D =  data[a].D;

					styleL ="";
					styleM ="";
					styleMI ="";
					styleJ ="";
					styleV ="";
					styleS ="";
					styleD ="";

					if( L == 1 ) {

						styleL = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleL = "style='background: white'"; 

					}


					if( M == 1 ) {

						styleM = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleM = "style='background: white'"; 

					}


					if( MI == 1 ) {

						styleMI = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleMI = "style='background: white'"; 

					}


					if( J == 1 ) {

						styleJ = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleJ = "style='background: white'"; 

					}

					if( V == 1 ) {

						styleV = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleV = "style='background: white'"; 

					}


					if( S == 1 ) {

						styleS = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleS = "style='background: white'"; 

					}



					if( D == 1 ) {

						styleD = "style='background: rgba(36, 187, 212, 1)'"; 
						
					}else{
						styleD = "style='background: white'"; 

					}


					horainicio = data[a].horainicio;
					horatermino  = data[a].horatermino;


					if (horainicio < 12) {

						horainicio  =  horainicio + " AM";
					}else{
						horainicio  =  horainicio + " PM";
					}


					if (horatermino < 12) {

						horatermino  =  horatermino + " AM";
					}else{
						horatermino  =  horatermino + " PM";
					}



					repo+="<tr><td>"+data[a].idmensaje+"</td>";				
					repo+="<td>"+data[a].mensajedescripcion+"</td>";				
					repo+="<td><label class='day' id='L'  "+styleL+" >L</label> <label class='day' id='M' "+styleM+" >M</label> <label id='MI' class='day' "+styleMI+">M</label> <label class='day' id='J' "+styleJ+" >J</label> <label id='V' class='day' "+styleV+">V</label> <label id='S' class='day' "+styleS+">S</label> <label  id='D' class='day' "+styleD+" >D</label></td>";				
					repo+="<td>"+horainicio+" a " +  horatermino   +"</td>";																	
			
					repo+="<td> <img src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "' class='config_msj_id' id='"+ data[a].idmensaje +"' ></td>";									
					repo+="<td><img  class='eliminarmensaje'  id='"+ data[a].idmensaje +"'  src='"+ $(".now").val()+'application/img/png/glyphicons-193-circle-remove.png'  + "'> </td></tr>";												
		
				
				}	
		
			}

		repo+="</table>";
		llenaelementoHTML("#listmensajes" , repo);
		$(".config_msj_id").click(configmensajeacct);
		$(".eliminarmensaje").click(eliminamensajelista);
		

	}).fail(function(){
		alert("Fail ajax");
	});


}

*/


function listmensajes(){

	url= $(".now").val() +  "index.php/api/mensajerest/listmensajebycuenta/format/json";	
	$.get(url , $("#mensajefbform").serialize() )
		.done(function(data){

			
		repo ="<table class='large-12 columns' >"+
		"<tr id='title_table_msj'>"+
		"<td><label class='titulo_mensaje'># </label></td>"+
		"<td><label class='titulo_mensaje'>Mensajes para Facebook </label></td> "+
		"<td><label class='titulo_mensaje'>Días  Disponibles 	</label></td> "+		
		"<td><label class='titulo_mensaje'>Horario  Disponible </label></td> "+		
		"<td><label class='titulo_mensaje'>Configuración </label></td>"+		
		"<td><label class='titulo_mensaje'>Eliminar </label></td> </tr>";
		

		repo_twitter ="<table class='large-12 columns' >"+
		"<tr id='title_table_msj'>"+
		"<td><label class='titulo_mensaje'> # </label></td>"+
		"<td><label class='titulo_mensaje'>Mensajes para Twitter </label></td> "+
		"<td><label class='titulo_mensaje'>Días  Disponibles 	</label></td> "+		
		"<td><label class='titulo_mensaje'>Horario  Disponible </label></td> "+		
		"<td><label class='titulo_mensaje'>Configuración </label></td>"+		
		"<td><label class='titulo_mensaje'>Eliminar </label></td> </tr>";
		

			for (var a = 0; a < data.length; a++) {

				if (data[a].social == "F") {


					L =  data[a].L;
					M =  data[a].M;
					MI =  data[a].MI;
					J =  data[a].J;
					V =  data[a].V;
					S =  data[a].S;
					D =  data[a].D;

					styleL ="";
					styleM ="";
					styleMI ="";
					styleJ ="";
					styleV ="";
					styleS ="";
					styleD ="";

					if( L == 1 ) {

						styleL = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleL = "style='background: white'"; 

					}


					if( M == 1 ) {

						styleM = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleM = "style='background: white'"; 

					}


					if( MI == 1 ) {

						styleMI = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleMI = "style='background: white'"; 

					}


					if( J == 1 ) {

						styleJ = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleJ = "style='background: white'"; 

					}

					if( V == 1 ) {

						styleV = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleV = "style='background: white'"; 

					}


					if( S == 1 ) {

						styleS = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleS = "style='background: white'"; 

					}



					if( D == 1 ) {

						styleD = "style='background: rgba(36, 187, 212, 1)'"; 
						
					}else{
						styleD = "style='background: white'"; 

					}


					horainicio = data[a].horainicio;
					horatermino  = data[a].horatermino;


					if (horainicio < 12) {

						horainicio  =  horainicio + " AM";
					}else{
						horainicio  =  horainicio + " PM";
					}


					if (horatermino < 12) {

						horatermino  =  horatermino + " AM";
					}else{
						horatermino  =  horatermino + " PM";
					}



					repo+="<tr><td>"+data[a].idmensaje+"</td>";				
					repo+="<td>"+data[a].mensajedescripcion+"</td>";				
					repo+="<td><label class='day' id='L'  "+styleL+" >L</label> <label class='day' id='M' "+styleM+" >M</label> <label id='MI' class='day' "+styleMI+">M</label> <label class='day' id='J' "+styleJ+" >J</label> <label id='V' class='day' "+styleV+">V</label> <label id='S' class='day' "+styleS+">S</label> <label  id='D' class='day' "+styleD+" >D</label></td>";				
					repo+="<td>"+horainicio+" a " +  horatermino   +"</td>";																	
			
					repo+="<td> <img style='width: 25%;' src='"+ $(".now").val()+'application/img/general/pencil41.png'  + "' class='config_msj_id' id='"+ data[a].idmensaje +"' ></td>";									
					repo+="<td><img  style='width: 40%;' class='eliminarmensaje'  id='"+ data[a].idmensaje +"'  src='"+ $(".now").val()+'application/img/general/delete6.png'  + "'> </td></tr>";												
					

					
				
				}else{





					L =  data[a].L;
					M =  data[a].M;
					MI =  data[a].MI;
					J =  data[a].J;
					V =  data[a].V;
					S =  data[a].S;
					D =  data[a].D;

					styleL ="";
					styleM ="";
					styleMI ="";
					styleJ ="";
					styleV ="";
					styleS ="";
					styleD ="";

					if( L == 1 ) {

						styleL = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleL = "style='background: white'"; 

					}


					if( M == 1 ) {

						styleM = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleM = "style='background: white'"; 

					}


					if( MI == 1 ) {

						styleMI = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleMI = "style='background: white'"; 

					}


					if( J == 1 ) {

						styleJ = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleJ = "style='background: white'"; 

					}

					if( V == 1 ) {

						styleV = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleV = "style='background: white'"; 

					}


					if( S == 1 ) {

						styleS = "style='background: rgba(36, 187, 212, 1)'"; 
					}else{
						styleS = "style='background: white'"; 

					}



					if( D == 1 ) {

						styleD = "style='background: rgba(36, 187, 212, 1)'"; 
						
					}else{
						styleD = "style='background: white'"; 

					}


					horainicio = data[a].horainicio;
					horatermino  = data[a].horatermino;


					if (horainicio < 12) {

						horainicio  =  horainicio + " AM";
					}else{
						horainicio  =  horainicio + " PM";
					}


					if (horatermino < 12) {

						horatermino  =  horatermino + " AM";
					}else{
						horatermino  =  horatermino + " PM";
					}



					repo_twitter+="<tr><td>"+data[a].idmensaje+"</td>";				
					repo_twitter+="<td>"+data[a].mensajedescripcion+"</td>";				
					repo_twitter+="<td><label class='day' id='L'  "+styleL+" >L</label> <label class='day' id='M' "+styleM+" >M</label> <label id='MI' class='day' "+styleMI+">M</label> <label class='day' id='J' "+styleJ+" >J</label> <label id='V' class='day' "+styleV+">V</label> <label id='S' class='day' "+styleS+">S</label> <label  id='D' class='day' "+styleD+" >D</label></td>";				
					repo_twitter+="<td>"+horainicio+" a " +  horatermino   +"</td>";																	
					repo_twitter+="<td> <img style='width: 25%;' src='"+ $(".now").val()+'application/img/general/pencil41.png'  + "' class='config_msj_id' id='"+ data[a].idmensaje +"' ></td>";									
					repo_twitter+="<td><img  class='eliminarmensaje'  id='"+ data[a].idmensaje +"' style='width: 40%;' src='"+ $(".now").val()+'application/img/general/delete6.png'  + "'> </td></tr>";												
		

				}	


		
			}

		repo+="</table>";
		llenaelementoHTML("#listmensajes" , repo);	

		repo_twitter+="</table>";
		llenaelementoHTML("#listmensajes_twitter_now" , repo_twitter);

		
		$(".config_msj_id").click(configmensajeacct);
		$(".eliminarmensaje").click(eliminamensajelista);
		

	}).fail(function(){
		alert("Fail ajax");
	});


}






function eliminamensajelista(e){

	id = e.target.id;
	$("#dlg_eliminamensajeconfirm").foundation('reveal','open');			
	llenaelementoHTML("#numeromensaje" , "Usted eliminara permanentemente el mensaje #" + id);
	

	/*Eliminar mensajereste*/

	$("#confelimmensaje").click(function(){

			url = $(".now").val()+"index.php/api/mensajerest/delmensajebyid/format/json";	

			$.post(url , {"idmensaje" : id})
			.done(function(data){
				
					
				if (data == "1") {


					$("#dlg_eliminamensajeconfirm").foundation('reveal','close');		
					
					listmensajes();
					listmensajestwitter();				
				}

			}).fail(function(){
				alert("Error");
			});



	});




	/*Cancelar*/

	$("#cancelareliminarmensaje").click(function(){

		$("#dlg_eliminamensajeconfirm").foundation('reveal' ,  'close');	
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
		llenaelementoHTML("#listmensajestw" , repo);
		$(".config_msj_id").click(configmensajeacct);
		

	}).fail(function(){
		alert("Fail ajax");
	});

}



function llenacalendariosdef(){

				var f = new Date();
				dia =  f.getDate();
				$("#fullyearI").val(f.getFullYear());				
				diasmesactual = daysInMonth( f.getMonth() , f.getFullYear());
				diasmessiguiente = daysInMonth( f.getMonth() + 1  , f.getFullYear());
				Horaactual =f.getHours();

				d = ""; 
				for (var a = 1; a <= diasmesactual; a++) {
					
					d+="<option value='"+a+"'>"+a+"</option>";
				}
				llenaelementoHTML("#diaI" , d);


				d = ""; 
				for (var a = 1; a <= diasmesactual; a++) {
					
					d+="<option value='"+a+"'>"+a+"</option>";
				}
				llenaelementoHTML("#diaT" , d);



				b="";	
				for (var a = 0;  a < 24; a++ ) {

					horatext ="";

						if (a < 12) {
							horatext = a + " AM";
						}else{
							horatext = a + " PM";
						}
						b+="<option value='"+a+"'>"+ horatext +"</option>";
				}				
				llenaelementoHTML("#horaI" , b);


				b="";	
				for (var a = 0;  a < 24; a++ ) {

					horatext ="";

						if (a < 12) {
							horatext = a + " AM";
						}else{
							horatext = a + " PM";
						}
						b+="<option value='"+a+"'>"+ horatext +"</option>";
				}				
				llenaelementoHTML("#horaT" , b);



				$('#mesI > option[value="'+ f.getMonth() +1 +'"]').attr('selected' , 'selected');
				$('#diaI > option[value="'+ dia +'"]').attr('selected' , 'selected');
				$('#horaI > option[value="'+ Horaactual +'"]').attr('selected' , 'selected');



				$('#mesT > option[value="'+ f.getMonth() +2 +'"]').attr('selected' , 'selected');
				$('#diaT > option[value="'+ dia +'"]').attr('selected' , 'selected');
				$('#horaT > option[value="'+ Horaactual +'"]').attr('selected' , 'selected');


}



function configmensajeacct(evt){

		idmensaje = evt.target.id;	
		campid = $("#campid").val();
		url =  $(".now").val() +"index.php/camp/editainformacionmensaje?mensaje="+idmensaje+"&campid="+campid;

		redirect(url);		
}





function daysInMonth(humanMonth, year){
	
	return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
}

function changevalorinputcheck(e){



	id = "#" + e.target.id;
	checkandchangeval(id);
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








function generahorariosdisponibles(){
	
	urlimg = $(".now").val() +"application/img/png/glyphicons-191-circle-plus.png";		
	var dias_semana = new Array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
	var fecha_actual = new Date();

	list= ""; 		
	list+="<table class='large-12 columns' id='diassection'><tr><td><label class='d'>L</label></td><td><label class='d'>M</label></td><td><label class='d'>M</label></td><td><label class='d'>J</label></td><td><label class='d'>V</label></td><td><label class='d'>S</label></td><td><label class='d'>D</label></div></td></tr>"; 
	list+="<tr><td><input type='checkbox' name='lunes' class='diaselect' id='lunes' value='0'></td><td><input type='checkbox' id='martes' value='0' name='martes' class='diaselect'></td><td><input type='checkbox' value='0' name='miercoles' id='miercoles' class='diaselect'></td><td><input type='checkbox' id='jueves' value='0' name='jueves' class='diaselect' ></td><td><input type='checkbox' value='0' id='viernes' name='viernes' class='diaselect' ></td><td><input type='checkbox' id='sabado' value='0' name='sabado' class='diaselect'></td><td><input type='checkbox' id='domingo' name='domingo' value='0' class='diaselect'></td></tr></table>"; 
	
	llenaelementoHTML("#horariosdisponibles" , list);

	inputcheckedef =  "#"+dias_semana[fecha_actual.getDay()];
	$(inputcheckedef).attr("checked", true);
	$(inputcheckedef).val("1");

	$(".diaselect").click(changestatusday);

	//
	listhoras = "<div class='large-12 columns' ><table class='large-12 columns' >";

	for (var a = 0; a <= 23; a++) {
		hora = a; 
		if (hora <12 ) {
			hora =  hora + " AM ";
		}else{
			hora =  hora + " PM ";
		}

		nombreev ="evento" + a ; 
		fhora = "fhora"+a;
		fhorae = "fhorae"+a;
		
		listhoras +="<tr class='"+nombreev+"'  ><td><p class='"+fhora+"'>"+hora+" </p> </td><td><p class='"+fhorae+"'> Fijar hora <img class='horalistado' id='"+a+"' src='"+urlimg+"'> </p> </td></tr>";	
		
	}

	listhoras +="</table></div>";
	llenaelementoHTML("#horariosdisponibleshoras" , listhoras);	


	/**/
	$(".horalistado").click(asignarhoramensaje);
	

}

function changestatusday(e){

	id= e.target.id;
	idselect =  "#"+id;
	valoractualcheck = $(idselect).val();

	if (valoractualcheck == "0") {
		$(idselect).val("1");
	}else{
		$(idselect).val("0");
	}

}

function asignarhoramensaje(e){

	horainicio =  e.target.id;	
	$("#dlg_asignarhoramensajeg").foundation("reveal" , "open");

	hora ="";
	if (horainicio <12) {
		hora =  horainicio + " AM";
	}else{
		hora =  horainicio + " PM";
	}

	slect ="<p id=''>Hora en que iniciará a estar disponible el mensaje</p><select name='hora_inicio_select' id='hora_inicio_select' ><option value = '"+horainicio+"'> "+hora+" <option></select>";

		nlect = "<p id=''>Hora en que dejara de estar disponible el mensaje</p> <select name='hora_termino_select' id='hora_termino_select' >";	
		for (var a = 0; a <= 23; a++) {

			if (a !=  parseInt(e.target.id)){

				nuevahora  =  ""; 
				if (a <12) {
					nuevahora = a + " AM";
				}else{
					nuevahora =  a + " PM";
				}

				nlect += "<option value = '"+a+"'> "+nuevahora+" </option>"; 
			}				


				
		}	
	nlect +="</select>";
	llenaelementoHTML("#hora_inicio_sec" , slect);
	llenaelementoHTML("#hora_termino_sec" , nlect);
	sig = parseInt(e.target.id)+1;	
	$("#hora_termino_select").val(sig).change();


	$("#hora_termino_select").change(function(){
		

		
		llenacalendariosdef();

		last = this.value;		
		if (parseInt(e.target.id) < last ) {

			for (var b = parseInt(e.target.id); b <= last ; b++){
				
				idchangeelementohtml =  ".evento"+b;
				$(idchangeelementohtml).css("background" , "#92985F");

				fhora =  ".fhora"+b;
				$(fhora).css("color" , "white");
				fhorae =  ".fhorae"+b;
				$(fhorae).css("color" , "white");
				urlimg = $(".now").val()+"application/img/png/glyphicons-199-ok.png";
				$(fhorae).html("Mensaje disponible en este horario <img src='"+urlimg+"'>");
			}	

		}else{

			for (var b = parseInt(e.target.id); b <=24   ; b++){
				
				idchangeelementohtml =  ".evento"+b;
				$(idchangeelementohtml).css("background" , "#92985F");
				fhora =  ".fhora"+b;
				fhorae =  ".fhorae"+b;
				$(fhora).css("color" , "white");

				urlimg = $(".now").val()+"application/img/png/glyphicons-199-ok.png";
				$(fhorae).html("Mensaje disponible en este horario <img src='"+urlimg+"'>");
				$(fhorae).css("color" , "white");


			}	

			for (var b = 0; b <= last; b++){
				
				idchangeelementohtml =  ".evento"+b;
				$(idchangeelementohtml).css("background" , "#92985F");
				fhora =  ".fhora"+b;
				fhorae =  ".fhorae"+b

				$(fhora).css("color" , "white");
				urlimg = $(".now").val()+"application/img/png/glyphicons-199-ok.png";
				$(fhorae).html("Mensaje disponible en este horario <img src='"+urlimg+"'>");
				$(fhorae).css("color" , "white");

			}	
			
			
		}

		$("#hechohora").click(function(){
			$("#dlg_asignarhoramensajeg").foundation("reveal", "close" );	
		});
		


	});



}