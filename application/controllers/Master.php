<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Surat');
		$this->load->model('M_master');
    }
	public function index()
	{
        $data['visi']=$this->M_master->tampilVisi();
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_visi',$data);
		$this->load->view('frontend/templet/footer',$data);
	}

	public function sejarah(){
		$data['sejarah']=$this->M_master->tampilSejarah();
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_sejarah',$data);
		$this->load->view('frontend/templet/footer');
	}
	public function tentang(){
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_tentang',$data);
		$this->load->view('frontend/templet/footer',$data);
	}
	public function struktur(){
		$data['struktur']=$this->M_master->tampilstruktur();
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_struktur',$data);
		$this->load->view('frontend/templet/footer',$data);
	}
	public function Surat(){

		$data['surat']=$this->M_Surat->tampilSurat();
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_surat',$data);
		$this->load->view('frontend/templet/footer',$data);
	}
	

	public function detailPeng($id){
		$data['peng']=$this->M_master->detailPeng($id);
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_detailPeng',$data);
		$this->load->view('frontend/templet/footer',$data);
	}

	
}
