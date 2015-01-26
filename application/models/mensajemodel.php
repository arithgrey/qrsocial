<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class mensajemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function listmensajebycuenta($idcampaña  ){

      $query = "SELECT  idmensaje ,  status , social , descripcion  AS mensajedescripcion, 
         fecharegistro , L , M , MI , J , V, S, D , horainicio , horatermino       from mensaje AS m  WHERE   m.idcampaña='".$idcampaña."' ";
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

        
        $query_getcamp =   "select idcampaña from   campaña_zona where idzona=".$zona; 
        $query = $this->db->query($query_getcamp);
        //
        $camparr = $query->result_array();
        
        for ($a=0; $a < count($camparr); $a++) { 
          

          $query_mensajesinf =   "select m.idmensaje , m.descripcion , m.status, m.social , c.idcampaña , c.nombre from mensaje AS m , campaña AS c WHERE m.idcampaña = c.idcampaña AND m.idcampaña =".$camparr[$a]["idcampaña"]; 
          $query = $this->db->query($query_mensajesinf);

          $d= $query->result_array();

          for ($b=0; $b <count($d) ; $b++) { 
              $data[$b] = $d[$b];
          }
        }
        return $data;

    } 



             
    function registramensajefb($iduser , $descripcion  ,$campid   , $name , $descriptioncaption , $caption  
      , $source , $picture , $link , $hinicio , $htermino , $lunes , $martes , $miercoles , $jueves , $viernes , $sabado , $domingo) { 



       $data = array(
         'descripcion' => $descripcion ,
         'idcampaña' => $campid ,                  
         'social' => "F" , 
         'name' => "@arithgrey", 
         'descriptioncaption' => "qrsocial", 
         'caption' => "",
         'source' => "", 
         'picture' => "", 
         'link'=> "", 
         'horainicio' => $hinicio , 
         'horatermino' => $htermino , 
         'L' => $lunes , 
         'M' => $martes , 
         'MI' => $miercoles , 
         'J' => $jueves , 
         'V' => $viernes , 
         'S' => $sabado , 
         'D' => $domingo

      );


      $result = $this->db->insert('mensaje', $data); 
      return $result;  

    
      


    }


    
             

    function registramensajetw($iduser , $descripcion  ,$campid , $baseurl){

       $data = array(
         'descripcion' => $descripcion ,
         'idcampaña' => $campid ,         
         'status' => 1, 
         'social'=> "T"

      );


      $result = $this->db->insert('mensaje', $data); 

      if ($result == true) {
        
          $querylast = "SELECT MAX(idmensaje) AS id FROM mensaje";
          $lastelement  = $this->db->query($querylast);
          $milastelement =  $lastelement->result_array()[0]["id"]; 
          $url =$baseurl."/index.php/appqrsocial/twittermensaje?camp=".$campid."&mensaje=".$milastelement."&format=json";
          $datos = array(
               'status ' => "1",               
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
              $name , $descriptioncaption , $caption , $source , $picture ,
               $link , $lc , $mc , $mic , $jc , $vc , $sc , $dc ,  $hora_inicioconfig ,  $hora_terminoconfig ) {

      $data = array(
               'descripcion' => $descripcionedit,               
               'name' => $name, 
               'descriptioncaption' => $descriptioncaption, 
               'caption' => $caption, 
               'source' => $source, 
               'picture' => $picture, 
               'link' => $link , 
               'L' => $lc , 
               'M' => $mc , 
               'MI' => $mic , 
               'J' => $jc , 
               'V' => $vc , 
               'S' => $sc , 
               'D' => $dc , 
               'horainicio' => $hora_inicioconfig ,
               'horatermino' => $hora_terminoconfig

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



