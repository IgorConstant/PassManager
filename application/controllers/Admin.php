<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logado') == TRUE) {

            $this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Você precisa realizar o login!</div>');
            redirect('login');
        }

        $this->load->model('usuarios_model');
        $this->load->helper('security');
    }


    public function index()
    {
        $data['titulo_pagina'] = 'Admin';


        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/main');
        $this->load->view('dashboard/footer');
    }
}
