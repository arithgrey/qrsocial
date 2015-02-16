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
}
</style>

					


<div class='row'>	
<div class='large-4 columns'>
	<div class='row'>
		<div class='large-12 columns'>
			<button class='publica_fb large-12 columns' id='public_fb'><img src="<?=base_url('application/img/png/glyphicons-207-ok-2.png')?>"> Comparte en Facebook </button>		
		</div>
	</div>


	<div class='row'>
		<div class='large-12 columns'>
			<button class='publica_tw large-12 columns' id="publica_tw">
				<img src="<?=base_url('application/img/png/glyphicons-207-ok-2.png');?>" >
				Comparte en Twitter
			</button>

		</div>
	</div>
</div>
<div  class='large-8 columns'>	
	<p><img src="<?=base_url('application/img/png/glyphicons-356-bullhorn.png')?>"> Para compartir el mensaje elija su red social <br>
		<fieldset>
			<label id='mensaje_title'>Mensaje:</label><label> <?=$mensaje;?></label>
		</fieldset>
	</p>
</div>	
</div>


<form id='social_mensaje' class='social_mensaje'>
	<input type='hidden' name='mensaje' value='<?=$mensaje;?>' id='mensaje'>
</form>