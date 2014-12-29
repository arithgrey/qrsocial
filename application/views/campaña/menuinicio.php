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
		font-size: 1.3em;
	}
	.title-editar{
		color: white;
	}
	#guardarcambios , #eliminarcamp , #cancelar{
		background: white;
		color: black;
		font-size: 1.5em;
	}
	#campanianame{
		font-size: 1.3em;
	}
	#lb_description{
		font-size: 1.2em;
	}
	#registrarcamp{
		
		background: white;
		border-radius: 2px;
		color: black;

	}#panel_section{

	  background: #8ED7F2;
	}
	table thead{
		background: none repeat scroll 0% 0% rgba(48, 161, 255, 1);
	}table thead h5{		
		color: white;				
	}
	table tbody{
		background: #DAE5E9;
	}#c_r{
		color: white;
	}
</style>

<div class="alert-box"> 
<div class='row' >

	<div class="row">
		<h1 id="c_r">Campañas registradas</h1>
		<ul class="pagination"> <li class="arrow unavailable"><a href="">&laquo;</a></li> <li class="current"><a href="">1</a></li> <li><a href="">2</a></li> <li><a href="">3</a></li> <li><a href="">4</a></li> <li class="unavailable"><a href="">&hellip;</a></li> <li><a href="">12</a></li> <li><a href="">13</a></li> <li class="arrow"><a href="">&raquo;</a></li> </ul>

	<div class="large-12 columns" id="listacampañas"></div>


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
			<p id="title_element_form" class='title_element_form'>Evento</p>
			
			<select name ='evento' class='evento' id='evento'>
				<option value="Publica en facebook">Publicar en Facebook</option>
				<option value="Publica en twitter">Publicar en Twitter</option>
				<option value="Call to action Facebook">Call to action Facebook</option>
				<option value="Call to action Twitter">Call to action Twitter</option>
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
	<button class="registrarcamp" id="registrarcamp" >
		Registrar <?=img("application/img/png/glyphicons-207-ok-2.png")?>
	</button>
</div>
</div>


</div>


</div>





	

<div class="reveal-modal" id="dlg_new_menu" data-reveal>
	<div class='row'>
		<center>					
			<h3>Editanto la <small><p id="campanianame"></p></small></h3>
		</center>														
				<form class='edita_campa' id='edita_campa'>																			
						<div class="large-10 columns">							
								<span class="label" id='lb_description'>Redacta un nuevo nombre:</span>
								<input type="text" name="nameedicion" id="nameedicion"/>							
								<span class="label" id='lb_description'>Redacta una nueva descripción: </span>
								<textarea rows="6" name='descripcioneditcamp' id="descripcioneditcamp">
									
								</textarea>
								<input type='hidden' name="campedit" id='campedit'>
						</form>				
						<p class="guardarcambios button [tiny small large large-12 columns]">Guardar cambios</p>										
						</div>							
						<!--Eliminar , editar, demás detalles-->						
							    <div class='large-2 columns'>
						         <div id='panel_section'>
						           <nav class="center-off-canvas-menu"> 
						            <ul class="off-canvas-list">
						              <li><a class='cancelar' id="cancelar_edit">Cancelar</a></li>
						              <li><a class='eliminarcamp' id="del_zonam">Eliminar campaña</a></li>
						              </ul>
						            </nav>       
						          </div>

						      </div>        

						</div>	


						
	</div>						
				
				
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
	<a class="close-reveal-modal">&#215;</a>
</div>	



	


<div class="reveal-modal" id="dlg_detalles_camp" data-reveal>
	<div id="seguirleyendotext"></div>
	<a class="close-reveal-modal">&#215;</a>
</div>
