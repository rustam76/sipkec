<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		// $this->load->library('upload');
		$this->load->model('M_surat');
		$this->load->model('M_master');
	}

	public function index()
	{
		$data['surat'] = $this->M_surat->tampilSuratuser();
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_permohona', $data);
		$this->load->view('frontend/templet/footer',$data);
	}
	public function suratpemohon()
	{
		$where = $this->session->userdata('nik');

		$data['pemohon'] = $this->M_surat->tampilpemohonuser($where);
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_surat', $data);
		$this->load->view('frontend/templet/footer',$data);
	}
	public function ajukan()
	{
		$config['upload_path'] = "./assets/pemohon";
		$config['allowed_types'] = 'pdf';
		// $config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {

			$surat = $this->input->post('surat');
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$no = $this->input->post('no_hp');
			// $file = $this->input->post('dokumen');

			$data = array(
				'nama_surat' => $surat,
				'nama_pemohon' => $nama,
				'nik_pemohon' => $nik,
				'status' =>'belum dilihat',
				'no_hp' => $no,
				'tgl' => date('Y-m-d')
			);
			// var_dump($data);
			$this->db->insert('tbl_pemohon', $data);
			$this->session->set_flashdata('pesan', 'berhasil ajukan permohonan');
			redirect('Surat');
		} else {

			$file = $this->upload->data();
			$file = $file['file_name'];
			$surat = $this->input->post('surat');
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$no = $this->input->post('no_hp');

			$data = array(
				'nama_surat' => $surat,
				'nama_pemohon' => $nama,
				'nik_pemohon' => $nik,
				'no_hp' => $no,
				'status' =>'belum dilihat',
				'dokumen' => $file,
				'tgl' => date('Y-m-d')

			);
			// var_dump($data);
			$this->db->insert('tbl_pemohon', $data);
			$this->session->set_flashdata('pesan', 'berhasil ajukan permohonan');
			redirect('Surat');
		}
	}
	public function Download($id)
	{$this->load->helper('download');
		$fileinfo = $this->M_master->download($id);
		$data = 'assets/pemohon/'.$fileinfo['file'];
		force_download($data, NULL);
	}
	public function Pengumuman(){
		$data['peng']=$this->M_master->tampilpeng();
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_pengumuman',$data);
		$this->load->view('frontend/templet/footer',$data);
	}
}
