<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
require_once('application/libraries/api_twitter/twitteroauth.php');  
require_once('actwitter.php');



class Socialapi extends CI_Controller{    

    function publicamensajetwittercallback(){
            
            $twitter  = new TwitterOAuth(_CONSUMER_KEY, _CONSUMER_SECRET , $_SESSION["temporal_token"] , $_SESSION["temporal_token_secret"]);     
            $twitter_token =  $twitter->getAccessToken($_REQUEST['oauth_verifier']);
    
            $mydescriptionmsj = $this->input->get('twittermsj');
            $zona = $this->input->get('zona');

            if ($twitter->http_code == 200 ) {

          
                $_SESSION["twitter_token"] = $twitter_token["oauth_token"]; 
                $_SESSION["twitter_token_secret"] = $twitter_token["oauth_token_secret"]; 
                $_SESSION["twitter_status"]=true;
                $dinamicurl = base_url()."index.php/appqrsocial/twittermensaje?twittermsj=".$mydescriptionmsj."&zona=".$zona; 

                redirect($dinamicurl, 'location');
                //redirect("https://twitter.com/twitter_es", 'location');
                
                
            }else{
                echo "problemas al firmarse";
                $_SESSION["twitter_status"]=false;  
                        
            }

    }

}




