<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mensajerest extends REST_Controller
{


    /*Listamos los mensajes posibles*/

     function listamsj_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $iduser= $this->session->userdata('idusuario');
            $this->load->model("modelmensaje");
            $responsedb= $this->modelmensaje->listbyusercamp($iduser , $camp); 
            $this->response($responsedb);

            

        }else{        
              /*Terminamos sessión*/  
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