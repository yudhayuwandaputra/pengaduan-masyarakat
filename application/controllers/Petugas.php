<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Petugas_Model');
	}
	

    public function index()
    {
        $data['jumlah'] = $this->Petugas_Model->count_users();
        $data['jumlah_laporan'] = $this->Petugas_Model->count_laporan();
        $data['jumlah_laporan_proses'] = $this->Petugas_Model->count_laporan_proses('proses');
        $data['jumlah_laporan_selesai'] = $this->Petugas_Model->count_laporan_selesai('selesai');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_petugas');
        $this->load->view('petugas/dashboard');
        $this->load->view('template/footer');
    }


    public function pengaduan_proses()
    {
        $data['pengaduan_proses'] = $this->Petugas_Model->detail_tanggapan('proses');
        $data['name'] =  "Tanggapi Laporan";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_petugas');
        $this->load->view("petugas/pengaduan_proses",$data);
        $this->load->view('template/footer');
        $this->load->view('template/modal_header');
  
    }


    public function pengaduan_selesai()
    {
        $data['pengaduan_selesai'] = $this->Petugas_Model->all_pengaduan_selesai('selesai');
        $data['name'] =  "Tanggapi Laporan";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_petugas');
        $this->load->view("petugas/pengaduan_selesai",$data);
        $this->load->view('template/footer');
        $this->load->view('template/modal_header');
    }

    public function data_tanggapan()
    {
        $data['tanggapan'] = $this->Petugas_Model->all_tanggapan();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_petugas');
        $this->load->view("petugas/data_tanggapan",$data);
        $this->load->view('template/footer');
        $this->load->view('template/modal_header');
    }


    public function tambah_tanggapan()
    {
        $data=[
            'tanggapan' => $this->input->post('tanggapan'),
            'id_pengaduan' => $this->input->post('id_pengaduan'),
            'tgl_tanggapan' => $this->input->post('tgl_tanggapan'),
            'petugas' => $this->input->post('petugas')


        ]; 
        $status=[
            'status' => $this->input->post('status')

        
        
        ]; 
        $this->db->insert('tanggapan',$data);
        $this->db->update('pengaduan',$status,['id_pengaduan' => $_POST['id_pengaduan']]);

        redirect('petugas/pengaduan_proses');
    }
    

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}


}