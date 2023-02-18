<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lomba extends CI_Model
{
    // Produk
    public function get_lomba($user_id)
    {
        $this->db->select('a.*, b.namaUsaha');
        $this->db->from('lomba a');
        $this->db->join('user b', 'a.panitia_id = b.id_username', 'left');
        $this->db->where('a.user_id', $user_id);
        $this->db->or_where('a.panitia_id', $user_id);
        $hasil = $this->db->get();
        return $hasil->result_array();
    }

    public function get_lomba_id($id_lomba)
    {
        $this->db->select('a.*, b.namaUsaha');
        $this->db->from('lomba a');
        $this->db->join('user b', 'a.panitia_id = b.id_username', 'left');
        $this->db->where('a.id_lomba', $id_lomba);
        $hasil = $this->db->get();
        return $hasil->row_array();
    }

    // Tambah lomba
    public function tambah_lomba($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'nama_lomba' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'panitia_id' => htmlspecialchars(ucwords($this->input->post('panitia')))
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
            'nama_lomba' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'panitia_id' => htmlspecialchars(ucwords($this->input->post('panitia')))
        ];

        $this->db->where('id_lomba', $id_lomba);
        $this->db->update('lomba', $data);
    }
}
