<script type="text/javascript" src="<?=base_url('/application/js/home/principalhome.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.alert.js')?>"></script>
<script src="<?=base_url('application/js/foundation/foundation.joyride.js')?>"></script>
<script src="<?=base_url('application/js/vendor/jquery.cookie.js')?>"></script> <!-- Optional -->


<style type="text/css">
label{
	font-size: 1.8em;
}
.text_lb{
	font-size: 1.1em;
}
#main_lb{
	font-size: 2.3em;
}
</style>
<div class='row'>
	
		<div class='large-8 columns'>				
			<div class='large-4 columns'>				
				<label id='main_lb' > <?=img('application/img/general/finger.pg')?> Actividad</label>
			</div>
						
			<div class='large-8 columns'>				

				
				<div id="section_zonas">
					<div class='numero1' id='numero1'>
				 	<div class='row'>
				  		<label class='large-12 columns'><?=img('/application/img/general/map49.png')?>Zonas qr</label>
				  	</div> 	
				  	<br>
				  	<div class='row'>
				  		<div class="large-4 columns"></div>
				  		<div class="large-8 columns">
				  			<label class='text_lb large-6 columns'>Zonas registradas </label> <label class='text_lb large-6 columns' id="numerozonas"></label>
				  		</div>				  		
				  	</div>				  	
				</div>
				</div>
				<div id="section_camp" > 					 
					<div class='numero2' id='numero2'> 
					<div class='row'>
						<div class="large-4 columns"></div>
						<label class='large-12 columns'><?=img('/application/img/general/promoting.png')?> Campañas de marketing</label>						
					</div>
					<br>
					<div class='row'>
						<div class="large-4 columns"></div>
						<div class="large-8 columns">
							<label class='text_lb large-6 columns'>Campañas registradas </label> <label class='text_lb large-6 columns' id="numerocamp"></label>
						</div>						
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



<div class='row'>
       <ol class="joyride-list" data-joyride> 
        <li data-id="firstStop" data-text="Next" data-options="tip_location: top; prev_button: false">
         <p>Hello and welcome to the Joyride documentation page.</p> 
       </li> 
       <li data-id="numero1" data-class="custom so-awesome" data-text="Next" data-prev-text="Prev"> 
        <h4>Stop #1</h4> 
        <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p> 
      </li>
       <li data-id="numero2" data-button="Next" data-prev-text="Prev" data-options="tip_location:top;tip_animation:fade">
        <h4>Stop #2</h4> 
        <p>Get the details right by styling Joyride with a custom stylesheet!</p>
         </li> <li data-button="End" data-prev-text="Prev"> 
         <h4>Stop #3</h4> <p>It works as a modal too!</p>
        </li>
        </ol>
</div>