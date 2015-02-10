<script type="text/javascript" src="<?=base_url('application/js/campaña/editcomplete.js')?>"></script>
<style type="text/css">
#camp_name_input, #camp_descripcion_input, #zonas_section{
	display: none;
}
</style>

<div class='row'>
<form id='form_update_camp'>
	
	<fieldset>
		<div class='row'>
		<p id='general_s' class='large-6 columns detalle_campaña alert-box'><?=img('application/img/general/configure.png')?>Campaña  #<?=$campid;?></p>
		<p id='zonas_s' class='large-6 columns detalle_campaña alert-box'><?=img('application/img/general/green6.png')?>Zonas agregadas</p>
		</div>
<div id='general_section'>
		<input type='hidden' value="<?=$campid;?>" name="campid" id="campid">
		<div id='repo_update' ></div>
		<fieldset>			
			<div class="small-6 columns"><label id='lb_description'><?=img('application/img/general/promoting.png')?> Nombre de la campaña</label> </div>
			<div class="edit small-6 columns"><label  id='camp_name_lb' ></label>
				<input type='text' name='camp_name_input' id='camp_name_input'>
			</div> 
		</fieldset>

		<fieldset>
			<div class="small-6 columns"><label id='lb_description'><img src="<?=base_url('application/img/tipo_zonas/notes26.png')?>">Objetivo de la campaña</label> </div>
			<div class="edit small-6 columns"><label id='camp_descripcion_lb' ></label>
				
				<textarea name='camp_descripcion_input' id='camp_descripcion_input' rows="4" cols="50" ></textarea>
			</div> 

		</fieldset>

		<fieldset>
			<div class="small-6 columns"><label id='lb_description' class='cam_disponible'></label> </div>
			<div class="edit small-6 columns"><label id='img_status'></label></div> 
			<input type='hidden' name='status' id='status'>
		</fieldset>


		<fieldset>
			<div class="small-6 columns"><label id='lb_description'><img src="<?=base_url('application/img/tipo_zonas/calendar48.png' )?>">Fecha en que se registró  lacampaña</label> </div>
			<div class="edit small-6 columns"><label  id='camp_registro_lb' ></label></div> 
		</fieldset>


		



	</fieldset>
	
	</div>
	<div id="zonas_section">
		<div class='row'>
		<fieldset>			
				<label id='lb_description'>Zonas qr que han sido asignadas a ésta campaña</label>
				<div id="zonasdisponibles"></div>
				<div id="reporte_zonas_campaña"></div>
		</fieldset>
		</div>
	</div>		

	</form>
</div>

