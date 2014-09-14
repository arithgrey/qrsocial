<script type="text/javascript" src="<?=base_url()?>application/js/cuenta/cuenta.js"></script>
<div>
	<div class="row">
		<div class="large-6 columns">
		</div>
		<div class="large-6 columns">								
			<div class="form-registro" id="form-registro">
				<div class="row collapse prefix-radius">
			        <div class="small-4 columns">
			          <span class="prefix">Nombre de la cuenta </span>
			        </div>
			        <div class="small-8 columns">
			          <input type="text" name="nombre-cuenta" id="nombre-cuenta" class="nombre-cuenta" placeholder="Tec de Monterrey ">
			        </div>
		        </div>
		        <div class="small-4 columns">
		        	<label>Descripción de la cuenta</label>
		        </div>
		        <div class="small-8 columns">
		        	 <textarea rows="6" name="descripcion-cuenta" id="descripcion-cuenta" class="descripcion-cuenta">
			
					</textarea> 
		        </div>    				    
				<div class="select-tipos-cuenta" id="select-tipos-cuenta"></div>					

				<button id='registrar-cuenta' class='registrar-cuenta large-5 columns' >Registrar</button>							
				<div class="">
					<div class="reporte large-7 columns" id="reporte"></div>
				</div>

			</div>	

		</div>

	</div>

</div>

 
	
    