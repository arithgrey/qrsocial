<script src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuario/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('/application/js/foundation/foundation.reveal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuario/accessuser.js')?>"></script>


<style type="text/css">

#repoacces{
    background: #01A9DB;
  }

.ex{
	color: black;
}
#terminoscp_p, #acerca_p{
	color: white;
	font-size: 2em;
}
#acerca_p_a{
	

	font-size: 2.6em;	
	color: rgba(10, 130, 177, 1);
}
#regacountn{
	background: none repeat scroll 0% 0% rgba(19, 178, 221, 1);
	color: white;
}
#acerca_p{
	color: rgba(13, 79, 92, 1);
}
#home_q{
	color: white;
}
#redessociales{
	background: none repeat scroll 0% 0% #2DAEBF;	
	text-align: center;
	padding: 10px;

}
#title_redes{
	color: white;
	font-size: 2em;
}
#title_redes_sub{
	font-size: 1.3em;	
}
#title_descr{
	font-size: 1.3em;	
	color: white;
}
footer{
	background: black;
	padding: 10px;
	color: white;
}

</style> 



  

<div data-alert class="alert-box">


<div class="row">
	<a href="<?=base_url();?>">Home</a>      

  <div class="small-12 large-6 columns">

  	<button  id="regacountn">Registrarse <?=img("application/img/png/glyphicons-417-disk-saved.png")?></button>
  	<p><strong>La plataforma del ahora</strong> with a full-stack hosting for Git, Mercurial & Subversion repositories </p>
  	<h1 class='home_q' id='home_q'><a href="<?=base_url()?>" class='home_q' id='home_q' >QR social</a></h1>		 


   </div>
    <div class="small-12 large-6 columns">

    	<div class="panel"> 
    	<h2 class="subheader">Acceso</h2>	
      <div class="row">

        <div class="small-12 columns">          
            <div class="row">

           <form id='user_acces_form' method='POST'> 
              <div class="small-12 medium-6 columns">
                <label>Mail</label>              
                  <input type="email" class='emailaccess' id='emailaccess' name='emailaccess' placeholder="arithgrey@gmail.com" required/>
                  <div class='repomail' id='repomail'></div>
              </div>

              <div class="small-12 medium-6 columns">
                <label>Password </label>

                  <input type="password" class='passwordaccess' id ='passwordaccess' name='passwordaccess' placeholder="" required/>
                  <div  id='repopass'></div>
                  <span class="label">Olvidé contraseña</span>
              </div>
            </div>
            <button class='accessuser' id='accessuser'>Acceder</button>
            </form> 	
          <div  class='repoacces' id='repoacces'></div>
        </div>
      </div>
    </div>
</div>
</div>




</div>


<div class="row">
	<p id="acerca_p_a">Responsive design gets a whole lot faster for users.</p>
  		<div class="large-4 columns">
		<h2 id="acerca_p" >Acerca de QR SOCIAL</h2>	
			le permite a agencias y negocios pequeños o medianos gestionar su presencia en todas las redes sociales. 
			Puedes crecer tu público e interactuar con ellos, ejecutar múltiples campañas, trabajar en equipo y medir el 
			rendimiento de tus redes sociales. Incluso puedes ir agregando más herramientas de acuerdo a tus necesidades.
		</div>				
		<div class="large-8 columns">
			<h2 id="acerca_p" >Funciones principales</h2>				
			<p>le permite a agencias y negocios pequeños o medianos gestionar su presencia en todas las redes sociales. Puedes crecer tu público e interactuar con ellos, ejecutar múltiples campañas, trabajar en equipo y medir el rendimiento de tus redes sociales. Incluso puedes ir agregando más herramientas de acuerdo a tus necesidades.</p>
		</div>		
	</div>











<div class="reveal-modal" id="dlgnewreg" data-reveal>
 <a class="close-reveal-modal">&#215;</a>
<div class='row'>
		<!--Terminos y condiciones-->
		<div  class="large-5 columns panel" data-equalizer-watch>
			<h3>Terminos y condiciones</h3>
			<label>
				
				relleno de las imprentas y archivos de texto.
				 Lorem Ipsum ha sido el texto de relleno estándar de las industrias
				  desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería 
				  de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en
				   documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la
				 creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente 
			</label>
			<span data-tooltip aria-haspopup="true" class="has-tip" title=""><a class="seguir_leyendo" id="textoid">Seguir leyendo</a></span>

		</div>
	  <!-- Formulario -->
	  <div class="large-6 columns">    

			<div class='row'>
				<span class="label large-5 columns">Nombre de la cuenta</span>
				<input type="text" name="username" id="username" class="username large-7 columns" placeholder="Factor Evolución" required>
				
				<span class="label large-5 columns">Mail:<br>@</span>				
				<input type="email" id="usermail" name="usermail" class="usermail large-7 columns" placeholder="arithgrey@gmail.com" required>
							
				<span class="label large-5 columns" >Password:<br>******</span>				
				<input type="password" name="pwregistro" class="pwregistro large-7 columns" id="pwregistro" required>				
							
				<span class="label large-5 columns">Confirmar<br> Password: </span>							
				<input type="password" name="pwconfirm" id="pwconfirm" class="pwconfirm large-7 columns" required>				
			</div>																		
			<div class='row'>
				<div id='reporte_registro' class='reporte_registro'></div>
  				<a  class="button" id="registrousuario">Registrar <?=img("application/img/general/glyphicons-207-ok-2.png")?></a>  				
  			</div>
  			
  	</div>    
</div>
</div>


