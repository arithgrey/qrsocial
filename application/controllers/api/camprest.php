<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Camprest extends REST_Controller
{


    function editcamp_POST(){


        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

        $nameedicion = $this->input->post('nameedicion');
        $descripcionedit= $this->input->post('descripcionedit');        
        $this->response($nameedicion);

        }else{        
              /*Terminamos sessión*/  
              $this->logout();    

        }

    }


     function presentanombreidcamp_POST(){

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

            $name = $this->input->post('name');        
            $social = $this->input->post('social');
            $descripcion = $this->input->post('descripcion');
            

            $this->load->model('cammodel');    
            $dbresponse="";
            $idusuario= $this->session->userdata('idusuario');
            $dbresponse = $this->cammodel->registrocamp($name, $social , $descripcion, $idusuario);

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
            $idusuario= $this->session->userdata('idusuario');
            $databaseresponse = $this->cammodel->loadcamp($idusuario);
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