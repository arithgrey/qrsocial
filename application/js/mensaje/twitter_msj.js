$(document).on("ready" , function(){

	generahorariosdisponibles_tw();
	listahorarios();	
	$("#registromsjtwitter").click(registro_mensaje_twitter);
	
});

function generahorariosdisponibles_tw(){
	
	urlimg = $(".now").val() +"application/img/png/glyphicons-191-circle-plus.png";		
	var dias_semana = new Array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
	var fecha_actual = new Date();

	list= ""; 		
	list+="<table class='large-12 columns' id='diassection'><tr><td><label class='d'>L</label></td><td><label class='d'>M</label></td><td><label class='d'>M</label></td><td><label class='d'>J</label></td><td><label class='d'>V</label></td><td><label class='d'>S</label></td><td><label class='d'>D</label></div></td></tr>"; 
	list+="<tr><td><input type='checkbox' name='tlunes' class='tdiaselect' id='tlunes' value='0'></td><td><input type='checkbox' id='tmartes' value='1' name='tmartes' class='tdiaselect'></td><td><input type='checkbox' value='2' name='tmiercoles' id='tmiercoles' class='tdiaselect'></td><td><input type='checkbox' id='tjueves' value='3' name='tjueves' class='tdiaselect' ></td><td><input type='checkbox' value='4' id='tviernes' name='tviernes' class='tdiaselect' ></td><td><input type='checkbox' id='tsabado' value='5' name='tsabado' class='tdiaselect'></td><td><input type='checkbox' id='tdomingo' name='tdomingo' value='6' class='tdiaselect'></td></tr></table>"; 
	
	llenaelementoHTML("#horariosdisponibles_tw" , list);
	inputcheckedef =  "#t"+dias_semana[fecha_actual.getDay()];

	$(inputcheckedef).attr("checked", true);
	$(inputcheckedef).val("1");

	$(".diaselect").click(changestatusday);
	
	

}


function listahorarios(){
	listhoras = "<div class='large-12 columns' ><table class='large-12 columns' >";
	for (var a = 0; a <= 23; a++) {
		hora = a; 
		if (hora <12 ) {
			hora =  hora + " AM ";
		}else{
			hora =  hora + " PM ";
		}

		nombreev ="evento_twitter" + a ; 
		fhora = "fhora_twitter"+a;
		fhorae = "fhorae_twitter"+a;
		
		listhoras +="<tr class='"+nombreev+"'><td><p class='"+fhora+"'>"+hora+" </p> </td><td><p class='"+fhorae+"'> Fijar hora <img class='horalistado_twitter' id='"+a+"' src='"+urlimg+"'> </p> </td></tr>";			
	}

	listhoras +="</table></div>";
	llenaelementoHTML("#horariosdisponibles_twitter" , listhoras);	
	$(".horalistado_twitter").click(asignarhoramensaje_twitter);
}



function asignarhoramensaje_twitter(e){

	horainicio =  e.target.id;	
	$("#dlg_asignarhoramensajeg_twitter").foundation("reveal" , "open");

		hora ="";
		if (horainicio <12) {
			hora =  horainicio + " AM";
		}else{
			hora =  horainicio + " PM";
		}

	slect ="<p id='titlehora_twitter'>Hora en que iniciará a estar disponible el mensaje</p><select name='hora_inicio_select_twitter' id='hora_inicio_select_twitter' ><option value = '"+horainicio+"'> "+hora+" <option></select>";
	nlect = "";	

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
	llenaelementoHTML("#hora_inicio_sec_twitter" , slect);
	llenaelementoHTML("#hora_termino_select_twitter" , nlect);
	
	sig = parseInt(e.target.id)+1;		

	$("#hora_termino_select_twitter").val(sig).change(function(){
		

		listahorarios();
		
		last = this.value;		
		if (parseInt(e.target.id) < last ) {

			for (var b = parseInt(e.target.id); b <= last ; b++){
				
				idchangeelementohtml =  ".evento_twitter"+b;
				$(idchangeelementohtml).css("background" , "#92985F");

				fhora =  ".fhora_twitter"+b;
				$(fhora).css("color" , "white");
				fhorae =  ".fhorae_twitter"+b;
				$(fhorae).css("color" , "white");
				urlimg = $(".now").val()+"application/img/png/glyphicons-199-ok.png";				
				llenaelementoHTML(fhorae  , "Mensaje disponible en este horario <img src='"+urlimg+"'>");
			}	

		}else{

			for (var b = parseInt(e.target.id); b <=24   ; b++){
				
				idchangeelementohtml =  ".evento_twitter"+b;
				$(idchangeelementohtml).css("background" , "#92985F");
				fhora =  ".fhora_twitter"+b;
				fhorae =  ".fhorae_twitter"+b;
				$(fhora).css("color" , "white");

				urlimg = $(".now").val()+"application/img/png/glyphicons-199-ok.png";
				$(fhorae).html("Mensaje disponible en este horario <img src='"+urlimg+"'>");
				$(fhorae).css("color" , "white");


			}	

			for (var b = 0; b <= last; b++){
				
				idchangeelementohtml =  ".evento_twitter"+b;
				$(idchangeelementohtml).css("background" , "#92985F");
				fhora =  ".fhora_twitter"+b;
				fhorae =  ".fhorae_twitter"+b

				$(fhora).css("color" , "white");
				urlimg = $(".now").val()+"application/img/png/glyphicons-199-ok.png";

				llenaelementoHTML(fhorae , "Mensaje disponible en este horario <img src='"+urlimg+"'>");
				$(fhorae).css("color" , "white");

			}	
			
			
		}

		$("#hechohora_twitter").click(function(){
			$("#dlg_asignarhoramensajeg_twitter").foundation("reveal", "close" );	
		});
		

	});

	
}





