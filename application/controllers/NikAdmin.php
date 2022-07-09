<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NikAdmin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('manfaat_m');
        if ($this->session->userdata('role_id') != 1) {
            redirect('auth');
        }
    }
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data NIK";

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/nik', $data);
        $this->load->view('admin/templates/footer');
    }

    public function cari_nik()
    {
        $nik = $this->input->post('nik');

        // var_dump($nik);
        // die;

        if ($nik == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Harap Masukan NIK!
</div>');
            redirect('nikadmin');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Data NIK";

            $data['nik'] = $this->manfaat_m->ambil_nik($nik);

            if ($data['nik'] != NULL) {
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/sidebar', $data);
                $this->load->view('admin/hasil_nik', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Data Kosong!
</div>');
                redirect('nikadmin');
            }

            // print_r($data['nik']);
            // die;

            // $query = $this->db->get_where('tb_manfaat', ['nik' => $nik]);



        }
    }
}
