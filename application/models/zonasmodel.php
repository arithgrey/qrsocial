<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class zonasmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }


    function getzonabycuenta($cuenta){

        $query = $this->db->get_where('zona', array('idcuenta' => $cuenta));
        return $query->result_array();

    }

    function getelementbycuentazona( $cuenta , $idzona){

        $query ="SELECT z.idzona ,z.zonanombre, z.descripcion, z.fecharegistro , t.nombre FROM zona AS z , Tipo_zona AS t  WHERE  z.idTipo_zona =  t.idTipo_zona AND z.idzona='".$idzona."' AND z.idcuenta= '".$cuenta."' ";
        $result  =$this->db->query($query);
        return $result->result_array();


    }

    function updatezonaqr( $idzona , $zonaname , $descipcionzona , $tipozona , $idcuenta){

        $data = array(
               'zonanombre' => $zonaname,
               'descripcion' => $descipcionzona,
               'idTipo_zona' => $tipozona               
            );
        
        $this->db->where('idzona', $idzona);
        //$this->db->where('idcuenta', $idcuenta);
        $resultquery = $this->db->update('zona', $data); 
        return $resultquery;



    }


    function registrazona( $zonaname , $descipcionzona , $tipozona , $idcuenta){

  
      $data = array(
        'zonanombre' => $zonaname ,
        'descripcion' => $descipcionzona ,        
        'idTipo_zona' =>  $tipozona, 
        'status' =>'1',
        'idcuenta' => $idcuenta
        );

      $result = $this->db->insert('zona', $data); 
      
      return $tipozona; 


    }
    
    function loadtipozonas(){
        

        $query = $this->db->get('Tipo_zona');              
        return $query->result_array();
    }



/*Termina el modelo*/
}



