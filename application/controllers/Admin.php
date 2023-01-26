<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model');
	}
	

    public function index()
    {
        $data['jumlah'] = $this->Admin_Model->count_users();
        $data['jumlah_laporan'] = $this->Admin_Model->count_laporan();
        $data['jumlah_laporan_proses'] = $this->Admin_Model->count_laporan_proses('proses');
        $data['jumlah_laporan_selesai'] = $this->Admin_Model->count_laporan_selesai('selesai');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
        
    }

    public function pengaduan_proses()
    {
        $data['pengaduan_proses'] = $this->Admin_Model->detail_tanggapan('proses');
        $data['name'] =  "Tanggapi Laporan";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view("admin/pengaduan_proses",$data);
        $this->load->view('template/footer');
        $this->load->view('template/modal_header');
  
    }

    public function pengaduan_selesai()
    {
        $data['pengaduan_selesai'] = $this->Admin_Model->all_pengaduan_selesai('selesai');
        $data['name'] =  "Tanggapi Laporan";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view("admin/pengaduan_selesai",$data);
        $this->load->view('template/footer');
        $this->load->view('template/modal_header');
  
    }

    public function data_tanggapan()
    {
        $data['tanggapan'] = $this->Admin_Model->all_tanggapan();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view("admin/data_tanggapan",$data);
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

        redirect('admin/pengaduan_proses');

    }


    public function hapus_laporan()
    {
        $this->Admin_Model->delete_data('id_pengaduan', $_POST['id_pengaduan'], 'pengaduan');
        $this->session->set_flashdata('alert', 'Dihapus');
    }

            
    public function data_masyarakat()
    {
	    $data['masyarakat'] = $this->Admin_Model->all_masyarakat();
        $data['name'] =  "Tambah User";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view("admin/data_masyarakat",$data);
        $this->load->view('template/footer');
        $this->load->view('template/modal_header');
      
    }

    public function tambah_masyarakat()
    {
        $data = [
            "nik"=> $this->input->post('nik', true),
            "nama"=> $this->input->post('nama', true),
            "username"=> $this->input->post('username', true),
            "password"	=> $this->input->post('password', true),
            "telp"=> $this->input->post('telp', true)
        ];

        $this->Admin_Model->create_masyarakat($data);
        redirect('admin/data_masyarakat');
    }

    
    public function edit_user()
    {
        $where=[
            'nik' => $_GET['nik']
        ];

        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'telp' => $this->input->post('telp')
            
        ];
        $this->Admin_Model->update_data('masyarakat',$data,$where);
        redirect('admin/data_masyarakat');
    }

    
    public function hapus_user()
    {
        $this->Admin_Model->delete_data('nik', $_POST['nik'], 'masyarakat');
        $this->session->set_flashdata('alert', 'Dihapus');
    }


    public function cetak()
    {
        $title['judul'] = "Cetak Laporan";
        $data['pengaduan_selesai'] = $this->Admin_Model->all_pengaduan_selesai('selesai');
        $this->load->view("cetak/header-cetak"); 
        $this->load->view("cetak/pengaduan_selesai", $data);     
    }

    
    public function cetak_masyarakat()
    {
        $title['judul'] = "Cetak Data Masyarakat";
        $data['masyarakat'] = $this->Admin_Model->all_masyarakat();
        $this->load->view("cetak/header-cetak"); 
        $this->load->view("cetak/data_masyarakat", $data);      
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}


}