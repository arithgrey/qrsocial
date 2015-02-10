<script type="text/javascript" src="<?=base_url('application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/campaña/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/campaña/edith.js')?>"></script>


<style type="text/css">	
	#reposteedicioncampzona{

		background: #1D385A;
		color: white;

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
	}#panel_section{

	  background: #8ED7F2;
	}
#c_r{
		color: rgba(7, 43, 96, 1);
	}#registro_tl{
		font-size: 2.7em;
		color: black;
	}
</style>

<div class="main_con"> 
<div class='row' >
<div class="row">
	<div class="large-12 columns" id="listacampañas"></div>
</div>


		<div class='row'>                  
            <div class='large-4 columns'>
                <div class='large-6 columns'>
                    <label>Zonas registradas</label>  
                </div>                          
                <div class='large-6 columns'>
                    <label id="numercampañas"></label>  
                </div>                                     
            </div>                                         
          </div>

          



	<div class='row'>
		<a><div class='reporegistro' id='reporegistro'></div></a>
	</div>	


<div class="row">	
	<fieldset>
	<form class='registra_campa' id='registra_campa' method='POST'>
	<div class='estadoregistro' id='estadoregistro'></div>	


		<div class='row'>
			<label id='registro_tl'>Registro</label>
		</div>
		
		<div class="descripcioncampaña large-12 columns" id='descripcioncampaña'>
			<label class='title_registro'><?=img('application/img/general/promoting.png')?> Nombre de la campaña</label>
			<input type="text" name="nombrecam" id="nombrecam" class="nombrecam" placeholder='El nombre de mi campaña' required>			
		</div>	

		<div class="large-5 columns"> 
			<label class='title_registro'><img src="<?=base_url('application/img/tipo_zonas/notes26.png')?>">Objetivo o notas de la campaña</label>
			 <textarea  rows="4" cols="50" name='descripcion' id='descripcion' class='descripcion'>
			 	Aquí la descripción de la campaña
			</textarea> 
		</div>
		<div class="large-7 columns">			
			<div class="redsocial large-12 columns" id='listtipos' >
			<input type='hidden' name='idregistrocamp' class='idcamp' id='idcamp'value='<?=$cuentaid;?>' >	
			<label class='title_registro'><?=img('application/img/general/green6.png')?>Agregar zonas a ésta campaña de Marketing</label>	
			<div id='zonasdisponibles'>			
			</div>

			</div>	
		
		</div>	
	</form>	
	<button class="registrarcamp" id="registrarcamp" >
		Registrar <?=img("application/img/png/glyphicons-207-ok-2.png")?>
	</button>
	</fieldset>
</div>

</div>
</div>






	




<div class="reveal-modal" id="dlg_del_cam" data-reveal>
	<h3 id='numero_camp_del'></h3>
	<p>Usted eliminará también los mensajes que se encuentren dentro de la campaña </p>
	<div class="camdelname" id='camdelname'></div>
	<h3 class='campname' id='campname'></h3>	
	<button class='eliminar_camp_def' >Eliminar <?=img('/application/img/png/glyphicons-198-remove.png')?></button>
	<button class='cancelar'>Cancelar <?=img('/application/img/png/glyphicons-200-ban.png')?>  </button>
	<a class="close-reveal-modal">&#215;</a>

	<form id="eliminacampform">
		<input type='hidden' name="campeditdel" id='campeditdel'>
	</form>
</div>	




	


<div class="reveal-modal" id="dlg_detalles_camp" data-reveal>
	
	<div id="seguirleyendotext"></div>
	<a class="close-reveal-modal">&#215;</a>
</div>




	 