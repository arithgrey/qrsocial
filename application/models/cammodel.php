<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class cammodel extends CI_Model {

    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    
    function loadcampania($idusuario , $idcuentaactual){
          
        $this->db->where('idcuenta', $idcuentaactual);
        
        $this->db->where('idusuario', $idusuario);
        $query = $this->db->get('campaña');      
        
        return $query->result_array();

    }
    function loadlastcampania($idusuario , $idcuentaactual){

        $query = $this->db->query("select idcampaña from campaña WHERE idcuenta='".$idcuentaactual."'  ORDER BY idcampaña DESC LIMIT 1");      
        
        return $query->result_array();

    }

    function ischeckcampzona($zona , $camp ){

        $this->db->where('idzona', $zona); 
        $this->db->where('idcampaña', $camp); 
        $query = $this->db->get('campaña_zona');      
        $n = $query->num_rows();
        return $n;
        

    }

    function removecampzona( $zona , $camp ){

        $this->db->where('idzona', $zona); 
        $this->db->where('idcampaña', $camp); 
        $query = $this->db->delete('campaña_zona');
        return $query;        


    }

    function loadcampabanameid($idusuario){
        
        
        $query_list="SELECT idcampaña, nombre  FROM campaña WHERE idusuario= '".$idusuario."'";     
        $result = $this->db->query($query_list);

        return $result->result_array();
    }

    function deletecamobyid($id, $idusuario){

        $this->db->where('idcampaña', $id);
        $query_delmensaje = $this->db->delete('mensaje'); 


        if ($query_delmensaje ==  true) {



                    $this->db->where('idcampaña', $id);
                    $query_delcampzona = $this->db->delete('campaña_zona'); 
                    


                    $this->db->where('idcampaña', $id);
                    $this->db->where('idusuario', $idusuario );
                    $query_del =$this->db->delete('campaña'); 
                    
                      if ($query_del ==  true){
                          return "1";
                        }else{
                          return "Falla al eliminar en la base de datos consulte al administrador";
                        }

          
        } else {
                    return "Falla al eliminar en la base de datos consulte al administrador";
        }
        



    }

    function editcamp($id , $nombre, $descripcion ,  $estadocamp){

           $data = array(               
               'nombre' => $nombre,
               'descripcion' => $descripcion, 
               'status' => $estadocamp
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
    function getstatusnamecampbyid($id, $idusuario){
        
        $this->db->select('status');
        $this->db->where('idcampaña', $id );
        $this->db->where('idusuario', $idusuario);  
        $query = $this->db->get('campaña');
        return $query->result_array();

    }

    function getndescriptionbyid($id, $idusuario){
        
        $this->db->select('descripcion');
        $this->db->select('nombre');
        $this->db->where('idcampaña', $id );
        $this->db->where('idusuario', $idusuario);  
        $query = $this->db->get('campaña');
        return $query->result_array();

    }


    function registrocampzona($idzona , $idcamp ){

          $data = array(                 
                 'idcampaña' => $idcamp,
                 'idzona' => $idzona
            );
        $result = $this->db->insert('campaña_zona', $data); 

        return $result;
   } 

    function isnameexist($name , $idusuario ){

      
      $this->db->where('nombre', $name );
      $this->db->where('idusuario', $idusuario );  
      $query = $this->db->get('campaña');      
      $e = $query->num_rows();
      return $e;
    }

    function registrocamp($name , $descripcion, $evento , $idusuario , $cuenta){



      $datastatus="";
      if ($this->isnameexist($name , $idusuario) >0){
            $datastatus ="3";
      }else{

            $status = 1; 
            $data = array(
               'nombre' => $name ,
               'descripcion' => $descripcion ,         
               'status' => $status,
               'evento' => $evento,
               'idusuario' =>$idusuario, 
               'idcuenta' => $cuenta
              );

             $result = $this->db->insert('campaña', $data);
              if ($result == true) {
                

                $datastatus ="ok";  

              }
       }     
        return $datastatus;
        /*Termina la función*/
    }
/*Termina el modelo*/
}



