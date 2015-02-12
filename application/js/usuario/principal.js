$(document).on("ready", function(){
	now = $('.now').val();

	/*Validamos si el usuario existe*/
	$('.username').change(function (){


			username = $('.username').val();
			urlpost = now + "index.php/api/usuariorest/userexist/format/json";			
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		    if ( !expr.test(username) ){

						$.post(urlpost, {"username": username } ).done(function(data){
							

							
							if (data == 0) {
								/*Usuario correcto*/
								response= "<div data-alert class='alert-box info radius'>Usuario correcto</div>";										
								llenaelementoHTML("#reporte_registro" , response);
								

							}else{

								response = "<span class='[success alert secondary] [round radius] label'> ✖Intente con un usuario distinto</span>";

								llenaelementoHTML( "#reporte_registro" , response);
								
								
							}
						
						
						}).fail(function(){
							alert("error");
						});
									
		    }else{			    	

				    	
				    	
				    	llenaelementoHTML( '#reporte_registro' , repo);
		    }
	});

	/*Validamos que el correo esté disponible*/
	$('.usermail').change(function (){

			usermail  = $('.usermail').val();		
			urlpost = now + "index.php/api/usuariorest/usermailexist/format/json";
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    

		    if ( !expr.test(usermail) ){

		    	repo ="<span class='[success alert secondary] [round radius] label'>✖ Mail no valido</span>";
		    	
		    	llenaelementoHTML('#reporte_registro' , repo);

		    }else{
		    		
			    $.post( urlpost , {"usermail": usermail } )
			    .done(function(data){

			    		
				    	if (data == "1"){

						
							llenaelementoHTML('#reporte_registro', "<div data-alert class='alert-box info radius'>Correo electrónico correcto</div>");

						}else{
							
							llenaelementoHTML('#reporte_registro' , data);
						
						}
				

			    }).fail(function(){
			    	alert( "error" );
			    });
		}		
	});


	$("#registrousuario").click(function(){

		pwregistro  = $('.pwregistro').val();		
		pwconfirm  = $('.pwconfirm').val();
		username = $('.username').val();
		usermail  = $('.usermail').val();				
		
		pw = ""+CryptoJS.SHA1(pwregistro);			
		postdata = $('.now').val() +"index.php/api/usuariorest/validadata/format/json";

		if (pwregistro == pwconfirm ) {


			$.post(postdata , { "username" : username , "usermail" : usermail , "pw" : pw })
			.done(function(data){

				//alert(data);
				
				if (data == true) {
						responsesession(usermail, pwconfirm );	 	
				}else{					
					llenaelementoHTML("#reporte_registro" , data);

				}
				

			}).fail(function(){

				alert("Error en el registro");
			});

						
		}else{
			
			llenaelementoHTML('#reporte_registro' , "<span class='[success alert secondary] [round radius] label'>✖ Error en las contraseñas</span>");
		}
		
		
		

	});


	$(".seguir_leyendo").click(seguir_leyendo);


});


function seguir_leyendo(){
	
	
	$('#dlgterminos_condiciones').foundation('reveal', 'open');

}

function responsesession(mail , pw ){

	

				posturl = $('.now').val() + "index.php/api/accesssystem/usercheck/format/json";
				pwpost = ""+CryptoJS.SHA1(pw);
				params = {"mail": mail, "pw" : pwpost, "firststeps" : "1"}
				
						var jqxhr = $.ajax({

							type: "POST",
							url: posturl,						
							data: params,
							dataType: "json"	

						}).done(function(data){				
						
							llenaelementoHTML('.repoacces' , data);
						
						}).fail(function(){
							alert( "Error sessión" );
						});


}