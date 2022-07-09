<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class wilayah extends CI_Model
{
    // CRUD

    public function lihat_wilayah($table)
    {
        return $this->db->get($table);
    }

    public function kabupaten($provId)
    {
        $kabupaten = " <option value='0'>--Pilih Kabupaten/Kota--</pilih>
        ";

        $this->db->order_by('kota', 'ASC');
        $kab = $this->db->get_where('kota', array('id_prov' => $provId));

        foreach ($kab->result_array() as $data) {
            $kabupaten .= "
            <option value='$data[id_kota]'>$data[kota]</option>
            ";
        }

        return $kabupaten;
    }

    public function kecamatan($kabId)
    {
        $kecamatan = "<option value='0'>--Pilih Kecamatan--</pilih>";

        $this->db->order_by('kec', 'ASC');
        $kab = $this->db->get_where('kecamatan', array('kota_id' => $kabId));

        foreach ($kab->result_array() as $data) {
            $kecamatan .= "
            <option  value='$data[id_kec]'>$data[kec]</option>";
        }

        return $kecamatan;
    }
    public function desa($kecId)
    {
        $desa = "<option value='0'>--Pilih Desa--</pilih>";

        $this->db->order_by('desa', 'ASC');
        $kab = $this->db->get_where('desa', array('kec_id' => $kecId));

        foreach ($kab->result_array() as $data) {
            $desa .= "
            <option  value='$data[id_desa]'>$data[desa]</option>";
        }

        return $desa;
    }
}
