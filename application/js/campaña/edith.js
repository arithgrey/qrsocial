var zc = new Array(); 

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


	$("#estadocamp").click(function(){

		if ($("#estadocamp").val() == 0) {
			$("#estadocamp").val(1);
			
		}else{
			$("#estadocamp").val(0);
		}

	});

	

});


function editarcampania(event){
	

	idcampania = event.target.id;
	getnamecampbyid(idcampania);
	getdescriptioncampbyid(idcampania);
	getnamestatuscampbyid(idcampania);
	loadlistzonasedit(idcampania);


	$("#campedit").val(idcampania);	
	$('#dlg_new_menu').foundation('reveal','open');




		

		/***/
	$('.guardarcambios').click(function(){

			urledit = now+"index.php/api/camprest/editcamp/format/json";													


			$.post(urledit , $('#edita_campa').serialize() )
			.done(function(data){
				


				$('#dlg_new_menu').foundation('reveal', 'close');
				loadcamp();
				listaropciones();
				
				
			}).fail(function(){
				alert("error");

			});
					
		});

	
	
	
	
	return false; 


}




function loadlistzonasedit( idcampania ){

	getzonascampania(idcampania);
    url = $(".now").val()+"index.php/api/zonasrest/loadzonas/format/json";    
    $.get(url ).done(function(data){      
        
    	e="<table><tr><td><label id='t_table'>#</label></td> <td> <label id='t_table'>Zona qr </label></td><td><label id='t_table'> Activo<label> </td> <td> <label id='t_table'>Descripción</label> </td></label></tr>"; 

        for (var a = 0; a < data.length; a++) {            

        	zonaqrasigedit  =  "zonaqrasigedit"+data[a].idzona;
            e+="<tr><td> <label id='lab_describ_qr'>"+ data[a].idzona +"</label></td>";
            e+="<td> <label <label id='lab_describ_qr'>"+data[a].zonanombre+"</label></td>";
            e+="<td><label id='lab_describ_qr'> <input type='checkbox' class='zonaqredit' id='"+zonaqrasigedit+"' name='"+zonaqrasigedit+"' value='"+data[a].idzona+"' ></label>";
            e+="</td><td><label id='lab_describ_qr'>"+data[a].descripcion.slice(0,100)+"</label></td> <label></tr>";
      
        }



        $("#listzonasedit").html(e);	


        for (var a = 0; a < zc.length; a++) {            

        	id =  "#zonaqrasigedit"+zc[a];

        	$(id).attr('checked', true);
        
        }

		$(".zonaqredit").click(editazonacampnow);



    }).fail(function(){
        alert("Error");
    });

}


function editazonacampnow(e){

	elemento = e.target.id;
	nzona  = elemento.slice(-1);
	campedit = $("#campedit").val();
	
	url = $(".now").val()+"index.php/api/camprest/setregistrozonacam/format/json";
	$.post(url, {
		"idzona" : nzona ,
		"campedit" : campedit	

		  }).done(function(data){

		  	llenaelementoHTML("#reposteedicioncampzona" , data);

	}).fail(function(){
		
		alert("Error editazonacampnow");		
	});
	
	
}

function getnamestatuscampbyid(id){


		url = $(".now").val()+"index.php/api/camprest/getstatusnamecampbyid/format/json";
		statusact = 0;

		$.get(url , {"idcamp" : id} ).done(function(data){
			
			estado = data[0].status;
			if (estado == 1 ) {

				$("#estadocamp").attr("checked", true);
				$("#estadocamp").val("1");
			}else{
				$("#estadocamp").attr("checked", false);
				$("#estadocamp").val("0");
			}
			

		}).fail(function(){

			alert("fail getnamestatuscampbyid");

		});
		

}



function getzonascampania(idcampania){
	zc.splice(0 , zc.length );
	urlzonascamp = $(".now").val()+"index.php/api/zonasrest/loadzonascamp/format/json?idcampania="+idcampania;    				
	b = 0;

	$.get( urlzonascamp ).done(function(data){      

		for (var a = 0; a < data.length; a++) {            

			zc[b] = data[a].idzona ; 
			b++;

        }                
    }).fail(function(){
        alert("Error");
    });

}


function getnamecampbyid(id){


		url = $(".now").val()+"index.php/api/camprest/getnamecampbyid/format/json";

		$.get(url , {"idcamp" : id} ).done(function(data){
			
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

