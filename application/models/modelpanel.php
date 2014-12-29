<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class modelpanel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /**/
/*
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
    */

    function getuserbyaccount($cuenta){

      $query = "select u.idusuario , u.username , u.correoelectronico, 
      u.fecharegistro, u.fecharegistro , u.status AS estado , p.nombre , 
      p.descripcion FROM usuario AS u , perfil AS p where u.idcuenta='".$cuenta."'";
      
      $dbqueryresponse =$this->db->query($query);
      return $dbqueryresponse->result_array();


    }

    function updatedata($nombre , $company , $email , $numerotelefonico , $url , $cuenta){
      
      $data = array(   		
   			"nombre" => $nombre , 
   			"compañianombre " => $company , 
   			"mailcompañia" => $email ,
   			"numerocompañia" => $numerotelefonico ,
   			"urlcompañia" => $url
   		);


	  $this->db->where('idcuenta', $cuenta); 
    $mysqlresponse = $this->db->update('cuenta', $data); 
    return $mysqlresponse;

    }

     
     function getdata($cuenta){          

		$this->db->where('idcuenta', $cuenta); 
	    $mysqlresponse = $this->db->get('cuenta'); 
	    return $mysqlresponse->result_array();

    }

    /**/
    function validachangepw($oldpasswordpost , $newpasswordpost , $idusuario){


    	$this->db->where('idusuario', $idusuario); 
    	$this->db->where('contraseña', $oldpasswordpost); 
    	$query = $this->db->get('usuario');
    	$isokpw =  $query->num_rows();
    	
    	if($isokpw == 1){

    		$queryupdate =  "UPDATE usuario set contraseña =  '".$newpasswordpost."' WHERE idusuario= '".$idusuario."' ";
    		$updateresult= $this->db->query($queryupdate);
    		return $updateresult;

    	}else{
    		return "Fallo"; 
    	}



    }


}



