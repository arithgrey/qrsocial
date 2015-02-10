var zonas = new Array(); 
$(document).on("ready", function(){

    now = $('.now').val();      
    loadcamp();
    listaropciones();
    flag = 0;
    $("body").ready(loadzonas());
    $("#campanias_menu").attr("class","active campanias_menu");

    $("#registrarcamp").click(registracampania);
    
            
});





/*

function loadcamp(){
    
    url = now + "index.php/api/camprest/loadcampania/format/json";  
    $.get(url).done(function(data){
        
        listado="<table><thead><tr><th><h5>#</h5></th><th><h5>Campaña</h5></th><th><h5>Descripción</h5></th><th><h5>Configuración</h5></th><th><h5>Campaña disponible</h5></th> </tr> </thead> <tbody>";

                            for (var a = 0; a < data.length; a++) {                                 

                                idcampaña = data[a].idcampaña;      
                                nombre = data[a].nombre;
                                descripcion = data[a].descripcion;
                                fecharegistro = data[a].fecharegistro;
                                estado = data[a].status;
                                if (estado ==  "1") {
                                    
                                    estado ="Habilitada <img src='"+ $(".now").val()+"application/img/png/glyphicons-199-ok.png'>"; 
                                }else{
                                    estado ="inhabilitada <img src='"+ $(".now").val()+"application/img/png/glyphicons-200-ban.png'>";  
                                    
                                    
                                }

                                direct = now+"index.php/camp/opciones?camp="+idcampaña+"&name="+nombre;                                
                                listado +="<tr><td>"+idcampaña+"</td> <td><a href='"+direct+"'>"+nombre+"</a></td>"+
                                          "<td>"+descripcion.slice(0 , 150)+"<a class='seguir_leyendo' id='"+idcampaña+"'> ...leer</a></td>"+
                                          "<td><a><div class='editcamp' id="+idcampaña+">  <img src='"+ $(".now").val()+'application/img/png/glyphicons-151-edit.png'  + "'  class='editcamp' id="+idcampaña+" >  </div></a></td>"+
                                          "<td><label>"+estado+"</label></td></tr>";                                
                            }                   
                            listado+=" </tbody></table>";       
                            llenaelementoHTML('#listacampañas' , listado);

                            $(".editcamp").click(editarcampania);
                            $(".seguir_leyendo").click(seguirleyendo);

        
    }).fail(function(){
        alert("Error");
    });


    
}
*/

function loadcamp(){
    
    url = now + "index.php/api/camprest/loadcampania/format/json";  
    $.get(url).done(function(data){
        
        listado="<table class='large-12 columns'><tr class='title_table' id='title_table'><td><label class='titulo_mensaje'>#</label></td><td><label class='titulo_mensaje'>Campaña de Marketing</label></td><td><label class='titulo_mensaje'>Mensajes</label></td><td><label class='titulo_mensaje'>Configuración</label></td><td><label class='titulo_mensaje'>Eliminar</label></td></tr>";

                            for (var a = 0; a < data.length; a++) {                                 

                                idcampaña = data[a].idcampaña;      
                                nombre = data[a].nombre;
                                descripcion = data[a].descripcion;
                                fecharegistro = data[a].fecharegistro;
                                estado = data[a].status;
                                if (estado ==  "1") {
                                    
                                    estado ="Habilitada <img src='"+ $(".now").val()+"application/img/png/glyphicons-199-ok.png'>"; 
                                }else{
                                    estado ="inhabilitada <img src='"+ $(".now").val()+"application/img/png/glyphicons-200-ban.png'>";  
                                    
                                    
                                }

                                direct = now+"index.php/camp/opciones?camp="+idcampaña+"&name="+nombre;                                

                                direct_edit = now+"index.php/camp/editainformacion?camp="+idcampaña+"&name="+nombre;                                

                                imgpath= $(".now").val()+"application/img/tipo_zonas/black218.png"; 
                                imgpath_del= $(".now").val()+"application/img/general/delete6.png";
                                listado +="<tr><td>"+idcampaña+"</td> <td>"+nombre+"</td>"+
                                          //"<td>"+descripcion.slice(0 , 150)+"<a class='seguir_leyendo' id='"+idcampaña+"'> ...leer</a></td>"+
                                          //"<td>"+descripcion.slice(0 , 150)+"....</td>"+                                        
                                          "<td><a href='"+direct+"'>"+ "<img style='width: 20%;' src='"+imgpath+"'></td>" +"</a>"+                                        
                                          "<td><a href='"+direct_edit+"'><div>  <img style='width: 15%;' id='menu_display' src='"+ $(".now").val()+'application/img/tipo_zonas/pencil41.png'  + "' >  </div></a></td>"+
                                          "<td><a><div > <img  style='width: 20%;' class='eliminarcamp' id="+idcampaña+" src='"+imgpath_del+"'></div></a></td>";
                                          "<td><label>"+estado+"</label></td></tr>";                                
                            }                   
                            listado+="</table>";        
                            llenaelementoHTML('#listacampañas' , listado);

                            $(".editcamp").click(editarcampania);
                            $(".seguir_leyendo").click(seguirleyendo);
                            $(".eliminarcamp").click(eliminacampmenu);

        
    }).fail(function(){
        alert("Error");
    });

    loadnumcampbycount("#numercampañas");
    
}

