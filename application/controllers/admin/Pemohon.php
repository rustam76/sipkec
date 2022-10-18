<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemohon extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
		$data['pemohon']=$this->M_master->tampilpemohon();
		$data['desa']=$this->M_master->tampildesa();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_pemohon',$data);
		$this->load->view('templet/footer');
	}
	public function arsip()
	{
		$data['pemohon']=$this->M_master->tampilpemohon();
		// $data['desa']=$this->M_master->tampildesa();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_arsip',$data);
		$this->load->view('templet/footer');
	}

	public function Detail($id)
	{
		$data['detail']=$this->M_master->tampilberkas($id);
		// $data['desa']=$this->M_master->tampildesa();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_detailberkas',$data);
		$this->load->view('templet/footer');
	}

    public function simpanArtikel()
	{
		$config['upload_path'] = "./assets/img/artikel";
		$config['allowed_types'] = 'jpg||png||gif';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			// $foto = $this->upload->data();
			// $foto = $foto['file_name'];

			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			// $user = $this->input->post('user');
			$data = array(
				'judul_artikel' => $judul,
				'isi_artikel' => $isi,
				// 'user_artikel' =>$user
			);
			// var_dump($data);
			$this->db->insert('tbl_artikel',$data);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/Artikel');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];

			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			// $user = $this->input->post('user');

			$data = array(
				'judul_artikel' => $judul,
				'foto' => $foto,
				'isi_artikel' => $isi,
				// 'user_artikel' =>$user

			);
			// var_dump($data);
			$this->db->insert('tbl_artikel',$data);
			$this->session->set_flashdata('pesan', 'berhasil tambah data');
			redirect('admin/Artikel');
		}
	}
	public function Cek(){
		$id = $this->input->post('id');
		$where = array(	
			'id_pemohon' => $id
        );

		$status = $this->input->post('status');

		$data = array(	
			'status' => $status
        );

		$this->db->update('tbl_pemohon',$data,$where);
		$this->session->set_flashdata('pesan', 'berhasil Ubah Status');
			redirect('admin/Pemohon');
	}
	public function disposisi(){
		$id = $this->input->post('id');
		$desa = $this->input->post('nik_desa');

		$data = array(
			'pemohon_id' =>$id,	
			'nik_desa' => $desa
        );

		$this->db->insert('tbl_disposisi',$data);
		$this->session->set_flashdata('pesan', 'berhasil diteruskan');
			redirect('admin/Pemohon');
	}

	public function Upload()
	{
		$config['upload_path'] = "./assets/pemohon";
		$config['allowed_types'] = 'pdf';
		// $config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {
	
			$this->session->set_flashdata('pesan', 'Gagal Tambah Data');
			redirect('Pemohon');
		} else {

			$file = $this->upload->data();
			$file = $file['file_name'];
			$id = $this->input->post('id');
			$where=array(
				'id_pemohon' =>$id
			);
			$data = array(
				'status' => 'selesai',
				'file' => $file,				

			);
			// var_dump($data);
			$this->db->update('tbl_pemohon',$data,$where);
			$this->session->set_flashdata('pesan', 'berhasil Upload Surat');
			redirect('admin/Pemohon');
		}
	}
	public function Hapus($id)
	{
		$data = array(
				'id_pemohon' => $id
		);
		$this->db->delete('tbl_pemohon',$data);
		$this->session->set_flashdata('pesan', 'berhasil Hapus ');
		redirect('admin/Pemohon/Arsip');
	}

}