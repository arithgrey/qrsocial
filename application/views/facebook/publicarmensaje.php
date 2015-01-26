<script type="text/javascript" src="<?=base_url('/application/js/facebook/main.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/home/main.js')?>"></script>

<script src="<?=base_url('application/js/foundation/foundation.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.orbit.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>



<style type="text/css">
.username{
	font-size: 1.2em;
	
}
#title_orbit{
	font-size: 1.1em;
	text-align: center;
	color: rgba(136, 149, 148, 1);
}
#qrsocialhome_tw{
	background: rgba(51, 207, 233, 1);
}
</style>

<div class='row'>
	<p class='username'>Qué tal <?=$nombredelusuariofb?> te agradecemos tu participación y te invitamos a realizar alguna de las siguientes acciones</p>	

	<div class='row'>
		<!--Acciones para la red social -->

		<div class="large-4 columns">	
			<div class="large-12 columns">
				<button class='urlusuariofb' id='<?=$urlusuariofb?>'><?=img('application/img/png/glyphicons-50-star.png')?> Ingresar a tú muro de Facebook</button>		
			</div>
			<div class="large-12 columns">
				<button  id="qrsocialhome"><?=img('application/img/png/glyphicons-344-thumbs-up.png')?> Siguenos en nuestra red social de Facebook </button>
			</div>
			<div class="large-12 columns">
				<button  id="qrsocialhome"><?=img('application/img/png/glyphicons-46-calendar.png')?> Enterate de los eventos qrsocial</button>
			</div>
			<div class="large-12 columns">
				<button  id="qrsocialhome_tw"><?=img('application/img/png/glyphicons-207-ok-2.png')?>Siguenos en nuestra red social de Twitter</button>
			</div>
		</div>		
		<!--Más -->
		<div class="large-8 columns">			
				<div class='row'>
					<p id='title_orbit'>Orbit is an easy, powerful, responsive image slider that allows users to swipe on touch-enabled devices.</p>
				</div>

				<div class='large-12 columns'>
						<ul class="example-orbit-content" data-orbit>
								 <li data-orbit-slide="headline-1" > 
								 	<div> 
								 		<h2>Headline 1</h2> 
								 		<h3>Subheadline</h3> 
								 	</div> 
								 </li> 
								 <li data-orbit-slide="headline-2"> 
								 	<div>
								 		 <h2>Headline 2</h2>
								 		 <h3>Subheadline</h3>
								 	 </div> 
								 </li>
								 	<li data-orbit-slide="headline-3">
									 	 <div> 
									 	 	<h2>Headline 3</h2>
									 	 	 <h3>Subheadline</h3>
									 	 </div>
								 	</li>
						</ul>

				</div>
		</div>



	</div>
	
</div>





<script type="text/javascript">
	$(document).foundation();
</script>