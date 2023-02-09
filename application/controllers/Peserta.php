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
    
    // peserta Index
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'List Peserta';
        $data['peserta'] = $this->M_Peserta->get_peserta($user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('peserta/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah peserta Produk
    public function tambah_peserta()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah Peserta Lomba';

        $this->form_validation->set_rules(
            'nama',
            'Nama Peserta',
            'trim|required',
            [
                'required' => "Nama Peserta Harus Diisi"
            ],
            'avatar',
            'Pilih Gambar Profil',
            'trim|required',
            [
                'required' => "Gambar Profil Peserta Harus Diisi"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('peserta/tambah_peserta', $data);
            $this->load->view('template/footer');
        } else {
            $file_name = str_replace('.','',rand(0,999999));
			$config['upload_path']          = FCPATH.'/upload/avatar/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']			= true;
			// $config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 1024;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->M_Peserta->tambah_peserta_1($user_id,$new_data);
                $this->session->set_flashdata('pesan', 'Tambah peserta Produk');
                redirect('peserta');
			} else {
				$uploaded_data = $this->upload->data();
				$new_data = $uploaded_data['file_name'];
                $this->M_Peserta->tambah_peserta($user_id,$new_data);
                $this->session->set_flashdata('pesan', 'Tambah peserta Produk');
                redirect('peserta');
			}
        }
    }

    // Hapus peserta 
    public function hapus_peserta($id_peserta)
    {
        $a = $this->db->get_where('peserta', ['id_peserta' => $id_peserta])->row_array();
        $this->M_Peserta->hapus_peserta($id_peserta);
        unlink(FCPATH."/upload/avatar/".$a['foto']);
        $this->session->set_flashdata('pesan', 'Hapus peserta Produk ');
        redirect('peserta');
    }

    // Update peserta
    public function update_peserta($id_peserta)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update peserta Produk';
        $data['peserta'] = $this->db->get_where('peserta', ['id_peserta' => $id_peserta])->row_array();
        $a = $this->db->get_where('peserta', ['id_peserta' => $id_peserta])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama Peserta',
            'trim|required',
            [
                'required' => "Nama Peserta Harus Diisi",
                'is_unique' => "Nama Peserta Sudah Ada"
            ]

        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('peserta/update_peserta', $data);
            $this->load->view('template/footer');
        } else {
            $file_name = str_replace('.','',rand(0,999999));
			$config['upload_path']          = FCPATH.'/upload/avatar/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']			= true;
			// $config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 1024;

			$this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->M_Peserta->update_peserta($id_peserta);
                $this->session->set_flashdata('pesan', 'Update Peserta Berhasil');
                redirect('peserta');
            } else {
		        unlink(FCPATH."/upload/avatar/".$a['foto']);
                $uploaded_data = $this->upload->data();
                $new_data = $uploaded_data['file_name'];
                $this->M_Peserta->update_peserta_foto($id_peserta,$new_data);
                $this->session->set_flashdata('pesan', 'Update Peserta Berhasil');
                redirect('peserta');
            }
        }
    }
}
