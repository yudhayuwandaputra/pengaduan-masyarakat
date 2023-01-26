<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','upload');
        $this->load->model ('Masyarakat_Model');
        $this->load->model('Register_Model');
    }



    public function index()
    {
        $data['title'] = "Masyarakat";
        $data['jumlah_laporanku'] = $this->Masyarakat_Model->count_laporanku($this->session->userdata('nik'));
        $data['jumlah_laporan_proses'] = $this->Masyarakat_Model->count_laporan_proses($this->session->userdata('nik'),'proses');
        $data['jumlah_laporan_selesai'] = $this->Masyarakat_Model->count_laporan_selesai($this->session->userdata('nik'),'selesai');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_masyarakat');
        $this->load->view('masyarakat/dashboard');
        $this->load->view('template/footer');
    }


    public function data_laporan_proses()
    {
	    $data['name'] =  "Tambah Laporan";
        $data['laporan'] = $this->Masyarakat_Model->get_data_where($this->session->userdata('nik'),'pengaduan',['status'=>'proses'])->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_masyarakat');
        $this->load->view("masyarakat/data_laporan_proses");
        $this->load->view('template/footer');	
    }

    
    public function data_laporan_selesai()
    {
	    $data['pengaduan_selesai'] = $this->Masyarakat_Model->all_pengaduan_selesai('selesai',$this->session->userdata('nik'))->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar_masyarakat');
        $this->load->view("masyarakat/data_laporan_selesai");
        $this->load->view('template/footer');
    }


    public function tambah_laporan()
    {
        $data = [
            "judul"=> $this->input->post('judul', true),
            "tgl_pengaduan"=> $this->input->post('tanggal', true),
            "nik"=> $this->input->post('nik', true),
            "isi_laporan"	=> $this->input->post('isi', true),
            "foto"=> $this->input->post('foto', true)
        ];

        if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}
		$this->Masyarakat_Model->create_laporan($data);
		redirect('masyarakat/data_laporan_proses');
    }
    

    private function _do_upload()
	{
		$config['upload_path'] 		= 'file/images/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png';
		$config['max_size'] 			= 1000;
		$config['max_widht'] 			= 3000;
        $config['max_height']  		= 4000;
        $config['file_name'] 			= round(microtime(true)*1000);

 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata
            
            ('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <center><strong>Gagal !</strong> 
            Gambar Anda Melebihi Kapasitas.</center>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
			redirect('masyarakat/data_laporan_proses');
		}
        return $this->upload->data('file_name');
	}



    public function edit_laporan()
    {
        $where=[
            'id_pengaduan' => $_GET['id']
        ];

        $data = [
            'judul' => $this->input->post('judul'),
            'isi_laporan' => $this->input->post('isi')
             ];

        $this->Masyarakat_Model->update_data('pengaduan',$data,$where);
        redirect('masyarakat/data_laporan_proses');
    }


    public function tambah_user()
    {
        $data = [
            "nik"=> $this->input->post('nik', true),
            "nama"=> $this->input->post('nama', true),
            "username"=> $this->input->post('username', true),
            "telp"	=> $this->input->post('telp', true),
            "password"=> $this->input->post('password', true)
        ];
        $this->load->view("masyarakat/register");
        $this->Register_Model->create_user($data);
        redirect('login');
    }


    
    public function cetak_semua_laporan()
    {
        $title['judul'] = "Cetak Laporan";
        $data['pengaduan_selesai'] = $this->Masyarakat_Model->all_pengaduan_selesai('selesai',$this->session->userdata('nik'))->result();
        $this->load->view("cetak/header-cetak"); 
        $this->load->view("cetak/data_laporan_selesai", $data); 
    }


  

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	}
