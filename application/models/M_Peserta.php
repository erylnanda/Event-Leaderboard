<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Peserta extends CI_Model
{
    // Produk
    public function get_peserta($user_id)
    {
        return $this->db->get('peserta')->result_array();
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
    public function tambah_peserta_1($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'nama_peserta' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'foto' => "stockphoto.jpg"
        ];

        $this->db->insert('peserta', $data);
    }

    // Hapus peserta

    public function hapus_peserta($id_peserta)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->delete('peserta');
    }

    public function update_peserta_foto($id_peserta,$new_data)
    {
        $data = [
            'nama_peserta' => htmlspecialchars(ucwords($this->input->post('nama'))),
            'foto' => $new_data
        ];

        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('peserta', $data);
    }
    public function update_peserta($id_peserta)
    {
        $data = [
            'nama_peserta' => htmlspecialchars(ucwords($this->input->post('nama')))
        ];

        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('peserta', $data);
    }
}
