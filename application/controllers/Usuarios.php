<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('usuarios_model');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['titulo_site'] = 'Gerenciador de Senhas - Duetto.ag';
        $data['titulo_pagina'] = 'Usuários do Sistema';

        $data['usuarios'] = $this->usuarios_model->getUsuarios();

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listUser');
        $this->load->view('dashboard/footer');
    }


    public function adicionarusuarios()
    {
        $this->form_validation->set_rules('nome', 'NOME', 'required', array('required' => 'O Campo nome é obrigatório'));
        $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email', array('required' => 'O Campo E-mail é obrigatório', 'valid_email' => 'Digite um E-mail válido'));
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[12]', array('required' => 'Você deve digitar uma senha!', 'min-length' => 'A Senha deve ter no minimo 6 letras ou números', 'max-length' => 'Senha deve ter no máximo 12 letras ou números'));
        $this->form_validation->set_rules('senha2', 'Repita Senha', 'required|matches[senha]', array('required' => 'Você deve preencher o Campo Repita sua Senha', 'matches' => 'Senha não confere, tente novamente'));


        if ($this->form_validation->run() == TRUE) {
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = do_hash($this->input->post('senha'), 'sha1');
            $dados['ativo'] = 1;

            $this->usuarios_model->doInsert($dados);

            redirect('usuarios', 'refresh');
        } else {

            $data['titulo_site'] = 'Admin';
            $data['titulo_pagina'] = 'Adicionar Usuários';

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addUser');
            $this->load->view('dashboard/footer');
        }
    }

    public function editarusuarios($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar uma ID de usuário.</div>');
            redirect('usuarios');
        }

        $query = $this->usuarios_model->getUserbyID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
            redirect('usuarios');
        }

        //Required e Min_lenght (Nome)
        $this->form_validation->set_rules('nome', 'NOME', 'required', array('required' => 'O Campo nome é obrigatório'));


        //Required e Valid_email (Email)
        $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email', array('required' => 'O Campo E-mail é obrigatório', 'valid_email' => 'Digite um E-mail válido'));


        if ($this->form_validation->run() == TRUE) {

            //Salvar no BD
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] =  do_hash($this->input->post('senha'), 'sha1');


            $this->usuarios_model->doUpdate($dados, ['id' => $this->input->post('id')]);
            redirect('usuarios', 'refresh');
        } else {

            $data['titulo_site'] = 'Gerenciador de Senhas Duetto';
            $data['titulo_pagina'] = 'Editar Usuários';
            $data['query'] = $query;

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/editUser');
            $this->load->view('dashboard/footer');
        }
    }


    public function deletarusuarios($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar uma ID de usuário.</div>');
            redirect('usuarios');
        }

        //Verifica se o ID existe
        $query = $this->usuarios_model->getUserbyID($id);


        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
            redirect('usuarios');
        }

        //Verificação de Usuário Logado
        if ($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, não é permitido apagar o usuário logado no sistema.</div>');
            redirect('usuarios');
        }

        //Apaga o usuário
        if ($this->usuarios_model->doDelete(['id' => $query->id])) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário apagado com sucesso :)</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Erro ao apagar :(</div>');
        }

        redirect('usuarios');
    }


    //Status do usuário
    public function usuarioativo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar uma ID de usuários.</div>');
            redirect('usuarios');
        }

        $query = $this->usuarios_model->getUserbyID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
            redirect('usuarios');
        }

        //Verificação de Usuário Logado
        if ($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, não é possível mudar o status de um usuário logado.</div>');
            redirect('usuarios');
        }


        //Mudar Status
        $dados['ativo'] = 1;
        $this->usuarios_model->doUpdate($dados, ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário foi ativado com sucesso :)</div>');
        redirect('usuarios');
    }



    public function usuarioinativo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, você deve passar uma ID de usuários.</div>');
            redirect('usuarios');
        }

        $query = $this->usuarios_model->getUserbyID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, usuário não encontrado.</div>');
            redirect('usuarios');
        }


        //Verificação de Usuário Logado
        if ($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, não é permitido mudar o status do usuário logado.</div>');
            redirect('usuarios');
        }

        //Mudar Status
        $dados['ativo'] = 0;
        $this->usuarios_model->doUpdate($dados, ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário Desativado com sucesso :)</div>');
        redirect('usuarios');
    }
}
