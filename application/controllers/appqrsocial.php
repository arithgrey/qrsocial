<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once('application/libraries/api_twitter/twitteroauth.php');  
require_once('actwitter.php');

/*
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRequest.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/GraphObject.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/GraphUser.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookSDKException.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRequestException.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookSession.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/Entities/AccessToken.php");

require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRedirectLoginHelper.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookCurl.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookCurlHttpClient.php");
*/
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookSession;
use Facebook\GraphObject;
use Facebook\FacebookSDKException;
use Facebook\FacebookRedirectLoginHelper;


class Appqrsocial extends CI_Controller
{    
//http://www.maestrosdelweb.com/twitter-autenticacion-oauth-api-login/
//https://gueroverde.wordpress.com/2012/11/12/como-obtener-datos-de-usuario-desde-twitter-con-php/    
  public function __construct()    
  {        
     parent::__construct();        
     $this->load->model('appmodel');

    $fb_config = array(
        'appId' => _appId,
        'secret' =>_secret
    );            

    
    $this->load->library('facebook', $fb_config);  
  }

function twittermensaje(){
    
    $mydescriptionmsj = $this->input->get('twittermsj');
    
    if (!$_SESSION["twitter_status"]) {
    
    $twitter  = new TwitterOAuth(_CONSUMER_KEY, _CONSUMER_SECRET);           
    
    $dinamic_url_to_post = base_url()."index.php/socialapi/publicamensajetwittercallback/?twittermsj=".$mydescriptionmsj;
    $twitter_temporal =  $twitter->getRequestToken($dinamic_url_to_post);
    $_SESSION["temporal_token"] = $twitter_temporal['oauth_token'];
    $_SESSION["temporal_token_secret"] = $twitter_temporal['oauth_token_secret'];
    $twitter_url = $twitter->getAuthorizeURL($twitter_temporal['oauth_token']);        
    
    header("location:".$twitter_url);

    }else{

        $twitter  = new TwitterOAuth(_CONSUMER_KEY, _CONSUMER_SECRET , $_SESSION["twitter_token"] ,$_SESSION["twitter_token_secret"] );     
        $credenciales  = $twitter->get('account/verify_credentials');         
        $twitterstatus = $twitter->post('statuses/update', array('status' => $mydescriptionmsj) );     
        //var_dump($twitterstatus);
        $data["titulo"]="";
        $this->load->view("Template/header", $data);
        $this->load->view("twitter/publicarmensaje");
        $this->load->view("Template/footer", $data);
              

    }
 
}


function trypostfb(){

    
    $mensaje = $this->input->get("mensaje");
    $fb_id = $this->facebook->getUser();

            if($fb_id == 0){                            

                $login = base_url()."index.php/appqrsocial/fbmensaje?mensaje=".$mensaje;
                header("location:".$login);

            }else{

                $dinamicurl=base_url()."index.php/appqrsocial/postFBnextloggin/?mensaje=".$mensaje;   
                header("location:".$dinamicurl);                                                    
                
    }     
    
    

}


public function zonaatt(){

    date_default_timezone_set('America/New_York');
    
    $diahoynum = date("N");
    $diaL = $this->getdayfunction($diahoynum);
    $horaactual =  date("H");    
    $idzona = $this->input->get("idzona");
    $listmensajes = $this->appmodel->getmensajesbyidzonascuentaid($idzona , $diaL);
    
    
    
    $fb_id = $this->facebook->getUser();
    $flag=1;


    for ($a= 0; $a < count($listmensajes); $a++){ 
        $banderadisponible = $this->verificahorario( $listmensajes[$a]["horainicio"] , $listmensajes[$a]["horatermino"] , $horaactual );            
        if ($banderadisponible == 1){

            $flag=0;
            if ($listmensajes[$a]["social"]  ==  "F") {
                
                            $mensaje = $listmensajes[$a]["descripcion"];
                            $name= $listmensajes[$a]["name"];
                            $descriptioncaption= $listmensajes[$a]["descriptioncaption"];
                            $caption =  $listmensajes[$a]["caption"];
                            $source =  $listmensajes[$a]["source"];
                            $picture= $listmensajes[$a]["picture"];
                            $link =  $listmensajes[$a]["link"];

                           if($fb_id == 0){                            

                                $login = base_url()."index.php/appqrsocial/fbmensaje?mensaje=".$mensaje."&name=".$name
                                ."&descriptioncaption=".$descriptioncaption."&caption=".$caption."&source=".$source."&picture=".$picture."&link=".$link;
                                header("location:".$login);

                                }else{
                                $dinamicurl=base_url()."index.php/appqrsocial/postFBnextloggin/?mensaje=".$mensaje."&name=".$name
                                ."&descriptioncaption=".$descriptioncaption."&caption=".$caption."&source=".$source."&picture=".$picture."&link=".$link;   
                                header("location:".$dinamicurl);                                                    
                
                            }     
            }else{
                /*Publicar en Twitter*/
                
                $mensaje = $listmensajes[$a]["descripcion"];                                
                $dinamic_url_tw = base_url()."index.php/appqrsocial/twittermensaje/?twittermsj=".$mensaje;
                header("location:".$dinamic_url_tw);

            }

        }
                
    }




    if ($flag == 1) {
        
        $mensaje = $this->publicamensaje_fbdefault($idzona);
        $next = base_url('index.php/appqrsocial/socialuser/?mensaje='.$mensaje); 
        header("location:$next");
           
    }


}


function socialuser(){

        $mensaje = $this->input->get("mensaje");
        $data["titulo"] = ""; 
        $data["mensaje"]= $mensaje;
        
        $this->load->view("Template/header", $data);
        $this->load->view("social/userchoicesocial");        
        
}

function postFBnextloggin(){


        $mensaje = $this->input->get("mensaje");
        $name = $this->input->get("name");
        $descriptioncaption = $this->input->get("descriptioncaption");
        $caption = $this->input->get("caption");
        $source = $this->input->get("source");
        $picture  =  $this->input->get("picture");        
        $link  = $this->input->get("link");


        /*Aquí la información del usuario de Facebook*/
        $usuario =  $this->facebook->api("/me");

        

        $nombredelusuariofb = $usuario["name"];                
        $urlusuariofb= $usuario["link"]; 
        $bio = $usuario["bio"]; 
        $first_name = $usuario["first_name"];
        $last_name = $usuario["last_name"];


        $inferror= "";

                try{
                        $post = $this->facebook->api( "me/feed", "POST",
                         array(                            
                            'message' =>$mensaje,
                            'name' => $name,
                            'description' => $descriptioncaption,
                            'caption' => $caption,
                            'source' =>  $source,
                            'picture' => $picture,
                            'link' => $link


                          )
                         );

                        
                       // print_r($post)."<br>";
                        

                }catch(FacebookApiException $e){
                    $inferror = $e;                    
                    //print_r($inferror);
                }



                
                $urlbase= base_url()."index.php/appqrsocial/mensajeFacebookinfo/?nombredelusuariofb=$nombredelusuariofb&urlusuariofb=$urlusuariofb&inferror=$inferror";
                $paramsout = array( 'next' => $urlbase );
                $urlout =$this->facebook->getLogoutUrl($paramsout);                 
                $this->facebook->destroySession();
                
                //header("location:". $urlbase);
                header("location:". $urlbase);
                
                
                

                
}

function mensajeFacebookinfo(){
    
    $urlusuariofb = $this->input->get("urlusuariofb");
    $nombredelusuariofb = $this->input->get("nombredelusuariofb");
    $inferror =  $this->input->get("inferror");

    $data["nombredelusuariofb"] =$nombredelusuariofb; 
    $data["urlusuariofb"]=$urlusuariofb;
    $data["inferror"]= $inferror;    
    $data["titulo"] = "Qrsocial la plataforma de Marketing digital"; 

    $this->load->view("Template/header", $data);
    $this->load->view("facebook/publicarmensaje", $data);   
    $this->load->view("Template/footer", $data);                        


}


function fbmensaje(){                    

        $mensaje = $this->input->get("mensaje");
        $name = $this->input->get("name");
        $descriptioncaption = $this->input->get("descriptioncaption");
        $caption = $this->input->get("caption");
        $source = $this->input->get("source");
        $picture  =  $this->input->get("picture");
        $link  = $this->input->get("link");


                $dinamicurl=base_url()."index.php/appqrsocial/postFBnextloggin/?mensaje=".$mensaje."&name=".$name
                                ."&descriptioncaption=".$descriptioncaption."&caption=".$caption."&source=".$source."&picture=".$picture."&link=".$link;
                $urLogin = $this->facebook->getLoginUrl(

                            array(
                                "scope"=> 'email,publish_stream,publish_actions,user_likes',
                                "redirect_uri" => $dinamicurl

                            )
            );
            header("location:$urLogin");
}







function publicamensaje_fbdefault($idzona){

    $this->load->model("zonasmodel");
    $zona = $this->zonasmodel->getmensajedefault($idzona);    
    $mensaje =  $zona[0]["mensajedefault"];
    return $mensaje;

}





function verificahorario($inicio , $termino , $horaactual){
    $banderadisponible = 0;

        if ( $inicio <=  $termino ){

            for ($a= $inicio; $a <= $termino; $a++) {                 
                if ($horaactual == $a) {
                    $banderadisponible =1;    
                }
            }
            
        }else{


            for ($i=0; $i <= $termino; $i++) { 
                
                if ($horaactual == $i) {                    
                    $banderadisponible =1;       
                }
            }


    }
    return $banderadisponible;
}

function getdayfunction($diahoynum){
    switch ($diahoynum) {
                case 1:
                    return "L";            
                    break;
                case 2:
                    
                    return "M";    
                    break;    

                case 3:
                    return "MI";        
                    break;    

                case 4:
                    return "J";        
                    break;    
                case 5:
                    return "V";        
                    break;    

                case 6:
                    return "S";        
                    break;        

                case 7:
                    return "D";        
                    break;        
                
                default:
                    
                    break;
            } 

}

}




