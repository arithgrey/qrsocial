<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index(){		

		$this->__bienvenida();
	}
	function __bienvenida(){

		$data["titulo"]="Home";
		$this->load->view("Template/header", $data);
		$this->load->view("principal/presentacion", $data);

		$this->load->view("Template/footer" , $data);
	}

	function homeuser(){

		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {


			$username = $this->session->userdata('username');			
			$last_activity = $this->session->userdata('last_activity');

			$data["titulo"]="Bienvenido ";	
			$data["username"]=$username;
			$data["last_activity"] =  $last_activity;
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
		
			$data["homesess"]=base_url('/index.php/principal/homeuser');

			$this->load->view("Template/headersession", $data);
			$this->load->view("system/bienvenida", $data);
			$this->load->view("Template/footer" , $data);		

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

