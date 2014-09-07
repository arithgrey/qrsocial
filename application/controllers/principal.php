<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{		
		$this->__bienvenida();
	}
	function __bienvenida(){

		$data["titulo"]="QR Social";
		$this->load->view("Template/header", $data);
		$this->load->view("principal/presentacion", $data);

		$this->load->view("Template/footer" , $data);
	}
}

