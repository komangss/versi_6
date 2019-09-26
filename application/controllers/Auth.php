<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // halaman auth utama adalah login
    public function index()
    {
        // validasi inputan
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Page";
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            // kalau library form validation berjalan, jalankan method _login yang sudah dibuat dibawah
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // var_dump($username);die;

        // get data untuk melakukan validasi ke database
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika ada
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // siapkan data untuk ditampung dalam session
                $data = [
                    'email' => $user['email'],
                    'nama_user' => $user['nama'],
                    'login' => true,
                    'id_user' => $user['id']
                ];
                // jalankan method untuk membuat session yang berisi data yang sudah dibuat diatas
                $this->session->set_userdata($data);
                // tampilkan pesan bahwa login berhasil
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Login Berhasil</div>');
                // pindahkan ke halaman blog
                redirect('blog');
            } else {
                // jika password yang dimasukan oleh user tidak sama dengan yang ada di database
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah!</div>');
                redirect('auth');
            }
        } else {
            // Jika akun tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak ditemukan :(</div>');
            redirect('auth');
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
        $key = array('userid', 'nama', 'login');
        $this->session->unset_userdata($key);
        redirect('home');
    }
}
