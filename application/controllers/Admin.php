<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer');
    }
    public function listUser()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Daftar User/Admin";

        $data['daftarUser'] = $this->db->get('user')->result_array();



        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/list_user', $data);
        $this->load->view('admin/templates/footer');
    }
    public function hapus_user($id)
    {
        $where = array('id' => $id);
        $this->distribusi_m->hapus($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Data Berhasil Di Hapus!
</div>');
        redirect('admin/listuser');
    }
}
