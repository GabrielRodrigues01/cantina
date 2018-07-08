<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rv_aluno extends CI_Controller {

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

	public function relatorio()
	{
		$this->verificar_sessao();
		
		$ra = $this->session->userdata('id');
		
		$this->load->model('Rv_func_model', 'relatorio');
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu_aluno');

		$dados['registros'] = $this->relatorio->select_ra($ra);
		$dados['registros_pagos'] = $this->relatorio->select_ra_pago($ra);
		$dados['registros_fiados'] = $this->relatorio->select_ra_fiado($ra);
		
		if(!empty($dados)){
			$this->load->view('listar_rv_aluno', $dados);
		}
	
		$this->load->view('includes/html_footer');
		
	}

}
