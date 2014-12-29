<script type="text/javascript" src="<?=base_url('application/js/calendario/calendario.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/mensaje/principal.js')?>"></script>

<script src="<?=base_url('application/js/foundation/foundation.alert.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/calendar.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/calendario/redessociales.js')?>" ></script>



 <script src="<?=base_url('application/js/foundation/foundation.joyride.js')?>"></script>
<script src="<?=base_url('application/js/vendor/jquery.cookie.js')?>"></script> <!-- Optional -->


<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href="<?=base_url('application/css/calendar.min.css')?>" rel="stylesheet">  


<style type="text/css">
  
  #url_f{
    font-size: 1em;
  }  
  #horaconfimensaje{
    display: none;
  }  
  #title_form{
    background: rgb(55, 200, 236);
    color: white;
    font-size: 1.3em;
  }  
  #h2_dias, #h5_dias{
    color: white;       
  }  
  #calend_section{
    background: rgb(55, 200, 236);
    color: white;
  }  
  #title_t{
    background: none repeat scroll 0% 0% rgba(29, 51, 54, 1);    
    border-radius: 10px;
  }  
  #msj_text{
    font-size: 1.6em;
  }
  #title_t td{
    color: white;
  }
  #name_title{
    font-size: 1.9em;
  }  
  .steps{
    color: white;
  }  
  #mensajes_h1{
    color: white;
  }
  #p_repotemporal{
    color: white;
  }
  #registrointemporalbtn , #registrofechanbtn{
      
    background: white;
    color: black;
    border-radius: 5px;
  }
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
  .cal_dia_seleccionado{
    font-size: 1.5em;
  }

    .conf-hora-fecha{
      background: #23A3EE;
      color: white;  
      border-radius: 2px;
      padding: 5px;
    }

    label, #extras , #nombre{
      color: white;
    }
    .calendario-inicio h4{
      display: none;
      border: 0px;
    }  
    .calendario-inicio p{
      display: none;
      border: 0px;
      border: 0px;
    }
    .calendario-termino h4{
      display: none;
    }  
    .calendario-termino p{
      display: none;
    }
    .msj_description{
      color: black;
    }
    #title_table_msj{
      background: #00BFFF;
      color: white;      
    }
    #title_t_p{
      font-size: 1.6em;
    }
    #secction_twitter , #primeros_pasosseccion, #datos_campañaseccion{
      display: none;
    }
    #secction_twitter_c , #secction_facebook_f{
      background: white;
      color: black;
    }
    #registrointemporalbtn{

      background: none repeat scroll 0% 0% rgba(45, 90, 141, 1);
      color: white;
    }#registrotwitter {
      background: #BFE0EC !important;
      color: white;
    }
    #extras_tw{
          
      color: #BFE0EC !important;
    }
    #extras_f{
      color: #2D5A8D;
    }
    #title_table_msj_tw{
      background: #BFE0EC !important;
    }
    #p_tw , #p_fb{
      font-size: 2em;
    }

</style>




<div class="reveal-modal" id="dlg_configmensaje" data-reveal>
<form id='updatemensaje' name='updatemensaje' method="POST">
<div id='asignarhoramsj'>
        <div class='large-12 columns'>

                    <div class='large-6 columns'>
                      <p id="title_form" >Editar la descripción del mensaje</p>
                      <textarea name="descripcionedit" id="descripcionedit"  cols="50" rows="4"></textarea>          
                      <p id='title_form'>Mensaje visible</p>          
                      <select name="statusmsjedit" id="statusmsjedit">
                        <option value="1">Disponible siempre </option>
                        <option value="2">Disponible asignando fecha de inicio y termino </option>    
                        <option value="3">No disponible </option>
                      </select>

                                <div class='row' id='horaconfimensaje'>
            <div class="large-6 columns">
              <span data-tooltip aria-haspopup="true" class="has-tip" title="Asignar la hora en que el mensaje iniciará a estar disponible para su publicación">
                Hora inicio del mensaje
              </span>                                  
              <select name="id_hora_inicio" id="id_hora_inicio" class="id_hora_inicio"></select>              
              <span data-tooltip aria-haspopup="true" class="has-tip" title="Asignar la hora en que el mensaje iniciará a estar disponible para su publicación">
                Hora Termino del mensaje</span>            
              <select name="id_hora_termino" id="id_hora_termino" class="id_hora_termino"></select>  
            </div>                
          </div>

                    </div>
                    <div class='large-6 columns' id="calend_section">
                        <h3 class="show-for-large-only">Estado del mensaje</h3>          
                        <input type="hidden" name="year" id='a_actual' value="<?=$añoactual;?>">
                        <input type="hidden" name="month" id="mesactual"  value="<?=$numerodemes;?>" >                                                        
                        <div class="large-8 columns">
                          <h2 id="h2_dias">Días disponibles</h2>
                          <?=$calendario;?>    
                        </div>
                        <div class="large-4 columns">
                          <h5 id="h5_dias">Dias seleccionados</h5>
                          <input name="dias" type="text" id="txt_dias_sel" style="width:5em">
                            <div id="urlmensajeedit"></div>                                                                 
                        </div>
                    </div>                        
      </div>        
