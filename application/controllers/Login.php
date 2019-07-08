<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    
    }
	public function index()
	{
        $this->form_validation->set_rules('usernameLogin', 'Usename', 'trim|required');
        $this->form_validation->set_rules('passwordLogin', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
		$data['title'] = "Login";
		$this->load->view('templates/header',$data);
		$this->load->view('login/index');
		$this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }
    private function _login ()
    {
        $username = $this->input->post('usernameLogin');
        $password = $this->input->post('passwordLogin');
        // var_dump($username);die;

        //query ke database
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        // jika ada
        if ($user) {
            // cek password
            if ($password == $user['password']) {
                // password_verify($password, $user['password'])
                echo "ok";
            } else {
                echo "gagal";
            }
        }
    }
}