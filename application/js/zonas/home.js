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

});

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

    url= $(".now").val() + "index.php/api/zonasrest/loadtiposzonas/format/json";


    $.get(url).done(function(data){
        reporte="";
        for (a = 0; a < data.length; a++) {                        
            reporte+="<label class='large-2 columns' id='lb_text'> "+data[a].nombre+" <input type='radio' name='tipozona' id='tipozona' value='"+ data[a].idTipo_zona+"'  class='tipozona' onclick='etipozona(this);'></label>";
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

    url = $(".now").val()+"index.php/api/zonasrest/loadzonas/format/json";

    $.get(url).done(function(data){        
        

        e="<table class='row' class='large-12 columns' ><tr id='title_table' class='title_table'><td> <label class='titulo_mensaje'>qr  <label></td>";
        //e+="<td> <label class='titulo_mensaje'> url</label> </td>";
        e+="<td> <label class='titulo_mensaje'>Nombre de la  zona qr</label></td>";
        //e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Descripción de la Zona qr'>Descripción</span></td>";        
        e+="<td><label class='titulo_mensaje'>Tipo de zona</label></td>";
        e+="<td><label class='titulo_mensaje'>Mensaje default</label></td>";        
        e+="<td><label class='titulo_mensaje'>Configuración</label></td></tr>";    
        
        for (var a = 0; a < data.length; a++) {            

            descripcion = data[a].descripcion;
            id = data[a].idzona; 
            imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[a].urlmensajedef;                        
            urlmensajedef = data[a].urlmensajedef;


            e+="<tr>";
                e+="<td><img src= '"+imgurl+"' id='imgqrsocial' ></td>";
          //      e+="<td>"+urlmensajedef+"</td>";
                e+="<td>"+ data[a].zonanombre + "</td>";            
              //  e+="<td>"+ descripcion.slice(0, 100) +"<br>......<a class='seguir_leyendo' id='"+data[a].idzona+"'> Seguir leyendo</a>"  +  "</td>";    
                e+="<td>"+ data[a].nombre+"</td>";
                e+="<td>"+ data[a].mensajedefault.slice(0, 100) +"</td>";            
                e+="<td><a><img  class='idzona' id='"+data[a].idzona+"' src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "'> </a></td>";
                e+="</tr>";
        
        }
        e+="</table>";
          
        llenaelementoHTML("#contenido_list_zonas" , e);
        $(".idzona").click(idzonanow);

        //$(".seguir_leyendo").click(muestradetalle);

    }).fail(function(){
        alert("Error");
    });
}

function registrazona(){

    
    if ($("#mensajedefault").val()  == "") {        

        $("#reporegistro").html("Complete los campos");

    }else{                     
            if ($("#zona_name").val()  != "" ) {

                    istipozona = $("#tipoz").val();
                    
                    if (istipozona.length>0) {

                            url = $(".now").val()+"index.php/api/zonasrest/registrazona/format/json";                           
                            $.post(url ,  $("#frm_registrozonas").serialize() ).done(function(data){

                                if (data == 1){

                                    $("#reporegistro").html("Registro éxitoso!!");
                                    $("#zona_name").val("");
                                    $("#descripcion_zona").val("");
                                    $("#mensajedefault").val("");
                                    

                                }else{
                                    $("#reporegistro").html("Falla en el registro");
                                }

                                loadzonas();        
                            }).fail(function(){
                                alert("Error");

                            });
                    }else{
                            $("#reporegistro").html("Complete los campos");
                    }
            }else{
                $("#reporegistro").html("Complete los campos");
            }

    }
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
