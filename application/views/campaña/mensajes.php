<?php 
  $horainicio = ""; 
  for ($a=0; $a <24 ; $a++) { 

    if ($a <12) {
      $horainicio .="<option value='".$a."'>".$a." AM </option>";
    }else{
      $horainicio .="<option value='".$a."'>".$a." PM</option>";
    }

    
  }
                                        
?>
<script type="text/javascript" src="<?=base_url('application/js/calendario/calendario.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/mensaje/principal.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.alert.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/calendario/redessociales.js')?>" ></script>
<script src="<?=base_url('application/js/foundation/foundation.joyride.js')?>"></script>
<script src="<?=base_url('application/js/vendor/jquery.cookie.js')?>"></script> <!-- Optional -->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/mensaje.css')?>">

<style type="text/css">
  .titulo_mensaje{

    color: white;
    font-size: 1.5em;
  }
</style>




<div class="reveal-modal" id="dlg_configmensaje" data-reveal>
<form id='updatemensaje' name='updatemensaje' method="POST">
<div id='asignarhoramsj'>
        <div class='large-12 columns'>

                    <div class='large-6 columns'>
                      <p id="title_form" >Editar la descripción del mensaje</p>
                      <textarea name="descripcionedit" id="descripcionedit"  cols="50" rows="4"></textarea>          
                      
                      <div class='large-12 columns'>
                        <div id='listacdias'>
                          <table class='large-12 columns' id='diassection'>
                            <tr>
                              <td><label class='d'>L</label></td>
                              <td><label class='d'>M</label></td>
                              <td><label class='d'>M</label></td>
                              <td><label class='d'>J</label></td>
                              <td><label class='d'>V</label></td>
                              <td><label class='d'>S</label></td>
                              <td><label class='d'>D</label></td>
                            </tr>
                            <tr>
                              <td><input type='checkbox' name='lc' id='lc'  class='dcc'></td>
                              <td><input type='checkbox' name='mc' id='mc' class='dcc'></td>
                              <td><input type='checkbox' name='mic' id='mic' class='dcc'></td>
                              <td><input type='checkbox' name='jc' id='jc' class='dcc'></td>
                              <td><input type='checkbox' name='vc' id='vc' class='dcc'></td>                              
                              <td><input type='checkbox' name='sc' id='sc' class='dcc'></td>
                              <td><input type='checkbox' name='dc' id='dc' class='dcc'></td>
                            </tr>
                          </table>
                        </div>
                      </div> 

                      
                      <div class='large-6 columns'>
                        <p id='titlehora'>Disponible desde</p>
                        <div id='horainicioconf'></div>
                      </div>
                      <div class='large-6 columns'>
                        <p id='titlehora'>hasta</p>
                        <div id='horaterminoconf'></div>
                      </div>

                    </div>

          <div id='bloquefacebook'>            
            <div class='large-6 columns'>                                      
                                      <div class='large-4 columns'>
                                        <label id='c'>Name:</label>
                                      </div>    
                                      <div class='large-8 columns'>
                                        <input type='text' name='namec' id='namec' placeholder='qrsocial'>
                                      </div>

                                      <div class='large-4 columns'>
                                        <label id='c' >Descripción del caption</label>
                                      </div>
                                      <div class='large-8 columns'>
                                        <input type='text' name='descriptioncaptionc' id='descriptioncaptionc' placeholder='QR SOCIAL NUEVA PLATAFORMA'>
                                      </div>

                                      <div class='large-4 columns'>
                                        <label id='c'>Caption</label>
                                      </div>
                                      <div class='large-8 columns'>
                                        <input type='text' name='captionc' id='captionc' placeholder='Caption'>
                                      </div>
                                      <div class='large-4 columns'>
                                        <label id='c' >URL de algún código </label>
                                      </div>
                                      <div class='large-8 columns'>
                                        <input type='url' name='sourcec' id='sourcec' placeholder=''>
                                      </div>

                                      <div class='large-4 columns'>
                                        <label id='c' >URL de algúna imagen</label>
                                      </div>
                                      <div class='large-8 columns'>
                                        <input type='url' name='picturec' id='picturec' placeholder='https://avatars1.githubusercontent.com/u/3848687?v=3&s=400' >      

                                      </div>
                                      <div class='large-4 columns'>
                                        <label id='c'>Link</label>
                                      </div>
                                      <div class='large-8 columns'>
                                          <input type='url' name='linkc' id='linkc' placeholder='https://github.com/arithgrey'>
                                      </div>
                                                                                        
                                  </div>                   
                    
      </div>        
    </div>
