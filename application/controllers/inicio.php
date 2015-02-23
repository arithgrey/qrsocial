<?php
class Inicio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function sendMailGmail()    
    {
        date_default_timezone_set('Africa/Lagos');
        //cargamos la libreria email de ci
        $this->load->library('email');

        $this->email->from('arithgrey@gmail.com', 'arithgrey');
        $this->email->to('jmedrano@factor.mx'); 
        //$this->email->cc('another@another-example.com'); 
        //$this->email->bcc('them@their-example.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

        $this->email->send();

        echo $this->email->print_debugger();


    }
 
    public function sendMailYahoo()
    {
        //cargamos la libreria email de ci
        $this->load->library("email");
 
        //configuracion para yahoo
        $configYahoo = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mail.yahoo.com',
            'smtp_port' => 587,
            'smtp_crypto' => 'tls',
            'smtp_user' => 'emaildeyahoo',
            'smtp_pass' => 'password',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ); 
 
        //cargamos la configuración para enviar con yahoo
        $this->email->initialize($configYahoo);
 
        $this->email->from('correo que envia los emails');//correo de yahoo o no funcionará
        $this->email->to("correo que recibe el email");
        $this->email->subject('Bienvenido/a a uno-de-piera.com');
        $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de yahoo</h2><hr><br> Bienvenido al blog');
        $this->email->send();
        //con esto podemos ver el resultado
        var_dump($this->email->print_debugger());
 
    }
}