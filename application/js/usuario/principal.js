$(document).on("ready", function(){

	now = $('.now').val();
	validationx = 0;
	validationy= 0 ;

	/*Validamos si el usuario existe*/
	$('.username').change(function (){

			username = $('.username').val();
			urlpost = now + "index.php/api/usuariorest/userexist/format/json";			
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 


		    if ( !expr.test(username) ){

				    params = {"username": username }
				
						var jqxhr = $.ajax({

							type: "POST",
							url: urlpost,						
							data: params,
							dataType: "json"	

						}).done(function(data){				

							if(data == "ok") {						
								$('.reponusername').html("<span class='success label'>✓</span>");
								validationx = 1;						

							}else{
								$('.reponusername').html(data);
								validationx=0;
								$(".reporteregistro").html("");

							}
						
						}).fail(function(){
							alert( "error" );
						});
			
		    }else{

			    	repo ="<span class='[success alert secondary] [round radius] label' onclick='mensajeerroruser()'>✖</span>";
			    	validationx=0;
			    	$('.reponusername').html(repo);
		    }

	});

	/*Validamos que el correo esté disponible*/
	$('.usermail').change(function (){

			usermail  = $('.usermail').val();		
			urlpost = now + "index.php/api/usuariorest/usermailexist/format/json";

			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    
		    if ( !expr.test(usermail) ){

		    	repo ="<span class='[success alert secondary] [round radius] label'>✖ Mail no valido</span>";
		    	$('.repousermail').html(repo);
		    }else{
		    		
			    params = {"usermail": usermail }
				
				var jqxhr = $.ajax({

					type: "POST",
					url: urlpost,						
					data: params,
					dataType: "json"	

				}).done(function(data){

					if (data == "ok"){
						$('.repousermail').html("<span class='success label'>✓</span>");
						validationy = 1;

					}else{
						$('.repousermail').html(data);	
						$(".reporteregistro").html("");
						validationy = 0;
					}
					
					
				
				}).fail(function(){
					alert( "error" );
				});

		    }
		        


	});


	$(".registrousuario").click(function(){

		pwregistro  = $('.pwregistro').val();		
		pwconfirm  = $('.pwconfirm').val();

		username = $('.username').val();
		usermail  = $('.usermail').val();				


		if (username.length <5){

			$('.reponusername').html("<span class='[success alert secondary] [round radius] label'>✖</span>");
			$(".reporteregistro").html("");
			validationx = 0;						

		}else{


			if (pwregistro.length<8) {

				$(".reportepw").html("<span class='[success alert secondary] [round radius] label'>✖</span>");
				$(".repopwregistro").html("<span class='[success alert secondary] [round radius] label'>✖</span>");			
				$(".reporteregistro").html("");

			}else{

					if(pwregistro === pwconfirm){
						
						$(".reportepw").html("<span class='success label'>✓</span>");
						$(".repopwregistro").html("<span class='success label'>✓</span>");			

						/*usuario */
						if (validationx == 1 ){
								
								$(".reponusername").html("<span class='success label'>✓</span>");

								/*User mail*/
								if(validationy == 1){
									$('.repousermail').html("<span class='success label'>✓</span>");
										
										/*env*/
											pw = ""+CryptoJS.SHA1(pwregistro);
											params ={"username":username , "usermail" : usermail , "pw" : pw}	
											postdata = now +"index.php/api/usuariorest/validadata/format/json";

											var jqxhr = $.ajax({

												type: "POST",
												url: postdata,						
												data: params,
												dataType: "json"	

											}).done(function(data){				

												if (data==1) {
													
													cleanall();

													$('.reporteregistro').html("<h3 id='ex' class='ex'>Registro efectuado con éxito</h3>");

												}else{
													$('.reporteregistro').html(data);	
												}
												
											
											}).fail(function(){
												alert( "error" );
											});							

										/*env end*/	
								}else{
									$('.repousermail').html("<span class='[success alert secondary] [round radius] label'>✖</span>");
									$(".reporteregistro").html("");
								}


						}else{
							
							repo ="<span class='[success alert secondary] [round radius] label'>✖</span>";
							$(".reporteregistro").html("");
							$('.reponusername').html(repo);
						}

						


					}else{
						$(".reportepw").html("<span class='[success alert secondary] [round radius] label'>✖ Contraseñas distintas.!!</span>");
						$(".repopwregistro").html("<span class='[success alert secondary] [round radius] label'>✖</span>");
						$(".reporteregistro").html("");

					}

					
					/**/			
			}


			/**/
		}




		

	});



});


function cleanall(){

	$('.reponusername').html("");
	$('.repousermail').html("");
	$('.repopwregistro').html("");
	$('.reportepw').html("");
	$('.username').val("");
	$('.usermail').val("");
	$('.pwregistro').val("");
	$('.pwconfirm').val("");

}