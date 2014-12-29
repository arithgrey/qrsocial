<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Mensajerest extends REST_Controller
{

    function loaddatamensajebyid_GET(){

          $logged_in = $this->is_logged_in();
          if ($logged_in == 1) {

            $idmensaje =  $this->input->get("idmensaje");
            $iduser= $this->session->userdata('idusuario');
            $campid = $this->input->get("campid");

            
            $this->load->model("mensajemodel");    
            $result =  $this->mensajemodel->loaddatamensajebyid($idmensaje , $campid );
            $this->response( $result );

        }else{        
              /*Terminamos sessión*/  
              $this->logout();                
        }
    }
    
    function delmensajebyid_POST(){


          $logged_in = $this->is_logged_in();
          if ($logged_in == 1) {

            $idmensaje = $this->input->post("idmensaje");
            $idcuenta= $this->session->userdata('cuenta');

            $this->load->model("mensajemodel");    
            $responsedb =  $this->mensajemodel->delmensajebyidandaccount($idmensaje , $idcuenta);
            $this->response($responsedb);

        }else{        
              /*Terminamos sessión*/  
              $this->logout();                
        }




    }


    function updatemensajebyidandaccount_POST(){


          $logged_in = $this->is_logged_in();
          if ($logged_in == 1) {

            $descripcionedit  = $this->input->post("descripcionedit");
            $statusmsjedit = $this->input->post("statusmsjedit");
            $id_hora_inicio = $this->input->post("id_hora_inicio");
            $year  = $this->input->post("year");
            $month  = $this->input->post("month");
            $dias = $this->input->post("dias");
            $idmensaje = $this->input->post("idmensajeedit");
            $id_hora_termino  = $this->input->post("id_hora_termino");

            $iduser= $this->session->userdata('idusuario');
      
            $this->load->model("mensajemodel");    
            $result =  
            $result= $this->mensajemodel->updatemensajebyidandaccount( $idmensaje , $descripcionedit ,  
              $statusmsjedit , $id_hora_inicio , $id_hora_termino ,  $year  , $month , $dias );

            $this->response($result);

        }else{        
              /*Terminamos sessión*/  
              $this->logout();                
        }


    }    

    function listmensajebycuenta_GET(){


          $logged_in = $this->is_logged_in();
          if ($logged_in == 1) {

            $iduser= $this->session->userdata('idusuario');
            $campid = $this->input->get("campid");            
            
            $this->load->model("mensajemodel");    
            $result =  $this->mensajemodel->listmensajebycuenta($campid);
            $this->response($result );


              


        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
            

        }




    }


    function registrotwitter_POST(){  


        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $iduser= $this->session->userdata('idusuario');

            $descripcion = $this->input->post("descripcion_twitter");
            $campid = $this->input->post("campid");
            $zona = $this->input->post("zona");            
            $statussiempreactivo = 2;            
            
            $this->load->model("mensajemodel");  
            $url = base_url();
            $result  = $this->mensajemodel->registramensajetw($iduser , $descripcion  ,$campid , $zona , $statussiempreactivo , $url);

            if ($result == true) {
              $this->response("1");  
            }else{
              $this->response("0");
            }
            


        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
            

        }



    }

     function registrointemporalmsjfb_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $iduser= $this->session->userdata('idusuario');
            $descripcion = $this->input->post("descripcion");
            $campid = $this->input->post("campid");
            $zona = $this->input->post("zona");            
            $statussiempreactivo = 1;            
            
            $this->load->model("mensajemodel");  
            $url = base_url();
            $result  = $this->mensajemodel->registramensajefb($iduser , $descripcion  ,$campid , $zona , $statussiempreactivo , $url);

            if ($result == true) {
              $this->response("1");  
            }else{
              $this->response("0");
            }
            


        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
            

        }

     }   




      /*Listamos los mensajes que se encuentras en una zona*/

     function listmensajesbyzona_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

          $this->load->model("mensajemodel");
          
          
          $zona= $this->input->get("idzona");

          $resultdb= $this->mensajemodel->getmensajesbyidzonascuentaid($zona );
          $this->response($resultdb);
            

        }else{        
              /*Terminamos sessión*/  
              $this->logout();    
            

        }

     }   

 






  


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