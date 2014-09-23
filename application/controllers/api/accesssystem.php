<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Accesssystem extends REST_Controller
{

    function index(){}

    function usercheck_POST(){

    	$mail =$this->input->post("mail");		
    	$pw = $this->input->post("pw");

    	/*Validation*/

    	$this->load->model("modelaccess");
    	$data= $this->modelaccess->validationuser($mail , $pw);
    	$this->response($data);
    }



}