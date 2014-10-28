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

    function editcamp_POST(){

        $logged_in = $this->is_logged_in();

        if ($logged_in == 1) {


        $idcamp =   $this->input->post('campedit'); 
        $nameedicion = $this->input->post('nameedicion');
        $descripcionedit= $this->input->post('descripcioneditcamp');        
    
        $this->load->model("cammodel");        
        $responsedb= $this->cammodel->editcamp($idcamp , $nameedicion, $descripcionedit);

        $reporte="";
        if ($responsedb == true) {
                
                $reporte ="Edición efectuada con éxito";
            }else{
                $reporte ="Edición fallida";
            }    
        $this->response($reporte);
        }else{        
              /*Terminamos sessión*/  
              $this->logout();    

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
            
                $idusuario= $this->session->userdata('idusuario');
                $cuenta= $this->session->userdata('cuenta');

                $dbresponse ="";

                $this->load->model("cammodel");            
                $dbresponse = $this->cammodel->registrocamp($name , $descripcion, $evento , $idusuario , $cuenta);

                $reporte ="";
                if ($dbresponse == 1) {

                    $reporte= "Éxito en el registro";                    
                }elseif ($dbresponse == 2){
                    $reporte= "Falla en el registro";                    
                }else{
                    $reporte= $dbresponse;
                }
                $this->response($reporte);    
             
            

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
            $idcamp = $this->input->post('campedit');

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