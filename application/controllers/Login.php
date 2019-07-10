<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
        $_SESSION['login'] = false;
    }
    public function index()
    {
        $this->form_validation->set_rules('usernameLogin', 'Usename', 'trim|required');
        $this->form_validation->set_rules('passwordLogin', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('templates/header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('usernameLogin');
        $password = $this->input->post('passwordLogin');
        // var_dump($username);die;

        //query ke database
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        // jika ada
        if ($user) {
            // cek password
            // var_dump($username);
            // var_dump($password);
            // var_dump($user['password']);
            if (password_verify($password, $user['password'])) {
                $data = [
                    'iduser' => $user['id'],
                    'nama' => $user['username'],
                    'login' => true
                ];
                $this->session->set_userdata($data);
                redirect('blog1');
            } else {
                redirect('login');
            }
        }
    }
    public function new()
    {
        $this->form_validation->set_rules('usernameNew', 'Usename', 'trim|required');
        $this->form_validation->set_rules('passwordNew', 'Password', 'trim|required');
        $this->form_validation->set_rules('passwordNew2', 'Password', 'required|trim|matches[passwordNew]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Registration";
            $this->load->view('templates/header', $data);
            $this->load->view('login/new');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('usernameNew', true)),
                'password' => password_hash($this->input->post('passwordNew'), PASSWORD_DEFAULT)
            ];
            // var_dump($data);die;
            $this->db->insert('users', $data);
            redirect('login');
        }
    }

    public function logout()
    {
        unset($_SESSION['iduser'],
        $_SESSION['nama']);
        $_SESSION['login'] = false;
        redirect('home');
    }
}
