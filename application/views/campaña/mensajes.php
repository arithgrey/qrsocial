<?php   
$data = array(
               3  => 'http://example.com/news/article/2006/03/',
               7  => 'http://example.com/news/article/2006/07/',
               13 => 'http://example.com/news/article/2006/13/',
               26 => 'http://example.com/news/article/2006/26/'
            );
?>
<script type="text/javascript" src="<?=base_url('application/js/mensaje/principal.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.alert.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/calendar.min.js')?>"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href="<?=base_url('application/css/calendar.min.css')?>" rel="stylesheet">  

<style type="text/css">
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
    color: white;
  }

</style>






<div id="registro-mensajes">

  <div data-alert class="alert-box">

<div class='row'>          
          <div class='large-4 columns'>
              <!--Ver mensajes-->
              <div class='large-6 columns'>      
                <div class="switch">
                      <input id="mensajesactuales" type="checkbox">
                      <label for="mensajesactuales"></label>
                </div>                
              </div> 
                <div class='large-6 columns'>
                  <h3 class="msj_description">Mensajes<small class="msj_description"> actuales</small></h3>  
                </div>  
           </div>      

           <div class='large-8 columns'>
                <!--Crear mensajes-->
                <div class='large-4 columns'>                  
                <h3 class="msj_description" >Registrar<small class="msj_description"> algún evento</small></h3>  
                </div>

                <div class='large-8 columns'>                  
                  <select name="eventoaction" class='large-6 columns' onchange="showpanel(this)" >
                    <option value="1" >Publicación en Facebook</option>
                    <option value="2" >Publicación en Twitter</option>
                    <option value="3" >Mensaje adicional para llamar a una acción  (call to action)</option>
                    <option value="4">Mensaje de agradecimiento posterior a la publicación de tu mensaje</option>
                    <option value="5">Mensaje en caso de que no se encuentre disponible el mensaje</option>
                  </select>        
            
                </div>            

          </div>    
  
</div>













<div class='row'>
  <div class='large-6 columns'>
    <span data-tooltip class="has-tip" title="Registro de mensajes para a campaña ">
     
      <form>
    
    <div class='row'>
       <div class="large-12 columns">
        
          <span data-tooltip class="has-tip" title="El cuerpo del mensaje , en el puedes insertar #hashtag(s) , Url(s), texto ... "><h3 id="extras"class="show-for-large-only">Descripción</h3></span>

         <textarea rows="4" cols="50" name='descripcion' class='descripcion' id='descripcion'>                  
          ¿Qué estás pensando? 

          Tu publicación con #hashtag
        </textarea> 
       </div>      
    </div>  
  </div>  


<!---->

<div class="large-6 columns">
      <div class='row'>
        
      </div>
      <br>
<div id="presentesiempre">
<div class="row">
    <div class="large-8 columns">                          
                
                <span data-tooltip aria-haspopup="true" class="has-tip" title="Asignar la hora en que el mensaje dejará de estar disponible para su publicación"><h5 class="conf-hora-fecha">Mensaje siempre disponible</h5></span>    

    </div>          

    <div class="large-4 columns"> 
                  <div class="switch">
                  <input id="exampleCheckboxSwitch" type="checkbox">
                  <label for="exampleCheckboxSwitch"></label>
                </div> 
    </div>              
</div> 
</div>


<div id='asignarhora' class='asignarhora'>

    <div class="row">
        <div class="large-8 columns">                          
                    
                    
                  <span data-tooltip aria-haspopup="true" class="has-tip" title="Asignar la hora en que el mensaje dejará de estar disponible para su publicación"><h5 class="conf-hora-fecha">Asignar fecha inicio y termino </h5></span>    
        </div>          
        <div class="large-4 columns"> 
                      <div class="switch">
                      <input id="asignar_fecha_hora" type="checkbox" >
                      <label for="asignar_fecha_hora"></label>
                    </div> 
        </div>              
    </div> 


</div>

  </div>


</div> 

<div class='row'>

  
  <!--FECHAS-->

<div id="camposfechas">  
  <div class='large-6 columns'>

      <span data-tooltip aria-haspopup="true" class="has-tip" title="Asignar la hora en que el mensaje iniciará a estar disponible para su publicación">Hora inicio del mensaje</span>
        <select name="id_hora_inicio" id="id_hora_inicio" class="id_hora_inicio">
        </select>

      <div class='calendario-inicio' >
        <?= $this->calendar->generate(2014, 10, $data);?>
      </div>   
  </div>
  <div class='large-6 columns'>
    <span data-tooltip aria-haspopup="true" class="has-tip" title="Asignar la hora en que el mensaje dejará de estar disponible para su publicación">Hora termino del mensaje</span>      
      <select id="id_hora_termino"></select>
      <div class='calendario-termino' >
        <?= $this->calendar->generate(2014, 10, $data); ?>
      </div>   
  </div> 

</div> 

   
</div>
</div>
</div>