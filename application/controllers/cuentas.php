<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuentas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
				
	}	
	function lista(){

		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {
						
			$data['titulo']="Cuentas";
			$username = $this->session->userdata('username');	

			$data["username"]=$username;
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
		
			
			$data["homesess"]=base_url('/index.php/principal/homeuser');
			
			$this->load->view("Template/headersession", $data);
			$this->load->view("cuenta/principal");
			$this->load->view("Template/footer", $data);

		}else{
			
			redirect(base_url());			

		}
	}
	

	public function accessacount(){

		$logged_in=$this->is_logged_in();
		
		if ($logged_in == 1) {
						
		$cuenta = $this->input->get("cuenta");
		$nameaccount = $this->input->get("name");

		$data['titulo']="Campañas ".$nameaccount;
		$username = $this->session->userdata('username');	
		
		$data["username"]=$username;
		$data["homesess"]=base_url('/index.php/principal/homeuser');
		$data["cuentaid"] = $cuenta;
		$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
		$data["nombrecuentaact"] = $nombrecuentaact;
		
		

		$this->load->view("Template/headersession", $data);
		$this->load->view("campaña/menuinicio");
		$this->load->view("Template/footer", $data);
			
		


		}else{
			
			redirect(base_url());			
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



	function editcuenta(){
	
		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {



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

				/**/
				$username = $this->session->userdata('username');	
				$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
				$data["nombrecuentaact"] = $nombrecuentaact;
		
				$data["username"]=$username;
				$data["homesess"]=base_url('/index.php/principal/homeuser');				
				$this->load->view("Template/headersession", $data);
				
				$this->load->view("cuenta/editarcuenta", $data);
				$this->load->view("Template/footer", $data);		

			}else{
				
			}			
		}
		
		}else{
			
			redirect(base_url());			

		}
	/*Termina la función*/	
	}


}

