<script type="text/javascript" src="<?=base_url('application/js/zonas/home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<style type="text/css">

#section_establecido{
  background: none repeat scroll 0% 0% #00BFFF;
}
.lb_title{
  font-size: 1.2em;
  color:  rgba(245, 245, 245, 1);
  
}
#lista_msj_t{
  background: rgba(25, 48, 53, 1);
}
.main_title{
  font-size: 2em;  
  color:  rgba(245, 245, 245, 1);
  background:  rgba(25, 48, 53, 1);

}
#lb_title{
  font-size: 1.7em;
  color: rgb(17, 120, 146);
}
#p_bienvenida{
  font-size: 1.7em;
}
#p_opcionesdisponibles{
  font-size: 1.3em;
}
#title_registro_menu{
  color: white;
}
#lb_text{
  color: grey;

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
 background: none repeat scroll 0% 0% #00BFFF;
}
.lb_title{
  font-size: 1.2em;
}
.tutle_help{
  background: black;
  font-size: 1.3em;
}
.alert-box , #menu_section{
  cursor: pointer;
}
#preguntas_p{
  color: white;
  font-size: 1.5em;
}
.title_registro_s{
  font-size: 2.7em;
}
</style>
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


<div class="row">      
  <div id='seccion_nuevo'>      
               
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


          <div class='row'>
            <div id="contenido_list_zonas"  ></div>     

          </div>
          
          <div class='row'>                  
            <div class='large-4 columns'>
                <div class='large-6 columns'>
                    <label>Zonas registradas</label>  
                </div>                          
                <div class='large-6 columns'>
                    <label id="numerozonas"></label>
                </div>                                     
            </div>                                         
          </div>
          


<div class='row'>
  <fieldset>
      <form name="frm_registrozonas" id="frm_registrozonas">      
            
            <p class="title_registro_s">Registro</p>                      
                  <div class='row'>

                      <label class='title_registro large-12 columns'>
                       <?=img('application/img/general/green6.png')?> Nombre de la zona qr 
                      </label>         
                      
                      <div class='large-12 columns'>
                        <input type="text" name="zona_name" id="zona_name" placeholder="El nombre del la zona" required>            
                      </div>

                      <label class='title_registro large-12 columns'>
                        <img src="<?=base_url('application/img/tipo_zonas/black218.png')?>"> Mensaje por default para la zona
                      </label>   
                      <div class='large-12 columns'>
                        <input type="text" name="mensajedefault" id="mensajedefault" placeholder='Hola buen día.!' required>
                      </div>

                  </div>

                  <div class='row'>
                                
                      <label class='title_registro large-12 columns'>
                       <img src="<?=base_url('application/img/tipo_zonas/notes26.png')?>"> Referencia o descripción
                      </label>                      
                      <div class='large-12 columns'>
                        <textarea  name='descripcion_zona' id="descripcion_zona"  rows="4" cols="50">
                        Descripción de la zona qr a crear
                      </textarea>
                      </div>
                      
                      <label class='title_registro large-12 columns'>
                        Tipo de zona
                      </label>            
                      <div class='large-12 columns' id='tipo_zona'>
                      </div>

                  </div>
                  <input type="hidden" name="base_url" value="<?=base_url()?>"> 
                  <input type="hidden" name="tipoz" id='tipoz' value=""> 
                  <button id="registrarzonan" class="registrarzonan">Registrar Zona <?=img("application/img/png/glyphicons-207-ok-2.png")?></button>
                                    
         <p class="reporegistro" id="reporegistro"></p>      
       </form>    
        </div>

</div>
</fieldset>
</div>


























<div class="reveal-modal" id="dlg_del_zoaedit" data-reveal>   
            <form name="form_edit_zona" METHOD ="POST" id="form_edit_zona">                        
            <p class='main_title'>Configuración </p>            

  
<div class='row'>
            <div class='large-6 columns'>
                    <label class='large-12 columns' id='lb_title'>Zona</label>        
                    <input type="hidden" name='edit_zona' id="edit_zona" class='large-12 columns'>   
                    <input type="text" name="edit_zonaname" id="edit_zonaname" >

                    <label class='large-12 columns' id='lb_title'>Tipo de zona </label>
                    <select id="edit_tipozona" name='edit_tipozona' class='large-12 columns'></select>                  
            </div>

            <div class='large-6 columns'>
                    <label class='large-12 columns' id='lb_title'> Descripción</label>
                    <textarea name="edit_descripcion" id="edit_descripcion" class='large-12 columns'  rows="4" cols="50"></textarea>                        
            </div>
</div>

            
<div class='row'>
              <div class='large-8 columns'>
                <label class='large-12 columns' id='lb_title'>Mensaje por default</label>
                <input class='large-12 columns' type="text"  id="mensajedefaultedit" name="mensajedefaultedit" placeholder="#mensaje predeterminado #qr #social">     
              </div>
              <div class='large-4 columns'>
                <button  class='large-12 columns' id="edit_btn">Efectuar cambios <?=img("application/img/png/glyphicons-445-floppy-saved.png")?></button>       
                 <button  class='large-12 columns' id='ver_mensajes'>Mensajes<?=img("application/img/png/glyphicons-445-floppy-saved.png")?></button>             
              </div>    
              </form>                  
</div>            

  <a class="close-reveal-modal">&#215;</a>
</div>  
</div> 


<div class="reveal-modal" id="dlg_mensajeszona" data-reveal>
  <div class="row">        
        <div id="mensaje_asociados" class="mensaje_asociados"></div>
    </div>        
</div>


<div class="reveal-modal" id="dlg_detallezona" data-reveal>
  <p id="detalle_zona"> </p>
    <a class="close-reveal-modal">&#215;</a>
</div>  



