<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Accesssystem extends REST_Controller
{

    function index(){}

    function usercheck_POST(){

    	$mail =$this->input->post("mail");		
    	$pw = $this->input->post("pw");
    	/*Validation*/
    	$this->load->model("modelaccess");
    	$dataresponse = $this->modelaccess->validationuser($mail , $pw);

        $reporte="";

        if ($dataresponse[0] == "0") {
                
            $reporte ="No";  
        }else{


            $idusuario = $dataresponse[0]["idusuario"];
            $username = $dataresponse[0]["username"];
            $correoelectronico = $dataresponse[0]["correoelectronico"];
            $fecharegistro  = $dataresponse[0]["fecharegistro"];
            $status = $dataresponse[0]["status"];
            $idperfil = $dataresponse[0]["idperfil"];


            $newdata = array(
                   'username'  => $username,
                   'email'     => $correoelectronico,
                   'idusuario' => $idusuario, 
                   'fecharegistro' => $fecharegistro,
                   'status' =>$status,
                   'perfil' => $idperfil,
                   'logged_in' => TRUE
               );

            $this->session->set_userdata($newdata);

            $reporte="ok";
        }

    	$this->response($reporte);

    }



   



}