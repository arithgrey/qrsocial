<script src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/backend/panelcontrol.js')?>" ></script>
<style type="text/css">
#title{
	background:  #56C5F4;
	font-size: 1.3em;
}
#principal_menu{
	border-radius: 5px;
	background: #DFBCCD;
	padding: 0px;
}
#frecuentes a {
	font-size: .8em;
}
#frecuentes_p{
	font-size: 1.4em;	
}
</style>

<div class='row'>
	<ul class="pricing-table large-2 columns" id="principal_menu">	
	<li class='title' id='title'>Configuración</li>
	<div class='menu' onclick="despliegamenu( 'cuenta');"><li class='bullet-item'><a><h5  class='subheader' >Cuenta <small>administración </small></h5></a></li></div>	
	<div class='menu' onclick="despliegamenu( 'password');"><li class='bullet-item'><a><h5  class='subheader' >Contraseña <small>actualizar datos </small></h5></a></li></div>	
	<div class='menu' onclick="despliegamenu( 'usuarios');"><li class='bullet-item'><a><h5  class='subheader' >Usuarios <small> que pertenecen a la cuenta </small></h5></a></li></div>	
	<div class='menu' onclick="despliegamenu('pagos');" ><li class='bullet-item' ><a ><h5  class='subheader'>Pagos <small> consigue más  </small></h5></a></li></div>
	<div class='menu' onclick="despliegamenu('ayuda');" ><li class='bullet-item' ><a ><h5  class='subheader' id='"+ayuda+"'>Ayuda <small>preguntas frecuentes </small></h5></a></li></div>
	</ul>

	<!-- Administración de cuentas -->
	<div class='large-10 columns' id='cuentas_configuracion'>
	<div class='panel'>
			<h2 class="subheader" >Datos generales <small>de tu cuenta <?=$username?></small></h2>
			<div class='row'>
				<div class='large-7 columns'>
					
					<form name='form_compani' id="form_compani">
					<div class="large-12 columns">
							<span data-tooltip class="has-tip" title="Renombra tu cuenta"><h5 id="extras"class="show-for-large-only">Nombre</h5></span>
							<input type='text' name='nombre' id="nombre_cuenta" placeholder='<?=$username?>' value='<?=$username?>'/>

							<span data-tooltip class="has-tip" title="Compañia"><h5 id="extras"class="show-for-large-only">Compañia</h5></span>
							<input type='text' name='company' id="company_cuenta" placeholder='compañia'/>
							
							<span data-tooltip class="has-tip" title="Asigna un nuevo email"><h5 id="extras"class="show-for-large-only">Correo electrónico</h5></span>
							<input type='email' name='email' id="email_cuenta" placeholder='arithgrey@gmail.com' value=''/>	

							<span data-tooltip class="has-tip" title="Asigna un nuevo email"><h5 id="extras"class="show-for-large-only">Número telefónico</h5></span>
							<input type='text' name='numerotelefonico' id="numerotelefonico_cuenta" placeholder='5534551924' />							
							<span data-tooltip class="has-tip" title="Url de la empresa">
								<h5 id="extras"class="show-for-large-only">Url</h5>
							</span>
							<input type='url' name='url' id="urlcompañia_cuenta" class='' placeholder='https://qrsocial/settings/profile'/>									
					</div>								
					</form>
					<p id="repoupdate"></p>
					<button id="btn_freshcount">Actualizar</button>
				</div>
				<div class='large-5 columns'>										
				</div>			
			</div>
	</div>	
	</div>	


	<!--Contraseña-->
	<div class='contra_config large-10 columns' id="contra_config">
		<div class='panel'>
			<h2 class="subheader" >Cambiar <small>tu contraseña </small></h2>
			<div class='row'>
				<div class='large-7 columns'>					
					<div class="large-12 columns">														
							<form name="form_pw" id="form_pw">

								<span data-tooltip class="has-tip" title="Antigua contraseña"><h5 class="show-for-large-only">Antigua contraseña</h5></span>
								<input type='password' name='oldpassword' id="oldpassword" />	
								<span data-tooltip class="has-tip" title="Nueva contraseña"><h5 class="show-for-large-only">Nueva contraseña</h5></span>
								<input type='password' name='newpassword' id="newpassword"/>	
							
								<span data-tooltip class="has-tip" title="confirmar contraseña">
									<h5 class="show-for-large-only">Conformas nueva contraseña</h5>
								</span>							
							<input type='password' name='passwordconfirm' id='passwordconfirm'/>												
							<p id="reporte_change"></p>
							</form>
					</div>								
					<button id="btn_changepw">Actualizar</button>
				</div>
				<div class='large-5 columns'>					
				</div>		
			</div>
	</div>
	</div>


	<!--usuarios-->
	<div class='usuarios_config large-10 columns' id='usuarios_config'>		
		<div class='panel'>
			<h2 class="subheader" >Usuarios que pertenecen <small>a la cuenta actualmente</small></h2>
			
		</div>
	</div>	
	

	<!--Pagos-->
	<div class='ayuda_config large-10 columns' id='ayuda_config'>		
			<div class='large-10 columns'>
				<h2 class="subheader" >Preguntas frecuentes <small>del sistema QR social</small></h2>
				<div class="row">
					<p>¿Qué es el sistema QR social?</p>
					<div class='panel'> 
						Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo). 
					</div>
					<p>¿Cómo puedo adquirir más servicios?</p>
					<div class="panel callout radius">
						A panel is a simple, helpful Foundation component that enables you to outline sections of your page easily. This allows you to view your page sections as you add content to them, or add emphasis to a section. The width is controlled by the grid columns you put them inside. 
					</div>

				</div>
			</div>

			<div class='large-2 columns'>									
					<div id="frecuentes">
						<p class='row' id='frecuentes_p'>Frecuentes</p>						
						<a>Primeros pasos en qrsocial</a>
						<a>Tipos de cuentas</a>
						<a>Administración de usuarios</a>					
					</div>	
			</div>
		
	</div>	
	<!-- Planes disponibles -->