function registracampania(){

        zonas.splice(0 , zonas.length );                
        f=0;

        $("#zonasdisponibles input[type=checkbox]:checked").each(function(){                                    
            zonas.push($(this).val());                              

        });
            
        if (zonas.length>0) {

                    posturl = now + "index.php/api/camprest/validaregistro/format/json";                
                    $.post(posturl , $('#registra_campa').serialize() )
                        .done(function(data){                       
                            loadcamp();
                            listaropciones();                                                       

                            isArray = Array.isArray(data);
                            if (isArray){

                                llenaelementoHTML('.reporegistro' , "Elemento Registrado # "+data[0].idcampaña);    
                                asociacampzonas(data[0].idcampaña);

                            }else{
                                llenaelementoHTML('.reporegistro' , data);  
                            }
                            

                            
                            
                }).fail(function(){});




        }else{
            llenaelementoHTML('.reporegistro' , "Seleccione una o varias zonas qr");
        }



}

function asociacampzonas(idcamp){

    for (var a = 0; a < zonas.length; a++) {                                    

        if (zonas[a]!=null) {
            urlN = now+"index.php/api/camprest/registrozonacamp/format/json/?camp="+idcamp+"&zona="+zonas[a]; 
            $.get(urlN ).done(function(data){                                   
                                                    
            }).fail(function(){});              
        }
                                    
                            

    }

}

function listaropciones(){

    /*Listar nombres de las campañas actuales*/
    listadocampname =now+"index.php/api/camprest/presentanombreidcamp/format/json";
    $.get(listadocampname , {dataType : "json"}).done(function(data){
            
        elemento ="";       
        for (var a = 0; a < data.length; a++) {
            
            idcamp =  data[a].idcampaña;
            nombre = data[a].nombre;
                        
            elemento+= "<option value='"+idcamp+"'>"+nombre+"</option>";

        }
        
        llenaelementoHTML('.campedit' , elemento);

    });


}


function seguirleyendo(e){

    
    id= e.target.id;
    url ="";
    $('#dlg_detalles_camp').foundation('reveal','open');


        url = $(".now").val()+"index.php/api/camprest/getdescriptioncampbyid/format/json";

        $.get(url ,{"idcamp" : id} ).done(function(data){
            descripcion = data[0].descripcion;

            $("#seguirleyendotext").html(descripcion);

        }).fail(function(){

            alert("fail getnamecampbyid");

        });


}












function eliminacampmenu(e){

        
        $("#dlg_del_cam").foundation('reveal','open');  
        idcamp = e.target.id;
        llenaelementoHTML("#numero_camp_del" , "Seguro desea eliminar la campaña #"+idcamp);
        $("#campeditdel").val(idcamp);
        $('.eliminar_camp_def').click(function(){

 
                urlpost = now+"index.php/api/camprest/eliminacamp/format/json";                                         
                $.post(urlpost , $('#eliminacampform').serialize()).done(function(data){                                        

                    loadcamp();
                    listaropciones();
                    
                    llenaelementoHTML('.reporegistro' , data);
                    $('#dlg_new_menu').foundation('reveal', 'close');


                }).fail(function() {
                    alert( "error" );
                    loadcamp();
                    listaropciones();
                });
            

                $("#dlg_del_cam").foundation('reveal','close');  

        }); 
        

}


function loadzonas(){
    
    url = $(".now").val()+"index.php/api/zonasrest/loadzonas/format/json";
    $.get(url).done(function(data){
        
        
        e="<table class='large-12 columns'><tr class='title_table' id='title_table'><td><label class='titulo_mensaje'> # </label></td><td> <label class='titulo_mensaje'>Zona qr </label></td><td><label class='titulo_mensaje'>Agregar<label></label> </tr>"; 

        for (var a = 0; a < data.length; a++) {            

            e+="<tr><td> <label id='lab_describ_qr'>"+ data[a].idzona +"</label></td>";
            e+="<td> <label <label id='lab_describ_qr'>"+data[a].zonanombre+"</label></td>";
            e+="<td><label id='lab_describ_qr'> <input type='checkbox' name='zonaqrasig' value='"+data[a].idzona+"' ></label></tr>";
            
        
        }

        
        llenaelementoHTML( "#zonasdisponibles" , e );
        loadnumcampbycount("#numercampañas");

    }).fail(function(){
        alert("Error");
    });
    
}
