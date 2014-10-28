<script src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuario/principal.js')?>"></script>

<style type="text/css">

.ex{
	color: black;
}
</style>
<div class='row'> 
	<div class='large-10 columns'>
	</div>
	<div class='large-2 columns'>
		<a href="<?=base_url('index.php/usuario/usuarioaccess')?>" class="button">Acceder</a>

	</div>	
</div>	


<div class='row'>
		<!--Terminos y condiciones-->
		<div  class="large-5 columns panel" data-equalizer-watch>
			<h3>Terminos y condiciones</h3>
			<label>
				Lorem Ipsum es simplemente el texto de 
				relleno de las imprentas y archivos de texto.
				 Lorem Ipsum ha sido el texto de relleno estándar de las industrias
				  desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería 
				  de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en
				   documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la
				 creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente 
			</label>
			<span data-tooltip aria-haspopup="true" class="has-tip" title="">Seguir leyendo</span>
		</div>
	  <!-- Formulario -->
	  <div class="large-6 columns">    
			<div class='row'>
				<span class="label large-5 columns">Nombre de la cuenta</span>
				<input type="text" name="username" id="username" class="username large-7 columns" placeholder="Factor Evolución" required>
				
				<span class="label large-5 columns">Mail:<br>@</span>				
				<input type="email" id="usermail" name="usermail" class="usermail large-7 columns" placeholder="arithgrey@gmail.com" required>
							
				<span class="label large-5 columns" >Password:<br>******</span>				
				<input type="password" name="pwregistro" class="pwregistro large-7 columns" id="pwregistro" required>				
							
				<span class="label large-5 columns">Confirmar<br> Password: </span>							
				<input type="password" name="pwconfirm" id="pwconfirm" class="pwconfirm large-7 columns" required>				
			</div>																		
			<div class='row'>
				<div id='reporte_registro' class='reporte_registro'></div>
  				<a  class="button" id="registrousuario">Registrar</a>  				
  			</div>
  	</div>    
</div>



