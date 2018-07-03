<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		if($this->session->userdata('logado') == TRUE){

			$this->load->model('Instituicao_model','modelinstituicao');
 			$this->load->model('Campus_model','modelcampus');
 			$this->load->model('Curso_model','modelcurso');

 			$dados['campus'] = $this->modelcampus->quant_campus_inativos();
 			$dados['cursos'] = $this->modelcurso->quant_cursos_inativos();
 			$dados['instituicoes'] = $this->modelinstituicao->quant_instituicao_inativos();

			$this->load->view('admin_html_header');
			$this->load->view('admin_header');
			$this->load->view('admin_index',$dados);
			$this->load->view('admin_html_footer');
		}else{
			$this->load->view('admin_login');	
		}
	}

	public function login(){

		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('senha','senha','required');

		if ($this->form_validation->run() == FALSE) {
        	redirect(base_url('Admin'));
		}else{
			$senha = $this->crypt($senha);
			$this->load->model("login_model");
			$usuario = $this->login_model->autenticacao($email,$senha);
   			if($usuario && $usuario['nivel'] == 1){
                $this->session->set_userdata("logado", TRUE);
            	$this->session->set_userdata("email_logado", $email);
        	}else{
        		$this->session->set_userdata("logado", FALSE);
        		$this->session->set_userdata("email_logado",NULL);
            	$erros = array("erros" => "E-mail ou Senha incorretos");
            	$this->session->set_flashdata('erros', TRUE);
        	}
            redirect(base_url('Admin'));
		}
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Admin'));
    }

 	 public function crypt ($senha){
 		$senhaCrypt = md5($senha);
 		return $senhaCrypt; 
 	}

 	//COMEÇO AREA CURSOS 

 	public function cadastro_curso(){
 		if($this->session->userdata('logado') == TRUE){
 			$this->load->model('Campus_model','modelcampus');
 			$dados['campus'] = $this->modelcampus->listar_campus();
 			
 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_cadastra_curso',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function salva_curso(){

 		$dados['id_campus'] = $this->input->post('id_campus');
 		$dados['tipo'] = $this->input->post('tipo');
 		$dados['duracao'] = $this->input->post('duracao');
 		$dados['avaliacao_enade'] = $this->input->post('avaliacao_enade');
 		$dados['periodo'] = $this->input->post('periodo');
 		$dados['aprovado'] = 1;

		if($this->db->insert('curso',$dados)){
			$this->session->set_flashdata('sucesso', TRUE);
			redirect(base_url('admin/cadastro_curso'));
		}else{
			redirect(base_url('admin/cadastro_curso'));
		}

 	}

 	public function atualiza_curso(){

 		$this->load->model('Curso_model','modelcurso');

 		$id = $this->input->post('id');
 		$dados['tipo'] = $this->input->post('tipo');
 		$dados['duracao'] = $this->input->post('duracao');
 		$dados['avaliacao_enade'] = $this->input->post('avaliacao_enade');
 		$dados['periodo'] = $this->input->post('periodo');
 		$dados['aprovado'] = 1;

			if($this->modelcurso->update_curso($id, $dados)){
					$this->session->set_flashdata('sucesso', TRUE);
					redirect(base_url('admin/visualiza_cursos'));
			
			}else{
				 redirect(base_url('admin/visualiza_cursos'));
		}
	} 
 	




 	public function visualiza_cursos(){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Curso_model','modelcurso');
 			$dados['cursos'] = $this->modelcurso->listar_curso();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_visualiza_curso',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function detalhes_curso($id){
 		if($this->session->userdata('logado') == TRUE){

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

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_detalhes_curso',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}


 	public function pendente_cursos(){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Curso_model','modelcurso');

 			$dados['cursos'] = $this->modelcurso->lista_cursos_inativos();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_pendentes_cursos',$dados);
 			$this->load->view('admin_html_footer');

 		}else{
 			redirect(base_url('admin'));
 		}	 
 	}

 	public function aprovar_cursos($id){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Curso_model','modelcurso');
 			$this->load->model('Instituicao_model','modelinstituicao');
 			$this->load->model('Campus_model','modelcampus');

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

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_aprova_curso',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function remover_curso(){
 		if($this->session->userdata('logado') == TRUE){
			$id_instituicao = $this->input->post('id');

			$this->load->model('Curso_model','modelcurso');

			if($this->modelinstituicao->deleta_instituicao($id)){
				redirect(base_url('admin'));
			}else{
				redirect(base_url('admin'));
			}
		}else{
			redirect(base_url('admin'));
		}
 	}

 	//FINAL AREA CURSOS 


 	//COMEÇO AREA INSTITUIÇÕES 

 	public function cadastro_instituicao(){
 		if($this->session->userdata('logado') == TRUE){
 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_cadastra_instituicao');
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function salva_instituicao(){

 		$this->load->model('Instituicao_model','modelInstituicao');

 		$this->form_validation->set_rules('nome','nome','required');
		$this->form_validation->set_rules('sigla','sigla','required');
		$this->form_validation->set_rules('categoria_adm','categoria','required');

 		$instituicao['nome'] = $this->input->post('nome');
 		$instituicao['sigla'] = $this->input->post('sigla');
 		$sigla = $this->input->post('sigla');
 		$instituicao['categoria_adm'] = $this->input->post('categoria_adm');
 		$instituicao['site']= $this->input->post('site');
 		$instituicao['aprovado'] = TRUE; 
 		$instituicao['descricao'] = $this->input->post('descricao_instituicao'); 

 		$campus['telefone'] = $this->input->post('telefone');
 		$campus['cidade'] = $this->input->post('cidade');
 		$cidade = $this->input->post('cidade');
 		$campus['estado'] = $this->input->post('estado');
 		$campus['endereco'] = $this->input->post('endereco');
 		$campus['nome'] = $sigla." - ".$cidade;
 		$campus['descricao'] = $this->input->post('descricao_campus');


 		if($this->form_validation->run() == FALSE){
 			redirect(base_url('admin/cadastro_instituicao'));
 		}else{
			$id_instituicao = $this->modelInstituicao->cadastraInstituicao($instituicao);
			if($id_instituicao != NULL){
				$campus['id_instituicao'] = $id_instituicao;
				if($this->db->insert('campus',$campus)){
					$this->session->set_flashdata('sucesso', TRUE);
					redirect(base_url('admin/cadastro_instituicao'));
				}else{
					redirect(base_url('admin/cadastro_instituicao'));
				}
			}else{
				redirect(base_url('admin/cadastro_instituicao'));
			}			
 		}
 	}

 	public function visualiza_instituicoes(){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Instituicao_model','modelinstituicao');
 			$dados['instituicoes'] = $this->modelinstituicao->listar_instituicoes();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_visualiza_instituicao',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function detalhes_instituicao($id){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Instituicao_model','modelinstituicao');
 			$this->load->model('Campus_model','modelcampus');

 			$instituicao = $this->modelinstituicao->retornaInstituicao($id);
 			$instituicao = json_decode(json_encode($instituicao),true);
 			$instituicao = $instituicao[0];
 			$instituicao_id = $instituicao['id'];

 			$dados['instituicao'] = $instituicao;

 			$dados['campus'] = $this->modelcampus->campus_instituicao($instituicao_id);

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_detalhes_instituicao',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function edita_instituicoes(){

 		$this->load->model('Instituicao_model','modelinstituicao');

 		$this->form_validation->set_rules('nome','nome','required');
		$this->form_validation->set_rules('sigla','sigla','required');
		$this->form_validation->set_rules('categoria_adm','categoria','required');

 		$instituicao['nome'] = $this->input->post('nome');
 		$instituicao['sigla'] = $this->input->post('sigla');
 		$instituicao['categoria_adm'] = $this->input->post('categoria_adm');
 		$instituicao['site']= $this->input->post('site');
 		$instituicao['aprovado'] = 1;
 		$id = $this->input->post('id');

 		if($this->form_validation->run() == FALSE){
 			redirect(base_url('admin/cadastro_instituicao'));
 		}else{
			if($this->modelinstituicao->update_instituicao($id,$instituicao)){
				$this->session->set_flashdata('sucesso', TRUE);
				redirect(base_url('admin/cadastro_instituicao'));
			}else{
				redirect(base_url('admin/cadastro_instituicao'));
			}
 		}
 	}

 	public function pendente_instituicoes(){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Instituicao_model','modelinstituicao');
 			$dados['instituicoes'] = $this->modelinstituicao->lista_instituicoes_inativas();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_pendentes_instituicao',$dados);
 			$this->load->view('admin_html_footer');

 		}else{
 			redirect(base_url('admin'));
 		}	 
 	}

 	public function aprovar_instituicoes($id){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Instituicao_model','modelinstituicao');

 			$instituicao = $this->modelinstituicao->retornaInstituicao($id);
 			$instituicao = json_decode(json_encode($instituicao),true);
 			$instituicao = $instituicao[0];

 			$dados['instituicao'] = $instituicao;

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_aprova_instituicao',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			redirect(base_url('admin'));
 		}
 	}

 	public function remover_instituicao(){
 		if($this->session->userdata('logado') == TRUE){
			$id_instituicao = $this->input->post('id');

			$this->load->model('Instituicao_model','modelinstituicao');

			if($this->modelinstituicao->deleta_instituicao($id_instituicao)){
				redirect(base_url('admin'));
			}else{
				redirect(base_url('admin'));
			}
		}else{
			redirect(base_url('admin'));
		}
 	}

 	//FINAL AREA INSTITUIÇÕES 


 	//COMEÇO AREA CAMPUS 

 	public function cadastro_campus(){
 		if($this->session->userdata('logado') == TRUE){
 			$this->load->model('Instituicao_model','modelinstituicao');
 			$dados['instituicoes'] = $this->modelinstituicao->listar_instituicoes();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_cadastra_campus', $dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			redirect(base_url('admin/cadastro_instituicao'));
 		}
 	}

 	public function salva_campus(){

 		$this->load->model('Instituicao_model','modelinstituicao');

 		$this->form_validation->set_rules('telefone','telefone','required');
		$this->form_validation->set_rules('cidade','cidade','required');
		$this->form_validation->set_rules('estado','estado','required');

 		$dados['id_instituicao'] = $this->input->post('instituicao');
 		$dados['telefone'] = $this->input->post('telefone');
 		$dados['cidade'] = $this->input->post('cidade');
 		$dados['estado'] = $this->input->post('estado');
 		$dados['endereco'] = $this->input->post('endereco');
 		$dados['descricao'] = $this->input->post('descricao');

 		$instituicao = $this->modelinstituicao->retornaInstituicao($dados['id_instituicao']);
 		$instituicao = json_decode(json_encode($instituicao),true);
 		$instituicao = $instituicao[0];

 		$dados['nome'] = $instituicao['sigla']." - ".$dados['cidade'];

 		if($this->form_validation->run() == FALSE){
 			redirect(base_url('admin/cadastro_campus'));
 		}else{
 			if($this->db->insert('campus',$dados)){
 				$this->session->set_flashdata('sucesso', TRUE);
 				redirect(base_url('admin/cadastro_campus'));
 			}else{
 				redirect(base_url('admin/cadastro_campus'));
 			}
 		}
 	}

 	public function edita_campus(){

 		$this->load->model('Instituicao_model','modelinstituicao');
 		$this->load->model('Campus_model','modelcampus');

 		$this->form_validation->set_rules('telefone','telefone','required');
		$this->form_validation->set_rules('cidade','cidade','required');
		$this->form_validation->set_rules('estado','estado','required');

 		$dados['id_instituicao'] = $this->input->post('instituicao');
 		$dados['telefone'] = $this->input->post('telefone');
 		$dados['cidade'] = $this->input->post('cidade');
 		$dados['estado'] = $this->input->post('estado');
 		$dados['endereco'] = $this->input->post('endereco');
 		$dados['aprovado'] = 1;
 		$id = $this->input->post('id');

 		$instituicao = $this->modelinstituicao->retornaInstituicao($dados['id_instituicao']);
 		$instituicao = json_decode(json_encode($instituicao),true);
 		$instituicao = $instituicao[0];

 		$dados['nome'] = $instituicao['sigla']." - ".$dados['cidade'];

 		if($this->form_validation->run() == FALSE){
 			redirect(base_url('admin/cadastro_campus'));
 		}else{
 			if($this->modelcampus->update_campus($id,$dados)){
 				$this->session->set_flashdata('sucesso', TRUE);
 				redirect(base_url('admin/cadastro_campus'));
 			}else{
 				redirect(base_url('admin/cadastro_campus'));
 			}
 		}
 	}


 	public function visualiza_campus(){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Campus_model','modelcampus');
 			$dados['campus'] = $this->modelcampus->listar_campus();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_visualiza_campus',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function detalhes_campus($id){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Instituicao_model','modelinstituicao');
 			$this->load->model('Campus_model','modelcampus');
 			$this->load->model('Curso_model','modelcurso');

 			$campus = $this->modelcampus->retornaCampus($id);
 			$campus = json_decode(json_encode($campus),true);
 			$campus = $campus[0];
 			$dados['campus'] = $campus;
 			$id_instituicao = $campus['id_instituicao'];

 			$instituicao = $this->modelinstituicao->retornaInstituicao($id_instituicao);
 			$instituicao = json_decode(json_encode($instituicao),true);
 			$instituicao = $instituicao[0];
 			
 			$id_campus = $campus['id'];

 			$dados['instituicao'] = $instituicao;
 			$dados['curso'] = $this->modelcurso->curso_campus($id_campus);

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_detalhes_campus',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}


 	public function pendente_campus(){
 		if($this->session->userdata('logado') == TRUE){

 			$this->load->model('Campus_model','modelcampus');
 			$dados['campus'] = $this->modelcampus->lista_campus_inativos();

 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_pendentes_campus',$dados);
 			$this->load->view('admin_html_footer');
 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function aprovar_campus($id){
 		if ($this->session->userdata('logado') == TRUE){
 			$this->load->model('Instituicao_model','modelinstituicao');
 			$this->load->model('Campus_model','modelcampus');

 			$campus = $this->modelcampus->retornaCampus($id);
 			$campus = json_decode(json_encode($campus),true);
 			$campus = $campus[0];
 			$dados['campus'] = $campus;
 			$id_instituicao = $campus['id_instituicao'];

 			$instituicao = $this->modelinstituicao->retornaInstituicao($id_instituicao);
 			$instituicao = json_decode(json_encode($instituicao),true);
 			$instituicao = $instituicao[0];

 			$dados['instituicao'] = $instituicao;
 			
 			$this->load->view('admin_html_header');
 			$this->load->view('admin_header');
 			$this->load->view('admin_aprova_campus',$dados);
 			$this->load->view('admin_html_header');

 		}else{
 			$this->load->view('admin');
 		}
 	}

 	public function remover_campus(){
 		if($this->session->userdata('logado') == TRUE){
			$id_campus = $this->input->post('id');

			$this->load->model('Campus_model','modelcampus');

			if($this->modelcampus->deleta_campus($id_campus)){
				redirect(base_url('admin'));
			}else{
				redirect(base_url('admin'));
			}
		}else{
			redirect(base_url('admin'));
		}
 	}

 	//FINAL AREA CAMPUS

}
