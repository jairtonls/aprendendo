<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("form");
        $this->load->helper('email');
		$this->load->helper("form");
		$this->load->library('upload');
    }

	public function index(){
		$dados['titulo'] = "Login - codeigneter";
		$this->load->view('login_view', $dados);
	}
	public function cadrastrar_cliente(){
		$dados['titulo'] = "Registrar usuario - codeigneter";
		$this->load->view('cadrastro_usuario_view', $dados);
	}
	public function login(){
		//validação
		$this->load->library('form_validation');
		$this->form_validation->set_message('requerd', 'campo %s é obrigatorio');
		$this->form_validation->set_rules('login', 'Login ou email', 'trim|required|min_length[5]|max_length[50]|callback_check_database');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required|max_length[20]|callback_check_database');
		// condição
		if($this->form_validation->run() == FALSE){
			$this->session->set_userdata('usuario_logado', "");
			$this->session->sess_destroy();
			$this->load->view('login_view');
		}else{
			redirect('Home','refresh');
		}
	}
	public function check_database(){
		// recebendo dados do formulario
		$login  = $this->input->post("login");
		$senha = $this->input->post("senha");
		// descripitando a senha
		$senha = md5($senha);
		// dados da tabela 
		$tabela_nome  = "usuarios";
		$tabela_select = "*";
		$tabela_where = "login='{$login}' AND senha='{$senha}'";
		// chamndo da model do programa
		$this->load->model("database_model");
		$query = $this->database_model->ler($tabela_nome,$tabela_select,$tabela_where);
		//se a vairial query for TRUE entao criara uma sesao
		if(!$query){
			$this->form_validation->set_message('check_database', 'O campo %s não existe ou nao foi cadrastrado');
			return FALSE;
		}else{
			$this->session->set_userdata('usuario_logado',$query);
			return TRUE;
		}

	}
	public function cadastra(){
		//recebendo dados do formulario
		$cad_user = array(
			"login" 	=> $this->input->post('login'),
			"email" 	=> $this->input->post('email'),
			"senha" 	=> $this->input->post('senha'),
			"confirma" 	=> $this->input->post('confirma')
		);
			// valalidação
			if (!valid_email($cad_user['email'])){
				$erro = TRUE;
			}
			if ($cad_user['senha'] != $cad_user['confirma']) {
				$erro = TRUE;
			}
			//modal
			$this->load->model("database_model");
			// frescura do codigo
			$login = $cad_user['login'];
			$email = $cad_user['email'];
			// dados da tabela 
			$tabela_nome  = "usuarios";
			$tabela_select = "*";
			$tabela_where = "login='{$login}' OR email='{$email}'";
			// chamndo da model do programa
			$this->load->model("database_model");
			$query = $this->database_model->ler($tabela_nome,$tabela_select,$tabela_where);
			//se a vairial query for TRUE entao criara uma sesao
			if($query){
				$erro = TRUE;
			}
			// se existe algum erro do usuario fassa isso
			if (isset($erro)) {
				redirect('Register_user','refresh');
			}
		// inserir caso tiver tudo validado
		$cad_user['senha'] = md5($cad_user['senha']);
		unset($cad_user['confirma']);
		$cad_user['nome'] 		= "teste";
		$cad_user['status'] 	= "1";
		$cad_user['perfilid'] 	= "7";
		$this->database_model->inserir("usuarios", $cad_user);
		// redirecionar
		redirect('Home','refresh');
	}
	public function cad_img(){
		$foto = $_FILES['up_foto'];

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']  = '10000';
		
		// Verifica se o diretório de destino existe, senão existir cria o diretório  
		if(!file_exists("./uploads")){ 
			mkdir("./uploads");  
		}
		$this->upload->initialize($config);
		//depois do do_upload tem que colocar o name do input
		if ( ! $this->upload->do_upload('up_foto')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo "success";
		}
	}
}
