$(document).on("ready", function(){
	load_data_mensaje();
	$("#main_s").click(showmainsection);
	$("#more_s").click(showmasdetalles);
	$(".dcc").click(updatedaydispo);
	$("#return_camp").click(returntocampsection);
	
	
});

function load_data_mensaje() {

		idmensaje  = $("#mensaje").val();
		campid = $("#campid").val();

		url = $(".now").val()+"index.php/api/mensajerest/loaddatamensajebyid/format/json";	

		$.get(url , {"idmensaje": idmensaje , "campid" : campid} ).done(function(data){

				social = data[0].social				
				descripcion = data[0].descripcion;
				urlmensaje =  data[0].urlformada;
				fecharegistro  = data[0].fecharegistro;
				status = data[0].status;			
				namec  = data[0].name;
				linkc =  data[0].link;
				picturec =  data[0].picture;
				sourcec  = data[0].source;
				captionc = data[0].caption;
				descriptioncaptionc =  data[0].descriptioncaption;
				horainicio = data[0].horainicio;
				horatermino = data[0].horatermino;

				L = data[0].L;
				M = data[0].M;
				MI = data[0].MI;
				J = data[0].J;
				V = data[0].V;
				S = data[0].S;
				D = data[0].D;				


				
				checkvaldb("#lc" , L);
				checkvaldb("#mc" , M);
				checkvaldb("#mic" , MI);
				checkvaldb("#jc" , J);				
				checkvaldb("#vc" , V);
				checkvaldb("#sc" , S);
				checkvaldb("#dc" , D);
				

				imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+urlmensaje;

				$("#descripcionedit").val(descripcion);
				$("#urlmensajeedit").html( "<img src='"+imgurl+"' class='large-12 columns'>" );			
				$("#namec").val(namec);
				$("#linkc").val(linkc);
				$("#picturec").val(picturec);
				$("#sourcec").val(sourcec);
				$("#captionc").val(captionc);
				$("#descriptioncaptionc").val(descriptioncaptionc);				

				llenaelementoHTML("#horainicioconf" , generahoras("hora_inicioconfig") );
				llenaelementoHTML("#horaterminoconf" , generahoras("hora_terminoconfig") );
				llenaelementoHTML("#descripcion_lb" , descripcion);
				
				$("#hora_inicioconfig > option[value='"+horainicio+"']").attr('selected', 'selected');
				$("#hora_terminoconfig > option[value='"+horatermino+"']").attr('selected', 'selected');


				$("#descripcion_lb").click(update_mensaje);		
				$("#update_all").click(actualizar_data);
				

		}).fail(function(){

			alert("Error");
		});



}
function update_mensaje(){

	text_valor= $("#"+this.id).text();
    
    
    valorHTML("#descripcionedit" , text_valor);
    $("#descripcionedit").show();
    $("#descripcion_lb").hide();

    $("#descripcionedit").keydown(function(e){
             var code= e.keyCode;               
             if (code==13){    

                 label_val = $("#descripcionedit").val();
                 llenaelementoHTML("#descripcion_lb", label_val );             

                 $("#descripcion_lb").show();
                 $("#descripcionedit").hide();                 
                 update_mensaje_db();
                 return false;
    
             }
                
        });
        return false;
}


function update_mensaje_db(){
	
		
	url = $(".now").val()+"index.php/api/mensajerest/updatemensajebyidandaccount/format/json";				

		$.post(url , $("#form_edit_mensaje").serialize())
		.done(function(data){			
			
			load_data_mensaje();				

		}).fail(function(){
			alert("Error");
		});
		return false;

}
function actualizar_data(){
	update_mensaje_db();
	return false;
}




function showmainsection(){

	$("#main_section").show();

	$("#mas_detalles").hide();
}

function showmasdetalles(){

	$("#main_section").hide();
	$("#mas_detalles").show();

}
function updatedaydispo(e){
	
	id = $("#"+e.target.id).val(1);
	actualizar_data();	
	
}
function returntocampsection(){

	url =  $(".now").val()+ "index.php/camp/opciones?camp="+$("#campid").val();
	redirect(url);

	alert();
}