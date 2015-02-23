$(document).on("ready", function(){
    flag = 0; 

	//$("#seccion_nuevo").hide();		
    $("#Editarmiszonas").hide();
    $("#seccion_ayuda").hide();
	$("#radio_definirmenu").attr('checked', true);
    $("body").ready(loadnumdias);
    $("#seccion_principal").hide();     
    $("#num_dias").change(generatecalendar);
    $("#calendario_general").click(getday);
    $("#tipo_zona").ready(loadtiposzonas);

    $("#title_registro_menu").ready(loadzonas);

    $("#cancelar_edit").click(function(){
           $('#dlg_del_zoaedit').foundation('reveal', 'close');
    });

    $("#del_zonam").click(function(){
           $('#dlg_del_zoadel').foundation('reveal', 'open'); 
    });
    $("#fail_del").click(function(){
          $('#dlg_del_zoadel').foundation('reveal', 'close');  
    });
    $("#edit_btn").click(updatezonadata);    

    $("#zonasqr_menu").attr("class","active zonasqr_menu");

    $("#general_list").click(showgenerallist);
    $("#nuevoresgistrozona").click(showregistrazonasection);

    
    
});

function showgenerallist(){

    $("#listadozonasactuales").show();
    $("#registrozonasnuevassection").hide();

}


function showregistrazonasection(){

    $("#listadozonasactuales").hide();
    $("#registrozonasnuevassection").show();
    $("#info_section").hide();
}




function getday(ev){

    valores = ev.target.name;
}
function loadnumdias(){    
    a=1;
    e="";
    while(a<=40){

        e += "<option value='"+a+"'> "+a+"</option>";        
        a++;
    }
    $("#num_dias").html(e);
}
function generatecalendar(){

    url =$(".now").val()+"index.php/api/calendario/generate/format/json";
    $.get(url , $("#form_dias").serialize() ).done(function(data){

            alert(data);

    }).fail(function(){

        alert("Error");
    });


}

/*  Función para el menu   */
function section(elemento){

	switch (elemento){
    
    case "e_destacadas":
        //$("#calendario_general").hide();
        $("#seccion_principal").show();
        $("#seccion_nuevo").hide();

        break;
    case "e_nuevo":
       	$("#seccion_principal").hide();	 	
       	$("#seccion_nuevo").show();	
       	        
        break;
    case "e_informes":
		alert("trabajando .... .");            	
        break;
    
    case "e_definirnuevo":    	
    	alert("Trabajando......");
		$("#radio_definirmenu").attr('checked', false);	    	
    	
    	break;
    case "editar_zonas":        
        $("#section_establecido").hide();
        $("#Editarmiszonas").show();
        $("#seccion_ayuda").hide();

        $(".panelcontrol_menu").attr("class","panelcontrol_menu");
        $(".ediatar_menu").attr("class","active ediatar_menu active");
        $(".ayuda_menuzona").attr("class" , "ayuda_menuzona");

        break;

    case "crearnuevas_zonas":    

        $("#section_establecido").show();
        $("#Editarmiszonas").hide();
        $("#seccion_ayuda").hide();

        $(".panelcontrol_menu").attr("class","active panelcontrol_menu");
        $(".ediatar_menu").attr("class","ediatar_menu");
        $(".ayuda_menuzona").attr("class" , "ayuda_menuzona");

        break;

    case "seccion_ayuda":

        $(".ayuda_menuzona").attr("class" , "ayuda_menuzona active");
        $(".ediatar_menu").attr("class","ediatar_menu");
        $(".panelcontrol_menu").attr("class","panelcontrol_menu");

        $("#section_establecido").hide();
        $("#Editarmiszonas").hide();
        $("#seccion_ayuda").show();

        break; 

	}

}

/*Load tipos zonas*/

function loadtiposzonas(){

    url= $(".now").val() + "index.php/api/zonasrest/loadtiposzonas/format/json/";
    $.get(url).done(function(data){

        
        reporte="";
        for (var a = 0; a < data.length; a++) {                        


            name_img = data[a].img_name;             
            url_img=$(".now").val()+"application/img/tipo_zonas/"+name_img;

            //width: 90%;
            reporte+="<div class='large-2 columns'><img style='' src='"+url_img+"'><label id='lb_text'>";            
            reporte+="<div class='row'><input type='radio' name='tipozona' id='tipozona' value='"+ data[a].idTipo_zona+"'  class='tipozona' onclick='etipozona(this);'> "+data[a].nombre +"</div>" ;
            reporte+="</label></div>";

        }

        llenaelementoHTML("#tipo_zona" , reporte);
        llenaelementoHTML("#edit_tipozona", reporte);        
        $("#registrarzonan").click(registrazona);    

    }).fail(function(){

        alert("Error");
    });

}


function etipozona(e){
    tipoz = e.value;
    $("#tipoz").val(tipoz);
}

