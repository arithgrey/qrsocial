<script type="text/javascript" src="<?=base_url('application/js/zonas/home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<style type="text/css">



#p_bienvenida{
  font-size: 1.7em;
}
#p_opcionesdisponibles{
  font-size: 1.3em;
}
#title_registro_menu{
  color: white;
}
#nuevo_img{

  border-radius: 15px;
  width: 31%;
}

#zonaname_label{
  font-size: 1.3em;
  color: white;
}
#panel_section{

  background: #8ED7F2;
}
.title_table{
  background: #012634;
}
.tutle_help{
  background: black;
  font-size: 1.3em;
}
.alert-box , #menu_section{
  cursor: pointer;
}
#registrarzonan{
  background: white;
  color: black;
}
#preguntas_p{
  color: white;
  font-size: 1.5em;
}
</style>

<div class="alert-box"> 
<div class="row">
  
  <!--Sección principal-->  
  <div id='seccion_principal'>
    <div class="small-12 large-8 large-push-4 columns">
      <img src="http://placehold.it/600x300&text=[img]">
    </div>

  </div>






  <!--Nuevo menú -->  
  <div id='seccion_nuevo'>      

        <div class='row'>        
        <div class="large-12 columns">            
        <div class="row">              
              <dl class="sub-nav">    
              <dd class="active panelcontrol_menu" id='panelcontrol_menu'>
                <a onclick="section('crearnuevas_zonas')">Registar zona QR</a>
              </dd>                           
              <dd id='ayuda_menuzona' class='ayuda_menuzona'>
                <a onclick="section('seccion_ayuda')">Ayuda</a>
              </dd> 
            </dl>
        </div>  


        <div data-alert class="alert-box">                   


            <!-- Sección de ayuda -->
          <div id="seccion_ayuda" class="large-12 columns">    

                  <p id="preguntas_p">
                    Preguntas frecuentes del sistema QR social
                  </p>

                <div class='large-10 columns'>              
                  <div class="row">
                    <p class='tutle_help'>¿Qué es el sistema QR social?</p>
                    <div class='panel'> 
                      <p>
                      Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del 
                      texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una 
                      distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo 
                      "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer.
                       Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto 
                       por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web
                        que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evoluciona
                        do a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo i
                        nsertándole humor y cosas por el estilo). 
                        </p>
                    </div>

                    <p class='tutle_help' >¿Cómo puedo adquirir más servicios?</p>
                    <div class="panel callout radius">
                      <p>
                          A panel is a simple, helpful Foundation component that enables you to outline sections of 
                          your page easily. This allows you to view your page sections as you add content to them, or
                           add emphasis to a section. The width is controlled by the grid columns you put them inside. 
                      </p>
                    </div>
                  </div>
                </div>

                <div class='large-2 columns'>                 
                    <div id="frecuentes">
                      <p class='row' id='frecuentes_p'>Frecuentes</p>           
                      <a>Primeros pasos en qrsocial</a>
                      <a>Tipos de cuentas</a>
                      <a>Administración de usuarios</a>         
                    </div>  
                </div>                          

          </div>


          <!--Sección para el registro de las zonas-->
          <div id="section_establecido">            
            <div id="contenido_list_zonas" class='row'></div>     
            <h2 id="title_registro_menu">Registro</h2>          
            <form name="frm_registrozonas" id="frm_registrozonas">

              <div class="large-6 columns">
                    <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Nombre de la zona qr">
                      Zona qr 
                    </span>
                    <input type="text" name="zona_name" id="zona_name" placeholder="El nombre del la zona">            
                    <select class='tipo_zona' name='tipo_zona' id="tipo_zona">
                    </select>
                       <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Mensaje que se encontrará disponible en el caso de que la zona qr ">
                      Mensaje por default para la zona
                    </span>  
                    <input type="text" name="mensajedefault" placeholder='#mensaje por #default para mi #zonaqr' >
                    <input type="hidden" name="base_url" value="<?=base_url()?>"> 

              </div>
              <div class="large-6 columns">
                <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Describe tu zona qr social">
                      Descripción
                    </span>  
                    <textarea  name='descripcion_zona' id="descripcion_zona" rows="4" cols="50">
                      Descripción de la zona qr a crear
                    </textarea>

              </div>
              
                    </form>
                    <button id="registrarzonan" class="registrarzonan">Registrar Zona <?=img("application/img/png/glyphicons-207-ok-2.png")?></button>
                  <p class="reporegistro" id="reporegistro"></p>

         </div>         
        </div>
        </div>
      </div>
  </div>

</div>

<!--

    <div class="large-2 columns">
        <div class="large-12 columns" onclick="section('e_nuevo' )"; >                    
              <p class='menu_section'>Zonas QR Social</p>                      
        </div>      
        <div class="large-12 columns" onclick="section('e_destacadas')";>                  
            <p class='menu_section'>Destacadas</p>              
        </div>
        <div class="large-12 columns " onclick="section('e_informes' )";>           
              <p class='menu_section' id="menu_section">Datos estadísticos</p>           
        </div>

    </div>
-->



















<div class="reveal-modal" id="dlg_del_zoaedit" data-reveal>
   
   <div  class='large-12 columns'>              
          <form name="form_edit_zona" METHOD ="POST" id="form_edit_zona">                        
            <h2>Configuración </h2>
            <div class='large-6 columns'>
              <h4 class="subheader large-6 columns">Zona</h4>        
              <input type="hidden" name='edit_zona' id="edit_zona" >   
              <input type="text" name="edit_zonaname" id="edit_zonaname" class="large-6 columns">
              <h4 class="subheader large-6 columns">Tipo de zona </h4>
              <select id="edit_tipozona" name='edit_tipozona'></select>        
            </div>            
            <div class='large-6 columns'>                
              <h4 class="subheader ">Descripción</h4>
              <textarea name="edit_descripcion" id="edit_descripcion"  rows="4" cols="50"></textarea>
              <p id="edit_fecharegistro"></p> 
            </div>
          <div class='large-12 columns'>
            <h4 class="subheader">Mensaje por default</h4>
            <input type="text"  id="mensajedefaultedit" name="mensajedefaultedit" placeholder="#mensaje predeterminado #qr #social"> 
          </div>     
          </form>        
          <button id="edit_btn">Efectuar cambios <?=img("application/img/png/glyphicons-445-floppy-saved.png")?></button>          
          <p id="edit_repo"></p>  
    </div>    
    <div class="row">
        <h2>Mensajes asociados</h2>
        <div id="mensaje_asociados" class="mensaje_asociados"></div>
   </div>        


  <a class="close-reveal-modal">&#215;</a>
</div>  
</div> 
<div class="reveal-modal" id="dlg_del_zoadel" data-reveal>
  <h3>Eliminar Campaña</h3>
  <p>¿Realmente decea eliminar la zona qr?</p>
  <button id="done_del">ELIMINAR</button>
  <button id="fail_del">CANCELAR</button>
  <a class="close-reveal-modal">&#215;</a>
</div>  



<div class="reveal-modal" id="dlg_detallezona" data-reveal>
  <p id="detalle_zona"> </p>
    <a class="close-reveal-modal">&#215;</a>
</div>  


