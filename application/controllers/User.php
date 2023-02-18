<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'List User';
        $data['user_id'] = $user_id;
        $data['user'] = $this->Model_Auth->get_user($user_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah lomba Produk
    public function tambah_user()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Tambah User Panitia';
        $data['user_id'] = $user_id;

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            [
                'required' => 'Username Tidak Boleh Kosong',
                'is_unique' => 'Username Telah Digunakan'
            ]
        );
        $this->form_validation->set_rules('namaUsaha', 'Nama Usaha', 'required|trim|is_unique[user.namaUsaha]', [
            'required' => 'Nama Usaha Tidak Boleh Kosong',
            'is_unique' => 'Nama Usaha Sudah Digunakan'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'required' => 'Password Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Salah',
                'min_length' => 'Minimal Password 6 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim'
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('user/tambah_user', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Auth->registrasi();
            $this->session->set_flashdata('pesan', 'Berhasil Tambah User');
            redirect('user');
		
        }
    }

    // Hapus lomba 
    public function hapus_user($id_user)
    {
        $this->Model_Auth->hapus_user($id_user);
        $this->session->set_flashdata('pesan', 'Berhasil hapus user');
        redirect('user');
    }

    // Update lomba
    public function update_user($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $data['user']['namaUsaha'];
        $data['title'] = 'Update User';
        $data['user_id'] = $user_id;
        $data['user'] = $this->db->get_where('user', ['id_username' => $id_user])->row_array();

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            [
                'required' => 'Username Tidak Boleh Kosong',
                'is_unique' => 'Username Telah Digunakan'
            ]
        );
        $this->form_validation->set_rules('namaUsaha', 'Nama Lengkap', 'required|trim|is_unique[user.namaUsaha]', [
            'required' => 'Nama Lengkap Tidak Boleh Kosong',
            'is_unique' => 'Nama Lengkap Sudah Digunakan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('user/update_user', $data);
            $this->load->view('template/footer');
        } else {
            $this->Model_Auth->update_user($id_user);
            $this->session->set_flashdata('pesan', 'Update User Berhasil');
            redirect('user'); 
        }
    }

    public function ganti_password($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $data['user']['id_username'];
        $user_password = $data['user']['password'];
        $data['title'] = 'Ganti Password';
        $data['nama'] = $data['user']['namaUsaha'];
        $data['user'] = $this->db->get_where('user', ['id_username' => $id_user])->row_array();

        $this->form_validation->set_rules(
            'old_password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Lama Tidak Boleh Kosong',
            ]
        );

        $this->form_validation->set_rules(
            'new_password1',
            'Password',
            'required|trim|min_length[6]|matches[new_password2]',
            [
                'required' => 'Password Baru Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Tidak Sesuai',
                'min_length' => 'Minimal Password 6 Karakter'
            ]
        );

        $this->form_validation->set_rules(
            'new_password2',
            'Password',
            'required|trim'
        );
        $password = md5($this->input->post('old_password'));
        $id_user = $this->input->post('id');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('user/gantipass', $data);
            $this->load->view('template/footer');
        } else {
            if ($password == $user_password) {
                $this->Model_Profil->update_password($id_user);
                $this->session->set_flashdata('pesan', 'Update Password');
                redirect('profil');
            } else {
                $this->session->set_flashdata('old_password', 'Password Lama Tidak Sesuai');
                redirect('profil/ganti_password');
            }
        }
    }
}
