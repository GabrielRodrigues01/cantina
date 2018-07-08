<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Aluno_model extends CI_Model {

    function __construct() {

        parent::__construct();

    }

    public function cadastrar($data)
    {
          
		return $this->db->insert('aluno', $data);

	}

       
    public function salvar_atualizacao($data, $id)
	{

		$this->db->where('ra', $id);
		return $this->db->update('aluno', $data);
    }
    
    public function salvar_senha($id, $senha_antiga, $senha_nova)
	{
		$this->db->select('senha_aluno');
		$this->db->where('ra', $id);
		$data['senha'] = $this->db->get('aluno')->result();
		$dados['senha_aluno'] = $senha_nova;

		if($data['senha'][0]->senha_aluno == $senha_antiga) {
			$this->db->where('ra', $id);
			$this->db->update('aluno', $dados);
			return true;
		} else {
			return false;
		}
    }
    
    public function get_alunos($sort = 'nome_aluno', $order = 'asc', $limit = null, $offset = null){
		$this->db->order_by($sort, $order);

		if($limit)
			$this->db->limit($limit, $offset);

        $this->db->select('*');
		return $this->db->get('aluno')->result();

	}

	public function CountAll(){
		return $this->db->count_all('aluno');
	}

}
