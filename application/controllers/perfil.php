<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index(){		

		$this->__bienvenida();
	}
	function __bienvenida(){

		$data["titulo"]="Perfil";
		$this->load->view("Template/header", $data);
		$this->load->view("perfil/administracion", $data);
		$this->load->view("Template/footer" , $data);		
	}
}

