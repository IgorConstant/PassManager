<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes_model extends CI_Model
{


    public function listarFichas()
    {
        return $this->db->get('ficha_cadastro')->result();
    }

    public function addFichas($dados = NULL)
    {
        if (is_array($dados)) {
            $this->db->insert('ficha_cadastro', $dados);
        }
    }

    public function getFichasID($id = NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('ficha_cadastro')->row();
        }
    }

    public function apagarFichas($id = NULL)
    {
        if ($id) {
            $this->db->delete('ficha_cadastro', ['id' => $id]);
        }
    }


    public function atualizarFichas($dados = NULL, $condicao = NULL)
    {
        if (is_array($dados) && is_array($condicao)) {
            $this->db->update('ficha_cadastro', $dados, $condicao);
        }
    }
}
