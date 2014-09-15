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
    function registro_POST(){

        $nombrecuenta = $this->input->post("nombrecuenta");
        $descripcion  = $this->input->post("descripcion");
        $tipocuenta  = $this->input->post("tipocuenta");

        $this->load->model("cuentamodel");
        $responsedb = $this->cuentamodel->registrocuenta($nombrecuenta, $descripcion, $tipocuenta); 

        $reporte="";
        
        if ($responsedb == true) {
            $reporte.="<a><strong>Cuenta creada con éxito</strong></a>";
        }else{
            $reporte.="<a><strong>Falla en registro de cuenta</strong></a>";
        }
        $this->response($reporte);

    }
    
    function listarcuentas_POST(){

        $this->load->model("cuentamodel");
        $listarcuentas = $this->cuentamodel->listallcuentas();
        $this->response($listarcuentas);

    }
    function updatecuenta_POST(){

        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post ("descripcion");
        $estado = $this->input->post("estado");
        $edit = $this->input->post("edit");

        $this->response($nombrecuenta . $descripcion . $estado . $edit);



    }



}