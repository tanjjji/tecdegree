<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	public function index(){

		$this->load->model('Curso_model','modelcurso');
 		$dados['cursos'] = $this->modelcurso->lista_cursos_ativos();

 		$this->load->view('html_header');
 		$this->load->view('header');
 		$this->load->view('cursos',$dados);
 		$this->load->view('footer');
 		$this->load->view('html_footer');


	}

	public function detalhes($id){

		$this->load->model('Curso_model','modelcurso');
		$this->load->model('Campus_model','modelcampus');
		$this->load->model('Instituicao_model','modelinstituicao');

		$this->load->model('Instituicao_model','modelinstituicao');
 		$this->load->model('Campus_model','modelcampus');
 		$this->load->model('Curso_model','modelcurso');

 		$curso = $this->modelcurso->retornaCurso($id);
 		$curso = json_decode(json_encode($curso),true);
 		$curso = $curso[0];
 		$campus_id = $curso['id_campus'];

 		$campus = $this->modelcampus->retornaCampus($campus_id);
 		$campus = json_decode(json_encode($campus),true);
 		$campus = $campus[0];
 		$instituicao_id = $campus['id_instituicao'];

 		$instituicao = $this->modelinstituicao->retornaInstituicao($instituicao_id);
 		$instituicao = json_decode(json_encode($instituicao),true);
 		$instituicao = $instituicao[0];

 		$dados['curso'] = $curso;
 		$dados['instituicao'] = $instituicao;
 		$dados['campus'] = $campus;

		$this->load->view('html_header');
 		$this->load->view('header');
 		$this->load->view('cursos_detalhes',$dados);
 		$this->load->view('footer');
 		$this->load->view('html_footer');
	}
}
