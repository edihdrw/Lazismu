<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManfaatUser extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('wilayah');
        $this->load->model('manfaat_m');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $data = [
                'provinsi' => $this->wilayah->lihat_wilayah('provinsi')->result_array(),
                'kota' => $this->wilayah->lihat_wilayah('kota')->result_array(),
                'kecamatan' => $this->wilayah->lihat_wilayah('kecamatan')->result_array(),
                'desa' => $this->wilayah->lihat_wilayah('desa')->result_array(),
                'asnaf' => $this->m_admin->lihat('asnaf')->result_array(),
                'kategori' => $this->m_admin->lihat('kategori')->result_array(),

            ];

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Input Data Manfaat";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/inputManfaat', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }

    function ambil_data()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $id = $this->input->post('id');



            if ($id == 1) {
                echo "
            <div class=\"form-group\">
                                    <label>Nama</label>
                                    <input name=\"nama\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                <div class=\"form-group\">
                                    <label>NIK </label>
                                    <input name=\"nik\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                <div class=\"form-group\">
                                    <label>Nomer KK</label>
                                    <input name=\"kk\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>

                                <div class=\"form-group\">
                                    <label>Jenis Kelamin</label>
                                    <select class=\"form-control\" name=\"kelamin\">
                                        <option>--Pilih--</option>
                                        <option value = \"Laki-Laki\">Laki-Laki</option>
                                        <option value = \"Perempuan\">Perempuan</option>
                                      s
                                    </select>
                                </div>

                                <div class=\"form-group\">
                                    <label>Tempat Lahir</label>
                                    <input name=\"tmp_lahir\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>

                                <div class='form-group'>
                                    <label>Tanggal</label>

                                    <div class='input-group'>
                                       
                                        <input name='tanggal'  type='date' class='form-control'>
                                    </div>
                                
                                </div>

                                <div class=\"form-group\">
                                    <label>Pendidikan</label>
                                    <input name=\"pendidikan\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div><div class=\"form-group\">
                                    <label>Pekerjaan</label>
                                    <input name=\"pekerjaan\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div><div class=\"form-group\">
                                    <label>Nomer HP</label>
                                    <input name=\"hp\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
            
            ";
            } elseif ($id == 2) {
                echo "
            <div class=\"form-group\">
                                    <label>Nama</label>
                                    <input name = \"nama\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                <div class=\"form-group\">
                                    <label>NIK </label>
                                    <input name=\"nik\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                <div class=\"form-group\">
                                    <label>Nomer KK</label>
                                    <input name=\"kk\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                </div><div class=\"form-group\">
                                    <label>Nomer HP</label>
                                    <input name=\"hp\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                             
            
            ";
            } elseif ($id == 3) {
                echo "
            <div class=\"form-group\">
                                    <label>Nama Lembaga</label>
                                    <input type=\"text\" name = \"nama_lembaga\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                 <div class=\"form-group\">
                                    <label>Nama PIC</label>
                                    <input name = \"nama\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                <div class=\"form-group\">
                                    <label>NIK PIC </label>
                                    <input name=\"nik\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                              
                                </div><div class=\"form-group\">
                                    <label>Nomer HP</label>
                                    <input name=\"hp\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                             
            
            ";
            } elseif ($id == 4) {
                echo "
            <div class=\"form-group\">
                                    <label>Nama Usaha</label>
                                    <input type=\"text\" name = \"nama_lembaga\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                 <div class=\"form-group\">
                                    <label>Nama PIC</label>
                                    <input name = \"nama\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                                <div class=\"form-group\">
                                    <label>NIK PIC </label>
                                    <input name=\"nik\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                              
                                </div><div class=\"form-group\">
                                    <label>Nomer HP</label>
                                    <input name=\"hp\" type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"formjiwa\">
                                </div>
                             
            
            ";
            }
        } else {
            redirect('auth');
        }
    }

    public function tambah_manfaat()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $id_user_m = $this->input->post('id_user_m');
            $sumber = $this->input->post('sumber');
            $asnaf = $this->input->post('asnaf');
            $kategori = $this->input->post('kategori');
            $asnaf = $this->input->post('asnaf');
            $provinsi = $this->input->post('provinsi');
            $kota = $this->input->post('kota');
            $kecamatan = $this->input->post('kecamatan');
            $desa = $this->input->post('desa');
            $alamat = $this->input->post('alamat');


            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $kk = $this->input->post('kk');
            $kelamin = $this->input->post('kelamin');
            $tmp_lahir = $this->input->post('tmp_lahir');
            $tanggal = $this->input->post('tanggal');
            $pendidikan = $this->input->post('pendidikan');
            $pekerjaan = $this->input->post('pekerjaan');
            $hp = $this->input->post('hp');

            $nama_lembaga = $this->input->post('nama_lembaga');


            if ($kategori == 1) {
                $data = [
                    'id_user_m' => $id_user_m,
                    'sumber' => $sumber,
                    'asnaf' => $asnaf,
                    'kategori_manfaat' => $kategori,
                    'nik' => $nik,
                    // 'm_nik_keluarga' => $nik,
                    // 'm_nik_lembaga' => $nik,
                    'nama_manfaat' => $nama,
                    'hp' => $hp,
                    'm_provinsi' => $provinsi,
                    'm_kota' => $kota,
                    'm_kecamatan' => $kecamatan,
                    'm_desa' => $desa,
                    'alamat' => $alamat

                ];
                $this->manfaat_m->tambah('tb_manfaat', $data);

                $data1 = [


                    'nik_jiwa' => $nik,
                    'kk' => $kk,
                    'kelamin' => $kelamin,
                    'tmp_lahir' => $tmp_lahir,
                    'tanggal' => $tanggal,
                    'pendidikan' => $pendidikan,
                    'pekerjaan' => $pekerjaan,


                ];

                $this->manfaat_m->tambah('jiwa', $data1);

                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('manfaatuser');
            } elseif ($kategori == 2) {
                $data = [
                    'id_user_m' => $id_user_m,
                    'sumber' => $sumber,
                    'asnaf' => $asnaf,
                    'kategori_manfaat' => $kategori,
                    // 'nik' => $nik,
                    'm_nik_keluarga' => $nik,
                    // 'm_nik_lembaga' => $nik,
                    'nama_manfaat' => $nama,
                    'hp' => $hp,
                    'm_provinsi' => $provinsi,
                    'm_kota' => $kota,
                    'm_kecamatan' => $kecamatan,
                    'm_desa' => $desa,
                    'alamat' => $alamat

                ];
                $this->manfaat_m->tambah('tb_manfaat', $data);
                $data2 = [


                    'nik_keluarga' => $nik,
                    'kk_keluarga' => $kk,


                ];

                $this->manfaat_m->tambah('keluarga', $data2);
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('manfaatuser');
            } elseif ($kategori == 3 || $kategori == 4) {
                $data = [
                    'id_user_m' => $id_user_m,
                    'sumber' => $sumber,
                    'asnaf' => $asnaf,
                    'kategori_manfaat' => $kategori,
                    // 'nik' => $nik,
                    // 'm_nik_keluarga' => $nik,
                    'm_nik_lembaga' => $nik,
                    'nama_manfaat' => $nama,
                    'hp' => $hp,
                    'm_provinsi' => $provinsi,
                    'm_kota' => $kota,
                    'm_kecamatan' => $kecamatan,
                    'm_desa' => $desa,
                    'alamat' => $alamat

                ];
                $this->manfaat_m->tambah('tb_manfaat', $data);

                $data3 = [

                    'nik_lembaga' => $nik,
                    'nama_lembaga' => $nama_lembaga,
                ];

                $this->manfaat_m->tambah('lembaga', $data3);
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('manfaatuser');
            } else {
                $this->session->set_flashdata('success', 'Data berhasil ditambah');
                redirect('manfaatuser');
            }
        } else {
            redirect('auth');
        }
    }


    public function hapus_manfaat($id_manfaat)
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $where = array('id_manfaat' => $id_manfaat);
            $this->manfaat_m->hapus($where, 'tb_manfaat');

            redirect('manfaatuser/rapor');
        } else {
            redirect('auth');
        }
    }



    public function rapor()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {

            $data['manfaat'] = $this->manfaat_m->lihat()->result_array();
            // $data = $this->manfaat_m->lihat()->result_array();
            // var_dump($data);
            // die;

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Rapor";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/raporManfaat', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }
}
