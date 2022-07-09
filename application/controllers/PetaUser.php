<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PetaUser extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('wilayah');
        $this->load->model('distribusi_m');
        $this->load->model('dashboard_m');
        $this->load->model('peta_m');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {

            $data = array(
                'distribusi' => $this->peta_m->lihat('')->result_array(),
                'distribusi1' => $this->distribusi_m->lihat()->result_array(),

                // 'peta' => $this->peta_m->lihat_peta(),
            );

            // $data1 = $this->peta_m->lihat_peta();

            // var_dump($data1);
            // die;


            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Peta";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/peta', $data);
            $this->load->view('user/templates/footer');
        }
    }
}
