<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function usuarioregistro(){

		$data["titulo"]="QR Social";
		$this->load->view("Template/header", $data);
		$this->load->view("usuario/registrousuario");
		$this->load->view("Template/footer" , $data);

	}
	function usuarioaccess(){
	
		$data["titulo"]="QR Social";
		$this->load->view("Template/header", $data);
		$this->load->view("usuario/accessuser", $data);
		$this->load->view("Template/footer" , $data);		
	}


}

