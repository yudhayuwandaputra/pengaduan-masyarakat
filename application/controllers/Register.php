<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_Model');
    }

    
    public function index()
    {
        $this->load->view("register/register");
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
    
            $this->Register_Model->create_user($data);
            redirect('login');
        }

  }