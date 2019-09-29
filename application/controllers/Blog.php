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
		$this->form_validation->set_rules('search', 'Search', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Blog Page";
			$this->load->view('templates/header', $data);
			$this->load->view('blog/index');
			$this->load->view('templates/footer');
		} else {
			redirect('blog');
		}
	}
	public function blog1()
	{
		$this->form_validation->set_rules('komentar', 'Komentar', 'required|trim');

		if ($this->form_validation->run() == false) {
			// siapin query dari database join komentar dan user. lock komentar.user_id dengan user.id
			// $query = "SELECT `komentar`.*, `user`.`nama`
            // FROM `komentar` JOIN `user`
            // ON `komentar`.`user_id` = `user`.`id`
			// ";
			$this->db->select('komentar.* , user.nama');
			$this->db->from('komentar');
			$this->db->join('user', '
			komentar.user_id = user.id');
			$data['komentar'] = $this->db->get()->result_array();
			// var_dump($query); die;

			$data['title'] = "Blog Konverter Suhu";
			$this->load->view('templates/header', $data);
			$this->load->view('blog/1/index');
			$this->load->view('templates/footer');
		} else {
			// ambil data dari komen
			$user_id = $this->input->post('iduser');
			$komentar = $this->input->post('komentar');
			$tanggal = $this->input->post('tanggal');


			$data = [
				'user_id' => $user_id,
				'isi_komen' => $komentar,
				'date_created' => $tanggal,
				'date_edited' => 0
			];
			$this->db->insert('komentar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komen Berhasil</div>');
			redirect("blog/blog1#wrap");
		}
	}
}
