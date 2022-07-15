<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DistribusiUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin'); 
        $this->load->model('wilayah');
        $this->load->model('distribusi_m');
        $this->load->model('manfaat_m');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $data = array(
                'provinsi' => $this->wilayah->lihat_wilayah('provinsi')->result_array(),
                'kota' => $this->wilayah->lihat_wilayah('kota')->result_array(),
                'kecamatan' => $this->wilayah->lihat_wilayah('kecamatan')->result_array(),
                'desa' => $this->wilayah->lihat_wilayah('desa')->result_array(),
                'asnaf1' => $this->wilayah->lihat_wilayah('asnaf')->result_array(),
                'kategori' => $this->wilayah->lihat_wilayah('kategori')->result_array(),
                'program' => $this->wilayah->lihat_wilayah('program')->result_array(),
                'dana' => $this->wilayah->lihat_wilayah('dana')->result_array(),
                'mandist' => $this->wilayah->lihat_wilayah('tb_mandist')->result_array(),
                'distribusi' => $this->distribusi_m->lihat()->result_array(),
                'title' => 'Distribusi'

            );
            $data['manfaat'] = $this->manfaat_m->lihat()->result_array();

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();




            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/distribusi', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }

    // public function dataMandist()
    // {

    //     $id_distribusi = $this->input->post('id_distribusi');
    //     $id_manf = $this->input->post('id_manf');

    //     foreach($id_manf as $manf){

    //     }

    //     $data1 = $this->wilayah->lihat_wilayah('tb_mandist')->result();
    //     echo json_encode($data1);
    // }

    public function tambahMandist()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $id_distribusi = $this->input->post('id_distribusi');
            $id_manfaat = $this->input->post('id_manfaat');

            foreach ($id_distribusi as $dis) {
                foreach ($id_manfaat as $manf) {
                    $this->distribusi_m->tambah_mandist(array(
                        'id_distribusi' => $dis,
                        'id_manf' => $manf,
                    ));
                }
                redirect('distribusiuser/index');
            }
        } else {
            redirect('auth');
        }
    }

    public function mandist_update()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $id_mandist = $this->input->post('id_mandist');
            $nilai_donasi = $this->input->post('nilai_donasi');
            $bentuk_donasi = $this->input->post('bentuk_donasi');

            $result = array();
            foreach ($id_mandist as $key => $val) {
                $result[] = array(
                    'id_mandist' => $id_mandist[$key],
                    'nilai_donasi' => $nilai_donasi[$key],
                    'bentuk_donasi' => $bentuk_donasi[$key],
                );
            }
            $this->db->update_batch('tb_mandist', $result, 'id_mandist');

            // foreach ($bentuk_donasi as $bentuk) {
            //     foreach ($nilai_donasi as $nilai) {
            //         $this->distribusi_m->upadate_mandist($id_mandist, array(
            //             'nilai_donasi' => $nilai,
            //             'bentuk_donasi' => $bentuk,

            //         ));
            //     }
            // }
            redirect('distribusiuser/index');
        } else {
            redirect('auth');
        }
    }

    public function hapus_mandist($id_mandist)
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $where = array('id_mandist' => $id_mandist);
            $this->distribusi_m->hapus($where, 'tb_mandist');
            redirect('distribusiuser/index');
        } else {
            redirect('auth');
        }
    }

    function ambil_data()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $modul = $this->input->post('modul');
            $id = $this->input->post('id');

            if ($modul == "kabupaten") {
                echo $this->wilayah->kabupaten($id);
            } elseif ($modul == "kecamatan") {
                echo $this->wilayah->kecamatan($id);
            } elseif ($modul == "desa") {
                echo $this->wilayah->desa($id);
            }
        } else {
            redirect('auth');
        }
    }

    public function tambah_distribusi()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $lazismu = $this->input->post('lazismu');
            $kegiatan = $this->input->post('kegiatan');
            $id_user = $this->input->post('id_user');
            $program = $this->input->post('program');
            $dana = $this->input->post('dana');
            $asnaf = $this->input->post('asnaf');
            $tanggal = $this->input->post('tanggal');
            $total_saluran = $this->input->post('total_saluran');
            $total_penerima = $this->input->post('total_penerima');
            $estimasi_orang = $this->input->post('estimasi_orang');
            $bentuk_bantuan = $this->input->post('bentuk_bantuan');
            $provinsi = $this->input->post('provinsi');
            $kota = $this->input->post('kota');
            $kecamatan = $this->input->post('kecamatan');
            $desa = $this->input->post('desa');

            $gambar = $_FILES['gambar'];

            if ($gambar != null) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['overwrite'] = true;
                $config['max_size']     = '20000';
                $config['remove_spaces'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Gambar Harus JPG/PNG!
</div>');

                    redirect('distribusiuser/index');
                } else {
                    $data = [
                        'lazismu' => $lazismu,
                        'kegiatan' => $kegiatan,
                        'program' => $program,
                        'dana' => $dana,
                        'asnaf' => $asnaf,
                        'tanggal' => $tanggal,
                        'total_saluran' => $total_saluran,
                        'total_penerima' => $total_penerima,
                        'estimasi_orang' => $estimasi_orang,
                        'bentuk_bantuan' => $bentuk_bantuan,
                        'provinsi' => $provinsi,
                        'kota' => $kota,
                        'kecamatan' => $kecamatan,
                        'desa' => $desa,
                        'gambar' => $this->upload->data('file_name'),
                        'id_user' => $id_user,

                    ];
                    if ($data == true) {
                        $this->m_admin->tambah('tb_distribusi', $data);

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Data Berhasil Ditambah!
</div>');
                        redirect('distribusiuser/index');
                    }
                }
            } else {
                $data = [
                    'lazismu' => $lazismu,
                    'kegiatan' => $kegiatan,
                    'program' => $program,
                    'dana' => $dana,
                    'asnaf' => $asnaf,
                    'tanggal' => $tanggal,
                    'total_saluran' => $total_saluran,
                    'total_penerima' => $total_penerima,
                    'estimasi_orang' => $estimasi_orang,
                    'bentuk_bantuan' => $bentuk_bantuan,
                    'provinsi' => $provinsi,
                    'kota' => $kota,
                    'kecamatan' => $kecamatan,
                    'desa' => $desa,
                    'id_user' => $id_user,

                ];
                if ($data == true) {
                    $this->m_admin->tambah('tb_distribusi', $data);

                    $this->session->set_flashdata('success', 'Data berhasil ditambah');
                    redirect('distribusiuser/index');
                }
            }
        } else {
            redirect('auth');
        }
    }

    // public function detai_distribusi($id_dis)
    // {

    //     $detail = $this->distribusi_m-- > get_detail(['id_dis' => $id_dis], 'tb_distribusi');

    //     $data['detail'] = $detail;
    //     redirect()
    // }

    public function edit_distribusi()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $id_dis = $this->input->post('id_dis');
            $lazismu = $this->input->post('lazismu');
            $kegiatan = $this->input->post('kegiatan');
            $program = $this->input->post('program');
            $dana = $this->input->post('dana');
            $asnaf = $this->input->post('asnaf');
            $tanggal = $this->input->post('tanggal');
            $total_saluran = $this->input->post('total_saluran');
            $total_penerima = $this->input->post('total_penerima');
            $estimasi_orang = $this->input->post('estimasi_orang');
            $bentuk_bantuan = $this->input->post('bentuk_bantuan');
            $provinsi = $this->input->post('provinsi');
            $kota = $this->input->post('kota');
            $kecamatan = $this->input->post('kecamatan');
            $desa = $this->input->post('desa');


            $gambar = $_FILES['gambar'];

            if (empty($gambar['name'])) {
                $data = [
                    'lazismu' => $lazismu,
                    'kegiatan' => $kegiatan,
                    'program' => $program,
                    'dana' => $dana,
                    'asnaf' => $asnaf,
                    'tanggal' => $tanggal,
                    'total_saluran' => $total_saluran,
                    'total_penerima' => $total_penerima,
                    'estimasi_orang' => $estimasi_orang,
                    'bentuk_bantuan' => $bentuk_bantuan,
                    'provinsi' => $provinsi,
                    'kota' => $kota,
                    'kecamatan' => $kecamatan,
                    'desa' => $desa
                ];


                $this->distribusi_m->ubah(['id_dis' => $id_dis], 'tb_distribusi', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Data Berhasil Di Update Tanpa Gambar!
</div>');

                redirect($this->agent->referrer());
            } else {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['overwrite'] = true;
                $config['max_size']     = '20000';
                $config['remove_spaces'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Gambar Harus JPG/PNG!
</div>');

                    redirect($this->agent->referrer());;
                } else {
                    $f = $this->db->select('gambar')->get_where('tb_distribusi', ['id_dis' => $id_dis])->row();
                    unlink('./uploads/' . $f->gambar);
                    $data = [
                        'lazismu' => $lazismu,
                        'kegiatan' => $kegiatan,
                        'program' => $program,
                        'dana' => $dana,
                        'asnaf' => $asnaf,
                        'tanggal' => $tanggal,
                        'total_saluran' => $total_saluran,
                        'total_penerima' => $total_penerima,
                        'estimasi_orang' => $estimasi_orang,
                        'bentuk_bantuan' => $bentuk_bantuan,
                        'provinsi' => $provinsi,
                        'kota' => $kota,
                        'kecamatan' => $kecamatan,
                        'desa' => $desa,
                        'gambar' => $this->upload->data('file_name')

                    ];

                    $this->distribusi_m->ubah(['id_dis' => $id_dis], 'tb_distribusi', $data);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Data Berhasil Di Update!
</div>');
                    redirect($this->agent->referrer());
                }
            }
        } else {
            redirect('auth');
        }
    }


    public function hapus_distribusi($id_dis)
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $where = array('id_dis' => $id_dis);
            $data = $this->distribusi_m->ambil_id_gambar('tb_distribusi', $id_dis);
            $path = './uploads/';
            @unlink($path . $data->gambar);

            if ($this->distribusi_m->delete_gambar('tb_distribusi', $id_dis) == true) {
                $this->distribusi_m->hapus($where, 'tb_distribusi');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Data Berhasil Di Hapus!
</div>');
            }
            redirect('distribusiuser/index');
        } else {
            redirect('auth');
        }
    }



    public function asnaf()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $data = [
                // 'dAsnaf' => $this->wilayah->lihat_wilayah('asnaf')->result_array(),
                'distribusi' => $this->wilayah->lihat_wilayah('tb_distribusi')->result_array(),

                'tahun' => $this->distribusi_m->lihat_tahun()->result_array(),




            ];



            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Rekap Distribusi Asnaf";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/dAsnaf', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function load_asnaf()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $tahun = $this->input->post('modul');

            if ($tahun != 0) {
                $data = [
                    'dAsnaf' => $this->wilayah->lihat_wilayah('asnaf')->result_array(),
                    'distribusi' => $this->db->get_where('tb_distribusi', ['YEAR(tanggal)' => $tahun])->result_array(),

                ];
            } else {
                $data = [
                    'dAsnaf' => $this->wilayah->lihat_wilayah('asnaf')->result_array(),
                    'distribusi' => $this->wilayah->lihat_wilayah('tb_distribusi')->result_array(),

                ];
            }



            $no = 1;
            $total = 0;

            foreach ($data['dAsnaf'] as $da) { ?>
                <tr>
                    <td style="width: 10%;"><?= $no++ ?></td>
                    <td><?= $da['asnaf'] ?></td>
                    <td>
                        <?php

                        $total_saluran = 0;



                        foreach ($data['distribusi'] as $dis) {
                            if ($da['asnaf'] == $dis['asnaf']) {
                                $totalAsnaf = $dis['total_saluran'];
                                $total_saluran += $totalAsnaf;
                            }
                        }
                        $total += $total_saluran; ?>


                        <span class="mr-1">Rp</span>

                        <?php echo number_format($total_saluran, 2, ',', '.');

                        ?>

                    </td>

                </tr>

            <?php
            } ?>
            <tr>



                <td colspan="2">Total</td>
                <td class="bg-success">

                    <span class="mr-1">Rp</span>
                    <?php

                    echo number_format($total, 2, ',', '.'); ?>
                </td>


            </tr>
            <?php
        } else {
            redirect('auth');
        }
    }
    public function program()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $data = [

                'program' => $this->wilayah->lihat_wilayah('program')->result_array(),
                'distribusi' => $this->wilayah->lihat_wilayah('tb_distribusi')->result_array(),

                'tahun' => $this->distribusi_m->lihat_tahun()->result_array(),


            ];

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Rekap Distribusi Programs";

            $this->load->view('user/templates/header', $data);
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/dProgram', $data);
            $this->load->view('user/templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function load_program()
    {
        if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
            $tahun = $this->input->post('modul');

            if ($tahun != 0) {
                $data = [
                    'program' => $this->wilayah->lihat_wilayah('program')->result_array(),

                    # code...

                    'distribusi' => $this->db->get_where('tb_distribusi', ['YEAR(tanggal)' => $tahun])->result_array(),



                ];
            } else {
                $data = [
                    'program' => $this->wilayah->lihat_wilayah('program')->result_array(),

                    # code...

                    'distribusi' => $this->wilayah->lihat_wilayah('tb_distribusi')->result_array(),




                ];
            }

            $no = 1;
            $total = 0;

            foreach ($data['program'] as $da) { ?>
                <tr>
                    <td style="width: 10%;"><?= $no++ ?></td>
                    <td><?= $da['program'] ?></td>
                    <td>
                        <?php

                        $total_saluran = 0;



                        foreach ($data['distribusi'] as $dis) {
                            if ($da['program'] == $dis['program']) {
                                $totalAsnaf = $dis['total_saluran'];
                                $total_saluran += $totalAsnaf;
                            }
                        }
                        $total += $total_saluran; ?>


                        <span class="mr-1">Rp</span>

                        <?php echo number_format($total_saluran, 2, ',', '.');

                        ?>

                    </td>

                </tr>

            <?php
            } ?>
            <tr>



                <td colspan="2">Total</td>
                <td class="bg-success">

                    <span class="mr-1">Rp</span>
                    <?php

                    echo number_format($total, 2, ',', '.'); ?>
                </td>


            </tr>

<?php
        } else {
            redirect('auth');
        }
    }
}
