<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cammodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    
    function loadcampania($idusuario , $idcuentaactual){
          
        $this->db->where('idcuenta', $idcuentaactual);
        $this->db->where('status', '1' );
        $this->db->where('idusuario', $idusuario);
        $query = $this->db->get('campaña');      
        
        return $query->result_array();

    }

    function loadcampabanameid($idusuario){
        
        
        $query_list="SELECT idcampaña, nombre  FROM campaña WHERE idusuario= '".$idusuario."'";     
        $result = $this->db->query($query_list);

        return $result->result_array();
    }

    function deletecamobyid($id, $idusuario){

        
        $this->db->where('idcampaña', $id);
        $this->db->where('idusuario', $idusuario );
        $query_del =$this->db->delete('campaña'); 
        
          if ($query_del ==  true){
              return "1";
            }else{
              return "Falla al eliminar en la base de datos consulte al administrador";
            }
    }

      
    function editcamp($id , $nombre, $descripcion){

           $data = array(               
               'nombre' => $nombre,
               'descripcion' => $descripcion
            );

            $this->db->where('idcampaña', $id);
            $result= $this->db->update('campaña', $data); 
    }  


    function getnamebyid($id, $idusuario ){


        $this->db->select('nombre');
        $this->db->where('idcampaña', $id );
        $this->db->where('idusuario', $idusuario);  
        $query = $this->db->get('campaña');
        return $query->result_array();

    }


    function isnameexist($name , $idusuario ){

      
      $this->db->where('nombre', $name );
      $this->db->where('idusuario', $idusuario );  
      $query = $this->db->get('campaña');      
      $e = $query->num_rows();
      return $e;
    }

    function registrocamp($nombre, $redsocial , $descripcion, $idusuario , $idregistrocamp){

      $datastatus="";
      if ($this->isnameexist($nombre , $idusuario) >0){
            $datastatus ="En el sistema ya existe una campaña con ese nombre, intente con otro";
      }else{

            $status = 1; 
            $data = array(
             'nombre' => $nombre ,
             'descripcion' => $descripcion ,         
             'status' => $status,
             'redsocial' => $redsocial,
             'idusuario' =>$idusuario, 
             'idcuenta' => $idregistrocamp
              );

             $result = $this->db->insert('campaña', $data);
              if ($result == true) {
                $datastatus ="1";  

              }else{
                $datastatus ="0";
              }
       }     
        return $datastatus;
        /*Termina la función*/
    }
/*Termina el modelo*/
}



