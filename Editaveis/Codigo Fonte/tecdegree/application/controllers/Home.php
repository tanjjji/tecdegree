<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->view('html_header');
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
		$this->load->view('html_footer');
	}



}
