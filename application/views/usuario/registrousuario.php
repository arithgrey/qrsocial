<script src="<?=base_url()?>application/js/sha1.js"></script>
<script type="text/javascript" src="<?=base_url()?>application/js/usuario/principal.js"></script>
<style type="text/css">
.ex{
	color: black;
}
</style>
<div class='row'> 
	<div class='large-10 columns'>
	</div>
	<div class='large-2 columns'>
		<a href="<?=base_url('index.php/usuario/usuarioaccess')?>" class="button disabled">Acceder</a>
	</div>
	
</div>	
	

<div class='row'>
<div class="large-12 columns">

	<div id="mainAlert1" data-alert class="alert-box" tabindex="0" aria-live="assertive" role="dialogalert">
	
	<div class="row" data-equalizer>
			<!--Terminos y condiciones-->

			<div  class="large-5 columns panel" data-equalizer-watch>
				<h3>Terminos y condiciones</h3>
				<label>
Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente </label>
			<span data-tooltip aria-haspopup="true" class="has-tip" title="">Seguir leyendo</span>
			</div>

			<!---->

	  <div class="large-6 columns">    
			<div class='row'>
				<div class='large-2 columns'><span class="label">Usuario:<br>username</span></div>
				<div class='large-9 columns'><input type="text" name="username" id="username" class="username" placeholder="arithgrey" required></div>
				<div class='reponusername small-1 columns' id='reponusername'></div>				
			</div>	
			
			<div class='row'>
				<div class='small-2 columns'><span class="label">Mail:<br>@</span></div>				
				<div class='small-9 columns'><input type="email" name id="usermail" class="usermail" placeholder="arithgrey@gmail.com" required></div>
				<div class='repousermail small-1 columns' id='repousermail' ></div>
			</div>
			
			<div class='row'>
				<div class='large-2 columns'><span class="label" >Password:<br>******</span></div>
				<div class='small-9 columns'><input type="password" name="pwregistro" class="pwregistro" id="pwregistro" required></div>
				<div class='repopwregistro small-1 columns' id='repopwregistro' ></div>
			</div>
			
			<div class='row'>
				<div class='small-2 columns'><span class="label">Confirmar<br> Password: </span></div>
				<div class='small-9 columns'><input type="password" name="pwconfirm" id="pwconfirm" class="pwconfirm" required></div>
				<div class="reportepw small-1 columns" id="reportepw"></div>
			</div>			
						

			<button class='registrousuario' id='registrousuario'>Registrar usuario</button>
			<div class='reporteregistro' id='reporteregistro'></div>
  	</div>    
	</div>
</div>	
</div>


