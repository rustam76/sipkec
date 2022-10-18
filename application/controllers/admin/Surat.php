<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Surat');
		$this->load->model('M_master');
		if($this->session->userdata('level')==null){
			$this->session->set_flashdata('pesan', 'Jangan Nakal Bro..!!!');
			redirect('admin/Home');
		}else if($this->session->userdata('level')== '4') {
            $this->session->set_flashdata('pesan', 'Anda Bukan Admin');
			redirect('admin/Home/logout');
        }
    }
	
	public function index()
	{
		$data['surat']=$this->M_Surat->tampilSurat();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_surat',$data);
		$this->load->view('templet/footer');
	}

	public function pengumuman()
	{
		$data['pengumuman']=$this->M_master->tampilPengum();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_pengumuman',$data);
		$this->load->view('templet/footer');
	}

	public function simpanPengumuman()
	{
		$config['upload_path'] = "./assets/img/peng";
		$config['allowed_types'] = 'jpg||png||gif';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {

			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			// $user = $this->input->post('user');
			$data = array(
				'judul' => $judul,
				'isi_pengumuman' => $isi,
				// 'user_artikel' =>$user
			);
			// var_dump($data);
			$this->db->insert('tbl_pengumuman',$data);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/Surat/pengumuman');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			// $user = $this->input->post('user');

			$data = array(
				'judul' => $judul,
				'isi_pengumuman' => $isi,
				'foto' => $foto,				
				// 'user_artikel' =>$user

			);
			// var_dump($data);
			$this->db->insert('tbl_pengumuman',$data);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/Surat/pengumuman');
		}
	}
	public function ubahPengumuman()
	{
		$id = $this->input->post('id');
		$config['upload_path'] = "./assets/img/peng";
		$config['allowed_types'] = 'jpg||png||gif';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {

			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			// $user = $this->input->post('user');
			
			$where=array(
				'id_pengumuman'=>$id
			);

			$data = array(
				'judul' => $judul,
				'isi_pengumuman' => $isi,
				// 'user_artikel' =>$user
			);
			// var_dump($data);
			$this->db->update('tbl_pengumuman',$data,$where);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/Surat/pengumuman');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];
			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			// $user = $this->input->post('user');

			$where=array(
				'id_pengumuman'=>$id
			);
			$data = array(
				'judul' => $judul,
				'isi_pengumuman' => $isi,
				'foto' => $foto,				
				// 'user_artikel' =>$user

			);
			// var_dump($data);
			$this->db->update('tbl_pengumuman',$data,$where);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/Surat/pengumuman');
		}
	}

	// Simpan data Arsip ke data base
	public function simpan(){
		
		$surat = $this->input->post('nama');
		$syarat = $this->input->post('persyaratan');
		$data = array(	
            'nama_surat' => $surat,
			'persyaratan' => $syarat
        );
		// var_dump($data);
		$this->db->insert('tbl_surat',$data);
        $this->session->set_flashdata('pesan','Data Berhasi Di Tambah');
        redirect('admin/Surat'); 
		
	}

	// Edit Data Arsip
	public function ubah()
	{
		$id= $this->input->post('id');
		$surat = $this->input->post('nama');
		$syarat = $this->input->post('persyaratan');

		$where = array(	
            'id_surat' => $id,
			
        );
		$data = array(	
            'nama_surat' => $surat,
			'persyaratan' => $syarat
        );
		// var_dump($data);
		$this->db->update('tbl_surat',$data,$where);
        $this->session->set_flashdata('pesan','Data Berhasi Di Ubah');
        redirect('admin/Surat');

	
	}
	
	public function Hapus($id)
	{
		$data = array(
				'id_surat' => $id
		);
		$this->db->delete('tbl_surat',$data);
		$this->session->set_flashdata('pesan', 'berhasil Hapus..!!');
		redirect('admin/Surat');
	}
	public function HapusPeng($id)
	{
		$data = array(
				'id_pengumuman' => $id
		);
		$this->db->delete('tbl_pengumuman',$data);
		$this->session->set_flashdata('pesan', 'berhasil Hapus..!!');
		redirect('admin/Surat/pengumuman');
	}
	
}
