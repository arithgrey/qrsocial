<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Accesssystem extends REST_Controller{

    function index(){}

    function usercheck_POST(){

    	$mail =$this->input->post("mail");		
    	$pw = $this->input->post("pw");
    	
    	$this->load->model("modelaccess");
    	$dataresponse = $this->modelaccess->validationuser($mail , $pw);

        $reporte="";
        if ($dataresponse[0] == "0") {
                
            $reporte ="Datos erroneos";  

        }else{


            $idusuario = $dataresponse[0]["idusuario"];
            $username = $dataresponse[0]["username"];
            $correoelectronico = $dataresponse[0]["correoelectronico"];
            $fecharegistro  = $dataresponse[0]["fecharegistro"];
            $status = $dataresponse[0]["status"];
            $idperfil = $dataresponse[0]["idperfil"];
            $cuenta = $dataresponse[0]["idcuenta"];

            /*Name account*/
            $this->load->model("cuentamodel");
            $accountdata = $this->cuentamodel->getElementsbyId($cuenta);
            $nombrecuentaact =  $accountdata[0]["nombre"];


            $newdata = array(
                   'username'  => $username,
                   'email'     => $correoelectronico,
                   'idusuario' => $idusuario, 
                   'fecharegistro' => $fecharegistro,
                   'status' =>$status,
                   'perfil' => $idperfil,
                   'cuenta' => $cuenta,
                   'nombrecuentaact' => $nombrecuentaact,
                   'logged_in' => TRUE
               );   

            $this->session->set_userdata($newdata);                              
            $next= base_url('index.php/principal/homeuser');
            $reporte = "<script type='text/javascript'>
                          window.location = '$next';
                        </script>";
        }
    	$this->response($reporte);

    }



}
