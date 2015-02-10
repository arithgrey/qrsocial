<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class zonasmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function getzonabycuenta($cuenta){
        
        $query ="select z.idzona , z.zonanombre, z.descripcion, 
          z.status  , z.fecharegistro , z.idcuenta, z.mensajedefault  ,
           z.urlmensajedef, T.img_name , T.nombre  from zona AS z , Tipo_zona AS T , 
           cuenta WHERE z.idTipo_zona = T.idTipo_zona AND  z.idcuenta = '".$cuenta."' 
           AND z.idcuenta = cuenta.idcuenta 
           ";


        $result = $this->db->query($query);

        return $result ->result_array();

    }



    function getzonabycuentazonasasig($cuenta , $idcampania){

        $query ="SELECT z.idzona, z.urlmensajedef , z.zonanombre , 
        z.descripcion , z.status, z.fecharegistro , z.mensajedefault ,  z.idTipo_zona , 
         T.nombre FROM zona AS z , Tipo_zona AS T , cuenta  WHERE z.idcuenta = '".$cuenta."' AND  cuenta.idcuenta = z.idcuenta 
         AND z.idTipo_zona=T.idTipo_zona
           ";


        $lista = "";   
        $result = $this->db->query($query);        
        $b=0;
        $data;

        foreach ($result ->result_array() as $row)
        {


          $iszonacamp = $this->iszonacamp( $idcampania, $row['idzona']); 

          $data[$b] = array(
            'idzona' =>  $row['idzona'] , 
            'urlmensajedef' => $row['urlmensajedef'] , 
            'descripcion'=> $row['descripcion'],
            'status' => $row['status'] , 
            'fecharegistro' => $row['fecharegistro'], 
            'mensajedefault' => $row['mensajedefault'], 
            'idTipo_zona'=>$row['idTipo_zona'], 
            'zonanombre' => $row['nombre'], 
            'iszonacamp' => $iszonacamp

          );
           
           $b++;
           
           
        }

        
        return $data;

    }

    function getidtipozona($idzona){

        $query ="SELECT idTipo_zona  FROM zona WHERE idzona = '".$idzona."' ";
        $result  =$this->db->query($query);
        return $result -> result_array();


    }

    function getzonacamp($idcampania){
        $query ="select  idzona  from campaña_zona where idcampaña='".$idcampania."'";
        $result = $this->db->query($query);
        return $result ->result_array();        
    }

    function getelementbycuentazona( $cuenta , $idzona){

        $query ="SELECT z.idzona ,z.zonanombre, z.descripcion, z.fecharegistro , z.mensajedefault , 
        z.idTipo_zona , t.nombre , t.idTipo_zona as tipo FROM zona AS z , Tipo_zona AS t  WHERE   
         z.idzona='".$idzona."' AND z.idcuenta= '".$cuenta."'";

        $result  =$this->db->query($query);
        return $result->result_array();


    }

    function updatezonaqr( $idzona , $zonaname , $descipcionzona , $tipozona , $mensajedefaultedit , $idcuenta){

        $data = array(
               'zonanombre' => $zonaname,
               'descripcion' => $descipcionzona,
               'idTipo_zona' => $tipozona,               
               'mensajedefault' => $mensajedefaultedit
            );
        
        $this->db->where('idzona', $idzona);
        //$this->db->where('idcuenta', $idcuenta);
        $resultquery = $this->db->update('zona', $data); 
        return $resultquery;



    }

    function updatetipozonabyidzona( $idzona , $tipo_zona){

        $data = array('idTipo_zona' => $tipo_zona );
        $this->db->where('idzona', $idzona);  
        $resultquery = $this->db->update('zona', $data); 
        return $resultquery;


    }


    function registrazona( $zona_name , $descripcion_zona , $tipo_zona , $mensajedefault , $cuenta , $base_url){

        //$urlmensaje =  $base_url."/index.php/appqrsocial/zona?zonaid=";

      $data = array(        
        'zonanombre' => $zona_name ,
        'descripcion' => $descripcion_zona ,        
        'status' =>'1' , 
        'idTipo_zona' =>  $tipo_zona,         
        'idcuenta' => $cuenta , 
        'mensajedefault' => $mensajedefault        
        );

      $result = $this->db->insert('zona', $data);       
      
        if ($result == true) {
        
          $querylast = "SELECT MAX(idzona) AS id FROM zona";
          $lastelement  = $this->db->query($querylast);
          //$milastelement =  $lastelement->result_array()[0]["id"]; 

          $milastelement=0;

        foreach ($lastelement ->result_array() as $row){

            $milastelement = $row["id"];
        }  
  
  /*          
        foreach ($result ->result_array() as $row)
        {
        
        }  
*/
          $url = $base_url."index.php/appqrsocial/zonaatt?idzona=".$milastelement."&format=json/";
          
          $datos = array(             
               'zonanombre' => $zona_name ,      
               'urlmensajedef' => $url
          );
          $this->db->where('idzona', $milastelement);
          $dbresponse =$this->db->update('zona', $datos);

          return $dbresponse;

      }else{

          return $result;  

      }




    }


    

    function getzonabycuentaandtipo($cuenta , $tipozona){
        

        $this->db->where('idcuenta', $cuenta);
        $this->db->where('idTipo_zona', $tipozona);        
        $query = $this->db->get('zona');              


        return $query->result_array();
    }
     

    function getzonacuentaall($cuenta){
        

        $this->db->where('idcuenta', $cuenta);        
        $query = $this->db->get('zona');              
        return $query->result_array();
    }   
    
    function loadtipozonas(){
        

        //$query = $this->db->get('Tipo_zona');              
        $query = $this->db->query('SELECT * FROM Tipo_zona');                      
        return $query->result_array();


    }


    function getmensajedefault($idzona){
        
        $this->db->where('idzona', $idzona);        
        $query = $this->db->get('zona');              
        return $query->result_array();

    }

    function iszonacamp($idcamp , $idzona){

        $this->db->where('idzona', $idzona);        
        $this->db->where('idcampaña', $idcamp);        
        $query = $this->db->get('campaña_zona');              
        return $query->num_rows();

    }


    function numerozonasbycuenta($cuenta){
                  
        $query ="select z.idzona , z.zonanombre, z.descripcion, 
          z.status  , z.fecharegistro , z.idcuenta, z.mensajedefault  ,
           z.urlmensajedef, T.img_name , T.nombre  from zona AS z , Tipo_zona AS T , 
           cuenta WHERE z.idTipo_zona = T.idTipo_zona AND  z.idcuenta = '".$cuenta."' 
           AND z.idcuenta = cuenta.idcuenta 
           ";

          $result = $this->db->query($query);
          return $result ->num_rows();
    }



/*Termina el modelo*/
}



