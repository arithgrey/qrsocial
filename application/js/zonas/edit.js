
$(document).on("ready", function(){

    loadtiposzonas();
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
            url_img=$(".now").val()+"application/img/tipo_zonas/"+name_img;
            
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


function loaddatazona() {

	idzona =  $("#zonaqredit").val();
	loadtiposzonas();	
    tipo_zona = "";
    url = $(".now").val()+ "index.php/api/zonasrest/getzonabyid/format/json";    

    $.get(url, { "idzona": idzona}).done(function(data){

    	if (data.length >0) {

    		for (var a = 0; a < data.length; a++) {
    			
    			//valorHTML("#zona_name" , data[a].zonanombre);
                if (data[a].zonanombre == "") {

                    llenaelementoHTML("#zona_name" , "+");
                }else{
                    llenaelementoHTML("#zona_name" , data[a].zonanombre);
                }
    			
                if (data[a].descripcion == "") {
                    llenaelementoHTML("#zona_referencia" , "+" );    
                }else{
                    llenaelementoHTML("#zona_referencia" , data[a].descripcion );
                }

    			llenaelementoHTML("#zona_fecha" , data[a].fecharegistro );

                if (data[a].mensajedefault ==""){
                    llenaelementoHTML( "#zona_defmsj", "+");
                }else{
                    llenaelementoHTML( "#zona_defmsj", data[a].mensajedefault);
                }
    			
                tipo_zona = data[a].idTipo_zona;

                valorHTML("#zona_name_input_value" , data[a].zonanombre);
                valorHTML("#zona_name_area_value" , data[a].descripcion );
                valorHTML("#zona_tipozona_input_value",data[a].idTipo_zona)                
                valorHTML("#zona_defmsj_input_value", data[a].mensajedefault);


    		}

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

    $("#zona_defmsj_input_value").keydown(function(e){
             var code= e.keyCode;               
             if (code==13){    

                 label_val = $("#zona_defmsj_input_value").val();
                 llenaelementoHTML("#zona_defmsj", label_val );             
                 $("#zona_defmsj").show();
                 $("#zona_defmsj_input_value").hide();                 
                 update_zona();
                 return false;
                 //$("#"+this.id).remove();
             }
                
        });
        return false;

}

function editacampo(){

    text_valor= $("#"+this.id).text();
    valorHTML("#zona_name_input_value" , text_valor);
    $("#"+this.id).hide();
    $("#zona_name_input_value").show();


    $("#zona_name_input_value").keydown(function(e){
         var code= e.keyCode;               
         if (code==13){    

             label_val= $("#zona_name_input_value").val();             
             llenaelementoHTML("#zona_name", label_val ); 
             $("#zona_name").show();
              $("#zona_name_input_value").hide();             


             update_zona();
               
         }
            
    });
    return false;


/*
  
    var input="<input type='text'  id='zona_name_input' value='"+text_valor+"' >";
    
    $("#"+this.id).empty();
    llenaelementoHTML("#zona_name_cuadro", input);
    $("#zona_name_input").keydown(function(e){
         var code= e.keyCode;               
         if (code==13){    

             label_val= $("#zona_name_input").val();
             llenaelementoHTML("#zona_name", label_val );             
             valorHTML("#zona_name_input_value" , label_val);
             update_zona();
             $("#"+this.id).remove();
         }
            
    });
    return false;
  */
    
}

function editarea(){
    
    text_valor= $("#"+this.id).text();
    $("#"+this.id).hide();
    $("#zona_name_area_value").show();
    valorHTML("#zona_name_area_value", text_valor);

    $("#zona_name_area_value").keydown(function(e){
         var code= e.keyCode;               
         if (code==13){    

             label_val= $("#zona_name_area_value").val();
             llenaelementoHTML("#zona_referencia", label_val );             
             $("#zona_referencia").show();
             $("#zona_name_area_value").hide();

             update_zona();
             
         }
            
    });

    return false;

    /*
    
    var area="<textarea id='zona_name_area' name='zona_name_area' >"+text_valor+"</textarea>";
    
    $("#"+this.id).empty();
    
    $("#zona_name_area").keydown(function(e){
         var code= e.keyCode;               
         if (code==13){    

             label_val= $("#zona_name_area").val();
             llenaelementoHTML("#zona_referencia", label_val );             
             valorHTML("#zona_name_area_value" , label_val);
             update_zona();
             $("#"+this.id).remove();
         }
            
    });

    return false;
    */
}




function update_zona(){
    
    
    url = $(".now").val()+"index.php/api/zonasrest/updatezona/format/json";       
    $.post(url, $("#form_zona_edit").serialize()).done(function(data){
        

    }).fail(function(){
        alert("Falla al registrar cambios");
    });

    loaddatazona();
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

    url= $(".now").val()+"index.php/api/zonasrest/listMensajesZona/format/json";  
    $.get(url, $("#form_zona_edit").serialize()).done(function(data){

        
        list="<table  class='large-12 columns'><tr class='title_table' id='title_table'><td><label class='titulo_mensaje'>#</label></td><td><label class='titulo_mensaje'>Mensaje</label></td><td><label class='titulo_mensaje'>Red social</label></td></tr>";    
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

