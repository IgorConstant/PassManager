<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Acessos extends CI_Controller
{

    //Construtor
    public function __construct()
    {

        parent::__construct();

        //Load do Model
        $this->load->model('acessos_model');

        //Load Form_validation
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->listarclientes();
    }

    public function listarclientes()
    {

        //Titulo
        $data['titulo_site'] = 'Gerenciador de Senhas - Duetto.ag';
        $data['titulo_pagina'] = 'Acessos Clientes';
        $data['acessos'] = $this->acessos_model->listarAcessos();

        //Load dos arquivos de layout
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listAccess');
        $this->load->view('dashboard/footer');
    }


    public function adicionarcliente()
    {

        $this->form_validation->set_rules('nomeCliente', 'Nome Cliente', 'trim|required');
        $this->form_validation->set_rules('tipoAcesso', 'Tipo Acesso', 'trim|required');
        $this->form_validation->set_rules('loginCliente', 'Login Cliente', 'trim|required');
        $this->form_validation->set_rules('senhaCliente', 'Senha Cliente', 'trim|required');


        if ($this->form_validation->run() == TRUE) {

            $dados['nome_cliente'] = $this->input->post('nomeCliente');
            $dados['tipo_acesso'] = $this->input->post('tipoAcesso');
            $dados['login'] = $this->input->post('loginCliente');
            $dados['senha'] = $this->encrypt->encode($this->input->post('senhaCliente'));
            $dados['adicional'] = $this->input->post('infoAdicional');
            $dados['ativo'] = 1;

            $this->acessos_model->addAcesso($dados);

            redirect('acessos/listarclientes');
        } else {
            $data['titulo_pagina'] = 'Adicionar Cliente';

            //Load dos arquivos de layout
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addAccess');
            $this->load->view('dashboard/footer');
        }
    }

    public function editarcliente($id = NULL)
    {

        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um cliente para editar!</div>');
            redirect('acessos', 'refresh');
        }


        $query = $this->acessos_model->getAcessoID($id);



        $this->form_validation->set_rules('nomeCliente', 'Nome Cliente', 'trim|required');
        $this->form_validation->set_rules('tipoAcesso', 'Tipo Acesso', 'trim|required');
        $this->form_validation->set_rules('loginCliente', 'Login Cliente', 'trim|required');
        $this->form_validation->set_rules('senhaCliente', 'Senha Cliente', 'trim|required');
        $this->form_validation->set_rules('infoAdicional', 'Informações Adicionais', 'trim|required');


        if ($this->form_validation->run() == TRUE) {

            $inputEditarAcesso['nome_cliente'] = $this->input->post('nomeCliente');
            $inputEditarAcesso['tipo_acesso'] = $this->input->post('tipoAcesso');
            $inputEditarAcesso['login'] = $this->input->post('loginCliente');
            $inputEditarAcesso['senha'] = $this->encrypt->encode($this->input->post('senhaCliente'));
            $inputEditarAcesso['adicional'] = $this->input->post('infoAdicional');

            $this->acessos_model->atualizarAcesso($inputEditarAcesso, ['id' => $this->input->post('idAcesso')]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente atualizado com sucesso</div>');
            redirect('acessos', 'refresh');
        } else {

            $data['titulo_pagina'] = 'Editar Cliente';
            $data['query'] = $query;

            //Load dos arquivos de layout
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/editAccess');
            $this->load->view('dashboard/footer');
        }
    }


    public function clienteativo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um Acesso para ser (re)ativado</div>');
            redirect('acessos', 'refresh');
        }

        $query = $this->acessos_model->getAcessoID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, cliente não encontrado!</div>');
        }

        $this->acessos_model->atualizarAcesso(['ativo' => 1], ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente (re)ativado <i class="far fa-smile-beam"></i></div>');
        redirect('acessos', 'refresh');
    }


    public function clienteinativo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um cliente para desativar</div>');
        }

        $query = $this->acessos_model->getAcessoID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Cliente não encontrado</div>');
        }

        $this->acessos_model->atualizarAcesso(['ativo' => 0], ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente desativado com sucesso! <i class="far fa-smile-beam"></i></div>');
        redirect('acessos', 'refresh');
    }


    public function deletarcliente($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um cliente.</div>');
            redirect('acessos', 'refresh');
        }

        $query = $this->acessos_model->getAcessoID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Cliente não encontrado.</div>');
        }

        $this->acessos_model->apagarAcesso($query->id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente apagado com sucesso! <i class="far fa-smile-beam"></i></div>');
        redirect('acessos', 'refresh');
    }
}
