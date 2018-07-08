<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function index($indice=NULL)
	{
		$this->verificar_sessao();		
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('dashboard');
		$this->load->view('includes/html_footer');
	}

	public function login()
	{
		$this->load->view('includes/html_header');
		$this->load->view('login');
		$this->load->view('includes/html_footer');
	}

	public function logar() {

		$tipo_login = $this->input->post('tipo_login');

		if($tipo_login === 'tipo_aluno'){
			$email = $this->input->post('email');
			//$senha = md5($this->input->post('senha'));
			$senha = $this->input->post('senha');
	
			$this->db->where('senha_aluno', $senha);
			$this->db->where('email_resp', $email);
			
			$data['usuario'] = $this->db->get('aluno')->result();

			if(count($data['usuario']) == 1) {
				$dados['nome'] = $data['usuario'][0]->nome_aluno;
				$dados['id'] = $data['usuario'][0]->ra;
				$dados['logado'] = true;
				$this->session->set_userdata($dados);
				$this->load->view('includes/html_header');
				$this->load->view('includes/menu_aluno');
				$this->load->view('dashboard');
				$this->load->view('includes/html_footer');
			} else {
				redirect('dashboard/login');
			}
		} else {
			$cpf = $this->input->post('cpf');
			//$senha = md5($this->input->post('senha'));
			$senha = $this->input->post('senha');
	
			$this->db->where('senha_funcionario', $senha);
			$this->db->where('cpf', $cpf);

			$data['usuario'] = $this->db->get('funcionario')->result();

			if(count($data['usuario']) == 1) {
				$dados['nome'] = $data['usuario'][0]->nome_funcionario;
				$dados['id'] = $data['usuario'][0]->cpf;
				$dados['logado'] = true;
				$this->session->set_userdata($dados);
				$this->load->view('includes/html_header');
				$this->load->view('includes/menu');
				$this->load->view('dashboard');
				$this->load->view('includes/html_footer');
			} else {
				redirect('dashboard/login');
			}
		}
		
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('dashboard');
	}

}