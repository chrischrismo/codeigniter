<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {
    
     function __construct() {
        parent::__construct();
        $this->load->helper('mihelper');
        $this->load->helper('form');
        $this->load->model('codigofacilito_model');
        }
    
        function index() {
            $data['cursos'] = $this->codigofacilito_model->obtenerCursos();
            $this->load->view("codigofacilito/headers");
            $this->load->view("cursos/cursos",$data);
        }
        
    function nuevo() {
        $this->load->view("codigofacilito/headers");
        $this->load->view("cursos/formulario");
    }
    
    function recibirDatos() {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'videos' => $this->input->post('videos')
        );
        $this->codigofacilito_model->crearCurso($data);
        $this->load->view("codigofacilito/headers");
        $this->load->view("codigofacilito/bienvenido");
    }
    
    
}

?>