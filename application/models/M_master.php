<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{
    public function slide($limit)
    {
        $sql = $this->db->query("SELECT * FROM tbl_artikel  ORDER BY id_artikel DESC LIMIT $limit");
        return $sql;
    }

    public function slide1($limit)
    {
        $sql = $this->db->query("SELECT * FROM tbl_artikel  ORDER BY id_artikel DESC LIMIT $limit");
        return $sql;
    }
    public function download($id)
    {
        $query =$this->db->get_where('tbl_pemohon',array('id_pemohon'=>$id));
        return  $query->row_array();
       
    }
    public function tampilRegis()
    {
        $where='tidak';

        $this->db->select('*');
        $this->db->from('tbl_user');
        
        $this->db->where('status',$where);
        $query = $this->db->get();
        return $query->result();
    }
    public function tampilUser()
    {
        $where='aktif';
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('role_id = 4');
        $this->db->where('status',$where);
        $this->db->order_by('id_user','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampildesa()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('role_id = 2');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampilpemohon()
    {
        $this->db->select('*');
        $this->db->from('tbl_pemohon');
        $this->db->order_by('id_pemohon', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilberkas($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemohon');
        $this->db->where('id_pemohon',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilpeng()
    {
        $this->db->select('*');
        $this->db->from('tbl_pengumuman');
        $query = $this->db->get();
        return $query->result();
    }

    public function detailPeng($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengumuman');
        $this->db->where('id_pengumuman',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilArtikel()
    {
        $this->db->select('*');
        $this->db->from('tbl_artikel');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampildetail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_artikel');
        $this->db->where('id_artikel',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function tampilVisi()
    {
        $this->db->select('*');
        $this->db->from('tbl_visi');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilPengum()
    {
        $this->db->select('*');
        $this->db->from('tbl_pengumuman');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampilsejarah()
    {
        $this->db->select('*');
        $this->db->from('tbl_sejarah');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampiltentang()
    {
        $this->db->select('*');
        $this->db->from('tbl_tentang');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampilstruktur()
    {
        $this->db->select('*');
        $this->db->from('tbl_struktur');
        $query = $this->db->get();
        return $query->result();
    }

    function simpanData($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function totalData()
    {
        return $this->db->get('tbl_pegawai')->num_rows();
    }
    public function totalini($nowDate)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemohon');
        $this->db->where('tgl', $nowDate);
        $this->db->order_by('id_pemohon');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
