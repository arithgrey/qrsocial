<script type="text/javascript" src='<?=base_url("application/js/mensaje/editarmensajenow.js")?>'></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/mensaje.css')?>">


<style type="text/css">
#descripcionedit, #mas_detalles{
	display: none;
}
</style>

<form id='form_edit_mensaje'>
	<input type='hidden' value="<?=$mensaje;?>" id='mensaje' name='mensaje'>
	<input type='hidden' value="<?=$campid;?>" id='campid' name='campid'>
<div class='row'>
	<div class="row medium-uncollapse large-collapse"> 
		<fieldset>
			<div class='row'>
				<div id='main_s'>
					<p class='detalle_zona large-6 columns alert-box'><?=img('application/img/general/configure.png')?> Mensaje  #<?=$mensaje;?></p>
				</div>
				<div id='more_s'>
					<p class='detalle_zona large-6 columns alert-box'><?=img('application/img/general/add182.png')?> Más detalles</p>
				</div>
			</div>
<div id='main_section'>
			<fieldset>
				<div class="small-6 columns"><label id='lb_description'><?=img('application/img/general/black218.png')?>Mensaje</label> </div>
				<div class="small-6 columns"><label id='descripcion_lb'></label><textarea name="descripcionedit" id="descripcionedit"  cols="50" rows="4"></textarea></div>    

			</fieldset>
			<fieldset>
				<div class="small-6 columns"><label id='lb_description'><?=img('application/img/tipo_zonas/calendar157.png')?>Días disponibles</label> </div>
				<div class="small-6 columns">
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
	            </div>          
	            <input type="hidden" name="idmensajeedit" id="idmensajeedit">
			</fieldset>
			<fieldset>
				<div class="small-6 columns">
						<div class="small-6 columns"><label id='lb_description'><?=img('application/img/tipo_zonas/clock4.png')?>Horario disponible</label> </div>
				</div>
				<div class="small-6 columns">
					   <div class='large-6 columns'>
                        <p id='titlehora'>Disponible desde</p>
                        <div id='horainicioconf'></div>
                      </div>
                      <div class='large-6 columns'>
                        <p id='titlehora'>hasta</p>
                        <div id='horaterminoconf'></div>
                      </div>
				</div>
			</fieldset>

			<fieldset>
</div>				

<div id="mas_detalles">
				<div class="small-6 columns">
					<label id='lb_description'>
						<?=img('application/img/general/add182.png')?>
						Campos adicionales
					</label> 
				</div>
				
				<div class="small-6 columns">
					<div class='row'><?=img('application/img/general/facebook29.png')?></div>
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
				<button id='return_camp'>Regresar</butto
				</div>
					
			</fieldset>

		</fieldset>
	</div>
</div>

</form>

















