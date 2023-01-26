<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register_Model extends CI_Model
{

      public function create_user($data)
    {
        $this->db->insert('masyarakat', $data);
    }

}
