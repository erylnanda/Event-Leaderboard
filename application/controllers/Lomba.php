<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lomba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    
    // lomba Index
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'List Lomba';
        $data['lomba'] = $this->M_Lomba->get_lomba($user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('lomba/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah lomba Produk
    public function tambah_lomba()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Lomba Lomba';

        $this->form_validation->set_rules(
            'nama',
            'Nama Lomba',
            'trim|required',
            [
                'required' => "Nama Lomba Harus Diisi"
            ]

        );
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lomba/tambah_lomba', $data);
            $this->load->view('template/footer');
        } else {
            $this->M_Lomba->tambah_lomba($user_id);
            $this->session->set_flashdata('pesan', 'Berhasil Tambah lomba');
            redirect('lomba');
		
        }
    }

    // Hapus lomba 
    public function hapus_lomba($id_lomba)
    {
        $this->M_Lomba->hapus_lomba($id_lomba);
        $this->session->set_flashdata('pesan', 'Berhasil hapus lomba');
        redirect('lomba');
    }

    // Update lomba
    public function update_lomba($id_lomba)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update lomba Produk';
        $data['lomba'] = $this->db->get_where('lomba', ['id_lomba' => $id_lomba])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama Lomba',
            'trim|required',
            [
                'required' => "Nama Lomba Harus Diisi",
                'is_unique' => "Nama Lomba Sudah Ada"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lomba/update_lomba', $data);
            $this->load->view('template/footer');
        } else {
            $this->M_Lomba->update_lomba($id_lomba);
            $this->session->set_flashdata('pesan', 'Update Lomba Berhasil');
            redirect('lomba'); 
        }
    }
}
