<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class mensajemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function listmensajebycuenta($idcampaña  ){

      $query = "SELECT  m.idmensaje, m.nombre,  m.status , m.social ,  m.descripcion  AS mensajedescripcion, m.urlformada , 
      m.fecharegistro, z.zonanombre AS zonanombre  from mensaje AS m, zona AS z WHERE  m.idzona= z.idzona AND m.idcampaña='".$idcampaña."' ";
      $response= $this->db->query($query);
      return $response->result_array();

    }
    function loaddatamensajebyid($idmensaje , $idcampaña ){

      $this->db->where('idmensaje', $idmensaje); 
      $this->db->where('idcampaña', $idcampaña); 
      $query = $this->db->get("mensaje");
      return $query->result_array();
    }

    function delmensajebyidandaccount($idmensaje){

        $this->db->where("idmensaje", $idmensaje);         
        $query = $this->db->delete("mensaje");
        return $query;

    }
    
    function getmensajesbyidzonascuentaid($zona ){

        
        $this->db->where( "idzona" , $zona);
        $query = $this->db->get("mensaje");
        return $query->result_array();

    } 

    function registramensajefb($iduser , $descripcion  ,$campid , $zona , $statussiempreactivo , $baseurl){

       $data = array(
         'descripcion' => $descripcion ,
         'idcampaña' => $campid ,
         'idzona ' => $zona, 
         'status' => $statussiempreactivo, 
         'social' => "F"

      );


      $result = $this->db->insert('mensaje', $data); 

      if ($result == true) {
        
          $querylast = "SELECT MAX(idmensaje) AS id FROM mensaje";
          $lastelement  = $this->db->query($querylast);
          $milastelement =  $lastelement->result_array()[0]["id"]; 
          $url =$baseurl."/index.php/appqrsocial/fbmensaje?camp=".$campid."&zona=".$zona."&mensaje=".$milastelement."&format=json";
          $datos = array(
               'status ' => $statussiempreactivo,               
               'urlformada' => $url
            );
          $this->db->where('idmensaje', $milastelement);
          $dbresponse =$this->db->update('mensaje', $datos);
          return $dbresponse;

      }else{

          return $result;  

      }
      


    }


    


    function registramensajetw($iduser , $descripcion  ,$campid , $zona , $statussiempreactivo , $baseurl){

       $data = array(
         'descripcion' => $descripcion ,
         'idcampaña' => $campid ,
         'idzona ' => $zona, 
         'status' => 1, 
         'social'=> "T"

      );


      $result = $this->db->insert('mensaje', $data); 

      if ($result == true) {
        
          $querylast = "SELECT MAX(idmensaje) AS id FROM mensaje";
          $lastelement  = $this->db->query($querylast);
          $milastelement =  $lastelement->result_array()[0]["id"]; 
          $url =$baseurl."/index.php/appqrsocial/twittermensaje?camp=".$campid."&zona=".$zona."&mensaje=".$milastelement."&format=json";
          $datos = array(
               'status ' => $statussiempreactivo,               
               'urlformada' => $url
            );
          $this->db->where('idmensaje', $milastelement);
          $dbresponse =$this->db->update('mensaje', $datos);
          return $dbresponse;

      }else{

          return $result;  

      }
      


    }





  
    function updatemensajebyidandaccount( $idmensaje , $descripcionedit ,  
              $statusmsjedit , $id_hora_inicio , $id_hora_termino ,$year  , $month , $dias ) {

      $data = array(
               'descripcion' => $descripcionedit,
               'status' => $statusmsjedit,
               'horainicio' => $id_hora_inicio, 
               'horatermino' => $id_hora_termino               
            );

      $this->db->where('idmensaje', $idmensaje);
      $result= $this->db->update('mensaje', $data);
      return $result;

    }

    function listbyusercamp($iduser , $camp ){
          
      $this->db->where('idcuenta', $idcuentaactual );
      $this->db->where('status', "1" );
      $this->db->where('idusuario', $idusuario);
      $query = $this->db->get('campaña');      
      return $query;

    }

    /*Registra con un tipo de mensaje ya sea para fb o para tw */
/*Termina el modelo*/
}



