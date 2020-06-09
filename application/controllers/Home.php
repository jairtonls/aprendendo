<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('access_control_library');
        $this->access_control_library->controle_acesso();
    }

	public function index(){
		$dados['titulo'] = "teste - Codeigneter"; 
		foreach ($_SESSION['usuario_logado'] as $sessao) {
			$dados['nome_usuario'] = $sessao['nome'];
		}
		// visualização
		$this->load->view('template/head', $dados);
		$this->load->view('template/header', $dados);
		$this->load->view('template/footer', $dados);
	}
	public function tabela_produto(){
		// dados da tabela 
		$tabela_nome  = "produto";
		$tabela_select = "*";
		$tabela_where = "";
		// model
		$this->load->model("database_model");
		// conteudo do site
		$dados['produtos'] = $this->database_model->ler($tabela_nome,$tabela_select,$tabela_where);
		$dados['titulo'] = "aprendendo - codeigneter";
	}
}
