<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_m extends CI_Model
{
    public function get_all_bidang()
    {
        $this->db->order_by('id_bidang', 'DESC');
        return $this->db->get('bidang')->result();
    }

    public function get_row_bidang($id_bidang)
    {
        $this->db->where('id_bidang', $id_bidang);
        return $this->db->get('bidang')->row();
    }
}

/* End of file Bidang_m.php */
