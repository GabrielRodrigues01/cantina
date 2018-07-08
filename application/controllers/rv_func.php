<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rv_func extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function verificar_sessao() {

		if($this->session->userdata('logado') == false) {
			redirect('dashboard/login');
		}
	}

	public function index($indice=null)
	{	
		$this->verificar_sessao();
		$this->load->model('Rv_func_model', 'relatorio');
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		if($indice == 2) {
			$data['msg'] = 'RA não encontrado.';
			$this->load->view('includes/msg_error', $data);
		} else if($indice == 4) {
			$data['msg'] = 'Nome não encontrado.';
			$this->load->view('includes/msg_error', $data);
		} else if($indice == 6) {
			$data['msg'] = 'Período não encontrado.';
			$this->load->view('includes/msg_error', $data);
		}

		$this->load->view('relatorio_venda_func');
		$this->load->view('includes/html_footer');

	}

	public function relatorio()
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('relatorio_venda_func');
		$this->load->view('includes/html_footer');
		
	}

	public function realizar_select()
	{
		$this->verificar_sessao();
		$this->load->model('Rv_func_model', 'relatorio');

		$ra = $this->input->post('ra');
		$nome = $this->input->post('nome');
		$data_inicio = $this->input->post('data_venda_inicio');
		$data_fim = $this->input->post('data_venda_fim');

		if(!empty($ra)){
			$aux = $this->relatorio->verifica_ra($ra);
			if(!empty($aux)){
				$dados['registros'] = $this->relatorio->select_ra($ra);
				$dados['registros_pagos'] = $this->relatorio->select_ra_pago($ra);
				$dados['registros_fiados'] = $this->relatorio->select_ra_fiado($ra);
				if(!empty($dados)){
					$this->load->view('includes/html_header');
					$this->load->view('includes/menu');
					$this->load->view('listar_rv_func_ra', $dados);
					$this->load->view('includes/html_footer');
				}
			} else {
				redirect('rv_func/2');
			}
		}elseif(!empty($nome)){
			$aux = $this->relatorio->verifica_nome($nome);
			if(!empty($aux)){
				$dados['registros'] = $this->relatorio->select_nome($nome);
				$dados['registros_pagos'] = $this->relatorio->select_nome_pago($nome);
				$dados['registros_fiados'] = $this->relatorio->select_nome_fiado($nome);
				if(!empty($dados)){
					$this->load->view('includes/html_header');
					$this->load->view('includes/menu');
					$this->load->view('listar_rv_func_nome', $dados);
					$this->load->view('includes/html_footer');
				}
			} else {
				redirect('rv_func/4');
			}
		}elseif((!empty($data_inicio)) AND (!empty($data_fim)))	{
			$aux = $this->relatorio->verifica_data($data_inicio, $data_fim);
			if(!empty($aux)){
				$dados['registros'] = $this->relatorio->select_data($data_inicio, $data_fim);
				$dados['registros_pagos'] = $this->relatorio->select_data_pago($data_inicio, $data_fim);
				$dados['registros_fiados'] = $this->relatorio->select_data_fiado($data_inicio, $data_fim);
				if(!empty($dados)){
					$this->load->view('includes/html_header');
					$this->load->view('includes/menu');
					$this->load->view('listar_rv_func_data', $dados);
					$this->load->view('includes/html_footer');
				}
			} else {
				redirect('rv_func/6');
			}

		}
			
	} 
	
}
