<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_user');
		$this->load->view('templet/footer');
	}
	public function Registrasi(){
		$nik = $this->input->post('nik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(	
			'nik' => $nik,
			'username' => $username,
			'password' => $password,
			'role_id' => '4',
			'status' => 'tidak'
        );

		$this->db->insert('tbl_user',$data);
		$this->session->set_flashdata('pesan', 'berhasil Registrasi Silahkan Tunggu Konfirmasi Admin');
			redirect('Surat');
	}
}
