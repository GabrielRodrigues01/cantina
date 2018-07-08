<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

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
		$this->load->model('Aluno_model', 'aluno');

		$config = array(
			"base_url" => base_url('alunos/p'),
			"per_page" => 4,
			"num_links" => 5,
			"uri_segment" => 3,
			"total_rows" => $this->aluno->CountAll(),
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
		$dados['alunos'] = $this->aluno->get_alunos('nome_aluno', 'asc', $config['per_page'], $offset);
		
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		if($indice == 1) {
			$data['msg'] = 'Aluno cadastrado com sucesso.';
			$this->load->view('includes/msg_success', $data);
		} else if($indice == 2) {
			$data['msg'] = 'Não foi possível cadastrar o aluno.';
			$this->load->view('includes/msg_error', $data);
		} else if($indice == 5) {
			$data['msg'] = 'Aluno atualizado com sucesso.';
			$this->load->view('includes/msg_success', $data);
		} else if($indice == 6) {
			$data['msg'] = 'Não foi possível atualizar o aluno.';
			$this->load->view('includes/msg_error', $data);
		}
		$this->load->view('listar_aluno', $dados);
		$this->load->view('includes/html_footer');
	}

	public function cadastro()
	{
		$this->verificar_sessao();
		$this->load->model('Aluno_model', 'aluno');
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_aluno');
		$this->load->view('includes/html_footer');
		
	}

	public function cadastrar()
	{
		$this->verificar_sessao();
		$this->load->model('Aluno_model', 'aluno');
		$cpf_func = $this->session->userdata('id');
		$data['nome_aluno'] = $this->input->post('nome');
		$data['ra'] = $this->input->post('ra');
		$data['email_resp'] = $this->input->post('email_resp');
		$data['nome_resp'] = $this->input->post('nome_resp');
        $data['tel_resp'] = $this->input->post('tel_resp');
		//$data['senha_aluno'] = md5($this->input->post('senha'));
		$data['senha_aluno'] = $this->input->post('senha');
		$data['funcionario_cpf'] = $cpf_func;

		if($this->aluno->cadastrar($data)) {
			redirect('aluno/1');
		} else {
			redirect('aluno/2');
		}

	}

	public function atualizar($id=null, $indice=null)
	{
		$this->verificar_sessao();
		$this->db->where('ra', $id);
		
		$data['aluno'] = $this->db->get('aluno')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		if($indice == 1) {
			$data['msg'] = 'Senha atualizada com sucesso.';
			$this->load->view('includes/msg_success', $data);
		} else if($indice == 2) {
			$data['msg'] = 'Não foi possível atualizar a senha.';
			$this->load->view('includes/msg_error', $data);
		}

		$this->load->view('editar_aluno', $data);
		$this->load->view('includes/html_footer');
	}

	public function salvar_atualizacao()
	{
		$this->verificar_sessao();
		$this->load->model('Aluno_model', 'aluno');

		$id = $this->input->post('idUsuario');
		$data['nome_aluno'] = $this->input->post('nome');
		$data['email_resp'] = $this->input->post('email_resp');
		$data['nome_resp'] = $this->input->post('nome_resp');
		$data['tel_resp'] = $this->input->post('tel_resp');

		if($this->aluno->salvar_atualizacao($data, $id)) {
			redirect('aluno/5');
		} else {
			redirect('aluno/6');
		}

	}

	public function salvar_senha()
	{
		$this->verificar_sessao();
		$this->load->model('Aluno_model', 'aluno');

		$id = $this->input->post('idUsuario');
		//$senha_antiga = md5($this->input->post('senha_antiga'));
		//$senha_nova = md5($this->input->post('senha_nova'));
		$senha_antiga = $this->input->post('senha_antiga');
		$senha_nova = $this->input->post('senha_nova');
		
		if($this->aluno->salvar_senha($id, $senha_antiga, $senha_nova)) {
			redirect('aluno/atualizar/'.$id.'/1');
		} else {
			redirect('aluno/atualizar/'.$id.'/2');
		}
	}

}
