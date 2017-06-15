<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function index() 
    {
        $data = array();
        $data["input_name"] = array(
            'name' => 'username',
            'class' => 'form-control',
            'value' => set_value("username"),
            'placeholder' => 'Ingresa nombre'
        );
        //'type' => 'email','type' => 'password',
        $data["input_password"] = array(
            'name' => 'password',
            'class' => 'form-control',
            'value' => set_value("password"),
            'type' => 'password',
            'placeholder' => 'Ingresa email'
        );
        
        $data["input_submit"] = array(
            'name' => 'submit',
            'class' => 'btn btn-success pull-right',
            'value' => 'Enviar formulario'
        );
        
        $this->load->view('home',$data , FALSE);
    }
    /*
    public function login() {
        $this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|min_length[2]|max_length[20]|alpha');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[12]');
    
        $this->form_validation->set_message("required", "El campo %s es requerido");
        $this->form_validation->set_message("min_length", "El campo %s no puede tener menos de %s caracteres");
        $this->form_validation->set_message("max_length", "El campo %s no puede tener mas de %s caracteres");
        $this->form_validation->set_message("alpha", "El campo %s solo acepta letras");
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        
        if($this->form_validation->run() === FALSE)
        {
            $this->index();
        }
        else
        {
            var_dump($this->input->post());
        }
    }
     */
    
    public function login() 
    {
        if($this->input->is_ajax_request())
        {
        $this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|min_length[2]|max_length[20]|alpha');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[12]');
    
        $this->form_validation->set_message("required", "El campo %s es requerido");
        $this->form_validation->set_message("min_length", "El campo %s no puede tener menos de %s caracteres");
        $this->form_validation->set_message("max_length", "El campo %s no puede tener mas de %s caracteres");
        $this->form_validation->set_message("alpha", "El campo %s solo acepta letras");
        
        if($this->form_validation->run() === FALSE)
        {
            $data = array(
                "username" => form_error("username"),
                "password" => form_error("password"),
                "res" => "error"
            );
        }
        else
        {
            $data = array(
                "res" => "success"
            );
        }
        
        }
        else 
        {
            show_404();
        }
        
        echo json_encode($data);
    }
}

