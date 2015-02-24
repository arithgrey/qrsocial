<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zonasqr extends CI_Controller {

	function __construct()
	{
		parent::__construct();
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

	
	/*Inicio zonas qr social*/
	function principal(){

		$logged_in=$this->is_logged_in();
		if ($logged_in == 1) {

			$data['titulo']="Zonas QR Social";
			$username = $this->session->userdata('username');	
			$data["username"]=$username;
			$data["homesess"]=base_url('/index.php/principal/homeuser');
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');
			$data["nombrecuentaact"] = $nombrecuentaact;
		
			$this->load->view("Template/headersession", $data);
			$this->load->view("zonas/principalzqr");
			$this->load->view("Template/footer", $data);

		}else{
			
			redirect(base_url());			
		}

	}



	
	function imprimeqrsocial(){

		$logged_in=$this->is_logged_in();
		if ($logged_in == 1) {
			
			$imgzona= $this->input->get("zona");
			$data["imgzona"] =  "https://api.qrserver.com/v1/create-qr-code/?size=350x350&data=".$imgzona;			
			$this->load->view("zonas/printqr.php", $data);


		}else{
			
			redirect(base_url());			
		}

	}



	function zonaedit(){

		$logged_in=$this->is_logged_in();
		if ($logged_in == 1) {


			date_default_timezone_set('America/New_York');
		    $diahoynum = date("N");
		    $diaL = $this->getdayfunction($diahoynum);
		    


			$idzona = $this->input->get("zona");
			
			$data["diaL"] = $diaL;
			$data['titulo']="Zonas QR Social, detalles";
			$username = $this->session->userdata('username');	
			$data["username"]=$username;
			$data["homesess"]=base_url('/index.php/principal/homeuser');
			$nombrecuentaact  = $this->session->userdata('nombrecuentaact');			
			$data["nombrecuentaact"] = $nombrecuentaact;
			$data["zonaqredit"]= $idzona;
		
			$this->load->view("Template/headersession", $data);
			$this->load->view("zonas/editazonaqr");
			$this->load->view("Template/footer", $data);

		}else{
			
			redirect(base_url());			
		}

	}

	private function is_logged_in(){
	
		$is_logged_in = $this->session->userdata('logged_in');
		
		if(!isset($is_logged_in) || $is_logged_in != true) {
			
			return false;
		}
		return true;
	}	

	function logout(){
	
		$this->session->sess_destroy();
		redirect(base_url());
	}

	

}