<div id="redessociales">
	<div class="row">
		
			<p id="title_redes">Conéctate con mas de 35 redes populares</p>
			<p id="title_redes_sub">No te preocupes si la competencia está levantando dinero e invirtiendo toneladas en marketing.
			 Muy raramente una startup muere debido a su competencia</p>
		
	</div>
		<div class="row">
		<div class="large-4 columns"><p id="title_descr"> Job Board </p> <p>Job Board from ZURB is focused on people who design web and mobile products. Listings are displayed across our properties 10 million times a month. You'll connect to our 500,000 monthly visitors in our network.</p></div>
		<div class="large-4 columns"><p id="title_descr"> Want More?</p> <p>Job Board from ZURB is focused on people who design web and mobile products. Listings are displayed across our properties 10 million times a month. You'll connect to our 500,000 monthly visitors in our network.</p></div>
		<div class="large-4 columns"><p id="title_descr"> Talk to us</p> <p>Job Board from ZURB is focused on people who design web and mobile products. Listings are displayed across our properties 10 million times a month. You'll connect to our 500,000 monthly visitors in our network.</p></div>


	</div>
</div>


































<div class="reveal-modal" id="dlgterminos_condiciones" data-reveal>
    	 <a class="close-reveal-modal">&#215;</a>

	<div class='panel'>
		<div data-alert class="alert-box">
  			<p id="terminoscp_p">Terminos y condiciones </p>  
		</div>
	
		<h4>Condición uno</h4>
		<div class="panel callout radius">
		Aquí las noticias, cambios y novedades que ha deparado esta semana 47, del 17 al 23 de Noviembre de 2014, ambos inclusive, en materia de términos y condiciones. Los boletines de anteriores semanas pueden encontrarse aquí.

		Novedades en: Amazon, Amazon Coins, Blizzard, CocaCola Iberia, Deezer, MadMami, Meetic, Nominalia, Opera, Runtastic, Ryanair, Snapchat, Sony Mobile, Spotify, Telegram, Vimeo y Youtube. En total 17 cambios.

		Los 5 cambios más destacados:

		Amazon Coins modificó sus Condiciones de Uso en relación a la fecha de caducidad de las monedas promocionales.
		Blizzard modificó el Contrato de licencia de World of Warcraft, que cumplió ayer 10 años.
		Meetic cambió la lengua de preferencia en caso de duda interpretativa legal, del francés al español.
		Snapchat modificó muy a fondo tanto sus Condiciones de Uso como Política de Privacidad.
		Youtube hizo algunos retoques en sus Normas de la Comunidad, abriendo la puerta ligeramente en materia de restricciones.
		Geolocalización y otros datos de las empresas según sus términos y condiciones, en el Mapa de Términos y Condiciones y Términos y Condiciones según su Edad.

		Vamos con el Boletín de Términos y Condiciones o BTC – 47-14:
	</div>

		<h4>Condición dos</h4>
			<div class="panel callout radius">
			Aquí las noticias, cambios y novedades que ha deparado esta semana 47, del 17 al 23 de Noviembre de 2014, ambos inclusive, en materia de términos y condiciones. Los boletines de anteriores semanas pueden encontrarse aquí.

			Novedades en: Amazon, Amazon Coins, Blizzard, CocaCola Iberia, Deezer, MadMami, Meetic, Nominalia, Opera, Runtastic, Ryanair, Snapchat, Sony Mobile, Spotify, Telegram, Vimeo y Youtube. En total 17 cambios.

			Los 5 cambios más destacados:

			Amazon Coins modificó sus Condiciones de Uso en relación a la fecha de caducidad de las monedas promocionales.
			Blizzard modificó el Contrato de licencia de World of Warcraft, que cumplió ayer 10 años.
			Meetic cambió la lengua de preferencia en caso de duda interpretativa legal, del francés al español.
			Snapchat modificó muy a fondo tanto sus Condiciones de Uso como Política de Privacidad.
			Youtube hizo algunos retoques en sus Normas de la Comunidad, abriendo la puerta ligeramente en materia de restricciones.
			Geolocalización y otros datos de las empresas según sus términos y condiciones, en el Mapa de Términos y Condiciones y Términos y Condiciones según su Edad.

			Vamos con el Boletín de Términos y Condiciones o BTC – 47-14:
			</div>





		<h4>Condición tres</h4>
		<div class="panel callout radius">
				relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente

		Aquí las noticias, cambios y novedades que ha deparado esta semana 47, del 17 al 23 de Noviembre de 2014, ambos inclusive, en materia de términos y condiciones. Los boletines de anteriores semanas pueden encontrarse aquí.

		Novedades en: Amazon, Amazon Coins, Blizzard, CocaCola Iberia, Deezer, MadMami, Meetic, Nominalia, Opera, Runtastic, Ryanair, Snapchat, Sony Mobile, Spotify, Telegram, Vimeo y Youtube. En total 17 cambios.

		Los 5 cambios más destacados:

		Amazon Coins modificó sus Condiciones de Uso en relación a la fecha de caducidad de las monedas promocionales.
		Blizzard modificó el Contrato de licencia de World of Warcraft, que cumplió ayer 10 años.
		Meetic cambió la lengua de preferencia en caso de duda interpretativa legal, del francés al español.
		Snapchat modificó muy a fondo tanto sus Condiciones de Uso como Política de Privacidad.
		Youtube hizo algunos retoques en sus Normas de la Comunidad, abriendo la puerta ligeramente en materia de restricciones.
		Geolocalización y otros datos de las empresas según sus términos y condiciones, en el Mapa de Términos y Condiciones y Términos y Condiciones según su Edad.

		Vamos con el Boletín de Términos y Condiciones o BTC – 47-14:

		<label>Entiendo las condiciones <input type="radio"></label>
		</div>
	</div>
    
</div>  