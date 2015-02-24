<script type="text/javascript" src="<?=base_url()?>application/js/backend/profesion.js"></script>
<input type="hidden"  class="now" id="now" value="<?=base_url()?>">

<div class="row">
	<div class="large-4 columns">

		<div class="row">			
			<button id="listnow" class="listnow" >&raquo;Mostrar actuales</button>	
		</div>

		<div class="row">			
			<button class="gopanel" id="gopanel">&raquo;Panel de administración</button>	
		</div>		
		<div class="row">
				<div class="large-8 columns">
					<div class="listadosection">
						
						<p class="listadoact" id="listadoact">Listado actual </p>						
						<div id="listado" class="listado"></div>
					</div>
					

				</div>

		</div>
	</div>

	<div class="large-8 columns" >
		<div class="large-12 columns" >
			<h2></h2>
		</div>
		<div class="large-4 columns" >
			<label>Profesión</label>
		</div>
		<div class="large-8 columns" >
			<input type="text" nombre="profesion" id="profesion" class="profesion" placeholder = "Arquitecto"required>	
		</div>
		<div class="large-4 columns" >
			<label>Descripción (opcional)</label>
		</div>

		<div class="large-8 columns" >
			 <textarea rows="4" cols="50" placeholder ="Capáz de definir la arquitectura de un inmueble" name="descripcion" id="descripcion" class="descripcion" > 				
			</textarea> 
			
		</div>		
		<div class="large-12 columns" >
			<button class="registro" id="registro">Registrar profesión</button>
		</div>	
	</div>
</div>