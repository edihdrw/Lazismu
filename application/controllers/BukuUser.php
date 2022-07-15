<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuUser extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_m');
        $this->load->model('distribusi_m');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Buku Manual";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/buku', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }
}
