<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{
    // CRUD
    function lihat($table)
    {
        return $this->db->get($table);
    }



    function lihat_wilayah($table)
    {

        return $this->db->get($table);
    }
    function tambah($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function ubah($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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

    // Pengunjung

    public function ambil_visit($table, $ip, $date)
    {
        $this->db->from($table);
        $this->db->where('ip', $ip);
        $this->db->where('date', $date);
        $result = $this->db->get('')->num_rows();

        return $result;
    }


    function ubah_visit($table, $data, $ip, $date)
    {
        $this->db->where('ip', $ip);
        $this->db->where('date', $date);
        $this->db->update($table, $data);
    }
}
