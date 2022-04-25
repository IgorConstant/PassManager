<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Web extends CI_Controller
{

    //Construtor
    public function __construct()
    {

        parent::__construct();

        //Load do Model
        $this->load->model('web_model');

        //Load Libraries
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->helper('security');
    }


    public function index()
    {
        $this->listarweb();
    }


    public function listarweb()
    {

        //Titulo
        $data['titulo_site'] = 'Gerenciador de Senhas - Duetto.ag';
        $data['titulo_pagina'] = 'Acessos Web';
        $data['acessosweb'] = $this->web_model->listarAcessosWeb();
        $data['data'] = $this->web_model->fetch_data();

        //Load dos arquivos de layout
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listAccessWeb');
        $this->load->view('dashboard/footer');
    }


    public function adicionarweb()
    {

        $this->form_validation->set_rules('nomeWeb', 'Nome Cliente', 'trim|required');
        $this->form_validation->set_rules('webAcesso', 'Tipo do Acesso', 'trim|required');
        $this->form_validation->set_rules('loginWeb', 'Login', 'trim|required');
        $this->form_validation->set_rules('senhaWeb', 'Senha', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $dados['nome_cliente'] = $this->input->post('nomeWeb');
            $dados['tipo_acesso'] = $this->input->post('webAcesso');
            $dados['login'] = $this->input->post('loginWeb');
            $dados['senha'] = $this->encrypt->encode($this->input->post('senhaWeb'));
            $dados['adicional'] = $this->input->post('infoAdicionalWeb');
            $dados['ativo'] = 1;

            $this->web_model->addAcessoWeb($dados);

            redirect('web/listarweb');
        } else {


            $data['titulo_pagina'] = 'Adicionar Web';

            //Load dos arquivos de layout
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addWeb');
            $this->load->view('dashboard/footer');
        }
    }



    public function editarweb($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um acesso para editar.</div>');
            redirect('web', 'refresh');
        }

        $query = $this->web_model->getAcessoWebID($id);


        $this->form_validation->set_rules('nomeWeb', 'Nome Cliente', 'trim|required');
        $this->form_validation->set_rules('webAcesso', 'Tipo Acesso', 'trim|required');
        $this->form_validation->set_rules('loginWeb', 'Login', 'trim|required');
        $this->form_validation->set_rules('senhaWeb', 'Senha', 'trim|required');
        $this->form_validation->set_rules('infoAdicionalWeb', 'Informações Adicionais', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $inputEditarWeb['nome_cliente'] = $this->input->post('nomeWeb');
            $inputEditarWeb['tipo_acesso'] = $this->input->post('webAcesso');
            $inputEditarWeb['login'] = $this->input->post('loginWeb');
            $inputEditarWeb['senha'] = $this->encrypt->encode($this->input->post('senhaWeb'));
            $inputEditarWeb['adicional'] = $this->input->post('infoAdicionalWeb');

            $this->web_model->atualizarAcessoWeb($inputEditarWeb, ['id' => $this->input->post('idWeb')]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Acesso Web atualizado com sucesso!</div>');
            redirect('web', 'refresh');
        } else {

            $data['titulo_pagina'] = 'Editar Web';
            $data['query'] = $query;

            //Load dos arquivos de layout
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/editWeb');
            $this->load->view('dashboard/footer');
        }
    }


    public function webativo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um Acesso para ser (re)ativado</div>');
            redirect('web', 'refresh');
        }

        $query = $this->web_model->getAcessoWebID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, cliente não encontrado!</div>');
        }

        $this->web_model->atualizarAcessoWeb(['ativo' => 1], ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente (re)ativado <i class="far fa-smile-beam"></i></div>');
        redirect('web', 'refresh');
    }

    public function webinativo($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um cliente para desativar</div>');
        }

        $query = $this->web_model->getAcessoWebID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Cliente não encontrado</div>');
        }

        $this->web_model->atualizarAcessoWeb(['ativo' => 0], ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente desativado com sucesso! <i class="far fa-smile-beam"></i></div>');
        redirect('web', 'refresh');
    }

    public function deletarweb($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione um cliente.</div>');
            redirect('web', 'refresh');
        }

        $query = $this->web_model->getAcessoWebID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Cliente não encontrado.</div>');
        }

        $this->web_model->apagarAcessoWeb($query->id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente apagado com sucesso! <i class="far fa-smile-beam"></i></div>');
        redirect('web', 'refresh');
    }
}
