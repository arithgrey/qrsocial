$(document).on("ready", function(){

	$("#public_fb").click(trypostFB);	
});

function trypostFB(){

	mensaje = $("#mensaje").val();
	urlnext= $(".now").val()+"index.php/appqrsocial/trypostfb/?mensaje="+mensaje; 
	window.location.assign(urlnext);

}