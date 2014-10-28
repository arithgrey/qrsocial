<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cammodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    
    function listbyusercamp($iduser , $camp ){
          
      $this->db->where('idcuenta', $idcuentaactual );
      $this->db->where('status', "1" );
      $this->db->where('idusuario', $idusuario);
      $query = $this->db->get('campaña');      
      return $query->result_array();

    }

    /*Registra con un tipo de mensaje ya sea para fb o para tw */
/*Termina el modelo*/
}



