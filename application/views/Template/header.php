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

	
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css"/>
	<!--JS-->
	
	<script type="text/javascript" src="<?=base_url()?>application/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.min.js"/></script>
	<script type="text/javascript" src="<?=base_url()?>application/js/foundation.min.js"></script>
	
	<script type="text/javascript" src="<?=base_url()?>application/js/general.js"></script>	
	<script src="<?=base_url()?>application/js/vendor/jquery.js"></script>
	<script src="<?=base_url()?>application/js/foundation/foundation.js"></script>
	<script src="<?=base_url()?>application/js/foundation/foundation.equalizer.js"></script>
	<script src="<?=base_url()?>application/js/vendor/modernizr.js"></script>
	<script src="<?=base_url('application/js/vendor/jquery.js')?>"></script>
	<script src="<?=base_url('application/js/foundation/foundation.js')?>"></script>

	<script>
    $(document).foundation();
  </script>
<style type="text/css">
  	.title_general{
  		font-size: 1.3em;

  	}
  	#titlemain{
  		background: rgba(13, 72, 99, 1);
  		color:  white;
  		font-size: 1.5em;
  	}
  	#mensaje_camp{
  		display: none;
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


</head>
<body>
	<header>

		<nav>
			
			<a href="<?=base_url()?>"><h1><?=$titulo?> <?=img("/application/img/png/glyphicons-21-home.png")?> </h1></a>
		</nav>
	</header>
	<div id='wrapper' class='wrapper'>
		<div class='content' id='content'>
			<input type="hidden" name="now" class="now" id="now" value="<?=base_url();?>">


