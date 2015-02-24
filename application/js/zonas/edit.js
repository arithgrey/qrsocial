
$(document).on("ready", function(){
    $("#zonasqr_menu").attr("class","active zonasqr_menu");
    
    loaddatazona();
    listamensajeszona();

    $("#general").click(changesectiongeneral);
    $("#msjs_programados").click(changesectionmensaje);

});

function loadtiposzonas(){

    url= $(".now").val() + "index.php/api/zonasrest/loadtiposzonas/format/json";


    $.get(url).done(function(data){
        reporte="";
        for (a = 0; a < data.length; a++) {                        

            name_img =data[a].img_name; 
            url_img = $(".now").val()+"application/img/tipo_zonas/"+name_img;
            
            reporte+="<div class='large-2 columns'><img src='"+url_img+"'><label id='lb_text'>";            
            reporte+="<div class='row'><input type='radio' name='tipozona' id='"+data[a].idTipo_zona+"' value='"+ data[a].idTipo_zona+"'  class='tipozona' onclick='etipozona(this);'> "+data[a].nombre +"</div>" ;
            reporte+="</label></div>";

        }
              llenaelementoHTML("#edit_tipozona", reporte);        
              
    }).fail(function(){

        alert("Error");
    });





}

function etipozona(e){
    nueva_tzona  = e.value;
    idzona =  $("#zonaqredit").val();

    url = $("#now").val()+"index.php/api/zonasrest/settipocampbyid/format/json/";

    $.post(url , {"tzona" : nueva_tzona , "idzona":idzona }).done(function(data){

        
    }).fail(function(){
        alert("error");
    });



}


function loaddatazona(){

	idzona =  $("#zonaqredit").val();
	loadtiposzonas();	
    tipo_zona = "";
    url = $(".now").val()+ "index.php/api/zonasrest/getzonabyid/format/json";    
    add_img = $(".now").val()+ "application/img/general/add13.png";
    newimg= "<img width='6%;' src='"+add_img+" '>";

    $.get(url, { "idzona": idzona}).done(function(data){


    	if (data.length >0) {

    		for (var a = 0; a < data.length; a++) {
    			
    			//valorHTML("#zona_name" , data[a].zonanombre);
                if ($.trim(data[a].zonanombre) == "") {

                    llenaelementoHTML("#zona_name" , newimg);
                }else{
                    llenaelementoHTML("#zona_name" , data[a].zonanombre);
                }
    			
                if ( $.trim(data[a].descripcion) == "") {

                    llenaelementoHTML("#zona_referencia" , newimg);    
                }else{
                    llenaelementoHTML("#zona_referencia" , data[a].descripcion );
                }

    			llenaelementoHTML("#zona_fecha" , data[a].fecharegistro );

                if ($.trim(data[a].mensajedefault) ==""){
                    llenaelementoHTML( "#zona_defmsj", newimg);
                }else{
                    llenaelementoHTML( "#zona_defmsj", data[a].mensajedefault);
                }
    			
                tipo_zona = data[a].idTipo_zona;

                valorHTML("#zona_name_input_value" , data[a].zonanombre);
                valorHTML("#zona_name_area_value" , data[a].descripcion );

                
                idtipozonacheck =  "#"+data[a].idTipo_zona;

                $(idtipozonacheck).prop( "checked", true );

                valorHTML("#zona_defmsj_input_value", data[a].mensajedefault);

    		}

            img_qr = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+$(".now").val()+"index.php/appqrsocial/zonaatt?idzona="+idzona+"&format=json/";
            llenaelementoHTML("#qr_zona_img", "<img src='"+img_qr+"'>" );
    	}else{

    		urlnext = $(".now").val()+"index.php/zonasqr/principal";
    		redirect(urlnext);
    	}
    	

        select_tipozona(tipo_zona);


    }).fail(function(){

    	alert("Fail on load data zona");

    
    });




$("#zona_name").click(editacampo);
$("#zona_referencia").click(editarea);
$("#zona_defmsj").click(editacampomensadedef);
/*Termina load zona*/
}


function editacampomensadedef(){


    text_valor= $("#"+this.id).text();
    $("#"+this.id).hide();
    
    valorHTML("#zona_defmsj_input_value" , text_valor);
    $("#zona_defmsj_input_value").show();

    $("#zona_defmsj_input_value").blur(function(e){
             

                 label_val = $("#zona_defmsj_input_value").val();
                 llenaelementoHTML("#zona_defmsj", label_val );             
                 $("#zona_defmsj").show();
                 $("#zona_defmsj_input_value").hide();                 
                 update_zona();
                 return false;
                 //$("#"+this.id).remove();
             
                
        });
        return false;

}

function editacampo(){

    text_valor= $("#"+this.id).text();
    valorHTML("#zona_name_input_value" , text_valor);
    $("#"+this.id).hide();
    $("#zona_name_input_value").show();

    $("#zona_name_input_value").blur(function(e){
         
           

             label_val= $("#zona_name_input_value").val();             
             llenaelementoHTML("#zona_name", label_val ); 
             $("#zona_name").show();
              $("#zona_name_input_value").hide();             
             update_zona();
               
            
    });
    return false;


    
}

function editarea(){
    
    text_valor= $("#"+this.id).text();
    $("#"+this.id).hide();
    $("#zona_name_area_value").show();
    valorHTML("#zona_name_area_value", text_valor);

        $("#zona_name_area_value").blur(function(e){
                                      
                     label_val= $("#zona_name_area_value").val();
                     llenaelementoHTML("#zona_referencia", label_val );             
                     $("#zona_referencia").show();
                     $("#zona_name_area_value").hide();
                     update_zona();
                                          
            });

    return false;

}




function update_zona(){
    
    
    url = $(".now").val()+"index.php/api/zonasrest/updatezona/format/json";       
    $.post(url, $("#form_zona_edit").serialize()).done(function(data){
        

    }).fail(function(){
        alert("Falla al registrar cambios");
    });

    loaddatazona();
    urlimg = $(".now").val()+"application/img/general/glyphicons-207-ok-2.png";
        llenaelementoHTML("#repo_update" ,  "<div  data-alert class='alert-box info radius'><img src='"+urlimg+"'> Los datos se han actualizado </div>");
    return false;
}


function changesectiongeneral(){
    $("#section_general").show();
    $("#section_mensajes").hide();
}
function changesectionmensaje(){
    $("#section_general").hide();
    $("#section_mensajes").show();
}


function listamensajeszona(){



    urlListist = $(".now").val()+ "application/img/general/list92.png"; 
    url= $(".now").val()+"index.php/api/zonasrest/listMensajesZona/format/json";  
    $.get(url, $("#form_zona_edit").serialize()).done(function(data){
        
        list="<table  class='large-12 columns'><tr class='title_table' id='title_table'><td><label class='titulo_mensaje'><img src='"+urlListist+"'>#</label></td><td><label class='titulo_mensaje'>Mensaje</label></td><td><label class='titulo_mensaje'>Red social</label></td></tr>";    
        for(var x in data){
            
            url_base_img=""; 
             

            if (data[x].social =="F") {
                url_base_img = $(".now").val()+"application/img/general/facebook29.png";
            }else{
                url_base_img = $(".now").val()+"application/img/general/social71.png";
            }
            
            img = "<img style='width:15%;' src='"+url_base_img+"'>";
            list+="<tr><td>"+data[x].idmensaje+"</td> <td>"+data[x].descripcion+"</td> <td>"+img+"</td> </tr>";
        }
        list+="<table>"; 
        llenaelementoHTML("#list_mensajes", list);

    }).fail(function(){
        alert("Fail ");
    });
    
    


}


