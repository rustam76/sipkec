<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
		$data['user'] = $this->M_master->tampilUser();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_user', $data);
		$this->load->view('templet/footer');
	}
	function hapus($id)
	{
		$where = array(
			'id_user' => $id,
		);
		// var_dump($where);
		$this->db->delete('tbl_user', $where);
		$this->session->set_flashdata('pesan', 'berhasil hapus data');
		redirect('admin/user');
	}
	public function ubah()
	{
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		$where = array(
			'id_user' => $id
		);

		$data = array(
			'nik' => $nik,
			'username' => $username,
			'password' => $password,
			'role_id' => '4',
			'status' => $status
		);
		// var_dump($data,$where);
		$this->db->update('tbl_user', $data, $where);
		$this->session->set_flashdata('pesan', 'berhasil Ubah Data');
		redirect('admin/User');
	}


	public function Regis()
	{
		// $nowDate=date("Y-m-d");
		$data['regis'] = $this->M_master->tampilRegis();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_regis', $data);
		$this->load->view('templet/footer');
	}
	public function simpan()
	{
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

		$this->db->insert('tbl_user', $data);
		$this->session->set_flashdata('pesan', 'berhasil Tambah Data');
		redirect('admin/User/Regis');
	}
	public function CekRegis($kode)
	{
		$this->db->query("UPDATE tbl_user SET status='aktif' Where id_user=$kode");
		redirect('admin/User/Regis');
	}

	
	public function ubahPengguna()
	{

		$id = $this->input->post('id');

		$config['upload_path'] = "./assets/img";
		$config['allowed_types'] = 'jpg||png||gif';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {

			$nik = $this->input->post('nik');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$status = $this->input->post('status');
			$where = array(
				'id_user' => $id
			);

			$data = array(
				'nik' => $nik,
				'username' => $username,
				'password' => $password,
				'status' => $status
			);
			// var_dump($data,$where);
			$this->db->update('tbl_user', $data, $where);
			$this->session->set_flashdata('pesan', 'berhasil Ubah Data');
			redirect('admin/User');
		} else {

			$foto = $this->upload->data();
			$foto = $foto['file_name'];

			$nik = $this->input->post('nik');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$status = $this->input->post('status');
			$where = array(
				'id_user' => $id
			);

			$data = array(
				'nik' => $nik,
				'username' => $username,
				'password' => $password,
				'foto' => $foto,
				'status' => $status
			);
			// var_dump($data,$where);
			$this->db->update('tbl_user', $data, $where);
			$this->session->set_flashdata('pesan', 'berhasil Ubah Data');
			redirect('admin/User/pengguna');
		}
	}
}
