<?= doctype('html5')?>
<head>
<title><?=$titulo?></title>	
	<!--TAGS-->	
	<!--Desarrollador Jonathan Govinda Medrano Salazar-->
	<!--Para más información: arithgrey@gmail.com desarrollador backend y fronend del sistema qrnegocios-->
	<?php
		$meta = array(
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'description', 'content' => 'Social I'),
	        array('name' => 'keywords', 'content' => 'social media, business intelligence, emprendimiento'),
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	    );	    
	?>
	<?=meta($meta);?>
	<meta name="author" content="Jonathan Govinda Medrano Salazar arithgrey@gmail.com" />
	<!--CSS-->
	<?=link_tag('application/css/foundation.min.css');?>
	<?=link_tag('application/css/normalize.css');?>
	<?=link_tag('application/css/foundation.css');?>
	
	<?=link_tag('application/css/main.css');?>

	
	
	<!--JS-->	
	<script type="text/javascript" src="<?=base_url('application/js/jquery-2.1.1.min.js')?>"></script>
	
	<script type="text/javascript" src="<?=base_url('application/js/foundation.min.js')?>"></script>	
	<script type="text/javascript" src="<?=base_url('application/js/general.js')?>"></script>	
	<script src="<?=base_url('application/js/vendor/jquery.js')?>"></script>
	<script src="<?=base_url('application/js/foundation/foundation.js')?>"></script>
	<script src="<?=base_url('application/js/foundation/foundation.equalizer.js')?>"></script>
	<script src="<?=base_url('application/js/vendor/jquery.js')?>"></script>
	<script src="<?=base_url('application/js/foundation/foundation.js')?>"></script>
	
	<script>
    	$(document).foundation();
  	</script>
  	<style type="text/css">
  	.lb_text_descrip{
  		font-size: 1.1em;
  		color: white;
  	}
  	.title_general{
  		font-size: 1.3em;

  	}
  	#titlemain{
  		background: rgba(13, 72, 99, 1);
  		color:  white;
  		font-size: 1.2em;
  		text-align: right;
  	}
  	#mensaje_camp{
  		display: none;
  	}
  	#redessociales{
	background: none repeat scroll 0% 0% #073039;	
	text-align: center;
	padding: 10px;

}
#title_redes{
	color: white;
	font-size: 2em;
}
#title_redes_sub{
	font-size: 1.3em;	
	color: white;
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
#home{
	color: rgba(13, 76, 96, 1);
	font-size: 1.4em;	
}

header{
	padding: 10px;	
}

</style>

</head>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1420146534940866',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<body>
	<header>

		<div class="row">	

					<div class='large-3 columns'>
						<h1 class='home large-12 columns' id='home'>
							<a id="home" href="<?=$homesess;?>"> <?=img("/application/img/png/glyphicons-21-home.png")?> QR social </a>
						</h1>					
					</div>

					<div class='large-9 columns'>
						<dl class="sub-nav"> 				
								<dd id="home_menu">
									<a href="<?=base_url()?>">Home <?//=img("application/img/png/glyphicons-21-home.png")?> </a>
								</dd> 
								<div class='firstStop' id='firstStop'>
									<dd id='zonasqr_menu'>
										<a href="<?=base_url('index.php/zonasqr/principal')?>">Zonas QR  <?//=img("application/img/png/glyphicons-317-tree-conifer.png")?></a>
									</dd> 
									
							          <h1 class='steps'> </h1>  
        						</div>
        						
									<dd id='campanias_menu'>
										<a href="<?=base_url('index.php/cuentas/accessacount')?>">Campañas de marketing<?//=img("application/img/png/glyphicons-188-more.png")?></a>
									</dd>
									<h1 class='steps'> </h1>  
							          
						        

						        
									<dd id='mensaje_camp'>
										<a href="<?=base_url('index.php/cuentas/accessacount')?>">Mensajes</a>
									</dd>
									
						          
        						


								<dd class="" id='panelcontrol_menu'>
									<a href="<?=base_url('index.php/panelcontrol/control')?>">Panel de control <?//=img("application/img/png/glyphicons-137-cogwheel.png")?> </a>
								</dd> 	

								
									<dd>
										<div class='End' id='End'>       
										<a href="<?=base_url('index.php/principal/logout')?>">Salir <?=img('application/img/png/glyphicons-388-log-out.png')?></a>																	
										</div>
									</dd>
								
						</dl>
					</div>

				

		</div>										
		<div class='row'>
				<div class='large-4 columns' >
				</div>	
				<div class='large-4 columns' >
				</div>	
				<div class='large-4 columns' >
					<p id="titlemain" ><?=$titulo?></p>
					
				</div>

		</div>
		
		
	</header>



	<div id='wrapper' class='wrapper'>
		<div class='content' id='content'>
			<input type="hidden" name="now" class="now" id="now" value="<?=base_url();?>">

