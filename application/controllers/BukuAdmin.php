<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuAdmin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_m');
        $this->load->model('distribusi_m');
        if ($this->session->userdata('role_id') != 1) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Buku Manual";

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/buku', $data);
        $this->load->view('admin/templates/footer');
    }
}
