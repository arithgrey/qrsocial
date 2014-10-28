<script type="text/javascript" src="<?=base_url('application/js/zonas/home.js')?>"></script>
<style type="text/css">
.menu_section{
  color: white;
}
#p_bienvenida{
  font-size: 1.7em;
}
#p_opcionesdisponibles{
  font-size: 1.3em;
}
#title_registro_menu{
  color: white;
}
#nuevo_img{

  border-radius: 15px;
  width: 31%;
}
#registro_p , #editar_p , #ayuda_p{
  
}
#zonaname_label{
  font-size: 1.3em;
  color: white;
}
</style>

<div class="row">
  
  <!--Sección principal-->  
  <div id='seccion_principal'>
    <div class="small-12 large-8 large-push-4 columns">
    <img src="http://placehold.it/600x300&text=[img]">
    </div>
  </div>


  <!--Nuevo menú -->  
  <div id='seccion_nuevo'>
      
  
        <div class='large-12'>
        
        <div class="large-8 large-push-4 columns">            

        <div class="row">
              
              
              
              
              <dl class="sub-nav">    

              <dd class="active" id='panelcontrol_menu'>
                <a href="<?=base_url('index.php/panelcontrol/control')?>">Registar zona QR</a>
              </dd> 
              <dd id="home_menu">
                <a href="<?=base_url()?>">Editar mis zonas</a>
              </dd> 
              <dd id='zonasqr_menu'>
                <a href="<?=base_url('index.php/zonasqr/principal')?>">Eliminar</a>
              </dd> 
              <dd id='campanias_menu'>
                <a href="<?=base_url('index.php/cuentas/accessacount')?>">Ayuda</a>
              </dd> 
            </dl>

        </div>  


        <div data-alert class="alert-box">                   
          <div id="section_establecido">            

            <h2 id="title_registro_menu">Registro</h2>          
                  <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Nombre de la zona qr">
                    Zona qr 
                  </span>
                  <input type="text" name="zona_name" id="zona_name" placeholder="El nombre del la zona">
                
                    <span id="zonaname_label" data-tooltip aria-haspopup="true" class="has-tip" title="Describe tu zona qr social">
                      Descripción
                    </span>  
                    <textarea  name='descripcion_zona'>
                      Datos de la zona
                    </textarea>
            
                    <div class="switch">
                    <input id="exampleCheckboxSwitch" type="checkbox">
                    <label for="exampleCheckboxSwitch"></label>
                  </div>         
         </div>         
        </div>

        </div>
      </div>

  </div>




<!--Menu-->
  <div class="small-12 large-4 large-pull-8 columns">
    <div class="row">
      <div class="medium-4 large-12 columns" onclick="section('e_destacadas')";>        
        <div data-alert class="alert-box" >          
          <h3 class='menu_section'>Destacadas</h3>    
        </div>
      </div>
      <div class="large-12 columns" onclick="section('e_nuevo' )"; >
        
        
          <div data-alert class="alert-box info radius">          
            <h3 class='menu_section'>Nueva</h3>          
          </div>
        

      </div>      
      <div class="medium-4 large-12 columns " onclick="section('e_informes' )";>
          <div class="panel callout radius">
            <h3 class='menu_section'>Datos</h3>

          </div>
      </div>

    </div>
  </div>
</div>
