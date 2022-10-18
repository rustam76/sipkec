<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_master');
		if ($this->session->userdata('level') == null) {
			$this->session->set_flashdata('pesan', 'Jangan Nakal Bro..!!!');
			redirect('admin/Home');
		} else if ($this->session->userdata('level') == '4') {
			$this->session->set_flashdata('pesan', 'Anda Bukan Admin');
			redirect('admin/Home');
		}
	}

public function index()
	{
		// $data['user']=$this->M_master->tampilUser();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_pengguna');
		$this->load->view('templet/footer');
	}

}