<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cuentamodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /*muestra los tipos de cuenta en el sistema*/
    function listartiposcuenta(){ 

      $query = $this->db->get_where('Tipo_cuenta', array('status' => '1'));
      
      $data['numeroelementos']= $query->num_rows(); 
      $data['elementos']=$query->result_array();      

      return $data;

    }


}



