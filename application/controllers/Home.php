<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Leaderboard';
        $data['peserta'] = $this->M_Point->get_point_leaderboard();
        $this->load->view('home',$data);
    }

    public function detail($id_peserta)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail Point Peserta';
        $data['point'] = $this->M_Point->get_point_peserta($id_peserta);
        $data['peserta'] = $this->db->get_where('peserta', ['id_peserta' => $id_peserta])->row_array();
        $data['total'] = $this->M_Point->get_total_point($id_peserta);

        $this->load->view('detail',$data);
    }
}
