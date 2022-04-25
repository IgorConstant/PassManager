<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_model extends CI_Model
{


    public function listarAcessosWeb()
    {
        return $this->db->get('acesso_web')->result();
    }


    public function addAcessoWeb($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('acesso_web', $dados);
        }
    }

    public function getAcessoWebID($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('acesso_web')->row();
        }
    }

    public function apagarAcessoWeb($id = NULL)
    {
        if ($id) {
            $this->db->delete('acesso_web', ['id' => $id]);
        }
    }

    public function atualizarAcessoWeb($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('acesso_web', $dados, $condicao);
        }
    }


    // Fetch data for encryption passwords.
    function fetch_data()
    {
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("acesso_web");
        return $query;
    }


    public function gerarPlanilhaWebv1()
    {
        $this->db->select('*');
        $this->db->from('acesso_web');
        $query = $this->db->get();
        return $query->result();
    }
}
