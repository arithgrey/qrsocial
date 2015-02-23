<script type="text/javascript" src='<?=base_url('application/js/facebook/usereleccion.js')?>'></script>
<style type="text/css">
.publica_tw{
	background: rgba(59, 215, 227, 1);
}
.publica_fb{
	background: rgba(21, 21, 95, 1);
}
#mensaje_title{
	font-size: 1.2em;
	color: black;
}
#text_mensaje{
	color: black;
}
label{
	font-size: 1.8em;
	color: white;
}
</style>

					

<div class='row'>	

	<div class='row'>
		<div class='large-12 columns'>
			<button class='publica_fb large-12 columns' id='public_fb'><img src="<?=base_url('application/img/general/facebook29.png')?>"><label>Comparte en Facebook</label></button>		
		</div>
	</div>


	<div class='row'>
		<div class='large-12 columns'>
			<button class='publica_tw large-12 columns' id="publica_tw">
				<img src="<?=base_url('application/img/general/twitter35.png');?>" >
				
				<label>Comparte en Twitter</label>
			</button>

		</div>
	</div>

<div  class='row'>	
	
		<fieldset>
			<label id='mensaje_title'><?=img('application/img/general/black218.png')?>Mensaje:</label><label id="text_mensaje" > <?=$mensaje;?></label>
		</fieldset>
	</p>
</div>	
</div>


<form id='social_mensaje' class='social_mensaje'>
	<input type='hidden' name='mensaje' value='<?=$mensaje;?>' id='mensaje'>
</form>