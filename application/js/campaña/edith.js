$(document).on("ready", function(){
	

	now = $('.now').val();	


	$('.eliminarcamp').click(function(){
		
		idcamp = $('.campedit').val();		
		url = now+"index.php/api/camprest/getnamecampbyid/format/json";				
		params = { "idcamp" : idcamp }
		
		var jqxhr = $.ajax({

				type: "POST",
				url: url,						
				data: params,
				dataType: "json"	

			}).done(function(data){
				
				descripcion = idcamp + " ---> "+data[0].nombre;
				$(".campname").html(descripcion);


			}).fail(function() {
				alert( "error" );
				loadcamp();
				listaropciones();
			});

		$("#dlg_del_cam").foundation('reveal','open');
		$('.eliminar_camp_def').click(function(){

			urlpost = now+"index.php/api/camprest/eliminacamp/format/json";					
			var jqxhr = $.ajax({

				type: "POST",
				url: urlpost,						
				data: params,
				dataType: "json"	

			}).done(function(data){
				
				$('.reporegistro').html(data);
				loadcamp();
				listaropciones();
				$('#dlg_new_menu').foundation('reveal', 'close');

			}).fail(function() {
				alert( "error" );
				loadcamp();
				listaropciones();
			});




		});
		
						


	});

	
	$('.cancelar').click(function(){
		$('#dlg_new_menu').foundation('reveal', 'close');
	
	});


});
function editcam(){
	
	loadcamp();
	listaropciones();
	$('#dlg_new_menu').foundation('reveal','open');

}
