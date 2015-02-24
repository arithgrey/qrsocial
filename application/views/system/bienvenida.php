<script type="text/javascript" src="<?=base_url('/application/js/home/principalhome.js')?>"></script>

<style type="text/css">
label{
	font-size: 1.8em;
}
.text_lb{
	font-size: 1.1em;

	
}
#main_lb{
	font-size: 2.3em;
	color: white;
}
</style>
<div class='row'>

<div class='row'>
			<div class='alert-box'>								
				<label id='main_lb' > <?=img('application/img/general/verification5.png')?> Actividad</label>
			</div>
</div>	

		<div class='large-8 columns'>				
						
			<div class='large-12 columns'>				
				<div id="section_zonas">
				 	<div class='row'>
				 		<a href="<?=base_url('index.php/zonasqr/principal')?>">
				  			<label class='large-12 columns'><?=img('/application/img/general/map49.png')?>Zonas qr</label>
				  		</a>
				  	</div> 	
				  	<br>
				  	<div class='row'>
				  		<div class="large-2 columns"></div>
				  		<div class="large-10 columns">
				  			
				  			<label class='text_lb large-6 columns'>Zonas registradas </label> <label class='text_lb large-6 columns' id="numerozonas"></label>
				  			
				  		</div>				  		
				  	</div>				  	
				</div>
				<div id="section_camp" > 					 
					<div class='row'>
						<div class="large-4 columns"></div>
						<a href="<?=base_url('index.php/cuentas/accessacount')?>">
							<label class='large-12 columns'><?=img('/application/img/general/promoting.png')?> Campañas de marketing</label>						
						</a>
					</div>
					<br>
					<div class='row'>
						<div class="large-2 columns"></div>
						<div class="large-10 columns">
							<label class='text_lb large-6 columns'>Campañas registradas </label> <label class='text_lb large-6 columns' id="numerocamp"></label>
						</div>
						
					</div>					
				</div>
				<div class='row'>
					<a href="<?=base_url('index.php/principal/homeuser?firststeps=1')?>">
						
						<div id="primeros_pasos"><label class='large-12 columns'><?=img('/application/img/general/businessman46.png')?> Primeros pasos</label></div>						
					</a>
				</div>
			</div>	
		</div>

		<!--Mail sección -->
		<div class='large-4 columns'>
			
			<div data-magellan-expedition="fixed">
		  	<dl class="sub-nav"> <dd data-magellan-arrival="build">
		  		<a href="#build">Build with HTML</a>
		  	</dd> 
		  	<dd data-magellan-arrival="js">
		  		<a href="#js">Arrival 2</a></dd> 
		  	</dl> 
		  </div>

		    <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
		    	<a href="">Seguir leyendo ....</a></p>
		</div>
</div>


