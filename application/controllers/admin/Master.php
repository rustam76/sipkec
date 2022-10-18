<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_master');
		if($this->session->userdata('level')==null){
			$this->session->set_flashdata('pesan', 'Jangan Nakal Bro..!!!');
			redirect('admin/Home');
		}else if($this->session->userdata('level')== '4') {
            $this->session->set_flashdata('pesan', 'Anda Bukan Admin');
			redirect('admin/Home/logout');
        }
    }
// visi
	public function index()
	{
		$data['visi']=$this->M_master->tampilVisi();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_visi',$data);
		$this->load->view('templet/footer');
	}

	public function ubahVisi(){
		$id = $this->input->post('id');
		$visi = $this->input->post('visi');
		$misi = $this->input->post('misi');
				
		$where = array(	
            'id_visi' => $id,     	
        );
		$data = array(	
            'visi' => $visi,
            'misi' => $misi,     	
        );

		$this->db->update('tbl_visi',$data,$where);
        $this->session->set_flashdata('pesan','Data Berhasi Di Ubah');
        redirect('admin/Master'); 
		
	}
// Sejarah
	public function sejarah()
	{
		$data['sejarah']=$this->M_master->tampilSejarah();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_sejarah',$data);
		$this->load->view('templet/footer');
	}

	public function ubahSejarah(){
		$id = $this->input->post('id');
		$sejarah = $this->input->post('sejarah');
				
		$where = array(	
            'id_sejarah' => $id,     	
        );
		$data = array(	
            'isi_sejarah' => $sejarah,   	
        );

		$this->db->update('tbl_sejarah',$data,$where);
        $this->session->set_flashdata('pesan','Data Berhasi Di Ubah');
        redirect('admin/Master/sejarah'); 
		
	}

// tentang
	public function tentang()
	{
		$data['tentang']=$this->M_master->tampiltentang();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_tentang',$data);
		$this->load->view('templet/footer');
	}
	public function ubahTentang(){
		$id = $this->input->post('id');
		$alamat = $this->input->post('alamat');
		$luas = $this->input->post('luas');
		$no = $this->input->post('nohub');
		$maps = $this->input->post('maps');
		$email = $this->input->post('email');
		$isi = $this->input->post('isi');
				
		$where = array(	
            'id_tentang' => $id,     	
        );
		$data = array(	
            'alamat' => $alamat,
			'luas' => $luas,
			'nohub' => $no,
			'maps' => $maps, 
			'email' => $email,
			'isi_tentang' => $isi,       	
        );

		$this->db->update('tbl_tentang',$data,$where);
        $this->session->set_flashdata('pesan','Data Berhasi Di Ubah');
        redirect('admin/Master/tentang'); 
		
	}

// struktur
	public function struktur()
	{
		$data['struktur']=$this->M_master->tampilstruktur();
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_struktur',$data);
		$this->load->view('templet/footer');
	}

    public function ubahStruktur()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = "./assets/img";
        $config['allowed_types'] = 'jpg||png||gif';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            
            $this->session->set_flashdata('pesan', 'gagal ubah data');
            redirect('admin/Master/Struktur');
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];

    
            $where = array(
                'id_struktur' => $id,
            );

            $data = array(
              
                'foto' => $foto,

                // 'user_artikel' =>$user

            );
            // var_dump($data);
            $this->db->update('tbl_struktur', $data,$where);
            $this->session->set_flashdata('pesan', 'berhasil ubah data');
			redirect('admin/Master/Struktur');
        }
    }

	


}
