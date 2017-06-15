<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('mihelper');
        $this->load->helper('form');
        $this->load->model('codigofacilito_model');
        }
    
    function index() {
        $this->load->library('menu', array('Inicio','Contacto','Cursos'));
        $data['mi_menu'] = $this->menu->construirMenu();
        $this->load->view("codigofacilito/headers");
        $this->load->view("codigofacilito/bienvenido",$data);
    }
    
    function holamundo(){
        $this->load->view("codigofacilito/headers");
        $this->load->view("codigofacilito/bienvenido");
    }
    
    function sendMail() {
        
        
        $this->load->library('email');
        $this->email->from('chrischrismo2@gmail.com', 'chrismo granados');
        $this->email->to('chrischrismo@hotmail.com');
        
        $this->email->subject('Probando codeigniter');
        $this->email->message('Probando... Probando...');
        
        if (!$this->email->send()) {
           
            $this->email->print_debugger();
        }
        else {
            
            $this->load->view("codigofacilito/headers");
            $this->load->view("codigofacilito/bienvenido");
        }
    }
}

?>