<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantu extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Surat');
		$this->load->model('M_master');
    }
	public function index()
	{
        $data['bantuan']=$this->M_master->tampiltentang();
		$this->load->view('frontend/templet/header');
		$this->load->view('frontend/V_tentang',$data);
		$this->load->view('frontend/templet/footer',$data);
	}

	}