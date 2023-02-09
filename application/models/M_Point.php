<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Point extends CI_Model
{
    // Produk
    public function get_point($user_id)
    {
        return $this->db->get_where('point', ['user_id' => $user_id])->result_array();
    }

    public function get_point_lomba($id_lomba)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('nilai a');
        $this->db->join('peserta b', 'a.id_peserta = b.id_peserta', 'left');
        $this->db->where('a.id_lomba', $id_lomba);
        $hasil = $this->db->get();
        return $hasil->result_array();
    }
    // Tambah point
    public function get_point_leaderboard()
    {
       $sql = "SELECT SUM(nilai.nilai) AS total, peserta.nama_peserta, peserta.foto FROM `nilai` RIGHT JOIN peserta ON nilai.id_peserta = peserta.id_peserta GROUP BY peserta.id_peserta ORDER BY total DESC";
        $hasil = $this->db->query($sql);
        return $hasil->result_array(); 
    }
}
