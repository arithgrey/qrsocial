<script type="text/javascript" src="<?=base_url('application/js/zonas/edit.js')?>"></script>

<style type="text/css">

.detalle_zona{
	color: #0F6971;
	font-size: 1.7em;
}
#lb_description{
	color: #0F6971;
	font-size: 1.1em;	
}
</style>
<div class='row'>
	<input type='hidden' id='zonaqredit' name='zonaqredit' value='<?=$zonaqredit?>'>
</div>


<div class='row'>
<div class="row medium-uncollapse large-collapse"> 
    <fieldset>
    	<p class='detalle_zona'>Zona</p>
    	<fieldset>
			<div class="small-6 columns"><label id='lb_description'>Nombre de la zona</label> </div>
			<div class="small-6 columns" id="zona_name"><input type="hidden" name='zona_name' id='zona_name' ></div> 
		</fieldset>
		<fieldset>
			<div class="small-6 columns"><label id='lb_description'>Referencia o descripción de la zona</label>  </div>
			<div class="small-6 columns" id="zona_referencia"><input type="hidden" name='zona_referencia' id='zona_referencia' ></div> 
		</fieldset>
		<fieldset>
			<div class="small-6 columns"><label id='lb_description'>Fecha en que se registró la zona</label>  </div>
			<div class="small-6 columns" id="zona_fecha"><input type="hidden" name='zona_fecha' id='zona_fecha' ></div> 
		</fieldset>

		<fieldset>
			<div class="small-6 columns"><label id='lb_description'>Tipo de zona a la que hace referencia</label>  </div>
			<div class="small-6 columns" id="zona_tiporeferencia"><input type="hidden" name='zona_tiporeferencia' id='zona_tiporeferencia' ></div> 
		</fieldset>
		
		<fieldset>
			<div class="small-6 columns"> <label id='lb_description'>Mensaje que pararecerá por default en esta zona</label> </div>
			<div class="small-6 columns" id="zona_defmsj"><input type="hidden" name='zona_defmsj' id='zona_defmsj' ></div> 
		</fieldset>

	</fieldset>

</div>
</div>

