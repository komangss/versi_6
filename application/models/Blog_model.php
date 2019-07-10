<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    public function getAllKomen()
    {
        return $this->db->get('komentar')->result_array();
    }
    public function tambahKomentar()
    {
        $data = [
            "iduser" => $this->input->post("iduser", true), // bisa juga htmlspecialchars($_POST)
            "nama" => $this->input->post("nama", true),
            "tanggal" => $this->input->post("tanggal", true),
            "komentar" => $this->input->post("komentar", true),
        ];

        $this->db->insert('komentar', $data);
    }
}
