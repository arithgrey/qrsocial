<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuentas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index(){}

	function lista(){

		$data['titulo']="Cuentas";

		$this->load->view("Template/header", $data);
		$this->load->view("cuenta/principal", $data);
		$this->load->view("Template/footer", $data);

	}

}

