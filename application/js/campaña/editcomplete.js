$(document).on("ready", function(){

    loadzonaseditcampa();
    loaddatacampbyid();

    $("#general_s").click(showgeneralsection);
    $("#zonas_s").click(showzonassection);
    $("#mensajes_section").click(next_page);
});

function loadzonaseditcampa(){

    idcampania = $("#campid").val(); 
        
    e="";

	url_plus = $(".now").val() + "application/img/png/glyphicons-191-circle-plus.png";
    url_minus = $(".now").val() + "application/img/png/glyphicons-192-circle-minus.png";
	
	e+="<table class='large-12 columns'><tr class='title_table' id='title_table'><td><label class='titulo_mensaje'> # </label></td>";
    e+="<td><label class='titulo_mensaje'>Zona qr </label></td>";
    e+="<td><label class='titulo_mensaje'>Agregar zona a la campaña<label></td><td></tr>"; 

	url = $(".now").val()+"index.php/api/zonasrest/loadcampzonasasignadas/format/json";
    $.get(url, {"idcampania": idcampania}).done(function(data){




    	for (var i = 0; i < data.length; i++) {
        		
        		idzona = data[i].idzona;
        		nombre = data[i].zonanombre;
        

                if (data[i].iszonacamp >0 ) {
                    imagen_status= url_minus;            
                    texto="  Quitar zonaqr ";         
                }else{
                    imagen_status =url_plus; 
                    texto="Agregar zonaqr";         
                }

        		e+="<tr><td><label>"+idzona+"</label></td>";
        		e+="<td><label>"+ nombre +"</label></td>";
                e+="<td><label> " + texto+ " <img class='moverstadozona' id='"+idzona+"' src='"+imagen_status+"'></label></td></tr>";               

        	}

    	e+="</table>";

    	llenaelementoHTML("#zonasdisponibles" , e);

        $(".moverstadozona").click(moverstadozonanow);

        return false; 

    }).fail(function(){
        llenaelementoHTML("#zonasdisponibles" , "Error al cargar zonas qr");
    });

    return false; 
}



function moverstadozonanow(e){

    campedit = $("#campid").val(); 
    idzona = e.target.id;

    

    url =  $(".now").val()+ "index.php/api/camprest/setregistrozonacam/format/json";

    $.post(url , {"campedit": campedit  , "idzona" : idzona}  )
            .done(function(data){

                llenaelementoHTML("#reporte_zonas_campaña" , data);
    }).fail(function(){
                llenaelementoHTML("#reporte_zonas_campaña" , "Error en el cambio");
    });

    loadzonaseditcampa();
    return false;

}


function loaddatacampbyid(){

    idcamp  = $("#campid").val(); 
    url =  $(".now").val()+ "index.php/api/camprest/getdatacampbyid/format/json";    
     add_img = $(".now").val()+ "application/img/general/add13.png";
    newimg= "<img width='6%;' src='"+add_img+" '>";

    $.get(url , {"idcamp" : idcamp}).done(function(data){

        for (var b = 0; b < data.length; b++) {

                text_disponible ="";
                status_camp = data[b].status;
                url_img_info=$(".now").val()+"application/img/png/glyphicons-195-circle-question-mark.png"; 
                url_camp_activa = $(".now").val()+"application/img/png/glyphicons-199-ok.png"; 
                url_camp_noactiva = $(".now").val()+"application/img/png/glyphicons-200-ban.png"; 

                if (status_camp == "1" ) {

                    text_disponible = "Actualemente activa <img id='status_img' src='"+url_camp_activa+"'>";  
                    $("#status").val(1);
                }else{
                    text_disponible = "Actualmente no disponible <img id='status_img' src='"+url_camp_noactiva+"'>";  
                    $("#status").val(0);
                }

            
            valorHTML("#camp_name_input" , data[b].nombre);    
            valorHTML("#camp_descripcion_input" , data[b].descripcion);    

            
            if ( $.trim(data[b].nombre) != "" ){

                llenaelementoHTML("#camp_name_lb" , data[b].nombre  );
                
            }else{
                llenaelementoHTML("#camp_name_lb" , newimg  );
            }


            if ($.trim(data[b].descripcion) != "") {
                llenaelementoHTML("#camp_descripcion_lb" , data[b].descripcion );
            }else{
                llenaelementoHTML("#camp_descripcion_lb" , newimg );
            }
            
            llenaelementoHTML(".cam_disponible", "<img id='inf_estado_campaña'  src="+url_img_info+">"+" Campaña disponible ");    
            llenaelementoHTML("#img_status" , text_disponible  );
            llenaelementoHTML("#camp_registro_lb" , data[b].fecharegistro );
            
        }

        $("#camp_name_lb").click(update_name);
        $("#camp_descripcion_lb").click(update_objetivo);
        $("#status_img").click(update_status);

        return false;
    }).fail(function(){


    });
    return false;
    
}



function update_status(){

    if ($("#status").val() == 1) {        
        
        $("#status").val(0);

    }else{
        $("#status").val(1);
        
    }

    updateall();    
    return false;    

}

function update_name(){

    text_valor= $("#"+this.id).text();
    
    $("#camp_name_input").show();
    valorHTML("#camp_name_input" , text_valor);
    $("#"+this.id).hide();
    
    $("#camp_name_input").blur(function(e){
       
            valor_actual = $("#camp_name_input").val();            
            llenaelementoHTML("#camp_name_lb" , valor_actual);
            $("#camp_name_lb").show();
            $("#camp_name_input").hide();
            
            updateall();
            return false; 
            
       
            
    });

    return false;
}

function update_objetivo(){

    text_valor= $("#"+this.id).text();
    $("#camp_descripcion_input").show();
    $("#camp_descripcion_input").val(text_valor);
    $("#"+this.id).hide();


   
    $("#camp_descripcion_input").blur(function(e){
                
         

            valor_actual = $("#camp_descripcion_input").val();            
            llenaelementoHTML("#camp_descripcion_lb" , valor_actual);
            $("#camp_descripcion_lb").show();
            $("#camp_descripcion_input").hide();
                 
            updateall();    
            return false; 
         
            
    });
    return false; 

}

function updateall(){
        
    urlupdate = $(".now").val()+"index.php/api/camprest/editadatacamp/format/json/";      

    $.post(urlupdate ,  $("#form_update_camp").serialize() ).done(function(data){

        urlimg = $(".now").val()+"application/img/general/glyphicons-207-ok-2.png";
        llenaelementoHTML("#repo_update" ,  "<div  data-alert class='alert-box info radius'><img src='"+urlimg+"'> Los datos de la campaña se han actualizado </div>");
        return false; 
    }).fail(function(){
        alert("eroor");
    });

    loaddatacampbyid();
    return false;        
}

function showgeneralsection(){

    $("#general_section").show();
    $("#zonas_section").hide();

}
function showzonassection(){

    $("#general_section").hide();
    $("#zonas_section").show();
}
function next_page(){

    
    url =  $(".now").val()+ "index.php/camp/opciones?camp="+$("#campid").val()+"&name="+$("#camp_name_input").val(); 
    redirect(url );


}