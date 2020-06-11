<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('access_control_library');
		$this->access_control_library->controle_acesso();
		$this->load->helper("form");
		$this->load->helper('email');
		$this->load->library('upload');
		$this->load->library('form_validation');
	}

	public function index(){
		$dados['titulo'] = "teste - Codeigneter"; 
		// visualização
		$this->load->view('template/head', $dados);
		$this->load->view('template/header', $dados);
		$this->load->view('cadrastro_produto_view', $dados);
		$this->load->view('template/footer', $dados);	
	}
	public function cad_produto(){
		$this->form_validation->set_message('requerd', 'campo %s é obrigatorio');
		// imagem
		if (empty($_FILES['up_foto']['name'])){
			$this->form_validation->set_rules('up_foto', 'upload da imagem', 'required');
		}
		$this->form_validation->set_rules('nomeproduto', 'nome do produto', 'trim|required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('unidade', 'quantidade de unidade', 'trim|required|numeric');
		$this->form_validation->set_rules('valormercadoria', 'valor da mercadoria', 'trim|required|numeric');
		$this->form_validation->set_rules('valorvenda', 'valor de venda', 'trim|required|numeric');
		$this->form_validation->set_rules('qtdeestoque', 'quantidade do estoque', 'trim|required|numeric');
		$this->form_validation->set_rules('descontopermitido', 'desconto', 'trim|required|numeric');
		$this->form_validation->set_rules('descricaoproduto', 'descricao do produto', 'trim|required|min_length[5]|max_length[250]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			// upload da imagem
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '1024';

			// Verifica se o diretório de destino existe, senão existir cria o diretório  
				if(!file_exists("./uploads")){ 
					mkdir("./uploads");  
				}
				$this->upload->initialize($config);
			//depois do do_upload tem que colocar o name do input
				if ( ! $this->upload->do_upload('up_foto')){
					$error = $this->upload->display_errors();
				}
			$img_dados =  $this->upload->data();
			//recebendo dados do formulario
			$cadrastro_produto = array(
				"nomeproduto"		=> $this->input->post("nomeproduto"),
				"unidade"			=> $this->input->post("unidade"),
				"valormercadoria"	=> $this->input->post("valormercadoria"),
				"valorvenda"		=> $this->input->post("valorvenda"),
				"qtdeestoque"		=> $this->input->post("qtdeestoque"),
				"descontopermitido"	=> $this->input->post("descontopermitido"),
				"descricaoproduto"	=> $this->input->post("descricaoproduto")
			);
			$cadrastro_produto['img'] = $img_dados['file_name'];
			// chamndo da model do programa
			$this->load->model("database_model");
			$this->database_model->inserir("produto", $cadrastro_produto);
			// redirecinar para
			$this->index();
		}

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
