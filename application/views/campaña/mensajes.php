<script type="text/javascript" src="<?=base_url('application/js/calendario/calendario.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/mensaje/principal.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.alert.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/calendario/redessociales.js')?>" ></script>
<script src="<?=base_url('application/js/foundation/foundation.joyride.js')?>"></script>
<script src="<?=base_url('application/js/vendor/jquery.cookie.js')?>"></script> <!-- Optional -->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/mensaje.css')?>">
<script type="text/javascript" src="<?=base_url('application/js/mensaje/twitter_msj.js')?>"></script>
<style type="text/css">
  .titulo_mensaje{

    color: white;
    font-size: 1.5em;
  }
  #img_facebook{
    width: 50%;
  }
  #registro_ld{
    font-size: 2.7em;
  }
  #descripcionsection{
      font-size: .8em;
  }
</style>
  
        <!--Menú-->
        
    <div class='row'>
        <label>Objetivo de Marketing: </label><label id='descripcionsection' class='descripcionsection'></label>
          <div onclick="navmenucampania('mensajes_facebook');" class='large-4 columns detalle_zona alert-box'>
            
              <div class='large-4 columns' >
                <?=img('application/img/general/facebook29.png')?>
              </div>
              <div class='large-6 columns'>
                   #Mensajes para Facebook
              </div>
              <div class='large-2 columns' id="numeromensajefb">                  
              </div>                          
          </div>
          <div onclick="navmenucampania('mensaje_twitter');"  class='large-4 columns detalle_zona alert-box'>
            
              <div class='large-4 columns' >
                <?=img('application/img/general/social71.png')?>
              </div>
              <div class='large-6 columns'>
                   #Mensajes para Twitter
              </div>
              <div class='large-2 columns' id="numeromensajetw">                  
              </div>                          
          </div>
          <div onclick="navmenucampania('primeros_pasos');" class='large-4 columns detalle_zona alert-box'>
            
              <div class='large-4 columns' >
                <?=img('application/img/general/businessman46.png')?>
              </div>
              <div class='large-6 columns'>
                   Guia de primeros pasos
              </div>
              <div class='large-2 columns' id="numercampañas">                  
              </div>                          
          </div>
          
          
          
          
      </div>    



<!--SECCIÓN DE FACEBOOK-->
<div id='secction_facebook' class='secction_facebook'>
<div class='row' id='secction_facebook_f'>    
  
  <div id="listmensajes"></div>          
  <fieldset>
         <form name="mensajefbform" id="mensajefbform">    
            <input type="hidden" name="campid" id='campid' value="<?=$campid?>">
                      <label id="registro_ld"><?=img('application/img/general/thumb12.png')?>Registro </label>
                                <div class='large-5 columns'>                                                  
                                          <textarea rows="4" cols="50" name='descripcion' class='descripcion large-12 columns' id='descripcion'>                  
                                          Mensaje para facebook
                                          </textarea>
                                            <input type='hidden' name='hinicio' id='hinicio'>                                                       
                                            <input type='hidden' name='htermino' id='htermino'>                                                       
                                          <p id="p_repotemporal"></p>
                                          <button id="registrointemporalbtn">Registrar publicación  </button>
                                          <p id="p_repotempora"></p>         
                                 </div>

                                 <div class='large-7 columns'>
                                  

                                    <table class='large-12 columns' id='diassection'>
                                      <tr>  <td><label class='d'>L</label></td>
                                            <td><label class='d'>M</label></td>
                                            <td><label class='d'>M</label></td>
                                            <td><label class='d'>J</label></td>
                                            <td><label class='d'>V</label></td>
                                            <td><label class='d'>S</label></td>
                                            <td><label class='d'>D</label></td>
                                    </tr>
                                    <tr>
                                      <td><input type='checkbox' name='lunes' class='diaselect' id='lunes' value='0'></td>
                                      <td><input type='checkbox' id='martes' value='0' name='martes' class='diaselect'></td>
                                      <td><input type='checkbox' value='0' name='miercoles' id='miercoles' class='diaselect'></td>
                                      <td><input type='checkbox' id='jueves' value='0' name='jueves' class='diaselect' ></td>
                                      <td><input type='checkbox' value='0' id='viernes' name='viernes' class='diaselect' ></td>
                                      <td><input type='checkbox' id='sabado' value='0' name='sabado' class='diaselect'></td>
                                      <td><input type='checkbox' id='domingo' name='domingo' value='0' class='diaselect'></td>
                                    </tr>
                                  </table>                                
                                  <div id='horariosdisponibleshoras'></div>
                              </div>  
  </fieldset>
