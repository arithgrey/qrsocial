<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Perfilrest extends REST_Controller
{

    function index(){}

    function listcuenta_POST(){

        $this->load->model("perfilmodel");
        $data = $this->perfilmodel->listaactividades();
        $this->response($data);
	}

}