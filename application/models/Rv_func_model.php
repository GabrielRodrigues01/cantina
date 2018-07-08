<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Rv_func_model extends CI_Model {

    function __construct() {

        parent::__construct();

    }

	public function verifica_ra($ra){
		$query = $this->db->select('*')
					->from('aluno')
					->where('ra', $ra)
					->get();

		return $query->result();
	}

    public function select_ra($ra)
    {          
		
		$query = $this->db->select('registro_venda.id_registro, DATE_FORMAT(data, "%d/%m/%Y") AS data, registro_venda.status, registro_venda.funcionario_cpf, registro_venda.aluno_ra, registro_venda.valor_total, aluno.nome_aluno')
					->from(' registro_venda, aluno')
					->where('registro_venda.aluno_ra', $ra)
					->where('registro_venda.aluno_ra = aluno.ra')
					->order_by('id_registro', 'ASC')
					->get();

		return $query->result();
	}
	
	public function verifica_nome($nome){
		$query = $this->db->select('*')
					->from('aluno')
					->where('nome_aluno', $nome)
					->get();

		return $query->result();
	}

	public function select_nome($nome)
    {          
		
		$query = $this->db->select('registro_venda.id_registro, DATE_FORMAT(data, "%d/%m/%Y") AS data, registro_venda.status, registro_venda.funcionario_cpf, registro_venda.aluno_ra, registro_venda.valor_total, aluno.nome_aluno')
					->from(' registro_venda, aluno')
					->like('aluno.nome_aluno', $nome)
					->where('registro_venda.aluno_ra = aluno.ra')
					->order_by('id_registro', 'ASC')
					->get();

		return $query->result();
	}

	public function verifica_data($data_inicio, $data_fim){
		$query = $this->db->select('*')
					->from('registro_venda')
					->where('data', $data_inicio)
					->or_where('data', $data_fim)
					->get();

		return $query->result();
	}

	public function select_data($data_inicio, $data_fim)
	{   
		$query = $this->db->select('registro_venda.id_registro, DATE_FORMAT(data, "%d/%m/%Y") AS data, registro_venda.status, registro_venda.funcionario_cpf, registro_venda.aluno_ra, registro_venda.valor_total, aluno.nome_aluno')
					->from(' registro_venda, aluno')
					->where('registro_venda.data >= '."'$data_inicio'")
					->where('registro_venda.data <= '."'$data_fim'")
					->where('registro_venda.aluno_ra = aluno.ra')
					->order_by('id_registro', 'ASC')
					->get();

		return $query->result();
	}

	public function select_data_pago($data_inicio, $data_fim)
	{   
		$query = $this->db->select('SUM(valor_total) AS total')
					->from(' registro_venda')
					->where('status = "pago"')
					->where('data >= '."'$data_inicio'")
					->where('data <= '."'$data_fim'")
					->get();

		return $query->result();
	}

	public function select_data_fiado($data_inicio, $data_fim)
	{   
		$query = $this->db->select('SUM(valor_total) AS total')
					->from(' registro_venda')
					->where('status = "fiado"')
					->where('data >= '."'$data_inicio'")
					->where('data <= '."'$data_fim'")
					->get();

		return $query->result();
	}

	public function select_ra_pago($ra)
	{   
		$query = $this->db->select('SUM(valor_total) AS total')
					->from(' registro_venda')
					->where('status = "pago"')
					->where('aluno_ra', $ra)
					->get();

		return $query->result();
	}

	public function select_ra_fiado($ra)
	{   
		$query = $this->db->select('SUM(valor_total) AS total')
					->from(' registro_venda')
					->where('status = "fiado"')
					->where('aluno_ra', $ra)
					->get();

		return $query->result();
	}

	public function select_nome_pago($nome)
	{   
		$query = $this->db->select('SUM(registro_venda.valor_total) AS total')
					->from(' registro_venda, aluno')
					->where('registro_venda.status = "pago"')
					->where('registro_venda.aluno_ra = aluno.ra')
					->like('aluno.nome_aluno', $nome)
					->get();

		return $query->result();
	}

	public function select_nome_fiado($nome)
	{   
		$query = $this->db->select('SUM(registro_venda.valor_total) AS total')
					->from(' registro_venda, aluno')
					->where('registro_venda.status = "fiado"')
					->where('registro_venda.aluno_ra = aluno.ra')
					->like('aluno.nome_aluno', $nome)
					->get();

		return $query->result();
	}

    
}