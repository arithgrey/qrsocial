$(document).on("ready", function(){

	$(".logout").click(terminarsessionfb);
	$(".urlusuariofb").click(getmuro);
	
});


function terminarsessionfb(e){
	urlendsession =e.target.id;
	$(location).attr("href",urlendsession);
}
function getmuro(f){

	urlusuariofb =  f.target.id;
	$(location).attr("href", urlusuariofb);	
}