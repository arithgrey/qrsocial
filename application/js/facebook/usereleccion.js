$(document).on("ready", function(){

	$("#public_fb").click(trypostFB);	
	$("#publica_tw").click(trytwitterPost);
});

function trypostFB(){

	mensaje = $("#mensaje").val();
	urlnext= $(".now").val()+"index.php/appqrsocial/trypostfb/?mensaje="+mensaje; 
	window.location.assign(urlnext);

}
function trytwitterPost(){

	mensaje = $("#mensaje").val();	
	urlnext= $(".now").val()+"index.php/appqrsocial/twittermensaje/?twittermsj="+mensaje; 	
	window.location.assign(urlnext);

	
}