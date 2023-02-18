<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    public function registrasi()
    {
        $data = [
            "username" => $this->input->post('username'),
            "namaUsaha" => $this->input->post('namaUsaha'),
            "password" =>md5($this->input->post('password1'))
        ];
        $this->db->insert('user', $data);
    }

    public function get_user($user_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_username !=', $user_id);
        $hasil = $this->db->get();
        return $hasil->result_array();
    }

    public function hapus_user($id_user)
    {
        $this->db->where('id_username', $id_user);
        $this->db->delete('user');
    }
    
    public function update_user($id_user)
    {
        $data = [
            "username" => $this->input->post('username'),
            "namaUsaha" => $this->input->post('namaUsaha'),
        ];

        $this->db->where('id_username', $id_user);
        $this->db->update('user', $data);
    }
}
