<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Venda_model extends CI_Model {

    function __construct() {

        parent::__construct();

	}

	public function get_venda(){
		$dados = $this->db->select('MAX(id_registro) AS id')
					->from('registro_venda')
					->get();
		$max =  $dados->result();

		$query = $this->db->select('DATE_FORMAT(data, "%d/%m/%Y") AS data, aluno.ra, aluno.nome_aluno, funcionario.cpf, funcionario.nome_funcionario')
					->from('registro_venda, aluno, funcionario')
					->where('registro_venda.id_registro', $max[0]->id)
					->where('aluno.ra = registro_venda.aluno_ra')
					->where('funcionario.cpf = registro_venda.funcionario_cpf')
					->get();
		
		return $query->result();
	}

	public function max_id(){
		$dados = $this->db->select('MAX(id_registro) AS id')
					->from('registro_venda')
					->get();
		$max =  $dados->result();
		return $max[0]->id;
	}

	public function get_itens_venda(){
		$dados = $this->db->select('MAX(id_registro) AS id')
					->from('registro_venda')
					->get();
		$max =  $dados->result();

		$query = $this->db->select('itens_venda.quantidade, produto.id_produto, produto.nome_produto, produto.preco, (itens_venda.quantidade * produto.preco) AS precot')
					->from(' itens_venda, produto')
					->where('itens_venda.registro_venda_id_registro', $max[0]->id)
					->where('itens_venda.produto_id_produto = produto.id_produto')
					->get();
		
		return $query->result();
	}

	public function valor_total(){
		$dados = $this->db->select('MAX(id_registro) AS id')
					->from('registro_venda')
					->get();
		$max =  $dados->result();

		$query = $this->db->select('SUM(itens_venda.quantidade * produto.preco) AS total')
					->from(' itens_venda, produto')
					->where('itens_venda.registro_venda_id_registro', $max[0]->id)
					->where('itens_venda.produto_id_produto = produto.id_produto')
					->get();
		$valor = $query->result();

					$this->db->where('id_registro', $max[0]->id);
					$this->db->set('valor_total', $valor[0]->total);
					$this->db->update('registro_venda');
		
		return $query->result();
	}

	public function update_status_venda($data, $id){
		$this->db->where('id_registro', $id);
		$this->db->set('status', $data);
		return $this->db->update('registro_venda');
	}

    public function cadastrar($data)
    {          
        
		return $this->db->insert('registro_venda', $data);
	}

	public function cadastrar_itens($data)
    {          
        
		return $this->db->insert('itens_venda', $data);
	}

	public function get_usuarios($cpf){
		$query = $this->db->select('*')
					->from('funcionario')
					->where('cpf', $cpf)
					->get();
		return  $query->result();
	}
	
	public function completar_aluno($ra){
		$query = $this->db->select('*')
					->from('aluno')
					->where('ra', $ra)
					->get();
		return  $query->result();
	}

}
