<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Rv_func_model extends CI_Model {

    function __construct() {

        parent::__construct();

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

}