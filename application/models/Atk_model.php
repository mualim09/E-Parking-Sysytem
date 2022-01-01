<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Atk_model extends CI_Model
{





    public function InsertOrder($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('Table', $data);
    }

    //ambil data mahasiswa dari database
    function getDataBarangPage($limit, $start)
    {
        $query = $this->db->get('data_barang', $limit, $start);
        return $query;
    }

    public function insertbarang($data)
    {
        $this->db->insert('data_barang', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('data_barang', $data);
    }

    public function excel()
    {
        $update = $this->db->get('data_barang');
        return $update->result();
    }

    public function getDataBarang()
    {
        $query = $this->db->get('data_barang');
        return $query->result();
    }
    public function getDataBarangById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('data_barang');
        return $query->row();
    }

    public function insert($data)
    {
        $this->db->insert('data_order', $data);
    }

    public function insert_result($keranjang)
    {
        $this->db->insert('order_status', $keranjang);
    }
    function penomoran($limit, $start)
    {
        $query = $this->db->get('data_barang', $limit, $start);
        return $query;
    }

    public function cari($cari)
    {
        $this->db->like('item', $cari);
        $x = $this->db->get('data_barang');
        return $x->result();
    }

    public function dep($x)
    {
        $this->db->where('id', $x);
        $query = $this->db->get('departemen');
        return $query->row();
    }

    public function sarana()
    {
        $query = $this->db->get('data_sarana');
        return $query->result();
    }

    public function sarana_row($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('data_sarana');
        return $query->row();
    }

    public function status($id_bidang)
    {
        $this->db->where('id_bidang', $id_bidang);
        $x = $this->db->get('order_status');
        return $x->result();
    }
}


/* End of file Atk_model.php */
