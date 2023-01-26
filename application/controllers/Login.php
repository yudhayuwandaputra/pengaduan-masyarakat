<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/login');
        } else {
            $this->private_login();
        }
    }

    private function private_login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

		
		if($this->db->get_where('petugas', ['username' => $username])->num_rows()== 1){
			$users= $this->db->get_where('petugas', ['username' => $username])->row_array();

			if ($users['level'] == "admin") {
				if($users['password'] == $password){
					$data = [
						
						"nama" => $users['nama_petugas'],
						'username'=>$users['username']
					
					
					  ];
					  $this->session->set_userdata($data);
					
					redirect('admin');
				   }else{
					$this->session->set_flashdata(
						'error',
						'<div class="alert alert-danger" role="alert"><center>Password Anda Salah!</center></div>'
					 );
					 redirect('login');
				   }
			}elseif ($users['level'] == "petugas") {
				if($users['password'] == $password){
					$data = [
						
						"nama" => $users['nama_petugas'],
						'username'=>$users['username']
						
					
					  ];
					  $this->session->set_userdata($data);
					
					redirect('petugas');
				   }else{
					$this->session->set_flashdata(
						'error',
						'<div class="alert alert-danger" role="alert"><center>Password Anda Salah!</center></div>'
					 );
					 redirect('login');
				   }
			}
	
		}elseif($this->db->get_where('masyarakat', ['username' => $username])->num_rows()== 1){
			$masyarakat= $this->db->get_where('masyarakat', ['username' => $username])->row_array();
		   if($masyarakat['password'] == $password){
			$data = [
				
				"nama" => $masyarakat['nama'],
				'username'=>$masyarakat['username'],
				'nik'=>$masyarakat['nik']
			
			  ];
			  $this->session->set_userdata($data);
			
			redirect('masyarakat');
		   }else{
			$this->session->set_flashdata(
				'error',
				'<div class="alert alert-danger" role="alert"><center>Password Anda Salah!</center></div>'
			 );
			 redirect('login');
		   }
		}else{
			$this->session->set_flashdata(
				'error',
				'<div class="alert alert-danger" role="alert"><center>Anda Belum Terdaftar!</center></div>'
			 );
			 redirect('login');
		}
	}
}
