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
       $sql = "SELECT SUM(nilai.nilai) AS total, peserta.id_peserta, peserta.nama_peserta, peserta.foto FROM `nilai` RIGHT JOIN peserta ON nilai.id_peserta = peserta.id_peserta GROUP BY peserta.id_peserta ORDER BY total DESC";
        $hasil = $this->db->query($sql);
        return $hasil->result_array(); 
    }

    public function get_point_peserta($id_peserta)
    {
        $this->db->select('a.*, b.* , c.*');
        $this->db->from('peserta a');
        $this->db->join('nilai b', 'a.id_peserta = b.id_peserta', 'left');
        $this->db->join('lomba c', 'b.id_lomba = c.id_lomba', 'left');
        $this->db->where('a.id_peserta', $id_peserta);
        $hasil = $this->db->get();
        return $hasil->result_array();
    }
    public function get_total_point($id_peserta)
    {
        $this->db->select_sum('nilai','total');
        $this->db->from('nilai');
        $this->db->where('id_peserta', $id_peserta);
        $hasil = $this->db->get();
        return $hasil->result_array();
    }

}
