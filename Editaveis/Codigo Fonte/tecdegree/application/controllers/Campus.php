<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends CI_Controller {

	public function index(){

		$this->load->model('Campus_model','modelcampus');
 		$campus['campus'] = $this->modelcampus->lista_campus_ativos();

		$this->load->view('html_header');
		$this->load->view('header');
		$this->load->view('campus',$campus);
		$this->load->view('footer');
		$this->load->view('html_footer');
	}

	public function detalhes ($id){

		$this->load->model('Instituicao_model','modelinstituicao');	
		$this->load->model('Campus_model','modelcampus');
		$this->load->model('Curso_model','modelcurso');

		$campus = $this->modelcampus->retornaCampus($id);
 		$campus = json_decode(json_encode($campus),true);
 		$campus = $campus[0];
 		$id_instituicao = $campus['id_instituicao'];
 		$id_campus = $campus['id'];

 		$instituicao = $this->modelinstituicao->retornaInstituicao($id_instituicao);
 		$instituicao = json_decode(json_encode($instituicao),true);
 		$instituicao = $instituicao[0];

		$cursos = $this->modelcurso->curso_campus($id_campus);

		$dados['campus'] = $campus;
		$dados['cursos'] = $cursos;
		$dados['instituicao'] = $instituicao;

		$this->load->view('html_header');
		$this->load->view('header');
		$this->load->view('campus_detalhes',$dados);
		$this->load->view('footer');
		$this->load->view('html_footer');
	}

	




}
