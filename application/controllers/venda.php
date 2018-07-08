<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Controller {

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
		$this->load->model('Venda_model', 'venda');
		
		$dados['registo'] = $this->venda->get_venda();
		$dados2['itens'] = $this->venda->get_itens_venda();
		$dados2['precot'] = $this->venda->valor_total();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_venda', $dados);
		$this->load->view('listar_itens_venda', $dados2);
		$this->load->view('includes/html_footer');
	}

	public function cadastro()
	{
		$this->verificar_sessao();
		$this->load->model('Venda_model', 'venda');

		$cpf = $this->session->userdata('id');
		$dados['funcionario'] = $this->venda->get_usuarios($cpf);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_venda', $dados);
		$this->load->view('includes/html_footer');
		
	}

	public function cadastrar()
	{
		$this->verificar_sessao();
		$this->load->model('Venda_model', 'venda');

		$cpf_func = $this->session->userdata('id');
		$data['funcionario_cpf'] = $cpf_func;
		$data['aluno_ra'] = $this->input->post('ra_aluno');
		$data['data'] = implode('-', array_reverse(explode('/', $this->input->post('data_venda'))));

		if($this->venda->cadastrar($data)) {
			redirect('venda');
		} else {
			redirect('venda');
		}

	}

	public function cadastrar_itens()
	{
			$this->load->model('Venda_model', 'venda');

			$data['quantidade'] = $this->input->post('quantidade');
			$data['produto_id_produto'] = $this->input->post('id_produto');
			$data['registro_venda_id_registro'] = $this->venda->max_id();

			if($this->venda->cadastrar_itens($data)) {
				redirect('venda');
			} else {
				redirect('venda');
			}
	}

	public function update_status_venda()
	{
		$this->load->model('Venda_model', 'venda');

		$data = $this->input->post('status_venda');
		$id = $this->venda->max_id();
		
		if($this->venda->update_status_venda($data, $id)){
			redirect('venda/cadastro');
		} else {
			redirect('venda');
		}
	}

}
