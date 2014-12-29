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

public function fbmensajeuserapp(){

        $fb_config = array(
            'appId' => _appId,
            'secret' =>_secret
        );
        $this->load->library('facebook', $fb_config);

        $fb_id= $this->facebook->getUser();


        if ($fb_id == 0) {
            $login=base_url()."index.php/appqrsocial/fbmensaje";
            header("location:".$login);
        }else{

                $campaña =$this->input->get("camp");
                $zona  = $this->input->get("zona");
                $mensaje  = $this->input->get("mensaje");
                    
                $data["titulo"]="Bienvenido a QR SOCIAL ";
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



                


                /*Datos del usuario*/
                $usuario =  $this->facebook->api("/me");

                


                $nombredelusuariofb = $usuario["name"];                
                $urlusuariofb= $usuario["link"]; 
                $data["nombredelusuariofb"]= $nombredelusuariofb;
                $data["urlusuariofb"]= $urlusuariofb;


                /*Publicar en Facebook*/

                try{
                        $post = $this->facebook->api( "me/feed", "POST",
                         array(
                            'message' =>$resultdata["descripcion"],
                            'name' => 'arithgrey test aplicación qrsocial',
                            'description' => 'Test de la aplicación',
                            'caption' => 'arithgrey Test Caption',
                            'source' =>  'https://github.com/arithgrey/qrsocial',
                            'picture' => '',
                            'link' => 'https://github.com/arithgrey'


                          )
                         );

                        echo "string";
                        print_r($post);

                }catch(FacebookApiException $e){
                    echo $e;
                }
                
                




                /*Terminar sessión el facebook*/
                $urlbase= base_url();
                $paramsout = array( 'next' => $urlbase );
                $urlout =$this->facebook->getLogoutUrl($paramsout); 
                $data["urlout"]= $urlout;


                $this->load->view("Template/header", $data);
                $this->load->view("facebook/publicarmensaje", $data);   
                $this->load->view("Template/footer", $data);        




        }

}


public function fbmensaje(){

    $campaña =$this->input->get("camp");
    $zona  = $this->input->get("zona");
    $mensaje  = $this->input->get("mensaje");
        

    $fb_config = array(
        'appId' => _appId,
        'secret' =>_secret
    );
        
        $this->load->library('facebook', $fb_config);
        $dinamicurl=base_url()."index.php/appqrsocial/fbmensajeuserapp/?camp=".$campaña."&zona=".$zona."&mensaje=".$mensaje."&format=json";
        
        $urLogin =  $this->facebook->getLoginUrl(
            array(
                    "scope" => "read_stream, friends_likes, publish_actions",
                    "redirect_uri" =>  $dinamicurl 
                )  
            ); 
        header("location:$urLogin");

        

}



}




