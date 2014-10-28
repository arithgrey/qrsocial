<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url()?>application/js/cuenta/cuenta.js"></script>
<script type="text/javascript" src="<?=base_url()?>application/js/cuenta/edit.js"></script>
<style type="text/css">
	.editar_cancelar-p , .editar_cancela_p{
		background: none repeat scroll 0% 0% rgba(207, 69, 69, 1);
		color: white;
		padding: 3px;
		font-size: 1.2em;			
		border-radius: 3px;
	}
	#editar_cuenta_a{
		color: white;
		font-size: 1.2em;			
	}
</style>

<div>
	<div class="row">
		<div class="large-12 columns">
			<!--Lista de cuentas por usuario-->
			<dl class='sub-nav'> 
				<dd data-magellan-arrival='build'>Cuentas Freemium</dd> 
			</dl>
			
			   <div class="lista-cuentas" id="lista-cuentas"></div>							   
		</div>
</div>
</div>
		<!--
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
		        	 <textarea rows="4" name="descripcion-cuenta" id="descripcion-cuenta" class="descripcion-cuenta" >
						Descripción de tu cuenta
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
-->
 


<div class="reveal-modal" id="dlg_editar_cuenta" data-reveal>
	<form name='edit_form' class='edit_form' id='edit_form'>
<div class="row">	
	<h1>Panel de administración</h1>
 	<p class="lead">Edita los datos de tu cuenta</p>	
	<div class='large-6 columns'>
		<div class="row collapse prefix-radius">
				<div class="small-4 columns">
				    <span class="prefix">Renombrar cuenta </span>
				</div>
				<div class="small-8 columns">
				    <input type="text" name="nombre-edit" id="nombre-edit" class="nombre-edit" value="" placeholder='Nuevo nombre para la cuenta'>
				</div>
		</div>
		<!--Descripción -->		
			<label class="small-12 columns" id="editar_descripcion_label">
				<div data-alert class="alert-box">
					Descripción
				</div>
			</label>
		
		    <div class="small-12 columns">
		    	<textarea rows="6" name="descripcion-edit"  id="descripcion-edit" class="descripcion-edit">					
		    		Nueva descripción para mi cuenta
				</textarea> 				
		    </div>  		
		<!--Status de la cuenta-->		    
		<div class="small-12 columns">
			<div data-alert class="alert-box">Estatus de la cuenta</div>
		</div>	    
		<div class="small-12 columns">	
			<select name="estado-cuenta" class="estado-cuenta" id="estado-cuenta">
				<option value="1">Activa</option>			
				<option value="2">Deshabilitar</option>				
			</select>
		</div>
	</div>
		<!--Otras opción-->		
		<div class='large-6 columns'>	
			<div class='row'>
				<p class="editar_cancelar-p large-6 columns" >Cancela la edición </p>					
				<div class="switch large-6 columns">
				  <input id="cancelaredicion" type="checkbox">
				  <label for="cancelaredicion"></label>
				</div>
			</div>
			<input type='hidden' name='edit-cuenta' class='edit-cuenta' id='edit-cuenta'>

			<!--Boton para el registro-->
			<div class='row'>
				<div class="editar_cancela_p large-6 columns">
					Guardar Cambios				
				</div>				
				<div class="switch large-6 columns">
				  <input id="actualizar" type="checkbox">
				  <label for="actualizar"></label>
				</div>
			</div>	

		</div>	      		
		<div id="reporte-edicion"></div>
</div>
</form>
</div class="close-reveal-modal">&#215;</div>


