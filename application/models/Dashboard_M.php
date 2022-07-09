<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_m extends CI_Model
{
    public function lihat($table)
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


    public function get_detail($where, $table)
    {

        $query = $this->db->get_where($table, array($where))->row();
        return $query;
    }
    public function ambil_data($data, $table)
    {
        $this->db->select_sum($data);
        $this->db->from($table);

        return $this->db->get('')->row();
    }
}
