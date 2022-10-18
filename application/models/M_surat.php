<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model{
    public function tampilSurat(){
        $this->db->select('*');
        $this->db->from('tbl_surat');
        $query= $this->db->get();
        return $query->result();
    }
    public function tampilSuratuser(){
        $this->db->select('*');
        $this->db->from('tbl_surat');
        $query= $this->db->get();
        return $query->result();
    }
    public function tampilpemohonuser($nik)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemohon');
        $this->db->where('nik_pemohon',$nik);
        $query = $this->db->get();
        return $query->result();
    }
    public function tampildisposisi(){
        $status='belum';

        $this->db->select('*');
        $this->db->from('tbl_disposisi');
        $this->db->join('tbl_pemohon','tbl_pemohon.id_pemohon= tbl_disposisi.pemohon_id');
        $this->db->where('status_disposisi',$status);
        $query= $this->db->get();
        return $query->result();
    }
}