<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('captcha');
    }

    // halaman auth utama adalah login
    public function Index()
    {
        // validasi inputan
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('input_captcha', 'CAPTCHA', 'trim|required');

        // buat variabel tempat menyimpan alamat gambarnya
        $file_delete_all = glob(BASEPATH . "../captcha/*.jpg");
        // buat variabel untuk menyimpan alamat folder captcha
        $files = BASEPATH . "../captcha/";

        if ($this->form_validation->run() == false) {


            // CAPTCHA

            // lakukan looping ke semua file yang ada di folder captcha 
            foreach ($file_delete_all as $file) {
                // cek apakah yang dimaksud file
                if (is_file($file)) {
                    // bila iya delete file itu
                    unlink($file);
                }
            }
            // buat variabel acak
            $angka_acak = substr(number_format(time() * rand(), 0, '', ''), 0, 0);

            // konfigurasi captcha
            $vals = [
                'word' => $angka_acak,
                'img_path' => "./captcha/",
                'img_url' => base_url() . "captcha/",
                'font_path' => BASEPATH . 'system/fonts/texb.ttf',
                'font_size' => 16,
                'img_width' => 130,
                'img_height' => 35,
                'expiration' => 7200
            ];
            // jalankan captchanya dan taruh di data agar bisa dikirim ke view
            $data['captcha'] = create_captcha($vals);

            // taruh data captcha di session
            $this->session->set_userdata($data['captcha']);
            // var_dump($this->session->userdata('word'));


            $data['title'] = "Login Page";
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/footer');

            // library form validation berjalan
        } else {
            // ambil inputan teks captchanya
            $word_captcha = $this->input->post('input_captcha');

            // validasi input captchanya dengan captcha yang ada di session
            if ($word_captcha ==  $this->session->userdata('word')) {
                // hilangkan data captcha dan haous gambar captchanya
                if (file_exists($files . $this->session->userdata('image'))) {
                    unlink($files . $this->session->userdata('image'));
                }

                $this->session->unset_userdata($vals);
                $this->session->unset_userdata('word');

                // kalau pengecekan captcha berhasil, jalankan method _login yang sudah dibuat dibawah
                $this->_login();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Captcha Salah! are you terminator? >:(</div>');
                redirect('auth');
            }
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

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
    public function signup()
    {
        // jika user sudah login (ditandai dengan adanya session yang di dapat ketika login)
        if ($this->session->userdata('email')) {
            // redirect ke halaman home
            redirect('home');
        }

        // validasi semua inputan
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has already registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'signup';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/signup');
            $this->load->view('templates/footer');
        } else {
            // ambil data dari inputan user
            $email = $this->input->post('email', true);
            // siapkan data yang akan di INSERT ke database
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'date_created' => time(),
                'is_active' => 1
            ];

            $this->db->insert('user', $data); // insert $data ke tabel user
            // beri pesan bahwa pendaftaran akun berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SignUp Berhasil</div>');
            redirect("auth");
        }
    }

    public function logout()
    {
        // hapus / hilangkan session yang didapat saat login
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('id_user');

        // tampilkan pesan bahwa user telah logout
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        // pindahkan kehalaman login
        redirect('auth');
    }
}
