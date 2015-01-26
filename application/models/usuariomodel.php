<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class usuariomodel extends CI_Model {
    
    function __construct(){

        parent::__construct();        
        $this->load->database();
    }

    /*Verifica existencia usuario*/
    function verificausuario($username){
      
      $query = $this->db->get_where('usuario', array('username' => $username ));
      $existencia= $query->num_rows(); 
      return $existencia;

    }
    /*Verifica la existecia del correo previamente registrado*/
    function verificausuariomail($usermail){

      $query = $this->db->get_where('usuario', array('correoelectronico' => $usermail));
      $existencia= $query->num_rows(); 
      return $existencia;
    }


    function registrofreemium($username , $usermail, $pw , $cuentanum ){

          $data = array(
         'username' => $username ,
         'correoelectronico' => $usermail ,
         'contraseña' => $pw,
         'status' => "1",
         'idperfil' =>1,
         'idcuenta' =>$cuentanum

         
          );
          $result = $this->db->insert('usuario', $data); 
          return $result;
          
    }

    

}



