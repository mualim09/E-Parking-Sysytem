<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parkir_m extends CI_Model
{
    function get_all_parkir()
    {
        $this->db->order_by('id_parkir', 'DESC');
        return $this->db->get('parkir')->result();
    }

    function get_row_parkir_keluar($id_parkir)
    {
        $this->db->where('id_parkir', $id_parkir);
        $this->db->where('cam_keluar', "false");
        return $this->db->get('parkir')->result();
    }

    function get_row($id_parkir)
    {
        $this->db->where('id_parkir', $id_parkir);
        return $this->db->get('parkir')->row();
    }
}

/* End of file Parkir_m.php */
