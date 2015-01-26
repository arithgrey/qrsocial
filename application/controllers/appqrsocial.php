<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('application/libraries/api_twitter/twitteroauth.php');  
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRequest.php");

require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/GraphObject.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/GraphUser.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookSDKException.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRequestException.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookSession.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/Entities/AccessToken.php");
require_once('actwitter.php');

require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRedirectLoginHelper.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookCurl.php");
require_once( "application/libraries/app_facebook/facebook-php-sdk-v4-4.0-dev/src/Facebook/HttpClients/FacebookCurlHttpClient.php");




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


    $data["titulo"]="";    

    $campaña =$this->input->get("camp");
    $zona  = $this->input->get("zona");
    $mensaje  = $this->input->get("mensaje");        
    $data["campaña"]=$campaña;
    $data["zona"] = $zona;
    $data["mensaje"] = $mensaje;
    $result = $this->appmodel->getmensajebycampzonamensaje($campaña , $zona , $mensaje);                                    
    $resultdata =  $result[0]; 
    $data["result"] = $resultdata;
    $data["idmensaje"] = $resultdata["idmensaje"];
    $data["descripcion"] =  $resultdata["descripcion"];
    $data["status"] =  $resultdata["status"];
    $data["horainicio"] = $resultdata["horainicio"];
    $data["horatermino"] =  $resultdata["horatermino"];
    $data["fechainicio"] =  $resultdata["fechainicio"];
    $data["fechatermino"] = $resultdata["fechatermino"];
    $data["idzona"] =  $resultdata["idzona"];


    $estatuspublicacion ="";

    $twitteruser =  "@arithgrey";
    $notweets = 3;
    $connection = new TwitterOAuth(_CONSUMER_KEY, _CONSUMER_SECRET, _OAUTH_TOKEN , _OAUTH_TOKEN_SECRET );     
    $content = $connection->get('account/verify_credentials');

    

    /*
    $temporary_credentials = $connection->getRequestToken(base_url());
    $redirect_url = $connection->getAuthorizeURL($temporary_credentials);
    $data["redirect_url"]=$redirect_url;
    */

    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);    
    $id= $tweets[0]->id;    
    $datosusuario = $tweets[0]->user;
    $userid=  $datosusuario->id;
    $username =  $datosusuario->name;
    $userscreen_name =  $datosusuario->screen_name;
    $userdescription = $datosusuario->description;
    $userurl = $datosusuario->url;
    $userprofile_image_url =  $datosusuario->profile_image_url;
    $userprofile_image_url_https =  $datosusuario->profile_image_url_https;
    $userfollowers = $datosusuario->followers_count;
    $usersiguiendo = $datosusuario->friends_count;
    $usertweets =   $datosusuario->statuses_count;
    
    
    //echo  "<img src='".$userprofile_image_url."'>";
    //echo  "<img src='".$userprofile_image_url_https."'>";
    

    $twitter= $connection->post('statuses/update', array('status' => $data["descripcion"]) );    
    $flag=0;

    foreach ($twitter as $key => $value){ 
        
        if ("$key" != "errors") {
               $flag=1;
        }
    }



    if ( $flag == 1 ){
        $estatuspublicacion ="Tweet publicado correctamente el: ". $twitter->created_at;
    }else{
        
        $estatuspublicacion= $twitter->errors['0']->message;
        if ($estatuspublicacion == "Status is a duplicate.") {
            $estatuspublicacion = "Su publicación ha sido efectuada con anterioridad, Gracias por utilizar QR SOCIAL"; 
        }        
    }



            
    /*
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=
        ".$twitteruser."&count=".$notweets);
     echo json_encode($tweets);
    */        

    $data["estatuspublicacion"]= $estatuspublicacion;
    $this->load->view("Template/header", $data);
    $this->load->view("twitter/publicarmensaje");
    $this->load->view("Template/footer", $data);

}



function trypostfb(){

    $this->facebook->destroySession();
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
    $this->facebook->destroySession();
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
        $data["titulo"] = "Qrsocial la plataforma de Marketing digital"; 
        $data["mensaje"]= $mensaje;
        
        $this->load->view("Template/header", $data);
        $this->load->view("social/userchoicesocial");        
        $this->load->view("Template/footer", $data);                        



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

                        
                        

                }catch(FacebookApiException $e){
                    $inferror = $e;                    
                }



                
                $urlbase= base_url()."index.php/appqrsocial/mensajeFacebookinfo/?nombredelusuariofb=$nombredelusuariofb&urlusuariofb=$urlusuariofb&inferror=$inferror";
                $paramsout = array( 'next' => $urlbase );
                $urlout =$this->facebook->getLogoutUrl($paramsout);                 
                $this->facebook->destroySession();
                
                
                
                header("location:$urlout");

                
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


                $this->load->library('facebook', $fb_config);
                $dinamicurl=base_url()."index.php/appqrsocial/postFBnextloggin/?mensaje=".$mensaje."&name=".$name
                                ."&descriptioncaption=".$descriptioncaption."&caption=".$caption."&source=".$source."&picture=".$picture."&link=".$link;
                $urLogin = $this->facebook->getLoginUrl(

                            array(
                                "scope" => "public_profile, read_stream, friends_likes, publish_actions, user_likes",
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




