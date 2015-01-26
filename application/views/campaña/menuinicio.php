<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/campaña/edith.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/campaña/principal.js')?>"></script>

<style type="text/css">
	
	#registra_camp{

	}
	#reposteedicioncampzona{

		background: #1D385A;
		color: white;
	}	
	.reporegistro{
		color: white;
		font-size: 1.5em;
		background: rgba(11, 228, 228, 1);
		width: 35%;
	}	
	#cancelar_edit , #del_zonam{
		color: rgba(6, 77, 86, 1);
	}	

	#t_table{
		color: black;
		font-size: 1.4em;

	}
	#lab_describ_qr{
		color: black;
	}		
	#zona_name{
		color: white;
	}		
	 #registrarcampaña{
	 	background: white;
	 	color: black;
	 }
	#title_element_form{
		color: rgba(15, 105, 113, 1);
		font-size: 1.7em;
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
		background: none repeat scroll 0% 0% #00BFFF;
	}table thead h5{		
		color: white;				
	}
	table tbody{
		background: none repeat scroll 0% 0% rgba(224, 234, 237, 1);

	}#c_r{
		color: rgba(7, 43, 96, 1);
	}
</style>

<div class="main_con"> 
<div class='row' >

	<div class="row">
		<h1 id="c_r">Campañas registradas</h1>		

	<div class="large-12 columns" id="listacampañas"></div>
	<ul class="pagination"> <li class="arrow unavailable"><a href="">&laquo;</a></li> <li class="current"><a href="">1</a></li> <li><a href="">2</a></li> <li><a href="">3</a></li> <li><a href="">4</a></li> <li class="unavailable"><a href="">&hellip;</a></li> <li><a href="">12</a></li> <li><a href="">13</a></li> <li class="arrow"><a href="">&raquo;</a></li> </ul>

</div>

	<div class='row'>
		<a><div class='reporegistro' id='reporegistro'></div></a>
	</div>	






<fieldset>
<div class="row">
	
	<form class='registra_campa' id='registra_campa' method='POST'>
	<div class='estadoregistro' id='estadoregistro'></div>
	<div class="large-6 columns">
			<div class='row'>			
			</div>
		<div class='row'>
			<div class="redsocial large-12 columns" id='listtipos' >
			<input type='hidden' name='idregistrocamp' class='idcamp' id='idcamp'value='<?=$cuentaid;?>' >	
			<p id="title_element_form" class='title_element_form'>Campaña asignada a la zona qr(s)</p>
		
			<div id='zonasdisponibles'>			
			</div>

			</div>	
		</div>		
	</div>
	<div class="large-6 columns">
		<div class="descripcioncampaña large-12 columns" id='descripcioncampaña'>
			<p class='title_element_form' id="title_element_form">Nombre de la campaña</p>
			<input type="text" name="nombrecam" id="nombrecam" class="nombrecam" placeholder='El nombre de mi campaña' required>
			
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
</fieldset>





	

<div class="reveal-modal" id="dlg_new_menu" data-reveal>
		<div class="large-6 columns" id='edita_campaf'> 
				<form class='edita_campa' id='edita_campa'>																			
						
								<span class="label" id='lb_description'>Redacta un nuevo nombre:</span>
								<input type="text" name="nameedicion" id="nameedicion"/>							
								<span class="label" id='lb_description'>Redacta una nueva descripción: </span>
								<textarea rows="6" name='descripcioneditcamp' id="descripcioneditcamp">									
								</textarea>
								<span class="label" id='lb_description'>Campaña disponible<input type='checkbox' name='estadocamp' id='estadocamp' ></span>					
								<input type='hidden' name="campedit" id='campedit'>

								<p class="guardarcambios button [tiny small large large-12 columns]">Guardar cambios</p>
								
		</div>						
						<!--Eliminar , editar, demás detalles-->						
		<div class="large-6 columns">			
			<div id='reportecambios'></div>
			<div class="large-12 columns" >
				<p id='reposteedicioncampzona'></p>
			</div>
			<div class="large-6 columns">
				<a class='cancelar' id="cancelar_edit">Cancelar<?=img('/application/img/png/glyphicons-200-ban.png')?>  </a>
			</div>			
			<div class="large-6 columns">
				<a class='eliminarcamp' id="del_zonam">Eliminar<?=img('/application/img/png/glyphicons-198-remove.png')?></a>
			</div>			              	
			<div class="large-12 columns">
				<div id='listzonasedit' class='listzonasedit'></div>
			</div>	
		</div>              
				</form>		         
						         

						      

						
		<a class="close-reveal-modal">&#215;</a>	
	
</div>



<div class="reveal-modal" id="dlg_del_cam" data-reveal>
	<h3>Seguro desea eliminar la campaña</h3>
	<p>Usted eliminará también los mensajes que se encuentren dentro de la campaña </p>
	<div class="camdelname" id='camdelname'></div>
	<h3 class='campname' id='campname'></h3>	
	<button class='eliminar_camp_def' >Eliminar <?=img('/application/img/png/glyphicons-198-remove.png')?></button>
	<button class='cancelar'>Cancelar <?=img('/application/img/png/glyphicons-200-ban.png')?>  </button>
	<a class="close-reveal-modal">&#215;</a>
</div>	



	


<div class="reveal-modal" id="dlg_detalles_camp" data-reveal>
	
	<div id="seguirleyendotext"></div>
	<a class="close-reveal-modal">&#215;</a>
</div>
