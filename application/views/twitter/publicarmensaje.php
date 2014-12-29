<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
window.twttr = (function (d, s, id) {
  var t, js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id; js.src= "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
}(document, "script", "twitter-wjs"));
</script>

<!--
<script type="text/javascript">

window.location = "<?=$redirect_url;?>"

</script>
//-->

<style type="text/css">
#twitter_fondo{
	background: rgb(3, 144, 255);
	color: white;
	font-size: 1.3em;
}
.epublicacion{
	color: white;
}#contentmain{
	background: white;
}
#data_msj{
	background: none repeat scroll 0% 0% rgba(36, 218, 240, 1);
}
#title_tw{
	color: white;
}
</style>
<div id="twitter_fondo">
	
	<a class="twitter-timeline"
	  href="https://twitter.com/arithgrey"
	  data-widget-id="YOUR-WIDGET-ID-HERE">
	  <h1 id='title_tw'>Bienvenido a QR SOCIAL</h1>
	  <iframe
					  src="//platform.twitter.com/widgets/follow_button.html?screen_name=arithgrey"
					  style="width: 300px; height: 20px;"
					  allowtransparency="true"
					  frameborder="0"
					  scrolling="no">
	</iframe>
	</a>


	

		<div class='row'>
			<h2 class='epublicacion'>Estado de su publicación</h2>	
			<?=$estatuspublicacion;?>
		</div>
</div>

<div id='contentmain' class='row'>	
		<div class='large-5 columns'>
			<a class="twitter-timeline"  href="https://twitter.com/enidservice" data-widget-id="546407010464706560">Tweets por el @enidservice.</a>
		</div>
		<div class='large-7 columns'>			
			<div id='data_msj'>
				<table id='data_msj'>
					<tr>
						<td>#</td>
						<td>Descripción</td>
						<td>Estatus</td>
						<td>Hora Inicio</td>
						<td>Hora Termino</td>
						<td>Fecha Inicio</td>
						<td>Fecha Termino</td>
					</tr>
					<tr>
						<td><?=$mensaje;?></td>
						<td><?=$descripcion;?></td>
						<td>
							<?php 
								if ($status == 2) {
									echo "Mensaje disponible";
								}else{
									echo "Mensaje no disponible";
								}
							?>
						</td>
						<td><?=$horainicio;?></td>
						<td><?=$horatermino;?></td>
						<td><?=$fechainicio;?></td>
						<td><?=$fechatermino;?></td>
					</tr>
				</table>
				
					
				

			</div>

		</div>
</div>



    	
    	





    	
