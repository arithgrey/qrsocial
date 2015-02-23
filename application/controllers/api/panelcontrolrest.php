<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Panelcontrolrest extends REST_Controller
{


    function validachange_POST(){
        
        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {
                
                $oldpasswordpost  =  $this->input->post("oldpasswordpost");
                $newpasswordpost =   $this->input->post("newpasswordpost");
                $passwordconfirmpost   =  $this->input->post("passwordconfirmpost");

                $cuenta = $this->session->userdata('cuenta');            
                

                $idusuario = $this->session->userdata('idusuario');            
                
                $this->load->model("modelpanel");

                if ($newpasswordpost  == $passwordconfirmpost ) {
                    
                    $dbresponse =  $this->modelpanel->validachangepw($oldpasswordpost , $newpasswordpost , $idusuario);
                    $this->response( $dbresponse );

                }else{
                    $this->response("Contraseñas distintas");
                }
                    


        }else{        
              
              $this->logout();    

        }



    }


    function usersaccount_GET(){


        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {
            
                $cuenta = $this->session->userdata('cuenta');            
                $this->load->model("modelpanel");    
                $dbresponse= $this->modelpanel->getuserbyaccount($cuenta);
                $this->response($dbresponse);                    

        }else{        
              
              $this->logout();    

        }

    }
    function listdataaccoun_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {
            
                $cuenta = $this->session->userdata('cuenta');            
                $this->load->model("modelpanel");    
                $dbresponse= $this->modelpanel->getdata($cuenta);
                $this->response($dbresponse);                    

        }else{        
              
              $this->logout();    

        }


    }



    function updatedataaccount_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

                
                $nombre = $this->input->post("nombre");
                $company = $this->input->post("company");
                $email =  $this->input->post("email");
                $numerotelefonico =  $this->input->post("numerotelefonico");
                $url = $this->input->post("url");

                $cuenta = $this->session->userdata('cuenta');            

                $this->load->model("modelpanel");    
                $dbresponse= $this->modelpanel->updatedata($nombre , $company , $email , $numerotelefonico , $url , $cuenta );
                

                                
                if ($dbresponse == true) {
                    $this->response("1");    

                                        

                }else{
                    $this->response("0");    
                }
                


                


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