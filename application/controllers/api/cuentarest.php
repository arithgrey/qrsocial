<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Cuentarest extends REST_Controller
{

    function index(){}



    function listcuenta_POST(){

        $this->load->model("cuentamodel");        
        $data = $this->cuentamodel->listartiposcuenta();

        $this->response($data);
	}
    function registro_POST(){

        $logged_in=$this->is_logged_in();

        if ($logged_in == 1) {

            $idusuario = $this->session->userdata('idusuario');

            $nombrecuenta = $this->input->post("nombrecuenta");
            $descripcion  = $this->input->post("descripcion");
            $tipocuenta  = $this->input->post("tipocuenta");

            $this->load->model("cuentamodel");
            $responsedb = $this->cuentamodel->registrocuenta($nombrecuenta, $descripcion, $tipocuenta, $idusuario); 

            $reporte="";
            
            if ($responsedb == true) {
                $reporte.="<a><strong>Cuenta creada con éxito</strong></a>";
            }else{
                $reporte.="<a><strong>Falla en registro de cuenta</strong></a>";
            }
            $this->response($reporte);
        }else{
            
            redirect(base_url());           

        }

    }
    
    function listarcuentas_POST(){

        $this->load->model("cuentamodel");
        $idusuario = $this->session->userdata('idusuario');                
        $listarcuentas = $this->cuentamodel->listallcuentas($idusuario);
        $this->response($listarcuentas);

    }

    function updatecuenta_POST(){

        $reporte;

        $nombre = $this->input->post("nombre-edit");
        $descripcion = $this->input->post("descripcion-edit");
        $estado = $this->input->post("estado-cuenta");
        $edit = $this->input->post("edit-cuenta");

        
        if (strlen($nombre)>1) {
          
            if ($estado == 1){

                
                $this->load->model("cuentamodel");
                $responsedb = $this->cuentamodel->updatecuentafremiunmbyid($edit, $nombre, $descripcion, $estado);
                if ($responsedb == true) {
                    $reporte ="<h4>Éxito al modificar datos de la cuenta</h4>";
                }else{
                    $reporte ="<h4>Falla al modificar datos de la cuenta</h4>";
                }

            }elseif ($estado == 2) {
                
                $this->load->model("cuentamodel");
                $responsedb = $this->cuentamodel->updatecuentafremiunmbyid($edit, $nombre, $descripcion, $estado);
                if ($responsedb == true) {
                    $reporte ="<h4>Éxito ahora su cuenta está deshabilitada</h4>";
                }else{
                    $reporte ="<h4>Falla al deshabilitar su cuenta</h4>";
                }

            }
            
        }else{
            
            if ($estado == 3){
                
                $reporte ="Confirmar para eliminar campaña";

            }else{
                $reporte ="El campo nombre aún no ha sido redactado"; 
            }

        }
        
        $this->response($reporte);

    }

    private function is_logged_in() {
    
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