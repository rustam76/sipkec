<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_auth');
	}
	public function index()
	{
		
		$this->load->view('V_login');
		
	}

	public function Login()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$cekuser = $this->M_auth->CekUser($username);

		if ($cekuser) {
			$ceklogin = $this->M_auth->CekLogin($username, $password);
			if ($ceklogin) {
				foreach ($ceklogin as $row)
					if ($row->status == "aktif") {
						$this->session->set_userdata('id_user', $row->id_user);
						$this->session->set_userdata('username', $row->username);
						$this->session->set_userdata('password', $row->password);
						$this->session->set_userdata('foto', $row->foto);
						$this->session->set_userdata('nik', $row->nik);
						$this->session->set_userdata('status', $row->status);
						$this->session->set_userdata('level', $row->role_id);
						if ($this->session->userdata('level') == 1) {
							$this->session->set_flashdata('pesan','berhasil Login');
							redirect('admin/Dasboard', 'refresh');
						}else{
                            $this->session->set_flashdata('pesan','berhasil Login');
                            redirect('admin/Dasboard');
                        }
					} else {
						$this->session->set_flashdata('pesan','maaf username belum aktif');
						redirect('admin/Home', 'refresh');
					}
			} else {
				$this->session->set_flashdata('pesan','maaf username salah');
				redirect('admin/Home', 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan','Belum Terdafaftar');
			redirect('admin/Home', 'refresh');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin/Home');
	}



}
