<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/campaña/edith.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/campaña/principal.js')?>"></script>


<div class='row'>
	<div class="large-8 columns">
		<dl class="sub-nav">	 
		 <dd>
		 	<a href="#">Zonas QR</a>
		 </dd>
		 <dd class="active">
		 	<a href="#">Campañas</a>
		 </dd> 
		 <dd>
		 	<a href="#">Mensajes</a>
		 </dd> 
		<dd>
			<a href="#">Historicos</a>
		</dd> 
		 </dl>
	</div>
</div>



<!--Campañas-->
<div class="panel">
<div class='row'>
<div class='Campañas'>
<div class="row">
	<form class='registra_campa' id='registra_campa' method='POST'>
	<h3>Bienvenido al registro de campañas publicitarias</h3>
</div>
<div class="row">
	<div class='estadoregistro' id='estadoregistro'></div>
	<div class="large-3 columns">
			<label>Nombre de la campaña</label>
			<input type="text" name="nombrecam" id="nombrecam" class="nombrecam" required>
	</div>
	<div class="redsocial large-3 columns" id='listtipos' >
		<label>Red social</label>
		<select name ='red' class='red' id='red'>
			<option value="facebook">Facebook</option>
			<option value="twitter">Twitter</option>
		</select>

	</div>
	
	<div class="descripcioncampaña large-5 columns" id='descripcioncampaña'>
		<label>Descripción de la campaña</label>
		 <textarea  name='descripcion' id='descripcion' class='descripcion'>
At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
</textarea> 
	</div>	
		
</form>	
	<button class="registrarcampaña large-1 columns" id='registrarcampaña' >Registrar 
	</button>

</div>

<div class='row'>
	<a><div class='reporegistro' id='reporegistro'></div></a>
</div>

<div class="panel" id="panel_menu">
	<div class="row">
		<h1>Campañas registradas</h1>
		


<div class="row">
<table class="large-12 columns">

<thead>
	<tr>
		<th><span class="label"><h5>ID</h5></span></th>
		<th><span class="label"><h5>Campaña</h5></span></th>
		<th><span class="label"><h5>Descripción</h5></span></th>		
		<th><span class="label"><h5>Fecha de registro</h5></span></th>
		<th><span class="label"><h5>Red social</h5></span></th>

	</tr>
</thead>
<tbody id="listacampañas" class='listacampañas'>
</tbody>
</table>
</div>
</div>
<ul class="pagination"> <li class="arrow unavailable"><a href="">&laquo;</a></li> <li class="current"><a href="">1</a></li> <li><a href="">2</a></li> <li><a href="">3</a></li> <li><a href="">4</a></li> <li class="unavailable"><a href="">&hellip;</a></li> <li><a href="">12</a></li> <li><a href="">13</a></li> <li class="arrow"><a href="">&raquo;</a></li> </ul>
</div>
</div>
</div>

	</div>
	
	<div class="reveal-modal" id="dlg_new_menu" data-reveal>
		<center>
			<h2>Editar campaña</h2>
		</center>
		

		<div class='row'>

	
	<form class='edita_campa' id='edita_campa'>
		<div class='row'>
			<div class='large-6 columns'>
				<label class="large-6 columns">
					Campaña			
				</label>
				<select name='campedit' class='campedit large-6 columns' id='campedit' required></select>								
			
			</div>
			<div class='large-6 columns'>
				<label class="large-6 columns">
					Nuevo nombre:
				</label>
				<input type="text" name="nameedicion" id="nameedicion" class="large-6 columns"/>
				<label class='large-12 columns'>Descripción</label>
				<textarea name='descripcionedit' id='descripcionedit' class='descripcionedit large-12 columns'>Nueva descripción</textarea>
			</div>
		</div>

		<p id='guardarcambios' class="guardarcambios button [tiny small large]">Guardar cambios</p>	
	</form>		
		<p id='eliminarcamp' class="eliminarcamp button [tiny small large]">Eliminar campaña</p>
		<p id='cancelar' class="cancelar button [tiny small large]">Cancelar edición</p>
</div>			
		<a class="close-reveal-modal">&#215;</a>
	</div>
</div>


<div class="reveal-modal" id="dlg_del_cam" data-reveal>
	<h3>Seguro desea eliminar la campaña</h3>
	<div class="camdelname" id='camdelname'></div>
	<h3 class='campname' id='campname'></h3>	
	<button class='eliminar_camp_def' >Eliminar</button>
	<button class='cancelar'>Cancelar</button>
</div>	

