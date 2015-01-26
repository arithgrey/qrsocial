$(document).on("ready",function(){
		
	$("#regacountn").click(showformnewuser);
	$(".accessuser").click(tryaccessuser);
});



function tryaccessuser(){

		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		mail = $('.emailaccess').val();
		pw = $('.passwordaccess').val();
		if (!expr.test(mail)) {			
			llenaelementoHTML( '.repomail' , '<h6>Error en mail</h6>');
		}else{		
			llenaelementoHTML('.repomail', '');
			if (pw.length>7){				

				posturl = $('.now').val() + "index.php/api/accesssystem/usercheck/format/json";
				pwpost = ""+CryptoJS.SHA1(pw);
				params = {"mail": mail, "pw" : pwpost }				
						var jqxhr = $.ajax({

							type: "POST",
							url: posturl,						
							data: params,
							dataType: "json"	

						}).done(function(data){				
						
							llenaelementoHTML( '.repoacces' , data);						
						}).fail(function(){
							alert( "error" );
						});
			}else{			
				llenaelementoHTML( '#repopass' , '<h6>Error en la contraseña</h6>');
			}
		}

		return false;

}

function showformnewuser(){

	$("#dlgnewreg").foundation('reveal', 'open');  
}