function loadzonas(){

    url = $(".now").val()+"index.php/api/zonasrest/loadzonas/format/json/";

    $.get(url).done(function(data){        
        

        e="<table class='large-12 columns' ><tr id='title_table' class='title_table'><td><label class='titulo_mensaje'>#<label></td><td> <label class='titulo_mensaje'>qr<label></td>";
        //e+="<td> <label class='titulo_mensaje'> url</label> </td>";
        e+="<td> <label class='titulo_mensaje'>Zona qr</label></td>";
        //e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Descripción de la Zona qr'>Descripción</span></td>";        
        e+="<td><label class='titulo_mensaje'>Tipo</label></td>";
        e+="<td><label class='titulo_mensaje'><img width='10%' src='"+$(".now").val()+"application/img/general/black218.png"+"'>Mensaje default</label></td></tr>";        
        //e+="<td><label class='titulo_mensaje'>Más detalles</label></td></tr>";    
        
        for (var a = 0; a < data.length; a++) {            

            descripcion = data[a].descripcion;
            id = data[a].idzona; 
            imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[a].urlmensajedef;                        
            urlmensajedef = data[a].urlmensajedef;


                e+="<tr>";
                e+="<td>"+ data[a].idzona + "</td>";            
                e+="<td><a><img style='width: 33%;' src= '"+imgurl+"' class='imagen_completa' id='"+data[a].urlmensajedef+"' ></a></td>";          
                e+="<td>"+ data[a].zonanombre + "</td>";            
                url_img_tipo=$(".now").val()+ "application/img/tipo_zonas/"+data[a].img_name; 
                e+="<td><div class='large-12'> <img style='width: 25%;' src='"+url_img_tipo+"'><label>"+data[a].nombre +"</label></div> </td>";
                e+="<td><button  class='idzona large-12' id='"+data[a].idzona+"' >"+ data[a].mensajedefault  +"</button></td>";            
                //e+="<td><a><img style='width: 25%;'  class='idzona' id='"+data[a].idzona+"' src='"+ $(".now").val()+'application/img/general/pencil41.png'  + "'> </a></td>";
                e+="</tr>";
        
        }
        e+="</table>";
          
        llenaelementoHTML("#contenido_list_zonas" , e);
        $(".idzona").click(idzonanow);
        loadnumzonasbycount("#numerozonas");

        //$(".seguir_leyendo").click(muestradetalle);
        $(".imagen_completa").click(showcompleteqr);

    }).fail(function(){
        alert("Error");
    });
}

function registrazona(){

    $("#info_section").show();

    if ($("#mensajedefault").val()  == "") {        

        
        llenaelementoHTML("#reporegistro" , "Redacte un mensaje por default para la zona qr");

    }else{                     
            if ($("#zona_name").val()  != "" ) {

                    istipozona = $("#tipoz").val();
                    
                    if (istipozona.length>0) {

                            url = $(".now").val()+"index.php/api/zonasrest/registrazona/format/json";                           
                            $.post(url ,  $("#frm_registrozonas").serialize() ).done(function(data){

                                if (data == 1){

                                    
                                    llenaelementoHTML("#reporegistro" , "Registro éxitoso");
                                    $("#zona_name").val("");
                                    $("#descripcion_zona").val("");
                                    $("#mensajedefault").val("");
                                    showgenerallist();    

                                }else{
                                    
                                    llenaelementoHTML("#reporegistro" , "Falla en el registro");

                                }

                                loadzonas();        
                            }).fail(function(){
                                alert("Error");

                            });
                    }else{
                            
                            llenaelementoHTML("#reporegistro" , "Complete los campos");
                    }
            }else{
                            llenaelementoHTML("#reporegistro" , "Redacte nombre de la zona");

            }

    }
    
    recorrepage("#reporegistro");
      

    return false;
        
}


function idzonanow(evt){

    idzona=evt.target.id;         
    urlnext =  $(".now").val()+"index.php/zonasqr/zonaedit/?zona="+idzona;  
    redirect(urlnext);



    

}



function showmensajesbyzona(){

    $("#dlg_mensajeszona").foundation("reveal" , "open");
    return false;
}
/**/
function updatezonadata(){

    if ($('#edit_zonaname').val() == "") {
    }else{

        if ($("#mensajedefaultedit").val() == ""  ) {

        }else{
                url = $(".now").val()+"index.php/api/zonasrest/updatezona/format/json";        
                $.post(url , $("#form_edit_zona").serialize() ).done(function(data){

                    if (data == true) {

                        loadzonas();
                        llenaelementoHTML("#edit_repo" , "Zona modificada");
                        $('#dlg_del_zoaedit').foundation('reveal', 'close');

                    }else{
                        
                        llenaelementoHTML("#edit_repo" , "Falla al modificar");
                    }                
                }).fail(function(){
                    alert("Error");
                });


        }
   
    }    
    return false;

}


function muestradetalle(e){

    id =  e.target.id;


    $('#dlg_detallezona').foundation('reveal', 'open');

    url = $(".now").val()+ "index.php/api/zonasrest/getzonabyid/format/json";

    $.get(url, {"idzona" : id}).done(function(data){

        descripcion = data[0].descripcion;
        
        llenaelementoHTML("#detalle_zona" , descripcion);

    }).fail(function(){

        alert("Error");
    });



}
function showcompleteqr(e){
    base =e.target.id;
    url ="https://api.qrserver.com/v1/create-qr-code/?size=350x350&data="+base;
    imgqr= "<img src='"+url+"'>";
    llenaelementoHTML("#qrcompleto" , imgqr);    
    $('#dl_qrcompleto').foundation('reveal', 'open');
    llenaelementoHTML("#url_zona", base);

    urlnext =$(".now").val()+"index.php/zonasqr/imprimeqrsocial?zona="+base;
    $("#imprimirqr").click(function(){
        
       
         window.open(urlnext, '_blank');

    });
    


}