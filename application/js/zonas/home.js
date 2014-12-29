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


<!---->

/*Función para el menu */
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
    	//$("#seccion_nuevomenu").hide(); //$("#seccion_principal").hide();	  	//$("#calendario_general").hide();
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

    url= $(".now").val() +  "index.php/api/zonasrest/loadtiposzonas/format/json";

    $.get(url).done(function(data){

        reporte="";

        for (a = 0; a < data.length; a++) {
            
            reporte+="<option value='"+ data[a].idTipo_zona+ "'>"+ data[a].nombre+"</option>";

        }

        $("#tipo_zona").html(reporte);        
        $("#edit_tipozona").html(reporte);
        $("#registrarzonan").click(registrazona);    

    }).fail(function(){

        alert("Error");
    });

}



function loadzonas(){

    url = $(".now").val()+"index.php/api/zonasrest/loadzonas/format/json";

    $.get(url).done(function(data){
        
        e="<table class='row' ><tr id='title_table' class='title_table' ><td><span id='zonaname_label' data-tooltip  class='has-tip' title='QR default'>QR default</span>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Nombre de la Zona qr'>Zona qr </span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Descripción de la Zona qr'>Descripción</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Fecha en que se registró la zona'>Registro</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Tipo de zona qr'>Tipo de zona</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Mensaje por defaulr de la zona'>Mensaje default</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Configura tu zona qr'>Configuración</span></td></tr>";    



        for (var a = 0; a < data.length; a++) {            

            descripcion = data[a].descripcion;
            id = data[a].idzona; 

            imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[a].urlmensajedef;                        

            e+="<tr>";
            e+="<td><img src= '"+imgurl+"' ></td>";

            e+="<td>"+ data[a].zonanombre + "</td>";            
            e+="<td>"+ descripcion.slice(0, 200) +"<br>......<a class='seguir_leyendo' id='"+data[a].idzona+"'> Seguir leyendo</a>"  +  "</td>";
            e+="<td>"+ data[a].fecharegistro +"</td>";
            e+="<td>"+ data[a].nombre+"</td>";
            e+="<td>"+ data[a].mensajedefault +"</td>";

            e+="<td><a class='idzona' id='"+data[a].idzona+"' >Más detalles <img src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "'> </a></td>";
            e+="</tr>";
        
        }
        e+="</table>";
        $("#contenido_list_zonas").html(e);
        $(".idzona").click(idzonanow);

        $(".seguir_leyendo").click(muestradetalle);


    }).fail(function(){
        alert("Error");
    });

}

function registrazona(){
    

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

        
}
function idzonanow(evt){

    idzona=evt.target.id;     
    $('#dlg_del_zoaedit').foundation('reveal', 'open');
    url = $(".now").val()+ "index.php/api/zonasrest/getzonabyid/format/json";

    $.get(url, {"idzona" : idzona}).done(function(data){

        idzona = data[0].idzona;
        zonanombre = data[0].zonanombre;
        descripcion = data[0].descripcion;
        fecharegistro = data[0].fecharegistro;
        nombre = data[0].nombre;
        mensajedefault = data[0].mensajedefault;        
        idTipo_zona = data[0].idTipo_zona;


        $("#edit_zona").val(idzona);
        $("#edit_zonaname").val(zonanombre);
        $("#edit_descripcion").val(descripcion);    
        $("#edit_fecharegistro").html("Fecha de registro: "+fecharegistro);
        $('#edit_tipozona > option[value="'+idTipo_zona+'"]').attr('selected', 'selected');        
        
        $("#mensajedefaultedit").val( mensajedefault);




            urllist =  $(".now").val()+ "index.php/api/mensajerest/listmensajesbyzona/format/json";
            $.get(urllist , {"idzona" : idzona}).done(function(data){
                
                l ="<table><tr><td>Mensaje</td><td>Estado</td> <td>URL</td></tr>"; 

                for (var i = 0; i < data.length; i++) {
                 
                    descripcion  =  data[i].descripcion;  
                    status  =  data[i].status;  
                    urlformada  =  data[i].urlformada;  

                    if (status == "1" ) {
                        status ="Disponible FB ";
                    }else{
                          status ="Disponible TW";
                    }
                    imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[i].urlformada;                        
                    l+= "<tr><td>"+descripcion+"</td> <td>"+status+"</td> <td>"+urlformada+"</td> <td><img src='"+imgurl+"'></td>  </tr>";
                    
                }
                l +="</table>"; 

                $(".mensaje_asociados").html(l);



            }).fail(function(){
                alert("Error al cargar lista");
            });








    }).fail(function(){

        alert("Error");
    });


/**
    $("#mensajes_asociados_btn").click(function(){

        $('#dlg_mensajes_zona').foundation('reveal', 'open');   

            urllist =  $(".now").val()+ "index.php/api/mensajerest/listmensajesbyzona/format/json";
            $.get(urllist , {"idzona" : idzona}).done(function(data){
                
                l ="<table><tr><td>Mensaje</td><td>Estado</td> <td>URL</td></tr>"; 

                for (var i = 0; i < data.length; i++) {
                 
                    descripcion  =  data[i].descripcion;  
                    status  =  data[i].status;  
                    urlformada  =  data[i].urlformada;  

                    if (status == "1" ) {
                        status ="Disponible";
                    }else{

                    }
                    imgurl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+ data[i].urlformada;                        
                    l+= "<tr><td>"+descripcion+"</td> <td>"+status+"</td> <td>"+urlformada+"</td> <td><img src='"+imgurl+"'></td>  </tr>";
                    
                }
                l +="</table>"; 

                $("#mensaje_asociados").html(l);



            }).fail(function(){
                alert("Error al cargar lista");
            });




    });
**/
}

/**/
function updatezonadata(){

    url = $(".now").val()+"index.php/api/zonasrest/updatezona/format/json";    
    
    $.post(url , $("#form_edit_zona").serialize() ).done(function(data){

        if (data == true) {
            loadzonas();
            $("#edit_repo").html("Zona modificada");            
            $('#dlg_del_zoaedit').foundation('reveal', 'close');

        }else{
            $("#edit_repo").html("Falla al modificar");
        }
        

    }).fail(function(){

        alert("Error");

    });

}


function muestradetalle(e){

    id =  e.target.id;


    $('#dlg_detallezona').foundation('reveal', 'open');

    

    url = $(".now").val()+ "index.php/api/zonasrest/getzonabyid/format/json";

    $.get(url, {"idzona" : id}).done(function(data){

        descripcion = data[0].descripcion;
        $("#detalle_zona").html(descripcion);    

    }).fail(function(){

        alert("Error");
    });



}
