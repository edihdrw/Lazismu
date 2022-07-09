<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

            $data = array(

                'asnaf1' => $this->dashboard_m->lihat('asnaf')->result_array(),
                'program' => $this->dashboard_m->lihat('program')->result_array(),
                'dana' => $this->dashboard_m->lihat('dana')->result_array(),
                'dana1' => $this->dashboard_m->lihat('dana')->result_array(),
                'bulan' => $this->dashboard_m->lihat('bulan')->result_array(),
                'hitungDis' => $this->db->get('tb_distribusi')->num_rows(),
                'hitungBantuan' => $this->dashboard_m->ambil_data('total_penerima', 'tb_distribusi'),
                'hitungSaluran' => $this->dashboard_m->ambil_data('total_saluran', 'tb_distribusi'),
                'hitungSasaran' => $this->dashboard_m->ambil_data('estimasi_orang', 'tb_distribusi'),
                'distribusi' => $this->distribusi_m->lihat()->result_array(),
                'total_dana' => $this->distribusi_m->dana_sum()

            );

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Dashboard";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }
}
