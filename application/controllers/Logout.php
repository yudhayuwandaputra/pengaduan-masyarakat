<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout extends CI_Controller
{
    public function index()
    {
        $newdata = [
            "nama" => '',
            "level" => false
        ];
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}
