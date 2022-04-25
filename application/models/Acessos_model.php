<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acessos_model extends CI_Model
{


    public function listarAcessos()
    {
        return $this->db->get('acesso_cliente')->result();
    }


    public function addAcesso($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('acesso_cliente', $dados);
        }
    }

    public function getAcessoID($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('acesso_cliente')->row();
        }
    }

    public function apagarAcesso($id = NULL)
    {
        if ($id) {
            $this->db->delete('acesso_cliente', ['id' => $id]);
        }
    }


    public function atualizarAcesso($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('acesso_cliente', $dados, $condicao);
        }
    }

    public function gerarPlanilhaClientev1()
    {
        $this->db->select('*');
        $this->db->from('acesso_cliente');
        $query = $this->db->get();
        return $query->result();
    }
}
