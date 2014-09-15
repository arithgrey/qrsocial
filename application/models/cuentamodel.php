<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cuentamodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    /*muestra los tipos de cuenta en el sistema*/
    function listartiposcuenta(){ 

      $query = $this->db->get_where('Tipo_cuenta', array('status' => '1'));
      
      $data['numeroelementos']= $query->num_rows(); 
      $data['elementos']=$query->result_array();      

      return $data;
    }
    function registrocuenta($nombre, $descripcion, $tipocuenta){


        $status = 0; 
        if ($tipocuenta == 1) {
            
            $status = 0; 
        }else{
            $status = 1; 
        }


        $data = array(
         'nombre' => $nombre ,
         'descripcion' => $descripcion ,
         'idTipo_cuenta' => $tipocuenta, 
         'status' => $status

        );

        $insertquery  = $this->db->insert('cuenta', $data);  
        
        return $insertquery;
    }

    /*Listar cuentas */
    function listallcuentas(){
      
      $query = $this->db->get_where('cuenta', array( 'idTipo_cuenta' => '2' ));      
      return $query->result_array();      

    }
    /*Get elements by id */
    function getElementsbyId($id){

      $this->db->select('nombre, descripcion, fecharegistro, idTipo_cuenta'); 
      $query = $this->db->get_where('cuenta', array('idcuenta' => $id));
      return $query->result_array();
    }

    function updatecuentafremiunmbyid($id){

        $query_validator="select idTipo_cuenta from cuenta where idcuenta=".$id;     
        $result = $this->db->query($query_validator);

        
    }



}



