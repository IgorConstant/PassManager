<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }


    public function index()
    {

        //Validação do Form
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');


        if ($this->form_validation->run() == TRUE) {

            $email = $this->input->post('email');
            $senha = do_hash($this->input->post('senha'));
            $login = $this->login_model->login($email, $senha);




            if ($login) {

                //Verificar se o usuário ativo
                if ($login->ativo == 0) {
                    $this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Erro ao tentar logar, entre em contato com o Adm.</div>');
                    redirect('login');
                }

                $dadosAcesso = [
                    'logado' => TRUE,
                    'nome' => $login->nome,
                    'email' => $login->email
                ];

                $this->session->set_userdata($dadosAcesso);

                if ($this->session->userdata('logado') == TRUE) {
                    $this->session->set_flashdata('msg_login', '<div class="alert alert-success" role="alert">Seja bem Vindo!!! <strong> ' . $this->session->userdata('nome') . '</strong></div>');
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert"> Erro ao tentar logar no sistema</div>');
                    redirect('login');
                }
            }

            redirect('login');
        } else {

            $data['titulo'] = 'Login';
            $this->load->view('login/viewLogin', $data);
        }
    }

    public function sair()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
