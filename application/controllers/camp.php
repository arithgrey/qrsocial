<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camp extends CI_Controller {

	function __construct()
	{
		parent::__construct();
				
	}	

	function editainformacionmensaje(){
		
		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {


			$data['titulo']="editar/mensaje";
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
			$username = $this->session->userdata('username');	
			$data["username"]=$username;

			$mensaje = $this->input->get("mensaje");
			$campid  =  $this->input->get("campid");

			$data['mensaje'] = $mensaje;				
			$data['campid'] = $campid;
			$username = $this->session->userdata('username');	
			$data["username"]=$username;
			$data["homesess"]=base_url('index.php/principal/homeuser');
			$data["name"] = $this->input->get("name");
						
			$this->load->view("Template/headersession", $data);
			$this->load->view("campaña/mensajeedicion");
			$this->load->view("Template/footer", $data);

		}else{
			
			redirect(base_url());			

		}



	}









	function editainformacion(){
		
		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {

			$camp =$this->input->get('camp');						
			$name =$this->input->get('name');						

			$data['titulo']=$name."/editar";
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
			$username = $this->session->userdata('username');	
			$data["username"]=$username;

			$data["campid"] =  $camp;

			$username = $this->session->userdata('username');	
			$data["username"]=$username;
			$data["homesess"]=base_url('index.php/principal/homeuser');
						
			$this->load->view("Template/headersession", $data);
			$this->load->view("campaña/editarinformacion");
			$this->load->view("Template/footer", $data);

		}else{
			
			redirect(base_url());			

		}



	}

	function opciones(){

		date_default_timezone_set('Africa/Lagos');
		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {

			$camp =$this->input->get('camp');						
			$name =$this->input->get('name');						

			$data['titulo']=$name."/Mensajes";
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
			$username = $this->session->userdata('username');	
			$data["username"]=$username;


			$descripciondia = array();
			/*Número del mes en el que nos encontramos*/
			$añoactual = date("Y");
			$numerodemes =  date("n");
			$numerodiasmes = days_in_month( $numerodemes , $añoactual);
			$this->load->library('calendar');
			

			
			$data["añoactual"] = $añoactual;
			$data["numerodemes"] = $numerodemes;			

			$data["campid"] =  $camp;
			$data["name"] = $this->input->get("name");


			$username = $this->session->userdata('username');	
			$data["username"]=$username;
			$data["homesess"]=base_url('index.php/principal/homeuser');
						
			$this->load->view("Template/headersession", $data);
			$this->load->view("campaña/mensajes");
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

}

