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

            $this->load->model("mensajemodel"); 


            $idmensaje = $this->input->post("idmensajeedit");
            $descripcionedit  = $this->input->post("descripcionedit");                        
            
            $iduser= $this->session->userdata('idusuario');            
            $name  = $this->input->post("namec");
            $descriptioncaption  =  $this->input->post("descriptioncaptionc");
            $caption  = $this->input->post("captionc");
            $source  =  $this->input->post("sourcec");
            $picture  = $this->input->post("picturec");
            $link  = $this->input->post("linkc");


            $lc = $this->input->post("lc");
            $mc = $this->input->post("mc");
            $mic = $this->input->post("mic");
            $jc = $this->input->post("jc");
            $vc = $this->input->post("vc");
            $sc = $this->input->post("sc");
            $dc = $this->input->post("dc");
            
            $hora_inicioconfig  =  $this->input->post("hora_inicioconfig");
            $hora_terminoconfig = $this->input->post("hora_terminoconfig");

               
            
            $result= $this->mensajemodel->updatemensajebyidandaccount( $idmensaje , $descripcionedit ,  
              $name , $descriptioncaption , $caption , $source , $picture , $link , $lc , $mc , $mic , $jc , $vc , $sc , $dc , $hora_inicioconfig ,  $hora_terminoconfig );

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
            
            
            
            $this->load->model("mensajemodel");  
            $url = base_url();
            $result  = $this->mensajemodel->registramensajetw($iduser , $descripcion  ,$campid  , $url);

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

            $this->load->model("mensajemodel");  

            $iduser= $this->session->userdata('idusuario');
            $descripcion = $this->input->post("descripcion");
            $campid = $this->input->post("campid");

            $name  = $this->input->post("name");
            $descriptioncaption  =  $this->input->post("descriptioncaption");
            $caption  = $this->input->post("caption");
            $source  =  $this->input->post("source");
            $picture  = $this->input->post("picture");
            $link  = $this->input->post("link");

            $hinicio  = $this->input->post("hinicio");
            $htermino = $this->input->post("htermino");
            $lunes =  $this->input->post("lunes");
            $martes =  $this->input->post("martes");
            $miercoles =  $this->input->post("miercoles");
            $jueves = $this->input->post("jueves");
            $viernes = $this->input->post("viernes");
            $sabado =  $this->input->post("sabado");
            $domingo =  $this->input->post("domingo");
 
            $url = base_url();

            $result  = $this->mensajemodel->registramensajefb($iduser , $descripcion  ,$campid   , $name , $descriptioncaption , $caption  , $source , $picture , $link , $hinicio , $htermino , 
              $lunes , $martes , $miercoles , $jueves , $viernes , $sabado , $domingo);

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