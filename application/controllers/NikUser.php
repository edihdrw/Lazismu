<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NikUser extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('manfaat_m');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Data NIK";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/nik', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function cari_nik()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $nik = $this->input->post('nik');

            // var_dump($nik);
            // die;

            if ($nik == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Harap Masukan NIK!
                </div>');
                redirect('nikuser');
            } else {

                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Data NIK";

                $data['nik'] = $this->manfaat_m->ambil_nik($nik);

                if ($data['nik'] != null) {
                    $this->load->view('user/templates/header', $data);
                    $this->load->view('user/templates/sidebar', $data);
                    $this->load->view('user/hasil_nik', $data);
                    $this->load->view('user/templates/footer');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Data Kosong!
                    </div>');
                    redirect('nikuser');
                }


                // print_r($data['nik']);
                // die;

                // $query = $this->db->get_where('tb_manfaat', ['nik' => $nik]);
            }
        } else {
            redirect('auth');
        }
    }
}
