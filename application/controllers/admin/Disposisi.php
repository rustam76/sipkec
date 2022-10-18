<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_surat');
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
		$data['disposisi']=$this->M_surat->tampildisposisi();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_disposisi',$data);
		$this->load->view('templet/footer');
	}
	public function Cekdesa(){
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
			redirect('admin/Disposisi');
	}
	public function Cek($kode)
    {
        $this->db->query("UPDATE tbl_disposisi SET status_disposisi='selesai' Where id_disposisi=$kode");
        redirect('admin/Disposisi');
    }
}