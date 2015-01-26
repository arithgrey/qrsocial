<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class modelaccess extends CI_Model {
    
    function __construct(){

        parent::__construct();        
        $this->load->database();
    }

    function validationuser($mail , $pw){
    	
    	$this->db->where('correoelectronico', $mail);
		$this->db->where('contraseña', $pw);
		$this->db->where('status', '1'); 

		$query = $this->db->get('usuario');
				
        $exist = $query->num_rows();
        if ($exist == 1) {
            return $query->result_array();
        }else{
            return "0";
        }

        
    }


}



