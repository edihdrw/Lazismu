<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class manfaat_m extends CI_Model
{
    public function lihat()
    {

        $this->db->select('*');
        $this->db->from('tb_manfaat');
        $this->db->join('kategori', 'tb_manfaat.kategori_manfaat= kategori.id');
        $this->db->join('jiwa', ' jiwa.nik_jiwa = tb_manfaat.nik', 'left');
        $this->db->join('keluarga', 'keluarga.nik_keluarga = tb_manfaat.m_nik_keluarga', 'left');
        $this->db->join('lembaga', 'lembaga.nik_lembaga = tb_manfaat.m_nik_lembaga', 'left');
        $this->db->join('provinsi', 'tb_manfaat.m_provinsi= provinsi.id_prov');
        $this->db->join('kota', 'tb_manfaat.m_kota= kota.id_kota');
        $this->db->join('kecamatan', 'tb_manfaat.m_kecamatan= kecamatan.id_kec');
        $this->db->join('desa', 'tb_manfaat.m_desa= desa.id_desa');
        return $this->db->get('');
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

    public function hapus_manfaat($id)
    {
        $sql = "DELETE user,pemohon,peserta 
        FROM user,pemohon,peserta 
        WHERE user.id_user=pemohon.id_pemohon 
        AND pemohon.id_pemohon=peserta.id_peserta 
        AND pemohon.id_pemohon= ?";

        $this->db->query($sql, array($id));
    }

    public function get_detail($where, $table)
    {

        $query = $this->db->get_where($table, array($where))->row();
        return $query;
    }

    public function ambil_nik($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_manfaat');
        $this->db->join('kategori', 'tb_manfaat.kategori_manfaat= kategori.id');
        $this->db->join('jiwa', ' jiwa.nik_jiwa = tb_manfaat.nik', 'left');
        $this->db->join('keluarga', 'keluarga.nik_keluarga = tb_manfaat.m_nik_keluarga', 'left');
        $this->db->join('lembaga', 'lembaga.nik_lembaga = tb_manfaat.m_nik_lembaga', 'left');
        $this->db->join('provinsi', 'tb_manfaat.m_provinsi= provinsi.id_prov');
        $this->db->join('kota', 'tb_manfaat.m_kota= kota.id_kota');
        $this->db->join('kecamatan', 'tb_manfaat.m_kecamatan= kecamatan.id_kec');
        $this->db->join('desa', 'tb_manfaat.m_desa= desa.id_desa');
        $this->db->like('nik', $keyword)
            ->or_like('m_nik_keluarga', $keyword)
            ->or_like('m_nik_lembaga', $keyword);
        return $this->db->get('')->row();
    }
}
