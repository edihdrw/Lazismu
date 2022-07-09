<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class peta_m extends CI_Model
{
    // CRUD
    public function lihat()
    {
        $this->db->select('*');
        $this->db->from('tb_distribusi');
        $this->db->join('provinsi', 'tb_distribusi.provinsi= provinsi.id_prov');
        $this->db->join('kota', 'tb_distribusi.kota= kota.id_kota');
        $this->db->join('kecamatan', 'tb_distribusi.kecamatan= kecamatan.id_kec');
        $this->db->join('desa', 'tb_distribusi.desa= desa.id_desa');
        $this->db->group_by('tb_distribusi.desa');
        return $this->db->get('');
    }
    public function lihat1()
    {
        $this->db->select('desa');
        return $this->db->get('tb_distribusi');
    }
    // public function lihat_peta()
    // {
    //     $this->db->select('tb_distribusi.desa,tb_distribusi.kecamatan,tb_distribusi.kota,tb_distribusi.provinsi');
    //     $this->db->group_by('tb_distribusi.desa');
    //     return $this->db->get('tb_distribusi')->result_array();
    // }
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
        $this->db->where('id', $id);
        $result = $this->db->get('');
        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function delete_gambar($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->from($table);
        return true;
    }
}
