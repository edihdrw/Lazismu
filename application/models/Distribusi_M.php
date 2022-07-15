<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class distribusi_m extends CI_Model
{
    // CRUD 
    public function lihat()
    {
        $this->db->select('*');
        $this->db->select('MONTH(tb_distribusi.tanggal) as bulan');
        $this->db->from('tb_distribusi');
        $this->db->join('provinsi', 'tb_distribusi.provinsi= provinsi.id_prov');
        $this->db->join('kota', 'tb_distribusi.kota= kota.id_kota');
        $this->db->join('kecamatan', 'tb_distribusi.kecamatan= kecamatan.id_kec');
        $this->db->join('desa', 'tb_distribusi.desa= desa.id_desa');
        return $this->db->get('');
        // if ($query->num_rows() > 0) {
        //     return $query;
        // } else {
        //     return 0;
        // }
    }


    public function dana_sum()
    {
        $this->db->select_sum('total_saluran');
        $query = $this->db->get('tb_distribusi');
        if ($query->num_rows() > 0) {
            return $query->row()->total_saluran;
        } else {
            return 0;
        }
    }
    // public function get_page(){
    //     $query = $this->db->get('mahasiswa', $limit, $start);
    //     return $query;
    // }
    public function lihat_tahun()
    {
        $this->db->select('tb_distribusi.tanggal, YEAR(tb_distribusi.tanggal) as tahun');
        $this->db->group_by('YEAR(tb_distribusi.tanggal)');
        $this->db->order_by('YEAR(tb_distribusi.tanggal)');
        return $this->db->get('tb_distribusi');
    }
    public function lihat_bulan()
    {
        $this->db->select('tb_distribusi.tanggal, MOUNTH(tb_distribusi.tanggal) as bulan');

        return $this->db->get('tb_distribusi');
    }
    public function lihat_wilayah($table)
    {
        return $this->db->get($table);
    }
    public function tambah($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function ubah($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tambah_mandist($data)
    {
        $this->db->insert('tb_mandist', $data);
    }

    public function upadate_mandist($id, $data)
    {
        $this->db->where(['id_mandist' => $id]);
        $this->db->update('tb_mandist', $data);
    }

    public function mandist($idd)
    {
        $this->db->select('*');
        $this->db->from('tb_mandist');
        $this->db->join('tb_distribusi', 'tb_mandist.id_distribusi= tb_distribusi.id_dis');
        $this->db->join('tb_manfaat', 'tb_mandist.id_manf= tb_manfaat.id_manfaat');
        $this->db->join('kategori', 'tb_manfaat.kategori_manfaat= kategori.id');
        $this->db->where('id_distribusi', $idd);
        return $this->db->get('')->result_array();
    }

    public function hitung($keyAsnaf)
    {

        if ($keyAsnaf) {
            $this->db->select('asnaf');
            //$this->db->select_sum('salaryLaser.credit');
            $this->db->select('SUM(total_saluran) as rekapAsnaf');

            $this->db->from('tb_distribusi');
            $this->db->where('asnaf', $keyAsnaf);

            $advance = $this->db->get();
            if ($advance->num_rows() > 0) {
                return $advance->result_array();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

        // $keyAsnaf = 'Fakir';

        // $query = "SELECT sum(total_saluran) as rekapAsnaf from tb_distribusi where asnaf = $keyAsnaf ";

        // return $this->db->query($query)->row()->rekapAsnaf;
    }



    public function get_detail($where, $table)
    {

        $query = $this->db->get_where($table, array($where))->row();
        return $query;
    }

    public function ambil_id_gambar($table, $id)
    {
        $this->db->from($table);
        $this->db->where('id_dis', $id);
        $result = $this->db->get('');
        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function delete_gambar($table, $id)
    {
        $this->db->where('id_dis', $id);
        $this->db->from($table);
        return true;
    }
}
