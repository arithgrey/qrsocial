$(document).on("ready",function(){
	
	now = $('.now').val();
	$("#regacountn").click(showformnewuser);

	$(".accessuser").click(function(){

		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		mail = $('.emailaccess').val();
		pw = $('.passwordaccess').val();

		if (!expr.test(mail)) {			
			$('.repomail').html('<h6>Error en mail</h6>');

		}else{

			$('.repomail').html('');

			if (pw.length>7){				

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


			}else{

				$('#repopass').html('<h6>Error en la contraseña</h6>');		
			}

			



		}


		

	});



});


function showformnewuser(){

	$("#dlgnewreg").foundation('reveal', 'open');  

}