<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog1 extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->model('Blog_model','blog');
		$this->load->library('form_validation');
    }
    
	public function index()
	{
		$this->form_validation->set_rules('komentar', 'Usename', 'trim|required');
		
		if ($this->form_validation->run() == false) {
		$data['title'] = "blog";
		$data['komentar'] = $this->blog->getAllKomen();
		$this->load->view('templates/header',$data);
		$this->load->view('blog1/index');
		$this->load->view('templates/footer');
		} else {
			$this->blog->tambahKomentar();
			redirect('blog1');
		}
	}
}
