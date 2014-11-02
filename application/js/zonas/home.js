$(document).on("ready", function(){

    flag = 0; 
	$("#seccion_nuevo").hide();		
    $("#Editarmiszonas").hide();
    $("#seccion_ayuda").hide();
	$("#radio_definirmenu").attr('checked', true);
    $("body").ready(loadnumdias);

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
        alert("trabajando .... .");

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

        $("#exampleCheckboxSwitch").click(registrazona);    

    }).fail(function(){

        alert("Error");
    });

}


function loadzonas(){

    url = $(".now").val()+"index.php/api/zonasrest/loadzonas/format/json";

    $.get(url).done(function(data){
        
        e="<table class='row' ><tr id='title_table' class='title_table' ><td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Identificador de la zona qr'>Identificador</span>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Nombre de la Zona qr'>Zona qr</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Descripción de la Zona qr'>Descripción</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Fecha en que se registró la zona'>Registro</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Tipo de zona qr'>Tipo de zona</span></td>";
        e+="<td><span id='zonaname_label' data-tooltip aria-haspopup='true' class='has-tip' title='Configura tu zona qr'>Configuración</span></td></tr>";    

        for (var a = 0; a < data.length; a++) {            


            e+= "<tr>";
            e+="<td>"+ data[a].idzona +"</td>";
            e+="<td>"+ data[a].zonanombre + "</td>";            
            e+="<td>"+ data[a].descripcion +"</td>";
            e+="<td>"+ data[a].fecharegistro +"</td>";
            e+="<td>"+ data[a].idTipo_zona+"</td>";
            e+="<td><a class='idzona' id='"+data[a].idzona+"' >Editar</a></td>";
            e+="</tr>";
            
        }
        e+="</table>";
        $("#contenido_list_zonas").html(e);
        $(".idzona").click(idzonanow);

    }).fail(function(){
        alert("Error");
    });

}

function registrazona(){
    

    url = $(".now").val()+"index.php/api/zonasrest/registrazona/format/json";
 
    $.post(url ,  $("#frm_registrozonas").serialize() ).done(function(data){


        if (data == 1){

            $("#reporegistro").html("Registro éxitoso!!");

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

        $("#edit_zona").val(idzona);
        $("#edit_zonaname").val(zonanombre);
        $("#edit_descripcion").val(descripcion);    
        $("#edit_fecharegistro").html("Fecha de registro: "+fecharegistro);
        $("#edit_tipozona_p").html( "Tipo de zona: "+nombre);


    }).fail(function(){

        alert("Error");
    });

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
