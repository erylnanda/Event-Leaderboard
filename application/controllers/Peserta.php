<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    
    // Kategori Index
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Kategori Produk';
        $data['kategori'] = $this->M_Peserta->get_kategori($user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('peserta/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah Kategori Produk
    public function tambah_peserta()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Kategori Produk';

        $this->form_validation->set_rules(
            'nama_kat',
            'Nama Kategori',
            'trim|required|regex_match[/^([a-z ])+$/i]',
            [
                'required' => "Nama Kategori Harus Diisi",
                'regex_match' => "Inputan Hanya Menerima Karakter Huruf"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('kategori/tambah_kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->M_Peserta->tambah_kategori($user_id);
            $this->session->set_flashdata('pesan', 'Tambah Kategori Produk');
            redirect('produk/kategori');
        }
    }

    // Hapus Kategori 
    public function hapus_peserta($id_kategori)
    {
        $this->M_Peserta->hapus_kategori($id_kategori);
        $this->session->set_flashdata('pesan', 'Hapus Kategori Produk ');
        redirect('produk/kategori');
    }

    // Update Kategori
    public function update_peserta($id_kategori)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update Kategori Produk';
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();

        $this->form_validation->set_rules(
            'nama_kat',
            'Nama Kategori',
            'trim|required|regex_match[/^([a-z ])+$/i]',
            [
                'required' => "Nama Menu Harus Diisi",
                'is_unique' => "Nama Kategori Sudah Ada",
                'regex_match' => "Inputan Hanya Menerima Karakter Huruf"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('kategori/update_kategori', $data);
            $this->load->view('template/footer');
        } else {
            $this->M_Peserta->update_kategori($id_kategori);
            $this->session->set_flashdata('pesan', 'Update Kategori Produk');
            redirect('produk/kategori');
        }
    }
}
