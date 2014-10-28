<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Profesion extends REST_Controller
{

    function index(){}

    function listprofesion_POST(){

        $this->load->model("profesionmodel");        
        $profesiones = $this->profesionmodel->listall();
        $this->response($profesiones);		        


	}
	function elimina_POST(){
		
		$idprefesion = $this->input->post("elimina");

		$this->load->model("profesionmodel");        
        $status = $this->profesionmodel->deletebyid($idprefesion);
        $this->response($status);		        

	}
    function registro_POST(){

        $profesion  =  $this->input->post("profesion");
        $descripcion  = $this->input->post("descripcion");

        $this->load->model("profesionmodel");        
        $status = $this->profesionmodel->registro($profesion, $descripcion);
        $this->response($status);               

    }


}