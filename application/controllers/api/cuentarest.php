<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Cuentarest extends REST_Controller
{

    function index(){}

    function listcuenta_POST(){

        $this->load->model("cuentamodel");
        $data = $this->cuentamodel->listartiposcuenta();

        $this->response($data);

	}


}