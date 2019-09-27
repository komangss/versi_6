<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$this->form_validation->set_rules('komentar', 'Usename', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Blog Page";
			$this->load->view('templates/header', $data);
			$this->load->view('blog/index');
			$this->load->view('templates/footer');
		} else {
			redirect('blog');
		}
	}
}
