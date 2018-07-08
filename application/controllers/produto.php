<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

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
		$this->load->model('Produto_model', 'produto');

		$config = array(
			"base_url" => base_url('produtos/p'),
			"per_page" => 4,
			"num_links" => 5,
			"uri_segment" => 3,
			"total_rows" => $this->produto->CountAll(),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li>",
			"num_tag_close" => "</li>"

		);

		$this->pagination->initialize($config);
		
		$dados['pagination'] = $this->pagination->create_links();
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$dados['produtos'] = $this->produto->get_produtos('nome_produto', 'asc', $config['per_page'], $offset);
	
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		
		if($indice == 1) {
			$data['msg'] = 'Produto cadastrado com sucesso.';
			$this->load->view('includes/msg_success', $data);
		} else if($indice == 2) {
			$data['msg'] = 'Não foi possível cadastrar o produto.';
			$this->load->view('includes/msg_error', $data);
		} else if($indice == 5) {
			$data['msg'] = 'Produto atualizado com sucesso.';
			$this->load->view('includes/msg_success', $data);
		} else if($indice == 6) {
			$data['msg'] = 'Não foi possível atualizar o produto.';
			$this->load->view('includes/msg_error', $data);
		}

		$this->load->view('listar_produto', $dados);
		$this->load->view('includes/html_footer');

	}

	public function cadastro()
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_produto');
		$this->load->view('includes/html_footer');
		
	}

	public function cadastrar()
	{
		$this->verificar_sessao();
		$this->load->model('Produto_model', 'produto');
		$data['nome_produto'] = $this->input->post('nome');
		//$data['preco'] = $this->input->post('preco');
		$data['preco'] = str_replace(',', '.', $this->input->post('preco'));

		if($this->produto->cadastrar($data)) {
			redirect('produto/1');
		} else {
			redirect('produto/2');
		}

	}

	
	public function atualizar($id=null, $indice=null)
	{
		$this->verificar_sessao();
		$this->db->where('id_produto', $id);
		
		$data['produto'] = $this->db->get('produto')->result();		
		
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		if($indice == 1) {
			$data['msg'] = 'Senha atualizada com sucesso.';
			$this->load->view('includes/msg_success', $data);
		} else if($indice == 2) {
			$data['msg'] = 'Não foi possível atualizar a senha.';
			$this->load->view('includes/msg_error', $data);
		}

		$this->load->view('editar_produto', $data);
		$this->load->view('includes/html_footer');

	}

	public function salvar_atualizacao()
	{
		$this->verificar_sessao();
		$this->load->model('Produto_model', 'produto');
		
		$id = $this->input->post('idUsuario');
		$data['nome_produto'] = $this->input->post('nome');
		$data['preco'] = str_replace(',', '.', $this->input->post('preco'));

		if($this->produto->salvar_atualizacao($data, $id)) {
			redirect('produto/5');
		} else {
			redirect('produto/6');
		}

	}
	
}
