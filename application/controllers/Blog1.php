<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog1 extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // $this->load->model('Blog_model');
    }
    
	public function index()
	{
		$data['title'] = "blog";
		$this->load->view('templates/header',$data);
		$this->load->view('blog1/index');
		$this->load->view('templates/footer');
	}
}
