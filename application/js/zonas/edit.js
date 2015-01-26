
$(document).on("ready", function(){

	loaddatazona();
});

function loaddatazona() {

	idzona =  $("#zonaqredit").val();
	
	
    url = $(".now").val()+ "index.php/api/zonasrest/getzonabyid/format/json";
    
    $.get(url, { "idzona": idzona}).done(function(data){

    	if (data.length >0) {

    		for (var a = 0; a < data.length; a++) {
    			
    			//valorHTML("#zona_name" , data[a].zonanombre);
    			llenaelementoHTML("#zona_name" , data[a].zonanombre);
    			llenaelementoHTML("#zona_referencia" , data[a].descripcion );
    			llenaelementoHTML("#zona_fecha" , data[a].fecharegistro );
    			llenaelementoHTML( "#zona_defmsj", data[a].mensajedefault);

    		}

    	}else{
    		urlnext = $(".now").val()+"index.php/zonasqr/principal";
    		redirect(urlnext);
    	}
    	
    }).fail(function(){

    	alert("Fail on load data zona");

    
    });

}