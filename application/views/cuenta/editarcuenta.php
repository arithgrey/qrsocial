<script type="text/javascript" src="<?=base_url()?>application/js/cuenta/edit.js"></script>
<div class="row">
	
	<div class="small-8 columns">
			<div class="small-12 columns">	
		<label>Fecha de registro: <?=$fecharegistro?></label>
	</div>

	<div class="row collapse prefix-radius">
			<div class="small-4 columns">
			    <span class="prefix">Nombre de la cuenta </span>
			</div>
			<div class="small-8 columns">
			    <input type="text" name="nombre-edit" id="nombre-edit" class="nombre-edit" value="<?=$nombre?>">
			</div>
	</div>
	 <label class="small-4 columns">Descripción</label>
		    <div class="small-8 columns">
		    	<textarea rows="6" name="descripcion"  id="descripcion" class="descripcion">
					<?=$descripcion?>
				</textarea> 
				<input type="hidden" name="edit" class="cuentaedit" id="cuentaedit" value="<?=$cuentaedit?>">
		    </div>  

	<div class="small-4 columns">
		<label>Estatus de la cuenta</label>
	</div>	    
	<div class="small-8 columns">	
		<select name="estado-cuenta" class="estado-cuenta" id="estado-cuenta">
			<option value="1">Activa</option>			
			<option value="2">Deshabilitar</option>
			<option value="3">Eliminar</option>
		</select>
	</div>		    
	<div class="small-12 columns">
		<button  id ="actualizar" class="actualizar small-4 columns" >Actualizar</button>		
	</div>	      				 	
	<div class="small-12 columns">
		<button class="cancelar" id="cancelar" onclick="redirect('<?=base_url()?>/index.php/cuentas/lista')">Cancelar</button>
	</div>
	<div class="reporte small-12 columns" id="reporte" ></div>
	


	</div>
	
</div>	




