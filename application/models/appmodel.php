<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class appmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function getmensajebycampzonamensaje($idcampaña , $idzona , $idmensaje){

    	$this->db->where( "idmensaje" , $idmensaje);
    	$this->db->where( "idzona" , $idzona);
    	$this->db->where( "idcampaña" , $idcampaña);
    	
    	$query = $this->db->get("mensaje");
    	return $query->result_array();

    }



    public function datos_usuario(){

        $appId = '1590033354545663';
        $secret = '2d5176353c6656d19e8152bf7e1202ce';
        $fb_config = array(
            'appId' => $appId,
            'secret' => $secret
        );
        $this->load->library('facebook', $fb_config);
        
        $user = $this->facebook->getUser();
        if($user)
        {
            $fql  = 'SELECT uid,name,pic_square,email from user where uid="'.$user.'";';
            $datos  =   array(
                'method'    => 'fql.query',
                'query'     => $fql,
                'callback'  => ''
            );
            
            $resultado = $this->facebook->api($datos);
            return $resultado;
        }
    }
    function getmensajesbyidzonascuentaid($zona , $dia ){

        
        $query_getcamp =   "SELECT idcampaña FROM  campaña_zona WHERE  idzona=".$zona; 
        $query = $this->db->query($query_getcamp);
        $data = array();

        $z=0;
        foreach ($query ->result_array() as $row){


          $query_mensajesinf =   "SELECT * FROM mensaje   WHERE   mensaje.idcampaña =".$row["idcampaña"]; 

          $query_m = $this->db->query($query_mensajesinf);

         foreach ($query_m->result_array() as $row){

             $data[$z] = $row;
             $z++;
         } 


        }

        return $data;
    } 





/*Termina el modelo*/
}



