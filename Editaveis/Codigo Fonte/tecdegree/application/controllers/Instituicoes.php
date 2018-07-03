<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instituicoes extends CI_Controller {

	public function index(){

		$this->load->model('Instituicao_model','modelinstituicao');
 		$instituicao['instituicao'] = $this->modelinstituicao->lista_instituicoes_ativas();

		$this->load->view('html_header');
		$this->load->view('header');
		$this->load->view('instituicoes',$instituicao);
		$this->load->view('footer');
		$this->load->view('html_footer');
	}

	public function detalhes($id){

		$this->load->model('Instituicao_model','modelinstituicao');	
		$this->load->model('Campus_model','modelcampus');

		$instituicao = $this->modelinstituicao->retornaInstituicao($id);
 		$instituicao = json_decode(json_encode($instituicao),true);
 		$instituicao = $instituicao[0];
 		$id_instituicao = $instituicao['id'];
 		$dados['instituicao'] = $instituicao;

 		$this->db->where('campus.id_instituicao', $id);
 		$dados['campus'] = $this->db->get('campus')->result();

 		$this->load->view('html_header');
		$this->load->view('header');
		$this->load->view('instituicoes_detalhes',$dados);
		$this->load->view('sidebar');
		$this->load->view('footer');
		$this->load->view('html_footer');
	}

	public function cadastrar(){
		$this->load->view('html_header');
		$this->load->view('header');
		$this->load->view('cadastrar_instituicoes');
		$this->load->view('footer');
		$this->load->view('html_footer');
	}





}
