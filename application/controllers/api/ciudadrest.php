<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class ciudadrest extends REST_Controller
{

    function index(){}

    function listcuidad_POST(){

        $this->load->model("ciudadmodel");
        $ciudades = $this->ciudadmodel->listciudad();
        $this->response($ciudades);		        

	}
    function registro_POST(){

        $ciudad = $this->input->post("ciudad");
        $descripcion = $this->input->post("descripcion");
        
        $this->load->model("ciudadmodel");
        $status = $this->ciudadmodel->registro($ciudad , $descripcion);
        $repo="";
        if ($status == 1 ) {
            $repo="Su registro fue efectuado con éxito";
        }else{
            $repo="Falla en el registro de la ciudad";
        }

        $this->response($repo);             

    }

    function eliminar_POST(){

        $ciudad =  $this->input->post("ciudad");                
        $this->load->model("ciudadmodel");
        $ciudades = $this->ciudadmodel->eliminarciudad($ciudad);        

        $status ="";
        if ($ciudades == 1 ) {
            $status = "Ciudad eliminada correctamente.!";
        }else{
            $status="Falla al intentar eliminar la ciudad";
        }
        $this->response($status);             

    } 


}