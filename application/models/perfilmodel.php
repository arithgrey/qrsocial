<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class perfilmodel extends CI_Model {
    
    function __construct(){

        parent::__construct();        
        $this->load->database();
    }

    function listaactividades(){

      $this->db->select('idrecurso, nombre ,  descripcion, status');       
      $query = $this->db->get_where('recurso', array('status' => "1" ));
      return $query->result_array();    

    }
    
    

}



