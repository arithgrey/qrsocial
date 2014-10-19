<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/campaña/edith.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/campaña/principal.js')?>"></script>
<style type="text/css">
	
	 #registrarcampaña{
	 	background: white;
	 	color: black;
	 }
	#title_element_form{
		color: white;
	}
	.title-editar{
		color: white;
	}
	#guardarcambios , #eliminarcamp , #cancelar{
		background: white;
		color: black;
		font-size: 1.5em;
	}
</style>

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


<div class='row'>
<div class="panel" id="panel_menu">
	<div class="row">
		<h1>Campañas registradas</h1>
		<ul class="pagination"> <li class="arrow unavailable"><a href="">&laquo;</a></li> <li class="current"><a href="">1</a></li> <li><a href="">2</a></li> <li><a href="">3</a></li> <li><a href="">4</a></li> <li class="unavailable"><a href="">&hellip;</a></li> <li><a href="">12</a></li> <li><a href="">13</a></li> <li class="arrow"><a href="">&raquo;</a></li> </ul>

<table class="large-12 columns">
<thead >
	<tr>
		<th><h5>ID</h5></th>
		<th><h5>Campaña</h5></th>
		<th><h5>Descripción</h5></th>		
		<th><h5>Fecha de registro</h5></th>
		<th><h5>Red social</h5></th>

	</tr>
</thead>
<tbody id="listacampañas" class='listacampañas'>
</tbody>
</table>

</div>

	<div class='row'>
		<a><div class='reporegistro' id='reporegistro'></div></a>
	</div>	
<div data-alert class="alert-box">

	<div class="row">
	<form class='registra_campa' id='registra_campa' method='POST'>
	<div class='estadoregistro' id='estadoregistro'></div>
	<div class="large-6 columns">

			<div class='row'>
			<div class="large-12 columns">
				<p class='title_element_form' id="title_element_form">Nombre de la campaña</p>
				<input type="text" name="nombrecam" id="nombrecam" class="nombrecam" placeholder='El nombre de mi campaña' required>
			</div>
		</div>
		<div class='row'>
			<div class="redsocial large-12 columns" id='listtipos' >
			<input type='hidden' name='idregistrocamp' class='idcamp' id='idcamp'value='<?=$cuentaid;?>' >	
			<p id="title_element_form" class='title_element_form'>Red social</p>
			<select name ='red' class='red' id='red'>
				<option value="facebook">Facebook</option>
				<option value="twitter">Twitter</option>
			</select>

			</div>	
		</div>		
	</div>
	<div class="large-6 columns">
		<div class="descripcioncampaña large-12 columns" id='descripcioncampaña'>
			<p class='title_element_form' id="title_element_form">Descripción de la campaña</p>
			 <textarea  rows="4" cols="50" name='descripcion' id='descripcion' class='descripcion'>
			 	Aquí la descripción de la campaña
			</textarea> 
		</div>	

	</div>		
	</form>	
	<button class="registrarcampaña" id='registrarcampaña' >
		Registrar 
	</button>
</div>
</div>
</div>

</div>








	
<div class="reveal-modal" id="dlg_new_menu" data-reveal>
	<div data-alert class="alert-box">
	<div class='row'>
		<center>
			<h2 class="title-editar">Editar campaña</h2>
		</center>					
		
				<div class='large-6 columns'>						
						<div class='row'>
							<p id='eliminarcamp' class="eliminarcamp button [tiny small large]">Eliminar campaña</p>
						</div>
						<div class='row'>
							<p id='cancelar' class="cancelar button [tiny small large]">Cancelar edición</p>
						</div>											
				</div>
				<div class='large-6 columns'>
		<form class='edita_campa' id='edita_campa'>						
					<p class="large-6 columns">
						Elige la campaña a editar o eliminar
					</p>
					<select name='campedit' class='campedit large-6 columns' id='campedit' required></select>								
					<p class="large-6 columns">
						Redacta un nuevo nombre:
					</p>
					<input type="text" name="nameedicion" id="nameedicion" class="large-6 columns"/>
					<p class='large-12 columns'>Redacta una nueva descripción</p>
					<textarea rows="4"  name='descripcionedit' id='descripcionedit' class='descripcionedit large-12 columns'>Nueva descripción</textarea>
					<p id='guardarcambios' class="guardarcambios button [tiny small large]">Guardar cambios</p>	
				</div>		
			
		</form>		
	</div>			
	</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	</div>
</div>


<div class="reveal-modal" id="dlg_del_cam" data-reveal>
	<h3>Seguro desea eliminar la campaña</h3>
	<div class="camdelname" id='camdelname'></div>
	<h3 class='campname' id='campname'></h3>	
	<button class='eliminar_camp_def' >Eliminar</button>
	<button class='cancelar'>Cancelar</button>
	<a class="close-reveal-modal">&#215;</a>
</div>	






	
