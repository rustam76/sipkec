<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Surat');
		$this->load->model('M_master');
    }
	public function index()
	{
		$data['slide'] = $this->M_master->slide('0,1');
		$data['slide1'] = $this->M_master->slide('1,10');
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_home',$data);
		$this->load->view('frontend/templet/footer',$data);
	}
	public function artikel(){
		$data['bantuan']=$this->M_master->tampiltentang();
		$data['artikel']=$this->M_master->tampilArtikel();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_artikel',$data);
		$this->load->view('frontend/templet/footer',$data);
	}
	
	public function tentang(){
		$data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_tentang',$data);
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
