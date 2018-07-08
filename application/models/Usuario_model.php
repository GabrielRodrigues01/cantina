<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function __construct() {

        parent::__construct();

    }

    public function cadastrar($data)
    {          
        
		return $this->db->insert('funcionario', $data);
    }

       
    public function salvar_atualizacao($data, $id)
	{
		$this->db->where('cpf', $id);
		return $this->db->update('funcionario', $data);
    }
    
    public function salvar_senha($id, $senha_antiga, $senha_nova)
	{
		
		$this->db->select('senha_funcionario');
		$this->db->where('cpf', $id);
		$data['senha'] = $this->db->get('funcionario')->result();
		$dados['senha_funcionario'] = $senha_nova;

		if($data['senha'][0]->senha_funcionario == $senha_antiga) {
			$this->db->where('cpf', $id);
			$this->db->update('funcionario', $dados);
			return true;
		} else {
			return false;
		}
    }
    
    public function get_usuarios($sort = 'nome_funcionario', $order = 'asc', $limit = null, $offset = null){
		$this->db->order_by($sort, $order);

		if($limit)
		$this->db->limit($limit, $offset);
		$this->db->select('*');
		return $this->db->get('funcionario')->result();
	}
	
	public function CountAll(){
		return $this->db->count_all('funcionario');
	}
}