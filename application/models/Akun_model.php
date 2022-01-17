<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{

    public function data_akun()
    {
        $query = $this->db->get('akun');
        return $query->result();
    }
}

/* End of file User_model.php */