</div>
  <input type="hidden" name="idmensajeedit" id="idmensajeedit">


  </form>    
  <button id="updatemensajebtn">Guardar cambios <?=img("application/img/png/glyphicons-445-floppy-saved.png")?></button>
  <a class="close-reveal-modal">&#215;</a>
</div>  









  







        <div class="row" id="nav_menu_campania">              
              <dl class="sub-nav">    
                
                  <dd class="active mensajes_facebook" id='mensajes_facebook'>
                    <a onclick="navmenucampania('mensajes_facebook');">Mensajes Facebook</a>
                  </dd> 
              <dd class='mensaje_twitter' id="mensaje_twitter" >
                <a onclick="navmenucampania('mensaje_twitter');" >Mensajes Twitter</a>
              </dd>                             
              <dd  class="primeros_pasos" id="primeros_pasos">
                <a onclick="navmenucampania('primeros_pasos');" >Primeros pasos</a>
              </dd> 
              <dd class="datos_campaña" id='datos_campaña'>
                <a onclick="navmenucampania('datos_campaña');">Datos de la campaña</a>
              </dd>                                           
            </dl>
        </div>  

<div id='secction_facebook'><p id="p_fb">Facebook</p>
  <div class='row' id='secction_facebook_f'>    
  <div id="listmensajes"></div>          
  <fieldset>
         <form name="mensajefbform" id="mensajefbform">    
            <input type="hidden" name="campid" id='campid' value="<?=$campid?>">
                                <div class='large-5 columns'>                                                  
                                          <textarea rows="4" cols="50" name='descripcion' class='descripcion large-12 columns' id='descripcion'>                  
                                          Mensaje para facebook
                                          </textarea>

                                            <input type='hidden' name='hinicio' id='hinicio'>                                                       
                                            <input type='hidden' name='htermino' id='htermino'>                                                       
                                          <p id="p_repotemporal"></p>
                                          <button id="registrointemporalbtn">Registrar publicación</button>
                                          <p id="p_repotempora"></p>         
                                 </div>

                                 <div class='large-7 columns'>
                                  <div id='horariosdisponibles'></div>
                                  <div id='horariosdisponibleshoras'></div>
   </fieldset>                              </div>              
  </div>  
</div>

<div class="reveal-modal" id="dlg_asignarhoramensajeg" data-reveal>
    <div class='large-6 columns'>
      <div id='hora_inicio_sec'></div>
      <div id='hora_termino_sec'></div>    
    </div>
    <div class='large-6 columns'>
      <button class='large-6 columns' id='hechohora'>Asignar hora</button>
    </div> 

<a class="close-reveal-modal">&#215;</a>    
</div>  
</form>                    




<!--Eliminar mensaje -->
<div class="reveal-modal" id="dlg_eliminamensajeconfirm" data-reveal>
  <p id="numeromensaje"></p>  
    <button id='confelimmensaje'>Eliminar</button>  
    <button id='cancelareliminarmensaje'>Cancelar</button>
    <a class="close-reveal-modal">&#215;</a>
</div>  








































<!--Para Twitter -->  

<div id="secction_twitter">
  <div id="mainAlert1" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">   

  <p id="p_tw">Twitter</p>
  <div id="listmensajestw" class='listmensajestw row'> </div>           
  <div class="row"  id="secction_twitter_c">
  
    <form name="twitterform" id="twitterform">    
        
          <div class='large-6 columns'>    
                    <h2 id="extras_tw">
                      Descripción
                    </h2>         
                     <textarea rows="4" cols="50" name='descripcion_twitter' class='descripcion_twitter large-12 columns' id='descripcion'>                  
                      ¿Qué está pasando?                       
                    </textarea>         

          </div>
          <div class='large-6 columns'>
            <input type="hidden" name="campid" id='campid' value="<?=$campid?>">



          </div> 
                                  
      </form>
            <button id="registrotwitter">Registra mensaje para Twitter</button>           
  
     </div>      

  </div>
</div>




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
<div id="datos_campañaseccion">
  <div id="mainAlert1" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">       
      <div class='row'>
        <div class='large-12 columns'>
          <div id="data_campania" class='large-5 columns'></div>
          <div id="data_campaniaothers" class='large-7 columns'></div>
        </div>

      </div>
    </div>    
</div>




































