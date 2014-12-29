$(document).on("ready", function(){

	$("body").ready(loadcamp);

	
	$("#home_menu").attr("class","active home_menu");

});

/*Load campañas by user*/
function loadcamp(){

		url = $(".now").val()+ "index.php/api/camprest/loadcampbycount/format/json";
		$.get(url).done(function(data){				
			



		}).fail(function(){

			alert("Error loadcamp");

		});
}
