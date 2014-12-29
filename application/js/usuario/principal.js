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
								$("#reporte_registro").html(response);
								

							}else{

								response = "<span class='[success alert secondary] [round radius] label'> ✖Intente con un usuario distinto</span>";
								$("#reporte_registro").html(response);
								
								
							}
							
						
						}).fail(function(){
							alert("error");
						});
									
		    }else{			    	

				    	
				    	$('#reporte_registro').html(repo);
		    }
	});

	/*Validamos que el correo esté disponible*/
	$('.usermail').change(function (){

			usermail  = $('.usermail').val();		
			urlpost = now + "index.php/api/usuariorest/usermailexist/format/json";
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    

		    if ( !expr.test(usermail) ){

		    	repo ="<span class='[success alert secondary] [round radius] label'>✖ Mail no valido</span>";
		    	$('#reporte_registro').html(repo);

		    }else{
		    		
			    $.post( urlpost , {"usermail": usermail } )
			    .done(function(data){

			    		
				    	if (data == "1"){

						$('#reporte_registro').html("<div data-alert class='alert-box info radius'>Correo electrónico correcto</div>");
						

						}else{

							$('#reporte_registro').html(data);								
						
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
		postdata = now +"index.php/api/usuariorest/validadata/format/json";

		if (pwregistro == pwconfirm ) {


			$.post(postdata , { "username" : username , "usermail" : usermail , "pw" : pw })
			.done(function(data){

				if (data == 1) {

						responsesession(usermail, pwconfirm );	 
						
				}else{

					$('#reporte_registro').html(data);								
				}
				

			}).fail(function(){

				
			});

						
		}else{
			$('#reporte_registro').html("<span class='[success alert secondary] [round radius] label'>✖ Error en las contraseñas</span>");									
		}
		
		
		

	});


	$(".seguir_leyendo").click(seguir_leyendo);


});


function seguir_leyendo(){
	
	
	$('#dlgterminos_condiciones').foundation('reveal', 'open');

}

function responsesession(mail , pw ){

	


				posturl = now + "index.php/api/accesssystem/usercheck/format/json";
				pwpost = ""+CryptoJS.SHA1(pw);

				params = {"mail": mail, "pw" : pwpost }
				
						var jqxhr = $.ajax({

							type: "POST",
							url: posturl,						
							data: params,
							dataType: "json"	

						}).done(function(data){				

						
							$('.repoacces').html(data);
						
						}).fail(function(){
							alert( "error" );
						});


}