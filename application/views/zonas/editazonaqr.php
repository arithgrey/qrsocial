<script type="text/javascript" src="<?=base_url('application/js/zonas/edit.js')?>"></script>

<style type="text/css">



#zona_name_area{
	height: 500px;
}

#zona_defmsj_input_value , #zona_name_input_value, #zona_name_area_value, #section_mensajes{
	display: none;
}

</style>
<div class='row'>
<div class="row medium-uncollapse large-collapse"> 
    <fieldset>
    	<form id='form_zona_edit'>
    	<input type='hidden' name='diaL' id="diaL" value="<?=$diaL;?>">
    	<div class='row' >
    		<div class="large-12 columns">
	    		<div >
	    			<a href="<?=base_url('index.php/zonasqr/principal')?>">
	    				<p class='large-2 columns detalle_zona alert-box'><?=img('application/img/general/leftarrow8.png')?></p>
	    			</a>
	    		</div>
	    		<div id='general'>
	    			<p class='large-5 columns detalle_zona alert-box'><?=img('application/img/general/configure.png')?> Zona qr  #<?=$zonaqredit?></p>
	    		</div>
	    		<div id='msjs_programados'>
		    		<p class='large-5 columns detalle_zona alert-box'><?=img('application/img/general/square58.png')?>Mensajes programados</p>
		    	</div>	    	
	    	</div>
    	</div>
    	
<div <div id="repo_update"></div>

<div id='section_general'>
    	<fieldset>
			<div class="small-6 columns"><label id='lb_description'><?=img('application/img/general/map49.png')?>Nombre de la zona</label> </div>

			<div class="edit small-6 columns"><label id='zona_name' ></label><input type='text' name='zona_name_input_value' id='zona_name_input_value'></div> 
		</fieldset>
		<fieldset >

			<div class="small-6 columns"><label id='lb_description'><img src="<?=base_url('application/img/tipo_zonas/notes26.png')?>">Referencia o descripción de la zona</label>  </div>
			<div class="edit small-6 columns">
				<label id='zona_referencia'> </label><textarea rows="4" cols="50" name='zona_name_area_value' id='zona_name_area_value'></textarea></div> 
		</fieldset>
		<fieldset>
			<div class="small-6 columns"> <label id='lb_description'><img src="<?=base_url('application/img/tipo_zonas/black218.png')?>"> Mensaje por default</label> </div>
			<div class="edit small-6 columns"><label id='zona_defmsj' ></label><input type='text' name='zona_defmsj_input_value' id='zona_defmsj_input_value'></div> 
		</fieldset>
	
		
		<fieldset>
			<div class="small-12 columns"><label id='lb_description'>Tipo de zona a la que hace referencia</label> <input type='hidden' value='1' name='zona_tipozona_input_value' id='zona_tipozona_input_value'> </div>
			<br><br>
			<div class="edit small-12 columns"><div id="edit_tipozona"></div><label id='zona_tiporeferencia' > </label></div> 
		</fieldset>
		
		<fieldset>
			<label class='small-6 columns' id="lb_description"><?=img("application/img/general/bitcoin63.png")?>Qr de la zona</label>
			<div class='small-6 columns'>
				<div id="qr_zona_img"></div>
			</div>		
		</fieldset>

		<fieldset>
			<div class="small-6 columns"><label id='lb_description'><img src="<?=base_url('application/img/tipo_zonas/calendar48.png' )?>">Fecha en que se registró la zona</label>  </div>
			<div class="edit small-6 columns"><label id='zona_fecha' ></label></div> 
		</fieldset>

			<input type='hidden' id='zonaqredit' name='zonaqredit' value='<?=$zonaqredit?>'>
		</form>
		</fieldset>
		<div id='section_mensajes'>	
			<fieldset>
				<div class="small-12 columns"> 
					
				
					<div class="small-12 columns" id='list_mensajes'></div>	
				</div>	
			</fieldset>
	
		</div>

	</fieldset>



</div>



</div>
</div>

