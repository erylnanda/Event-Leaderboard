<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $bulan = date('n');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['title'] = 'Dashboard';
        $data['nama'] = $data['user']['namaUsaha'];
        $data['user_id'] = $user_id;
        $data['total_peserta'] = $this->db->from("peserta")->count_all_results();
        $data['total_lomba'] = $this->db->from("lomba")->count_all_results();
        $data['bulan'] = $bulan;
        // $data['jual'] = $this->Model_Keuangan->total_jual($user_id);
        // $data['total_tahun'] = $this->Model_Keuangan->total_tahun($user_id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}
