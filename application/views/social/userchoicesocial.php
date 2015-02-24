<?= doctype('html5')?>

	<meta name="author" content="Jonathan Govinda Medrano Salazar arithgrey@gmail.com" />
	<!--CSS-->
	<?=link_tag('application/css/foundation.min.css');?>
	<?=link_tag('application/css/normalize.css');?>
	<?=link_tag('application/css/foundation.css');?>
	
	<?=link_tag('application/css/main.css');?>

	<script type="text/javascript" src="<?=base_url()?>application/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>application/js/foundation.min.js"></script>	
	<script type="text/javascript" src="<?=base_url()?>application/js/general.js"></script>	
	<script src="<?=base_url()?>application/js/vendor/jquery.js"></script>
	<script src="<?=base_url()?>application/js/foundation/foundation.js"></script>
	<script src="<?=base_url()?>application/js/foundation/foundation.equalizer.js"></script>
	<script src="<?=base_url()?>application/js/vendor/modernizr.js"></script>
	<script src="<?=base_url('application/js/vendor/jquery.js')?>"></script>
	<script src="<?=base_url('application/js/foundation/foundation.js')?>"></script>


<script type="text/javascript" src='<?=base_url('application/js/facebook/usereleccion.js')?>'></script>
	<script>
    $(document).foundation();
  </script>
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

					


		

<div class="row"> 
		
			<button class='publica_fb large-12 columns' id='public_fb'><img src="<?=base_url('application/img/general/facebook29.png')?>"><label>Comparte en Facebook</label></button>		
		
	
		
			<button class='publica_tw large-12 columns' id="publica_tw">
				<img src="<?=base_url('application/img/general/twitter35.png');?>" >
				
				<label>Comparte en Twitter</label>
			</button>

</div>
		<div class="row">
			<div data-alert class="alert-box secondary">
				<label id='mensaje_title'>
					<?=img('application/img/general/black218.png')?>Mensaje:
				</label>
				<label id="text_mensaje" > 
					<?=$mensaje;?>
				</label>
			</div>
		</div>
	


<form id='social_mensaje' class='social_mensaje'>
	<input type='hidden' name='mensaje' value='<?=$mensaje;?>' id='mensaje'>
	<input type="hidden" name="now" class="now" id="now" value="<?=base_url();?>">
	<input type="hidden" name="zona" id="zona" value="<?=$zona;?>">	
</form>
