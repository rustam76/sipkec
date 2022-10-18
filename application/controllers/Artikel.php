<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_master');
    }

	public function index()
	{
	$data['artikel']=$this->M_master->tampilArtikel();
	$data['bantuan']=$this->M_master->tampiltentang();
	$this->load->view('frontend/templet/header');
	$this->load->view('frontend/V_artikel',$data);
	$this->load->view('frontend/templet/footer',$data);
	}
	public function detail($id)
	{
	$data['detail']=$this->M_master->tampildetail($id);
	$data['bantuan']=$this->M_master->tampiltentang();
	$this->load->view('frontend/templet/header');
	$this->load->view('frontend/V_detail',$data);
	$this->load->view('frontend/templet/footer',$data);
	}


}