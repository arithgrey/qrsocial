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
#registrozonasnuevassection{
  display: none;
}
</style>

      <div class='row'>
          <div id='general_list' class='large-6 columns detalle_zona alert-box'>
            
              <div class='large-4 columns'>
                <?=img('application/img/general/map49.png')?>
              </div>
              <div class='large-6 columns'>
                   # Zonas qr registradas
              </div>
              <div class='large-2 columns' id="numerozonas">                  
              </div>                          
          </div>

          <div id='nuevoresgistrozona'>
            <p class='large-6 columns detalle_zona alert-box'><?=img('application/img/general/add182.png')?>Nueva</p>
          </div>
      </div>
      

          <!--Sección para el registro de las zonas-->
          <div id='listadozonasactuales'>
              <div class='row'>
                <div id="contenido_list_zonas"  ></div>     
                <p class="reporegistro" id="reporegistro"></p>      
              </div>            
          </div>
          


<div id='registrozonasnuevassection'>
<div class='row' >
  <fieldset>
      <form name="frm_registrozonas" id="frm_registrozonas">                  
            <p class="title_registro_s">Registro</p>                      
                  <div class='row'>

                    <div class='large-6 columns'>
                        <label class='title_registro large-12 columns'>
                         <?=img('application/img/general/green6.png')?> Nombre de la zona qr 
                        </label>                               
                        <div class='large-12 columns'>
                          <input type="text" name="zona_name" id="zona_name" placeholder="El nombre del la zona" required>            
                        </div>
                    </div>
                    <div class='large-6 columns'>
                        <label class='title_registro large-12 columns'>
                        <img src="<?=base_url('application/img/tipo_zonas/black218.png')?>"> Mensaje por default para la zona
                      </label>   
                      <div class='large-12 columns'>
                        <input type="text" name="mensajedefault" id="mensajedefault" placeholder='Hola buen día.!' required>
                      </div>
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
                                    
         
       </form>    
        </div>

</div>
</fieldset>

</div>

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



