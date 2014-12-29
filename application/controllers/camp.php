<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camp extends CI_Controller {

	function __construct()
	{
		parent::__construct();
				
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

			$a=1; 
			while ($a <= $numerodiasmes) {
				
				
				$descripciondia[$a] = $a ;			
				$a++;
			}	
			
			//$e= $this->name();
			$this->load->library('calendar');
			$calendario = $this->calendar->generate($añoactual, $numerodemes , $descripciondia);

			$data["calendario"] = $calendario;
			$data["añoactual"] = $añoactual;
			$data["numerodemes"] = $numerodemes;
			$data["campid"] =  $camp;

			$username = $this->session->userdata('username');	
			$data["username"]=$username;
			$data["homesess"]=base_url('/index.php/principal/homeuser');
						
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