</div>
<!--SECCIÓN DONDE SE FIJAN LAS HORAS EN QUE ESTARÁ DISPONIBLE EL MENSAJE-->
    <div class="reveal-modal" id="dlg_asignarhoramensajeg" data-reveal>
        <div class='large-12 columns'>
          <div id='hora_inicio_sec'></div>
          <div id='hora_termino_sec'></div>    
        </div>  
    <a class="close-reveal-modal">&#215;</a>    
    </div>  
</form>                    
</div>  
</div> 













<!--SECCIÓN PARA TWITTER -->  
<div class='secction_twitter' id='secction_twitter'>
<div class='row'>

  <div class="row">
    <div id="listmensajes_twitter_now"></div>          
  </div>
<fieldset>
  <label id="registro_ld"><?=img('application/img/general/twitter35.png')?>Registro 
     </label>
  <form id="mensaje_twitter" name="mensaje_twitter"  >
        <input type="hidden" name="campid" id='campid' value="<?=$campid;?>">
        <input type='hidden' name='hinicio_twitter' id='hinicio_twitter'>                                                       
        <input type='hidden' name='htermino_twitter' id='htermino_twitter'> 

        <div class='large-5 columns'>                                                  
          <textarea rows="4" cols="50" name='descripcion_twitter' class='descripcion large-12 columns' id='descripcion_twitter' required>                  
            Mensaje para Twitter
          </textarea>
          <label id='info_registro'></label>
          <button id="registromsjtwitter">Registrar publicación</button>                                          
        </div>

        <div class='large-7 columns'>          
            <div class='row'>
              <div id='horariosdisponibles_tw'></div>
              <div id='horariosdisponibles_twitter'></div>
        
            </div> 

        </div>
   </form>
</fieldset>                                     
</div>
</div>






<!--Primeros pasos-->
<div id="primeros_pasosseccion">

    <div id="mainAlert1" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">         

       <ol class="joyride-list" data-joyride> 
        <li data-id="firstStop" data-text="Next" data-options="tip_location: top; prev_button: false">
         <p>Hello and welcome to the Joyride documentation page.</p> 
       </li> 
       <li data-id="numero1" data-class="custom so-awesome" data-text="Next" data-prev-text="Prev"> 
        <h4>Stop #1</h4> 
        <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p> 
      </li>
       <li data-id="numero2" data-button="Next" data-prev-text="Prev" data-options="tip_location:top;tip_animation:fade">
        <h4>Stop #2</h4> 
        <p>Get the details right by styling Joyride with a custom stylesheet!</p>
         </li> <li data-button="End" data-prev-text="Prev"> 
         <h4>Stop #3</h4> <p>It works as a modal too!</p>
        </li>
        </ol>

        <div class='row'>
        
        <div class='firstStop' id='firstStop'>
          <h1 class='steps'>Bienvenido a la configuración de mensajes</h1>
          <p>
            The tooltips can be positioned on the "tip-bottom", which is the default position, "tip-top" (hehe), "tip-left", or "tip-right" of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full-width and bottom aligned.
            The tooltips can be positioned on the "tip-bottom", which is the default position, "tip-top" (hehe), "tip-left", or "tip-right" of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full-width and bottom aligned.
          </p>
        </div>

        <div class='numero1' id='numero1'>
          <h1 class='steps' >First</h1>
          <p>
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
          </p>
        </div>


        <div class='numero2' id='numero2'>
          <h1 class='steps'>second step</h1>
          <p>
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
          </p>
        </div>

        <div class='End' id='End'>
          <h1 class='steps'>End</h1>
          <p>
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
            At the bottom of your page but inside of the body, place either an ol or ul with the data-joyride attribute. This list will contain all of the stops on your tour. To associate the tour stops with an item on your page, make sure the ID and data-id match between the two. If you do not associate an id, the tour stop will take on a modal style, positioning itself in the middle of the screen.
          </p>
        </div>
      </div>
  </div>  
</div>






































<!--Eliminar mensaje -->
<div class="reveal-modal" id="dlg_eliminamensajeconfirm" data-reveal>
  <p id="numeromensaje"></p>  
    <button id='confelimmensaje'>Eliminar</button>  
    <button id='cancelareliminarmensaje'>Cancelar</button>
    <a class="close-reveal-modal">&#215;</a>
</div>  




<!--Editar FB-->
<!--

-->





<!---->
<div class="reveal-modal" id="dlg_asignarhoramensajeg_twitter" data-reveal>
    <div class='large-12 columns'>
      <div id='hora_inicio_sec_twitter'>
        <label id='titlehora_twitter'>
          Hora en que iniciará a estar disponible el mensaje
        </label>

      </div>
      <label id='titlehora_twitter'>
          Hora en que dejará de estar disponible el mensaje
      </label>
      <select name='hora_termino_select_twitter' id='hora_termino_select_twitter' ></select>




      <div id='hora_termino_sec_twitter'></div>    
    </div>
  <a class="close-reveal-modal">&#215;</a>    
</div>  