<div class='planesdisponibles large-10 columns' id='planesdisponibles'>		
<div class='row'>	
<div class='large-12 columns'>	
		<div class='row'>			
			
			<ul class="large-3 columns pricing-table"> 
				<li class="title">Standard</li> 
				<li class="price">$0.00</li>
				<li class="description">An awesome description</li> 
				<li class="bullet-item">1 Database</li> 
				<li class="bullet-item">5GB Storage</li>
				<li class="bullet-item">20 Users</li> 
				<li class="cta-button">
				<a class="button" href="#">Buy Now</a></li>
			</ul>

			<ul class="large-3 columns pricing-table"> 
				<li class="title">Standard</li> 
				<li class="price">$99.99</li>
				<li class="description">An awesome description</li> 
				<li class="bullet-item">1 Database</li> 
				<li class="bullet-item">5GB Storage</li>
				<li class="bullet-item">20 Users</li> 
				<li class="cta-button">
				<a class="button" href="#">Buy Now</a></li>
			</ul>
			<ul class="large-3 columns pricing-table"> 
				<li class="title">Standard</li> 
				<li class="price">$99.99</li>
				<li class="description">An awesome description</li> 
				<li class="bullet-item">1 Database</li> 
				<li class="bullet-item">5GB Storage</li>
				<li class="bullet-item">20 Users</li> 
				<li class="cta-button">
				<a class="button" href="#">Buy Now</a></li>
			</ul>

			<ul class="large-3 columns pricing-table"> 
				<li class="title">Standard</li> 
				<li class="price">$99.99</li>
				<li class="description">An awesome description</li> 
				<li class="bullet-item">1 Database</li> 
				<li class="bullet-item">5GB Storage</li>
				<li class="bullet-item">20 Users</li> 
				<li class="cta-button">
				<a class="button" href="#">Buy Now</a></li>
			</ul>
		</div>
	</div>
</div>

	<!--Termina -->
</div>
<div>
</div>
</div>


<div class='row'>
	<div class='panel'>
		<h1>Info</h1>
		<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
	</div>
</div>
