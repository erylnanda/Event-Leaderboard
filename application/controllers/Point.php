<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Point extends CI_Controller
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
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Data Point';
        $data['lomba'] = $this->M_Lomba->get_lomba($user_id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('point/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_point($id_lomba)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Data Point';
        $data['peserta'] = $this->M_Peserta->get_peserta($user_id);
        $data['idlomba'] = $id_lomba;
        $data['lomba'] = $this->db->get_where('lomba', ['id_lomba' => $id_lomba])->row_array();
     
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('point/tambah_point', $data);
        $this->load->view('template/footer');
        
    }

    public function simpan_nilai()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $p = $this->input->post();
        $i = 0;

        foreach ($p['nilai'] as $s) {
            $this->db->query("INSERT INTO nilai (id_peserta, id_lomba, nilai, user_id) VALUES ('" . $p['id_peserta'][$i] . "', '" . $p['id_lomba'] . "', '" . $s . "', '" . $user_id . "')");

            $i++;
        }
        $this->db->set('status', 1);
        $this->db->where('id_lomba', $p['id_lomba']);
        $this->db->update('lomba');

        $this->session->set_flashdata('pesan', ' Data nilai berhasil ditambah-kan');
        redirect('point');
    }

    // Hapus Point


    public function update_point($id_lomba)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update Point';
        $data['point'] = $this->M_Point->get_point_lomba($id_lomba);
        $data['lomba'] = $this->db->get_where('lomba', ['id_lomba' => $id_lomba])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('point/update_point', $data);
        $this->load->view('template/footer');
    }

    public function update_nilai()
    {
        $p = $this->input->post();
        $i = 0;

        foreach ($p['nilai'] as $s) {
            $this->db->set('nilai', $s);
            $this->db->where('id_peserta', $p['id_peserta'][$i]);
            $this->db->where('id_lomba', $p['id_lomba']);
            $this->db->update('nilai');
            $i++;
        }

        $this->session->set_flashdata('pesan', 'Data nilai berhasil di-rubah');
        redirect('point');
    }

}
