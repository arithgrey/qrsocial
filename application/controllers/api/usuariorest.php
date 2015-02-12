<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Usuariorest extends REST_Controller
{

    function index(){}

    function usermailexist_POST(){
        
         $usermail =$this->input->post("usermail");

            $repo="";
            if (strlen($usermail)>0 ) {
                
                    $this->load->model("usuariomodel");                
                    $dataresponse = $this->usuariomodel->verificausuariomail($usermail);

                    if ($dataresponse  ==  1) {
                        $repo="<span class='[success alert secondary] [round radius] label'> ✖Correo ya registrado en el sistema, intente con uno distinto
                            </span>";
                    }else{
                        $repo ="1";
                    }

            }else{

                $repo="<span class='[success alert secondary] [round radius] label'>✖Asigne un correo de usuario</span>";
            }
            $this->response($repo);     
    }

    function userexist_POST(){

            $username = $this->input->post("username");
            $repo="";
            if (strlen($username)>0 ) {
                
                    $this->load->model("usuariomodel");                
                    $dataresponse = $this->usuariomodel->verificausuario($username);

                    if ($dataresponse  ==  1) {
                        $repo="1";
                    }else{
                        $repo ="0";
                    }
            }else{
            }
            $this->response($repo);     

        }

    function validadata_POST(){
        
        $this->load->model("usuariomodel");                            
        $this->load->model("cuentamodel");

        $username = $this->input->post("username");
        $usermail = $this->input->post("usermail");
        $pw = $this->input->post("pw");
        
        $reporte="";
        if (valid_email($usermail)){
               if (strlen($username)>4 ) {                                        
                    $dataresponse = $this->usuariomodel->verificausuario($username);
                     if ($dataresponse  ==  1){

                            $reporte="usuario registrado ya en el sistema";
                     }else{

                            $dataresponsed = $this->usuariomodel->verificausuariomail($usermail);
                            if ($dataresponsed  ==  1){
                                $reporte="La cuenta de correo ya está registrada en el sistema";

                            }else{
                        
                                
                                
                                $responsecuenta = $this->cuentamodel->registrocuenta($username , "" , 2 );
                                $dbresponse= $this->usuariomodel->registrofreemium($username , $usermail, $pw , $responsecuenta[0]["id"] );
                                $this->response($dbresponse);                        
                                //$this->response();                        

                            }
                     }                                    
                }else{
                    $reporte= 'El usuario ya está registrado en el sistema';        
                } 

        }else{
            $reporte= 'El mail ya está registrado en el sistema';
        }
        $this->response($reporte); 
    }   
    
/*Termina  el controlador rest */
}

