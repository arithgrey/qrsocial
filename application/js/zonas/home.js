$(document).on("ready", function(){

	$("#seccion_nuevo").hide();		
	$("#radio_definirmenu").attr('checked', true);
    $("body").ready(loadnumdias);

    $("#num_dias").change(generatecalendar);
    $("#calendario_general").click(getday);

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

	}

}