</div>
  <input type="hidden" name="idmensajeedit" id="idmensajeedit">
  </form>    
  <button id="updatemensajebtn">Guardar cambios <?=img("application/img/png/glyphicons-445-floppy-saved.png")?></button>
  <button id="delmensajebtn">Eliminar mensaje <?=img("application/img/png/glyphicons-208-remove-2.png")?> </button>
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


<div id='secction_facebook'>
<div data-alert class="alert-box">    

<p id="repodel"></p>
<p id="p_fb">Facebook <?=img("application/img/png/glyphicons-344-thumbs-up.png")?></p>
          <div id="listmensajes" class='listmensajes row'> </div>           
          <div class='row' id='secction_facebook_f'>    
              <form name="mensajefbform" id="mensajefbform">    
                             <div class="large-12 columns">                           

                                <div class='large-6 columns'>    
                                            <h2 id="extras_f">
                                              Descripción
                                            </h2>         
                                             <textarea rows="4" cols="50" name='descripcion' class='descripcion large-12 columns' id='descripcion'>                  
                                              ¿Qué estás pensando? 
                                              
                                            </textarea>               
                                 </div>
                                  <div class='large-6 columns'>
                                        <h2 id="extras_f">
                                              Zona Asignada
                                        </h2>                    
                                        <span data-tooltip class="has-tip" title="Elija el tipo de zona de su preferencia">
                                          <h3 id="extras_f"class="show-for-large-only">Buscar Zonaqr por Tipo</h3>
                                        </span>
                                        <input type="hidden" name="campid" id='campid' value="<?=$campid?>">
                                        <select name="tipozona" id="tipozona" onchange="getzonasbytipo(this)">
                                          <option value="all">Todas</option>
                                        </select>
                                        <span data-tooltip class="has-tip" title="Elija la zona de tu preferencia">
                                          <h3 id="extras_f"class="show-for-large-only">Zona</h3>
                                        </span>
                                        <select name="zona" id="zona" class="zona">
                                        </select>
                </form>
                                        <button id="registrointemporalbtn">Registrar publicación</button>
                                        <p id="p_repotempora"></p>
                                              
                                  </div>
                             </div>          
          </div>  
</div>
</div>




<!--Para Twitter -->  

<div id="secction_twitter">
  <div id="mainAlert1" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">   
    <p id="p_tw">Twitter</p>
  <div id="listmensajestw" class='listmensajestw row'> </div>           
  <div class="row"  id="secction_twitter_c">
  <fieldset>    
    <form name="twitterform" id="twitterform">    
        <div class="large-12 columns">                           
        <div class='large-6 columns'>    
                    <h2 id="extras_tw">
                      Descripción
                    </h2>         
                     <textarea rows="4" cols="50" name='descripcion_twitter' class='descripcion_twitter large-12 columns' id='descripcion'>                  
                      ¿Qué está pasando? 
                      
                    </textarea>               
         </div>
          <div class='large-6 columns'>
                 <h2 id="extras_tw">
                  Zona Asignada
                </h2>                    
            <span data-tooltip class="has-tip" title="Elija el tipo de zona de su preferencia">
              <h3 id="extras_tw"class="show-for-large-only">Buscar Zonaqr por Tipo</h3>
            </span>
            <input type="hidden" name="campid" id='campid' value="<?=$campid?>">
            <select name="tipozona" id="tipozona" onchange="getzonasbytipo(this)">
              <option value="all">Todas</option>
            </select>
            <span data-tooltip class="has-tip" title="Elija la zona de tu preferencia">
              <h3 id="extras_tw"class="show-for-large-only">Zona</h3>
            </span>
            <select name="zona" id="zona" class="zona">
            </select>
            </form>
            <button id="registrotwitter">Registra mensaje para Twitter</button>           
        </fieldset>             
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
