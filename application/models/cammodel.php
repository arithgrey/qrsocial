<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cammodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    
    function loadcamp($idusuario){
      
      $query = $this->db->get_where('campaña', array('status' => '1', 'idusuario'=>$idusuario));
      return $query->result_array();

    }

    function loadcampabanameid($idusuario){
        
        
        $query_list="SELECT idcampaña, nombre  FROM campaña WHERE idusuario= '".$idusuario."'";     
        $result = $this->db->query($query_list);

        return $result->result_array();
    }

    
    function registrocamp($nombre, $redsocial , $descripcion, $idusuario ){

          $status = 1; 
          $data = array(
           'nombre' => $nombre ,
           'descripcion' => $descripcion ,         
           'status' => $status,
           'redsocial' => $redsocial,
           'idusuario' =>$idusuario );

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



