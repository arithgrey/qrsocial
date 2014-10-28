$(document).on("ready", function(){
	
	now = $('.now').val();	

	$('.eliminarcamp').click(function(){
		
	
		$("#dlg_del_cam").foundation('reveal','open');
		
		$('.eliminar_camp_def').click(function(){

			urlpost = now+"index.php/api/camprest/eliminacamp/format/json";											
				$.post(urlpost , $('#edita_campa').serialize()).done(function(data){					
					
					loadcamp();
					listaropciones();
					$('.reporegistro').html(data);
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


function editarcampania(event){
	

	idcampania = event.target.id;
	getnamecampbyid(idcampania);
	getdescriptioncampbyid(idcampania);
	$("#campedit").val(idcampania);
	$('#dlg_new_menu').foundation('reveal','open');


		/***/
	$('.guardarcambios').click(function(){

			urledit = now+"index.php/api/camprest/editcamp/format/json";													
			$.post(urledit , $('#edita_campa').serialize() )
			.done(function(data){
				
				//$('.reporteedit').append("<p>"+data+"</p>");
				$('#dlg_new_menu').foundation('reveal', 'close');
				loadcamp();
				listaropciones();
				
				
			}).fail(function(){
				alert("error");

			});
					
		});

	
}

function getnamecampbyid(id){


		url = $(".now").val()+"index.php/api/camprest/getnamecampbyid/format/json";

		$.get(url ,{"idcamp" : id} ).done(function(data){
			nombrecampania = data[0].nombre;
			$("#campanianame").html(nombrecampania);
			$("#nameedicion").val(nombrecampania);

		}).fail(function(){

			alert("fail getnamecampbyid");

		});

}


function getdescriptioncampbyid(id){


		url = $(".now").val()+"index.php/api/camprest/getdescriptioncampbyid/format/json";

		$.get(url ,{"idcamp" : id} ).done(function(data){
			descripcion = data[0].descripcion;
			$("#descripcioneditcamp").val(descripcion);

		}).fail(function(){

			alert("fail getnamecampbyid");

		});

}


