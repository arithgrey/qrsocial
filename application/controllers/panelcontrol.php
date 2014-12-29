<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panelcontrol extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function control(){

		$logged_in=$this->is_logged_in();

		if ($logged_in == 1) {

			$username = $this->session->userdata('username');						
			$data["titulo"]="Panel de control";	
			$data["username"]=$username;			
			$data["homesess"]=base_url('/index.php/principal/homeuser');

			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
		

			$this->load->view("Template/headersession", $data);
			$this->load->view("system/userpanelcontrol", $data);
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