function registro_mensaje_twitter(){

	lista_reporte = "";
	flag =0; 
	flag_check =0;

	var lunes =0;
	var martes =0;
	var miercoles =0;
	var jueves = 0;
	var viernes =0;
	var sabado =0;
	var domingo=0;

	
		
	if ($("#hora_termino_select_twitter").val() == null ) {

		lista_reporte ="Indique la hora de inicio y termino  en que su mensaje estará disponible";
		flag = 0;

	}else{

		flag = 1;
	}



	$(".tdiaselect:checkbox:checked").each(   
	    function(){
	        
	        if($(this).val() == 0){
	        	lunes=1;	        	
	        	flag_check=1;
	        }else if($(this).val() == 1){
	        	martes =1;	
	        	flag_check=1;	
	        }else if($(this).val() == 2){
	        	miercoles=1;
	        	flag_check=1;
	        }else if($(this).val() == 3){
	        	jueves=1;
	        	flag_check=1;
	        }else if($(this).val() == 4){
	        	viernes=1;
	        	flag_check=1;
	        }else if($(this).val() == 5){
	        	sabado=1;
	        	flag_check=1;
	        }else if($(this).val() == 6){
	        	domingo=1;
	        	flag_check=1;
	        }else{

	        }
	    }
	);




	if (flag ==  1 ) {
		

		if (flag_check == 1) {
			
			mensaje =  $("#descripcion_twitter").val();
			mensaje = mensaje.replace(/(^\s*)|(\s*$)/g,"");

			if ( mensaje.length >0) {
				
				hora_inicio_msj = $("#hora_inicio_select_twitter").val();
				hora_termino_msj = $("#hora_termino_select_twitter").val();	
				campid = $("#campid").val();
				registra_mensaje_socialtwitter(hora_inicio_msj , hora_termino_msj , mensaje , lunes , martes, miercoles, jueves, viernes, sabado, domingo , campid);
				

			}else{
				lista_reporte = "Redacte el mensaje que aparecerá al escanear el qr"; 
			}

		}else{
			lista_reporte ="Seleccione el o los días en que el mensaje estará disponible";
		}
	}





	
	llenaelementoHTML( "#info_registro" , lista_reporte  );
	return false;
}

function registra_mensaje_socialtwitter(hora_inicio_msj , hora_termino_msj , mensaje , lunes , martes, miercoles, jueves, viernes, sabado, domingo , campid){


	url = $(".now").val()+ "index.php/api/mensajerest/registrotwitter/format/json"; 
	
	$.post(url , { "hora_inicio_msj" : hora_inicio_msj , "hora_termino_msj" : hora_termino_msj , "mensaje" : mensaje , "lunes" : lunes , "martes" : martes , "miercoles" : miercoles, "jueves" : jueves , "viernes" : viernes , "sabado" : sabado , "domingo" : domingo , "campid" : campid} )
	.done(function(data){

		listmensajes();
		if (data == true) {
			llenaelementoHTML( "#info_registro" , "Éxito al registrar el mensaje" );
		}else{
			llenaelementoHTML( "#info_registro" , "Su mensaje no pudo ser registrado correctamente" );
		}


	}).fail(function(){
		llenaelementoHTML( "#info_registro" , "Falla al intentar registrar"  );
	});

}


























