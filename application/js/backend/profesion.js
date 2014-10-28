$(document).on("ready", function(){

	$(".gopanel").click(function(){

		baseurl = $(".now").val();
		window.location.replace(baseurl+"index.php/backend");

	});

	$(".delete-profesion").click(function(){

		profesion = $('.outelement').val();

		param = {"elimina": profesion}

		url = $('.now').val();
		urlpreparada= url + "index.php/api/profesion/elimina/format/json";
		var jqxhr = $.ajax({

				type: "POST",
				url: urlpreparada,
				data: param,									
				dataType: "json"	

			}).done(function(data){
					
				alert(data);
			
			}).fail(function() {
				alert( "error" );
			});
			
	});



	$('.registro').click(function(){


		profesion = $('.profesion').val();
		descripcion = $('.descripcion').val();

		param = {"profesion":  profesion , "descripcion": descripcion }

		url = $('.now').val();
		urlpreparada= url + "index.php/api/profesion/registro/format/json";
		var jqxhr = $.ajax({

				type: "POST",
				url: urlpreparada,
				data: param,									
				dataType: "json"	

			}).done(function(data){
					
				alert(data);
			
			}).fail(function() {
				alert( "error" );
			});


	});




	$(".listnow").click(function(){
		
		baseurl = $(".now").val();
		urlpost = baseurl+"index.php/api/profesion/listprofesion/format/json";

		var jqxhr = $.ajax({

				type: "POST",
				url: urlpost,									
				dataType: "json"	

			}).done(function(data){
					
				responsedata = "";
				for (var a = 0; a < data.length; a++) {
					
					action = baseurl+"index.php/backend/profesion?out="+data[a].idprefesion+"&element="+data[a].nombre;  	


					responsedata+="<div class='row'> <div class='large-8 columns'>"+ 
					data[a].nombre +"</div><div class='large-4 columns'> "
					+"<a href='"+ action +"'>eliminar</a>"+"</div> </div>";
				};
				
				

				$('.listado').html(responsedata);

				$('.listadosection').show();									
				
			
			})
			.fail(function() {
				alert( "error" );
			})
			.always(function() {
				//alert( "complete" );
			});




	});


	$('.listadosection').hide();
});