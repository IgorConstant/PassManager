<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Clientes extends CI_Controller
{

    //Construtor
    public function __construct()
    {

        parent::__construct();

        //Load do Model
        $this->load->model('clientes_model');

        //Load Form_validation
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $this->listarficha();
    }

    public function listarficha()
    {

        //Titulo
        $data['titulo_site'] = 'Gerenciador de Senhas - Duetto.ag';
        $data['titulo_pagina'] = 'Ficha Clientes';
        $data['clientes'] = $this->clientes_model->listarFichas();

        //Load dos arquivos de layout
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/listClient');
        $this->load->view('dashboard/footer');
    }


    public function adicionarficha()
    {
        $this->form_validation->set_rules('nomeUnidade', 'Nome Unidade', 'trim|required');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $dados['nomeUnidade'] = $this->input->post('nomeUnidade');
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['dataInauguracao'] = $this->input->post('dataInauguracao');
            $dados['whatsapp'] = $this->input->post('whatsapp');
            $dados['telFixo '] = $this->input->post('telFixo');
            $dados['funcSeg1'] = $this->input->post('funcSeg1');
            $dados['funcSeg2'] = $this->input->post('funcSeg2');
            $dados['funcTer1'] = $this->input->post('funcTer1');
            $dados['funcTer2'] = $this->input->post('funcTer2');
            $dados['funcQua1'] = $this->input->post('funcQua1');
            $dados['funcQua2'] = $this->input->post('funcQua2');
            $dados['funcQui1'] = $this->input->post('funcQui1');
            $dados['funcQui2'] = $this->input->post('funcQui2');
            $dados['funcSex1'] = $this->input->post('funcSex1');
            $dados['funcSex2'] = $this->input->post('funcSex2');
            $dados['funcSab1'] = $this->input->post('funcSab1');
            $dados['funcSab2'] = $this->input->post('funcSab2');
            $dados['funcDom1'] = $this->input->post('funcDom1');
            $dados['funcDom2'] = $this->input->post('funcDom2');
            $dados['cep'] = $this->input->post('cep');
            $dados['logradouro'] = $this->input->post('logradouro');
            $dados['numero'] = $this->input->post('numero');
            $dados['complemento'] = $this->input->post('complemento');
            $dados['bairro'] = $this->input->post('bairro');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['uf'] = $this->input->post('uf');
            $dados['igUsuario'] = $this->input->post('igUsuario');
            $dados['igSenha'] = $this->encrypt->encode($this->input->post('igSenha'));
            $dados['fbPagina'] = $this->input->post('fbPagina');
            $dados['fbUrl'] = $this->input->post('fbUrl');
            $dados['IdConta'] = $this->input->post('IdConta');
            $dados['ytUsuario'] = $this->input->post('ytUsuario');
            $dados['ytSenha'] = $this->encrypt->encode($this->input->post('ytSenha'));
            $dados['ttUsuario'] = $this->input->post('ttUsuario');
            $dados['ttSenha'] = $this->encrypt->encode($this->input->post('ttSenha'));
            $dados['pinUsuario'] = $this->input->post('pinUsuario');
            $dados['pinSenha'] = $this->encrypt->encode($this->input->post('pinSenha'));
            $dados['acessoMateriais'] = $this->input->post('acessoMateriais');
            $dados['acessoSite'] = $this->input->post('acessoSite');
            $dados['formaPagamento'] = $this->input->post('formaPagamento');
            $dados['investimento'] = $this->input->post('investimento');
            $dados['ativo'] = 1;

            $this->clientes_model->addFichas($dados);
            $this->email->from("webmaster.duettoag@gmail.com", 'Notificação de Cadastro');
            $this->email->subject("Notificação de Cadastro - Duetto.ag");
            $this->email->to("igor@agenciaduetto.com.br");
            $this->email->cc('vitor@agenciaduetto.com.br');
            $this->email->message("O cliente " . $dados['nomeUnidade'] . " foi cadastrado no sistema.");
            $this->email->send();

            redirect('https://duetto.ag/');
        
        } else {

            $data['titulo_pagina'] = 'Ficha Cadastro - Duetto.ag';
            $this->load->view('ficha/viewForm', $data);
        }
    }


    public function editarficha($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione uma ficha para editar!</div>');
            redirect('clientes', 'refresh');
        }

        $query = $this->clientes_model->getFichasID($id);

        $this->form_validation->set_rules('nomeUnidade', 'Nome Unidade', 'trim|required');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $inputEditarFicha['nomeUnidade'] = $this->input->post('nomeUnidade');
            $inputEditarFicha['cnpj'] = $this->input->post('cnpj');
            $inputEditarFicha['dataInauguracao'] = $this->input->post('dataInauguracao');
            $inputEditarFicha['whatsapp'] = $this->input->post('whatsapp');
            $inputEditarFicha['telFixo '] = $this->input->post('telFixo');
            $inputEditarFicha['funcSeg1'] = $this->input->post('funcSeg1');
            $inputEditarFicha['funcSeg2'] = $this->input->post('funcSeg2');
            $inputEditarFicha['funcTer1'] = $this->input->post('funcTer1');
            $inputEditarFicha['funcTer2'] = $this->input->post('funcTer2');
            $inputEditarFicha['funcQua1'] = $this->input->post('funcQua1');
            $inputEditarFicha['funcQua2'] = $this->input->post('funcQua2');
            $inputEditarFicha['funcQui1'] = $this->input->post('funcQui1');
            $inputEditarFicha['funcQui2'] = $this->input->post('funcQui2');
            $inputEditarFicha['funcSex1'] = $this->input->post('funcSex1');
            $inputEditarFicha['funcSex2'] = $this->input->post('funcSex2');
            $inputEditarFicha['funcSab1'] = $this->input->post('funcSab1');
            $inputEditarFicha['funcSab2'] = $this->input->post('funcSab2');
            $inputEditarFicha['funcDom1'] = $this->input->post('funcDom1');
            $inputEditarFicha['funcDom2'] = $this->input->post('funcDom2');
            $inputEditarFicha['cep'] = $this->input->post('cep');
            $inputEditarFicha['logradouro'] = $this->input->post('logradouro');
            $inputEditarFicha['numero'] = $this->input->post('numero');
            $inputEditarFicha['complemento'] = $this->input->post('complemento');
            $inputEditarFicha['bairro'] = $this->input->post('bairro');
            $inputEditarFicha['cidade'] = $this->input->post('cidade');
            $inputEditarFicha['uf'] = $this->input->post('uf');
            $inputEditarFicha['igUsuario'] = $this->input->post('igUsuario');
            $inputEditarFicha['igSenha'] = $this->encrypt->encode($this->input->post('igSenha'));
            $inputEditarFicha['fbPagina'] = $this->input->post('fbPagina');
            $inputEditarFicha['fbUrl'] = $this->input->post('fbUrl');
            $inputEditarFicha['IdConta'] = $this->input->post('IdConta');
            $inputEditarFicha['ytUsuario'] = $this->input->post('ytUsuario');
            $inputEditarFicha['ytSenha'] = $this->encrypt->encode($this->input->post('ytSenha'));
            $inputEditarFicha['ttUsuario'] = $this->input->post('ttUsuario');
            $inputEditarFicha['ttSenha'] = $this->encrypt->encode($this->input->post('ttSenha'));
            $inputEditarFicha['pinUsuario'] = $this->input->post('pinUsuario');
            $inputEditarFicha['pinSenha'] = $this->encrypt->encode($this->input->post('pinSenha'));
            $inputEditarFicha['acessoMateriais'] = $this->input->post('acessoMateriais');
            $inputEditarFicha['acessoSite'] = $this->input->post('acessoSite');
            $inputEditarFicha['formaPagamento'] = $this->input->post('formaPagamento');
            $inputEditarFicha['investimento'] = $this->input->post('investimento');

            $this->clientes_model->atualizarFichas($inputEditarFicha, ['id' => $this->input->post('idFichaCliente')]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Ficha atualizada com sucesso! <i class="far fa-smile-beam"></i></div>');
            redirect('clientes', 'refresh');
        } else {

            $data['titulo_pagina'] = 'Editar Ficha Cliente';
            $data['query'] = $query;

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/editClient');
            $this->load->view('dashboard/footer');
        }
    }




    public function deletarficha($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione uma ficha para excluir.</div>');
            redirect('clientes', 'refresh');
        }

        $query = $this->clientes_model->getFichasID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Ficha não encontrada.</div>');
        }

        $this->clientes_model->apagarFichas($query->id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Ficha apagada com sucesso! <i class="far fa-smile-beam"></i></div>');
        redirect('clientes', 'refresh');
    }


    public function fichainativa($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione uma ficha para desativar</div>');
        }

        $query = $this->clientes_model->getFichasID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Ficha não encontrada.</div>');
        }

        $this->clientes_model->atualizarFichas(['ativo' => 0], ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Ficha desativada com sucesso! <i class="far fa-smile-beam"></i></div>');
        redirect('clientes', 'refresh');
    }


    public function fichaativa($id = NULL)
    {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro! Selecione uma ficha para desativar</div>');
        }

        $query = $this->clientes_model->getFichasID($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Erro, Ficha não encontrada.</div>');
        }

        $this->clientes_model->atualizarFichas(['ativo' => 1], ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cliente (re)ativado <i class="far fa-smile-beam"></i></div>');
        redirect('clientes', 'refresh');
    }
}
