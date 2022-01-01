<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_model extends CI_Model
{
    public function data()
    {
        $this->db->select('*');
        $this->db->from('order_status');
        $this->db->join('departemen', 'departemen.id = order_status.departemen');
        $this->db->where('status', 3);
        $query = $this->db->get();

        return $query->result();
    }


    public function update_status($id, $data)
    {
        $this->db->where('id_peg', $id);
        $this->db->update('order_status', $data);
    }

    public function where($id)
    {
        $this->db->select('*');
        $this->db->from('data_order');
        $this->db->join('data_barang', 'data_barang.id = data_order.id_barang');
        $this->db->where('id_keranjang', $id);
        return $this->db->get()->result();
    }

    public function where_edit($id)
    {
        $this->db->select('*');
        $this->db->from('data_order');
        $this->db->join('data_barang', 'data_barang.id = data_order.id_barang');
        $this->db->where('id_order', $id);
        return $this->db->get()->result();
    }

    public function ket($id)
    {
        $this->db->where('id_peg', $id);
        $x = $this->db->get('order_status');
        return $x->row();
    }

    public function updatebarang($id, $data)
    {
        $this->db->where('id_order', $id);
        $this->db->update('data_order', $data);
    }

    public function hapusdata($id)
    {
        $this->db->where('id_order', $id);
        $this->db->delete('data_order');
    }


    public function id_keranjang($id)
    {
        $this->db->select('*');
        $this->db->from('data_order');
        $this->db->join('data_barang', 'data_barang.id = data_order.id_barang');
        $this->db->where('id_order', $id);
        return $this->db->get()->row();
    }

    public function status($id)
    {
        $this->db->where('id_peg', $id);
        $x = $this->db->get('order_status');
        return $x->row();
    }
}

/* End of file Super_model.php */
