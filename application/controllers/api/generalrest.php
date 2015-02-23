<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class generalrest extends REST_Controller
{   

    function loadnumzonasbycount_GET(){

          $logged_in = $this->is_logged_in();
          if ($logged_in == 1) {

                $this->load->model("zonasmodel");                
                $cuenta = $this->session->userdata('cuenta');            
                $numerozonasbycuentaresponse = $this->zonasmodel->numerozonasbycuenta($cuenta);
                $this->response( $numerozonasbycuentaresponse );

        }else{        
            
              $this->logout();                
        }
    }


    function loadcampbycount_GET(){

          $logged_in = $this->is_logged_in();
          if ($logged_in == 1) {

                $this->load->model("cammodel");                
                $cuenta = $this->session->userdata('cuenta');            
                $numerocampbycuenta = $this->cammodel->loadnumcapbycuenta($cuenta);
                $this->response( $numerocampbycuenta);
                

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