<script type="text/javascript" src="<?=base_url('application/js/sha1.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/usuario/accessuser.js')?>"></script>

  <style type="text/css">

  #repoacces{
    background: #01A9DB;

  }
  </style> 
<div class="repo_registro" id="repo_registro"> 
  <?=$registro;?>
</div>
  


<div data-alert class="alert-box">
<div class="row">
	<a href="<?=base_url()?>">Home</a>      
  <div class="small-12 large-6 columns">
    <div class="row ">
      <div class="small-12 medium-6 large-6 columns">
         <img src="http://placehold.it/400x270&text=[img]"> 

      </div>
      <div class="small-12 medium-6 large-6 columns">
        <div class="row">
          <div class="small-6 medium-12 medium-centered columns">
            <img src="http://placehold.it/400x100&text=[text]">        
          </div>
          <div class="small-6 medium-12 medium-centered  columns">
            <img src="http://placehold.it/400x100&text=[text]">
          </div>   
        </div>
      </div>
    </div>
   </div>
    <div class="small-12 large-6 columns">
    	<div class="panel"> 
    	<h2 class="subheader">Acceso</h2>	
      <div class="row">

        <div class="small-12 columns">          
            <div class="row">
              <div class="small-12 medium-6 columns">
                <label>Mail</label>
                  <input type="email" class='emailaccess' id='emailaccess' name='emailaccess' placeholder="arithgrey@gmail.com"/>
                  <div class='repomail' id='repomail'></div>
              </div>

              <div class="small-12 medium-6 columns">
                <label>Password</label>

                  <input type="password" class='passwordaccess' id ='passwordaccess' name='passwordaccess' placeholder=""/>
                  <div  id='repopass'></div>
                  <span class="label">Olvidé contraseña</span>
              </div>
            </div>
            <button class='accessuser' id='accessuser'>Acceder</button>
          <div  class='repoacces' id='repoacces'></div>
        </div>
      </div>
    </div>
</div>
</div>

<div class='row'>
</div>
</div>






