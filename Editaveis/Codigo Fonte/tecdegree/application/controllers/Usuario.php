<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index(){
		if (($this->session->userdata('usuario_logado') == TRUE)){
			$this->load->view('html_header');
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
			$this->load->view('html_footer');
		}else{
			$this->load->view('login');
		}
	}

	public function cadastrar(){
		$this->load->view('cadastrar');
	}

	public function login(){
		$this->load->view('login');
	}


	public function entrar(){
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('senha','senha','required');

		if ($this->form_validation->run() == TRUE) {

			$this->load->model("login_model");
			$usuario = $this->login_model->autenticacao($email,$senha);
   				if($usuario){
                	$this->session->set_userdata("usuario_logado", TRUE);
            		$this->session->set_userdata("usuario_nome", $usuario->nome);
        		}else{
        			$this->session->set_userdata("logado", FALSE);
        			$this->session->set_userdata("usuario_logado",NULL);
            		$this->session->set_flashdata('erro', TRUE);
        		}
		}
		redirect(base_url('Usuario'));
	}

	public function crypt ($senha){
 		$senhaCrypt = md5($senha);
 		return $senhaCrypt; 
 	}

 	public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function registrar (){
    	$nome = $this->input->post('nome');
		$sobrenome = $this->input->post('sobrenome');
		$dados['email'] = $this->input->post('email');
		$senha = $this->input->post('senha');
		$confirmacao = $this->input->post('confirma-senha');



		$dados['nivel'] = 0; 
		$dados['senha'] = $this->crypt($senha);
		$dados['nome'] = $nome." ".$sobrenome;

		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('senha','senha','required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('html_header');
			$this->load->view('header');
			$this->load->view('cadastrar');
			$this->load->view('footer');
			$this->load->view('html_footer');
		}else{
			if ($senha == $confirmacao){
				if($this->db->insert('usuario',$dados)){
					$this->session->set_userdata("usuario_logado", TRUE);
            		$this->session->set_userdata("usuario_nome", $nome);
					redirect(base_url('Usuario'));
				}else{
					$this->session->set_flashdata('erro_cadastrar', TRUE);		
					$this->load->view('html_header');
					$this->load->view('header');
					$this->load->view('cadastrar');
					$this->load->view('footer');
					$this->load->view('html_footer');	
				}
			}else{
				$this->session->set_flashdata('senhas_diferentes', TRUE);
				$this->load->view('html_header');
				$this->load->view('header');
				$this->load->view('cadastrar');
				$this->load->view('footer');
				$this->load->view('html_footer');
			}
		}

    }

}
