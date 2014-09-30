<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cammodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    
    function loadcamp(){
      
      $query = $this->db->get_where('campaña', array('status' => '1'));
      return $query->result_array();

    }

    
    function registrocamp($nombre, $redsocial , $descripcion){

          $status = 1; 
          $data = array(
           'nombre' => $nombre ,
           'descripcion' => $descripcion ,         
           'status' => $status,
           'redsocial' => $redsocial);

         $result = $this->db->insert('campaña', $data);

         $datastatus="";

        if ($result == true) {

          $datastatus +="1";  

        }else{
          $datastatus +="0";
        }
        
        return  $datastatus;
        


        return  $response;
    }


}



