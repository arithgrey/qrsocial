$(document).on("ready", function(){

	$("body").ready(loadcamp);

});

function loadcamp(){

		url = $(".now").val()+ "index.php/api/camprest/loadcampbycount/format/json";

		$.get(url).done(function(data){
				
			alert(data);

		}).fail(function(){

			alert("Error loadcamp");

		});



}