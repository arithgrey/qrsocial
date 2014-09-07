<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	function index()
	{		
		$this->__bienvenida();
	}
	function __bienvenida(){

		$data["titulo"]="Panel de administracion";
		$this->load->view("Template/header", $data);
		$this->load->view("backend/principal");
		$this->load->view("Template/footer" , $data);
	}
	function registrociudad(){

		$data["titulo"]="Ciudades";
		$this->load->view("Template/header", $data);
		$this->load->view("backend/ciudadregistro");
		$this->load->view("Template/footer" , $data);
	}

}

