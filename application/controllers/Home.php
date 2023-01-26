<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
  }


    public function index(){
	
		{

        $title['judul'] = "Home";
        $this->load->view("home/home");

		
	}

  }


}