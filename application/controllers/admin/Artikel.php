<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
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

    public function index()
    {
        $data['artikel'] = $this->M_master->tampilArtikel();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/V_artikel', $data);
        $this->load->view('templet/footer');
    }
    public function while()
    {
        // $data['artikel'] = $this->M_master->tampilArtikel();
        $this->load->view('templet/header');
        $this->load->view('templet/sidebar');
        $this->load->view('admin/V_while');
        $this->load->view('templet/footer');
    }
   

    public function simpanArtikel()
    {
        $config['upload_path'] = "./assets/img/artikel";
        $config['allowed_types'] = 'jpg||png||gif';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            // $foto = $this->upload->data();
            // $foto = $foto['file_name'];

            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            // $user = $this->input->post('user');
            $data = array(
                'judul_artikel' => $judul,
                'isi_artikel' => $isi,
                // 'user_artikel' =>$user
            );
            // var_dump($data);
            $this->db->insert('tbl_artikel', $data);
            $this->session->set_flashdata('pesan', 'berhasil tambah data');
            redirect('admin/Artikel');
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];

            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            // $user = $this->input->post('user');

            $data = array(
                'judul_artikel' => $judul,
                'foto' => $foto,
                'isi_artikel' => $isi,
                // 'user_artikel' =>$user

            );
            // var_dump($data);
            $this->db->insert('tbl_artikel', $data);
            $this->session->set_flashdata('pesan', 'berhasil tambah data');
            redirect('admin/Artikel');
        }
    }
    public function ubahartikel()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = "./assets/img/artikel";
        $config['allowed_types'] = 'jpg||png||gif';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            // $foto = $this->upload->data();
            // $foto = $foto['file_name'];

            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            // $user = $this->input->post('user');
            $where = array(
                'id_artikel' => $id,
            );
            $data = array(
                'judul_artikel' => $judul,
                'isi_artikel' => $isi,
                // 'user_artikel' =>$user
            );
            // var_dump($data);
            $this->db->insert('tbl_artikel',$data,$where);
            $this->session->set_flashdata('pesan', 'berhasil ubah data');
            redirect('admin/Artikel');
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];

            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
            // $user = $this->input->post('user');
            $where = array(
                'id_artikel' => $id,
            );

            $data = array(
                'judul_artikel' => $judul,
                'foto' => $foto,
                'isi_artikel' => $isi,
                // 'user_artikel' =>$user

            );
            // var_dump($data);
            $this->db->update('tbl_artikel', $data,$where);
            $this->session->set_flashdata('pesan', 'berhasil ubah data');
            redirect('admin/Artikel');
        }
    }

    function hapus($id)
    {
        $where = array(
            'id_artikel' => $id,
        );
// var_dump($where);
        $this->db->delete('tbl_artikel',$where);
        $this->session->set_flashdata('pesan', 'berhasil hapus data');
        redirect('admin/Artikel');


    }
}
