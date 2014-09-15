<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuentas extends CI_Controller {

	function __construct()
	{
		parent::__construct();

	}

	function index(){}

	function lista(){

		$data['titulo']="Cuentas";

		$this->load->view("Template/header", $data);
		$this->load->view("cuenta/principal", $data);
		$this->load->view("Template/footer", $data);
	}
	function editcuenta(){
		
		$data['titulo']="Edición";
		$cuentaedit = $this->input->get("text");

		if (strlen($cuentaedit)<1) {
			redirect( base_url(), 'refresh');

		}else{

			$data['cuentaedit'] = $cuentaedit;

			$this->load->model("cuentamodel");
			$cuentadata =$this->cuentamodel->getElementsbyId($cuentaedit);
			

			$cuenta =$cuentadata[0];
			$tipocuenta= $cuenta["idTipo_cuenta"];
			/*Si la cuenta es fremiunm*/
			if ($tipocuenta == 2) {

				$data["cuentaedit"] = $cuentaedit;
				$data["nombre"]=$cuenta["nombre"];
				$data["descripcion"] =$cuenta["descripcion"];
				$data["fecharegistro"] =$cuenta["fecharegistro"];

				$this->load->view("Template/header", $data);
				$this->load->view("cuenta/editarcuenta", $data);
				$this->load->view("Template/footer", $data);		

			}else{

				
			}
			

			
		
		}

		
	}

}

