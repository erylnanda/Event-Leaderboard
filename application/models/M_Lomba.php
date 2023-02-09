<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lomba extends CI_Model
{
    // Produk
    public function get_lomba($user_id)
    {
        return $this->db->get_where('lomba', ['user_id' => $user_id])->result_array();
    }

    // Tambah lomba
    public function tambah_lomba($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'nama_lomba' => htmlspecialchars(ucwords($this->input->post('nama'))),
        ];

        $this->db->insert('lomba', $data);
    }

    // Hapus lomba

    public function hapus_lomba($id_lomba)
    {
        $this->db->where('id_lomba', $id_lomba);
        $this->db->delete('lomba');
    }
    
    public function update_lomba($id_lomba)
    {
        $data = [
            'nama_lomba' => htmlspecialchars(ucwords($this->input->post('nama')))
        ];

        $this->db->where('id_lomba', $id_lomba);
        $this->db->update('lomba', $data);
    }
}
