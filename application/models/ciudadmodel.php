<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class ciudadmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /**/
    function listciudad(){

      $query_list="SELECT idciudad,  nombre  from ciudad ORDER BY nombre";     
      $result = $this->db->query($query_list);

      return $result->result_array();

    }

    function registro($ciudad , $descripcion){

      $query_insert="INSERT INTO ciudad (nombre, descripcion) VALUES ('".$ciudad."' , '".$descripcion."' )";     
      $result = $this->db->query($query_insert);
      $datastatus="";

        if ($result == true) {

          $datastatus +="1";  

        }else{
          $datastatus +="0";
        }
        
        return  $datastatus;
        


    }

    function eliminarciudad( $idciudad){

        
        $query_list="DELETE FROM ciudad where idciudad = '" . $idciudad."' " ;     
        $result = $this->db->query($query_list);
        $datastatus="";

        if ($result == true) {

          $datastatus +="1";  

        }else{
          $datastatus +="0";
        }
        
        return  $datastatus;
        
    }



}



