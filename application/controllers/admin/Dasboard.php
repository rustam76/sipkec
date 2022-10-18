<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {
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
        $nowDate=date("Y-m-d");
		$data['total']=$this->M_master->totalini($nowDate);
        // $data['totalpengaduan']=$this->M_master->totaladu($nowDate);
		// // $data['total_kategori']=$this->M_kategori->totalDataKategori();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_home',$data);
		$this->load->view('templet/footer');
	}
}