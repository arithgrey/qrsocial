<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('application/libraries/api_twitter/twitteroauth.php');  
class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function usuarioregistro(){

		
		if ($this->is_logged_in()==1){

			redirect(base_url('index.php/principal/homeuser'));
			
		}else{
			
			$data["titulo"]="Home";
			$this->load->view("Template/header", $data);
			$this->load->view("usuario/registrousuario");
			$this->load->view("Template/footerdescripcion" , $data);
		}

	}
	function usuarioaccess(){		
			
		if ($this->is_logged_in()==1){
			
			redirect(base_url('index.php/principal/homeuser'));
		}else{


			$data["titulo"]="Usuario acceso";
			$registro =  $this->input->get("registro");
			
			if ( $registro == "done") {
				$data["registro"] = "Registro efectuado con éxito.!";	 

			}else{
				$data["registro"] ="";
			}

			$data["titulo"]="Usuario acceso";
			$this->load->view("Template/header", $data);
			$this->load->view("usuario/accessuser", $data);
			$this->load->view("Template/footer" , $data);			
		}		
		
	}

	 private function is_logged_in() {
	
		$is_logged_in = $this->session->userdata('logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true) {
			
			return false;
		}
		return true;
	}	




}

