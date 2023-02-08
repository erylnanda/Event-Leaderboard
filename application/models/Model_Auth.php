<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    public function registrasi()
    {
        $data = [
            "username" => htmlspecialchars($this->input->post('username')),
            "namaUsaha" => htmlspecialchars($this->input->post('namaUsaha')),
            "password" => htmlspecialchars(md5($this->input->post('password1')))
        ];
        $this->db->insert('user', $data);
    }
}
