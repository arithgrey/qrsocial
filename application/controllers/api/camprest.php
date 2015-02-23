<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Camprest extends REST_Controller
{


    function loadcampbycount_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

                    
                $idusuario = $this->session->userdata('idusuario');            
                $cuenta = $this->session->userdata('cuenta');            
                
                $this->load->model('cammodel');    
                $responsedb = $this->cammodel->loadcampania($idusuario , $cuenta); 
                $this->response($responsedb);
                


        }else{        
              
              $this->logout();    

        }


        
    }

    function getnamecampbyid_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $id= $this->input->get("idcamp");        
            $this->load->model('cammodel');    
            $idusuario= $this->session->userdata('idusuario');
            $namecamo = $this->cammodel->getnamebyid($id, $idusuario);            
            $this->response($namecamo);

        }else{        
              
              $this->logout();    

        }

    }






    function getdatacampbyid_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $id= $this->input->get("idcamp");        
            $this->load->model('cammodel');    
            $idusuario= $this->session->userdata('idusuario');
            $namecamo = $this->cammodel->getdatacampbyid($id, $idusuario);            
            $this->response($namecamo);

        }else{        
              
              $this->logout();    

        }

    }







    function getstatusnamecampbyid_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $id= $this->input->get("idcamp");        
            $this->load->model('cammodel');    
            $idusuario= $this->session->userdata('idusuario');
            $namecamo = $this->cammodel->getstatusnamecampbyid($id, $idusuario);            
            $this->response($namecamo);

        }else{        
              
              $this->logout();    

        }

    }

    /*Describe campaña*/


    function getdescriptioncampbyid_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $id= $this->input->get("idcamp");        
            $this->load->model('cammodel');    
            $idusuario= $this->session->userdata('idusuario');
            $descripcion = $this->cammodel->getndescriptionbyid($id, $idusuario);            
            $this->response($descripcion);

        }else{        
              
              $this->logout();    

        }

    }



    /* Editar campaña */

    function editadatacamp_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $this->load->model('cammodel');    

            $id = $this->input->post("campid");
            $nombre =  $this->input->post("camp_name_input");
            $descripcion = $this->input->post("camp_descripcion_input");
            $status = $this->input->post("status"); 

            $respose = $this->cammodel->editcamp($id , $nombre, $descripcion , $status);
            $this->response($respose );

        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
              $this->response("");
        }


    }

     function presentanombreidcamp_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $this->load->model('cammodel');    
            $idusuario= $this->session->userdata('idusuario');
            $dataresponse = $this->cammodel->loadcampabanameid($idusuario);
            $this->response($dataresponse);

        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
              $this->response("");

        }

     }   



    function validaregistro_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $name = $this->input->post('nombrecam');        
            $evento = $this->input->post('evento');
            $descripcion = $this->input->post('descripcion');
            
                $idusuario = $this->session->userdata('idusuario');
                $cuenta= $this->session->userdata('cuenta');

                $dbresponse ="";

                $this->load->model("cammodel");            
                $dbresponse = $this->cammodel->registrocamp($name , $descripcion, $evento , $idusuario , $cuenta);

                
                

                if ($dbresponse == "ok"){
                    
                    $this->response($this->cammodel->loadlastcampania($idusuario , $cuenta));        

                }else if ($dbresponse ==  3) {

                    $this->response("En el sistema ya existe una campaña con ese nombre, intente con otro");

                }else{
                    $this->response("Falla en el registro de la campaña");
                     
                }
                
             
            

            }else{        
              /*Terminamos sessión*/  
              $this->response("");    
              $this->logout();            
        }

    }

    


    function eliminacamp_POST(){

        $logged_in = $this->is_logged_in();
        

        if ($logged_in == 1) {

            $this->load->model('cammodel');    
            $idcamp = $this->input->post('campeditdel');

            $idusuario= $this->session->userdata('idusuario');
            $responsedb = $this->cammodel->deletecamobyid($idcamp , $idusuario);

            $dataresponse ="";

            if ($responsedb != "1") {
                $dataresponse ="Falla el eliminar la campaña intente nuevamente";    
            }else{
                $dataresponse ="Elemento eliminado correctamente.! ";                
            }

            $this->response($dataresponse);

        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
              $this->response("");

        }

     }   

     function setregistrozonacam_POST(){

        $logged_in = $this->is_logged_in();        

        if ($logged_in == 1) {

            $this->load->model("cammodel");

            $idzona = $this->input->post("idzona");
            $idcamp = $this->input->post("campedit");
    
            $is = $this->cammodel->ischeckcampzona($idzona , $idcamp );            

            //$this->response("is: ". $is . "idzona " .   $idzona . "idcamp". $idcamp );
            
            if ($is > 0) {

                $update = $this->cammodel->removecampzona( $idzona , $idcamp );                
                if ($update == true){
                        $this->response("Zona desactivada");        
                }else{
                        $this->response("Error al desactivar la zona");        
                }    
                
            }else{
                
                    $update = $this->cammodel->registrocampzona($idzona , $idcamp );

                    if ($update  ==  true) {

                        $this->response("Zona activada");          
                    }else{
                        $this->response("Error al activar la zona");        
                    }
                    
            }

            

        }else{
              $this->logout();    
        }

 



     }


     function registrozonacamp_GET(){


        $logged_in = $this->is_logged_in();        

        if ($logged_in == 1) {

            $this->load->model("cammodel");

            $idzona = $this->input->get("zona");
            $idcamp = $this->input->get("camp");
    
            $databaseresponse = $this->cammodel->registrocampzona($idzona , $idcamp );            
            $this->response($databaseresponse);
            

        }else{
              $this->logout();    
        }

 
     }

    function loadlascampania_GET(){
        
        $logged_in = $this->is_logged_in();        
        $idcuentaactual= $this->session->userdata('cuenta');

        if ($logged_in == 1) {

            $this->load->model("cammodel");
            $idusuario= $this->session->userdata('idusuario');

            $databaseresponse = $this->cammodel->loadlastcampania($idusuario , $idcuentaactual);
            $this->response( $databaseresponse);

        }else{
              $this->logout();    
        }



    }

     

    function loadcampania_GET(){
        
        $logged_in = $this->is_logged_in();        
        $idcuentaactual= $this->session->userdata('cuenta');

        if ($logged_in == 1) {

            $this->load->model("cammodel");
            $idusuario= $this->session->userdata('idusuario');

            
            $databaseresponse = $this->cammodel->loadcampania($idusuario , $idcuentaactual);
            $this->response( $databaseresponse);

        }else{
              $this->logout();    
        }



    }

    private function is_logged_in() {
    
        $is_logged_in = $this->session->userdata('logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in != true) {
            
            return false;
        }
        return true;
    }   

    function logout(){
    
        $this->session->sess_destroy();
        redirect(base_url());
    }



}