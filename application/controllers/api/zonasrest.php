<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Zonasrest extends REST_Controller
{

    function getzonabyid_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1){          
              $this->load->model("zonasmodel");
              $idzona = $this->input->get("idzona");
              $cuenta = $this->session->userdata('cuenta');            
              $responsedb =$this->zonasmodel->getelementbycuentazona( $cuenta , $idzona);              
              $this->response($responsedb);


        }else{        
              
              $this->logout();    

        }






    }





        function iszonacamp_GET(){

            $logged_in = $this->is_logged_in();

            if ($logged_in == 1){

                  $this->load->model("zonasmodel");             
                  $idcampania = $this->input->get("idcampania");
                  $idzona = $this->input->get("idzona");
                  
                  $responsedb = $this->zonasmodel->iszonacamp($idcampania , $idzona);                                
                  $this->response($responsedb);


            }else{        
                  
                  $this->logout();    

            }
    }


    function settipocampbyid_POST(){

            $logged_in = $this->is_logged_in();

            if ($logged_in == 1){

                  $this->load->model("zonasmodel");             
                  $tipo_zona = $this->input->post("tzona");
                  $idzona = $this->input->post("idzona");
                  
                  $responsedb = $this->zonasmodel->updatetipozonabyidzona( $idzona , $tipo_zona);                                
                  $this->response($responsedb);


            }else{        
                  
                  $this->logout();    

            }


    }






    function loadzonascamp_GET(){


        $logged_in = $this->is_logged_in();

        if ($logged_in == 1){

              $idcampania = $this->input->get("idcampania");
              $this->load->model("zonasmodel");             
                                 
              $responsedb = $this->zonasmodel->getzonacamp($idcampania);              
              
              $this->response($responsedb);


        }else{        
              
              $this->logout();    

        }



    }

    function getzonasbytipo_GET(){      
        $logged_in = $this->is_logged_in();

        if ($logged_in == 1){

              $this->load->model("zonasmodel");

              $cuenta = $this->session->userdata('cuenta');          
              $tipozona = $this->input->get("tipozona"); 

              
              if ($tipozona == "all"){

                  $responsedb = $this->zonasmodel->getzonacuentaall($cuenta); 
              }else{
                  $responsedb = $this->zonasmodel->getzonabycuentaandtipo($cuenta , $tipozona);                
              }

              $this->response($responsedb);


        }else{        
              
              $this->logout();    

        }

    }




        function loadcampzonasasignadas_GET(){
        $logged_in = $this->is_logged_in();

        if ($logged_in == 1){

              $this->load->model("zonasmodel");
              $cuenta = $this->session->userdata('cuenta');                        
              $idcampania =  $this->input->get("idcampania");

              $responsedb = $this->zonasmodel->getzonabycuentazonasasig($cuenta, $idcampania);              
              
              $this->response($responsedb);


        }else{        
              
              $this->logout();    

        }

    }





    function loadzonas_GET(){
        $logged_in = $this->is_logged_in();

        if ($logged_in == 1){

              $this->load->model("zonasmodel");
              $cuenta = $this->session->userdata('cuenta');                        
              $responsedb = $this->zonasmodel->getzonabycuenta($cuenta);              
              
              $this->response($responsedb);


        }else{        
              
              $this->logout();    

        }

    }


        function updatezona_POST(){

          $logged_in = $this->is_logged_in();

          if ($logged_in == 1){
                  
                $this->load->model("zonasmodel");
                  
                $edit_zona = $this->input->post("zonaqredit");
                $edit_zonaname = $this->input->post("zona_name_input_value");
                $edit_descripcion =  $this->input->post("zona_name_area_value");
                $edit_tipozona  = $this->input->post("zona_tipozona_input_value");
                $cuenta = $this->session->userdata('cuenta');   
                $mensajedefaultedit  = $this->input->post("zona_defmsj_input_value");         

                $dbresponse = $this->zonasmodel->updatezonaqr( $edit_zona, $edit_zonaname , $edit_descripcion , $edit_tipozona , trim($mensajedefaultedit) , $cuenta);
                $this->response($dbresponse);

          }else{        
                
                $this->logout();    

          }



      }








    function registrazona_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1){
            

              $zona_name = $this->input->post("zona_name");
              $descripcion_zona  = $this->input->post("descripcion_zona");
              $tipo_zona = $this->input->post("tipoz");
              $mensajedefault  = $this->input->post("mensajedefault");
              $cuenta = $this->session->userdata('cuenta');            
              $this->load->model("zonasmodel");
              $base_url= $this->input->post("base_url");


              
              $dbresponse = $this->zonasmodel->registrazona( $zona_name , $descripcion_zona , $tipo_zona , trim($mensajedefault) , $cuenta , $base_url);

              $this->response($dbresponse);


        }else{        
              
              $this->logout();    

        }



    }

    function listMensajesZona_GET(){
       
      $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $this->load->model("appmodel");
            $idzona = $this->input->get("zonaqredit");
            $diaL = $this->input->get("diaL");

            $response = $this->appmodel->getmensajesbyidzonascuentaid($idzona , $diaL);
            $this->response($response);


        }else{                    
              $this->logout();    

        }


    }


    function loadtiposzonas_GET(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {

            $this->load->model("zonasmodel");

            //print_r($this->zonasmodel->loadtipozonas());            
            $this->response($this->zonasmodel->loadtipozonas());

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