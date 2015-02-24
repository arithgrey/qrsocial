<script type="text/javascript" src="<?=base_url()?>application/js/backend/ciudad.js"></script>
<input type="hidden"  class="now" id="now" value="<?=base_url()?>">

<div class="row">
	<div class="large-4 columns" >
		<h3>Registradas en el sistema </h3>
		<br>
		<div class="responsedel" id="responsedel"></div><br>
		<div class="listciudades" id="listciudades"></div>
	</div>
	<div class="large-8 columns" >
		<div class="large-12 columns" >
			<h2></h2>


		</div>
		<div class="large-4 columns" >
			<label>Nombre de la ciudad</label>
		</div>
		<div class="large-8 columns" >
			<input type="text" nombre="nombreciudad" id="nombreciudad" class="nombreciudad" placeholder = "Ejemplo México"required>	
		</div>
		<div class="large-4 columns" >
			<label>Descripción (opcional)</label>
		</div>

		<div class="large-8 columns" >
			 <textarea rows="4" cols="50" name="descripcion" id="descripcion" class="descripcion">
				
			</textarea> 
			<div class="reporteregistro" id="reporteregistro"></div>
		</div>
		
		<div class="large-12 columns" >
			<button class="registro" id="registro">Registrar ciudad</button>
		</div>
		
	</div>
</div>