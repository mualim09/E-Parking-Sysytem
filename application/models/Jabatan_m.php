<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_m extends CI_Model
{
    function get_all_jab()
    {
        $this->db->order_by('id_jab', 'DESC');
        return $this->db->get('jabatan')->result();
    }

    function get_row_jab($id_jab)
    {
        $this->db->where('id_jab', $id_jab);
        return $this->db->get('jabatan')->row();
    }
}

/* End of file Jabatan_m.php */
