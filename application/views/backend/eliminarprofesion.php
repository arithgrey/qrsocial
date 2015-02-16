<script type="text/javascript" src="<?=base_url()?>application/js/backend/profesion.js"></script>
<div class="row">
	<button onclick="redirect('<?=base_url()?>index.php/backend/profesion')">&raquo;Cancelar</button>	
	<button onclick="redirect('<?=base_url()?>index.php/backend')">&raquo;Panel de administración</button>	
	<input type="hidden" name="outelement" class="outelement" id="outelement" value="<?=$outelement?>" >
	<input type="hidden" name="now" class="now" id="now" value="<?=base_url()?>" >
	<button class="delete-profesion"> &raquo; &raquo;Eliminar la profesión <?=$element?> </button>
</div>
