<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Produto_model extends CI_Model {

    function __construct() {

        parent::__construct();

    }

    public function cadastrar($data)
    {	
		return $this->db->insert('produto', $data);
    }

    public function salvar_atualizacao($data, $id)
	{
			
		$this->db->where('id_produto', $id);
		return $this->db->update('produto', $data);
    }
       
    public function get_produtos($sort = 'nome_produto', $order = 'asc', $limit = null, $offset = null){
        $this->db->order_by($sort, $order);

        if($limit)
        $this->db->limit($limit, $offset);

        $this->db->select('*');
		return $this->db->get('produto')->result();
    }

    public function CountAll(){
		return $this->db->count_all('produto');
	}

}
