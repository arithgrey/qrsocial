<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Camprest extends REST_Controller
{

    function validaregistro_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $name = $this->input->post('name');        
            $social = $this->input->post('social');
            $descripcion = $this->input->post('descripcion');
            

            $this->load->model('cammodel');    
            $dbresponse="";
            $dbresponse = $this->cammodel->registrocamp($name, $social , $descripcion);

            if ($dbresponse == 1) {
                
                $this->response("Elemento ingresado correctamente");    
            }else{
                $this->response("Falla en el registro");    
            }
                

            }else{        
              /*Terminamos sessión*/  
              $this->logout();    
            

        }

    }

    

    function loadcampania_POST(){
        
        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $this->load->model("cammodel");
            $databaseresponse = $this->cammodel->loadcamp();
            $this->response($databaseresponse);


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