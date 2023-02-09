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
}
