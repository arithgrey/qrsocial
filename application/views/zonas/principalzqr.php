<script type="text/javascript" src="<?=base_url('application/js/zonas/home.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<style type="text/css">
.menu_section{
  color: white;
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
#nuevo_img{

  border-radius: 15px;
  width: 31%;
}
#registro_p , #editar_p , #ayuda_p{
  
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

</style>

<div class="row">
  
  <!--Sección principal-->  
  <div id='seccion_principal'>
    <div class="small-12 large-8 large-push-4 columns">
    <img src="http://placehold.it/600x300&text=[img]">
    </div>
  </div>


  <!--Nuevo menú -->  
  <div id='seccion_nuevo'>      
        <div class='large-12'>        
        <div class="large-8 large-push-4 columns">            
        <div class="row">              
              <dl class="sub-nav">    
              <dd class="active panelcontrol_menu" id='panelcontrol_menu'>
                <a onclick="section('crearnuevas_zonas')">Registar zona QR</a>
              </dd> 
              <dd id="ediatar_menu" class="ediatar_menu">
                <a onclick="section('editar_zonas')" >Mis zonas qr</a>
              </dd>               
              <dd id='ayuda_menuzona' class='ayuda_menuzona'>
                <a onclick="section('seccion_ayuda')">Ayuda</a>
              </dd> 
            </dl>
        </div>  


        <div data-alert class="alert-box">                   


          <!-- Sección de ayuda -->
          <div id="seccion_ayuda" class="large-12 columns">               
                <div class='large-10 columns'>
                  <h2 class="subheader" >
                    Preguntas frecuentes 
                    <small>del sistema QR social</small>
                  </h2>
                  <div class="row">
                    <p>¿Qué es el sistema QR social?</p>
                    <div class='panel'> 
                      Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo). 
                    </div>
                    <p>¿Cómo puedo adquirir más servicios?</p>
                    <div class="panel callout radius">
                      A panel is a simple, helpful Foundation component that enables you to outline sections of your page easily. This allows you to view your page sections as you add content to them, or add emphasis to a section. The width is controlled by the grid columns you put them inside. 
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




          



          <div id="Editarmiszonas">
            <h2 id="title_registro_menu">Editar zonas Qr</h2>                            
            <div id="contenido_list_zonas" class='row'></div>                                    
          </div>

          <!--Sección para el registro de las zonas-->
          <div id="section_establecido">            
            <h2 id="title_registro_menu">Registro</h2>          

            <form name="frm_registrozonas" id="frm_registrozonas">
                  <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Nombre de la zona qr">
                    Zona qr 
                  </span>
                  <input type="text" name="zona_name" id="zona_name" placeholder="El nombre del la zona">
                
                    <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Describe tu zona qr social">
                      Descripción
                    </span>  
                    <textarea  name='descripcion_zona'>
                      Datos de la zona
                    </textarea>

                    
                    <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Identifica qué tipo de zona es">
                      Tipo de zona
                    </span>  
                    <select class='tipo_zona' name='tipo_zona' id="tipo_zona">

                    </select>
                    </form>
                    <div class="switch">
                    <input id="exampleCheckboxSwitch" type="checkbox">
                    <label for="exampleCheckboxSwitch"></label>

                  </div>         
                  <p class="reporegistro" id="reporegistro"></p>

         </div>         
        </div>
        </div>
      </div>
  </div>



<!---->
  <div class="small-12 large-4 large-pull-8 columns">
    <div class="row">
      <div class="medium-4 large-12 columns" onclick="section('e_destacadas')";>        
        <div data-alert class="alert-box" >          
          <h3 class='menu_section'>Destacadas</h3>    
        </div>
      </div>
      <div class="large-12 columns" onclick="section('e_nuevo' )"; >
        
        
          <div data-alert class="alert-box info radius">          
            <h3 class='menu_section'>Nueva</h3>          
          </div>
        

      </div>      
      <div class="medium-4 large-12 columns " onclick="section('e_informes' )";>
          <div class="panel callout radius">
            <h3 class='menu_section'>Datos</h3>

          </div>
      </div>

    </div>
  </div>
</div>







<div class="reveal-modal" id="dlg_del_zoaedit" data-reveal>

   <div  class='large-12 columns'>
      
        <div class='large-6 columns'>
          <div class='panel'>
          <form name="form_edit_zona" METHOD ="POST" id="form_edit_zona">
            <h2>Edición</h2>        
            <h4 class="subheader">Zona</h4>        
            <input type="hidden" name='edit_zona' id="edit_zona"> 
            <input type="text" name="edit_zonaname" id="edit_zonaname">
            <h4 class="subheader">Descripción</h4>
            <textarea name="edit_descripcion" id="edit_descripcion" rows="4" cols="50"></textarea>
            <p id="edit_tipozona_p"></p>              
            <select id="edit_tipozona" name='edit_tipozona'></select>        
            <p id="edit_fecharegistro"></p>                    
          </form>        
          <button id="edit_btn">Efectuar cambios</button>
          <p id="edit_repo"></p>
        </div> 
    </div>   

    <div class='large-6 columns'>
         <div id='panel_section'>
           <nav class="center-off-canvas-menu"> 
            <ul class="off-canvas-list">
             <li><label>QR SOCIAL</label></li>
             <li><a href="<?=base_url('index.php/panelcontrol/control')?>">Panel de control</a></li> 
              <li><a href="<?=base_url()?>">Home</a></li>
              <li><a href="<?=base_url('index.php/zonasqr/principal')?>">Zonas QR</a></li>
              <li><a href="<?=base_url('index.php/cuentas/accessacount')?>">Campañas</a></li>        
              <li><a id="cancelar_edit">Cancelar</a></li>
              <li><a id="del_zonam">Eliminar zona</a></li>
              </ul>
            </nav>       
          </div>

      </div>        


  </div>    
  <a class="close-reveal-modal">&#215;</a>
</div>  

<div class="reveal-modal" id="dlg_del_zoadel" data-reveal>
  <h3>Eliminar Campaña</h3>
  <p>¿Realmente decea eliminar la zona qr?</p>
  <button id="done_del">ELIMINAR</button>
  <button id="fail_del">CANCELAR</button>
  <a class="close-reveal-modal">&#215;</a>
</div>  

  



