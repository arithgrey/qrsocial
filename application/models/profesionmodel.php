<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class profesionmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /**/
    function listall(){

      $this->db->select('idprefesion, nombre');
      $query = $this->db->get('profesion');      
      return $query->result_array();

    }

    function deletebyid($idprefesion){

      $this->db->where('idprefesion', $idprefesion);
      $query = $this->db->delete('profesion'); 
      return $query;

    }
    function registro($profesion, $descripcion){
      
      $data = array(
   'nombre' => $profesion ,
   'descripcion' => $descripcion 
   );

    $mysqlresponse = $this->db->insert('profesion', $data); 
    return $mysqlresponse ;

    }


}



