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

        
        $query_getcamp =   "SELECT idcampaña FROM   campaña_zona WHERE  idzona=".$zona; 
        $query = $this->db->query($query_getcamp);
        //$data =[];
        $data = array();
        $camparr = $query->result_array();
        
        for ($a=0; $a < count($camparr); $a++) { 
          

          $query_mensajesinf =   "SELECT m.idmensaje , m.descripcion , m.status, m.social 
          , m.name , m.horainicio , m.horatermino,  m.descriptioncaption ,
          m.caption , m.source , m.picture, m.link , m.L  , m.M , m.MI , m.J , m.V , m.S , m.D ,
          c.idcampaña , c.nombre FROM mensaje AS m , campaña AS c WHERE m.idcampaña = c.idcampaña AND m.idcampaña =".$camparr[$a]["idcampaña"] ." AND m.$dia ='1' "; 
          $query = $this->db->query($query_mensajesinf);

          $d= $query->result_array();

          for ($b=0; $b <count($d) ; $b++) { 
              $data[$b] = $d[$b];
          }
        }
        return $data;

    } 





/*Termina el modelo*/
}



