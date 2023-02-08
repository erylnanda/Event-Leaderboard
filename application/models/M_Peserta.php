<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Peserta extends CI_Model
{
    // Produk
    public function get_peserta($user_id)
    {
        return $this->db->get_where('peserta', ['user_id' => $user_id])->result_array();
    }

    // Tambah peserta
    public function tambah_peserta($user_id,$new_data)
    {
        $data = [
            'user_id' => $user_id,
            'nama_peserta' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'foto' => $new_data
        ];

        $this->db->insert('peserta', $data);
    }

    // Hapus peserta

    public function hapus_peserta($id_peserta)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->delete('peserta');
    }

    public function update_peserta($id_peserta,$new_data)
    {
        $data = [
            'nama_peserta' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'foto' => $new_data
        ];

        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('peserta', $data);
    }
}
