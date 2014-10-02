<script type="text/javascript" src="<?=base_url('/application/js/campaña/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.js')?>"></script>

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
	<h3>Bienvenido al registro de campañas publicitarias</h3>
</div>
<div class="row">
	<div class='estadoregistro' id='estadoregistro'></div>
	<div class="large-3 columns">
			<label>Nombre de la campaña</label>
			<input type="text" name="nombrecampaña" id="nombrecampaña" class="nombrecampaña" required>
	</div>
	<div class="redsocial large-3 columns" id='listtipos' >
		<label>Red social</label>
		<select class='red' id='red'>
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
		
	
	<button class="registrarcampaña large-1 columns" id='registroalimento' >Registrar █▆▅▃▂
</button>
</div>

<div class='row'>
	<div class='reporegistro' id='reporegistro'></div>
</div>

<div class="row">
<table class="large-12 columns">
<caption><h3>Campañas registradas</h3></caption>
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
<p>

</p>


<div class='row'>

	<form class='edita_campa' id='edita_campa'>
		<label>
			Campaña
			<select name='campedit' class='campedit' id='campedit'></select>
		</label>
		

		<label>
			Nombre: 
			<input type='text' name='nameedicion' id='nameedicion' class='nameedicion'>
		</label>
		<label>
			Descripción
			<textarea name='descripcionedit' id='descripcionedit' class='descripcionedit'>Nueva descripción</textarea>
		</label>
		
		<p id='guardarcambios' class="guardarcambios button [tiny small large]">Default Button</p>

	</form>		
</div>




