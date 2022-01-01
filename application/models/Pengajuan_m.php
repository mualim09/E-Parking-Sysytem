<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{

    public function get_all_pengajuan_baru()
    {
        $this->db->where('status_pengajuan', 'Diperiksa');
        $this->db->join('pegawai', 'pegawai.nip = berkas.nip');
        $this->db->order_by('id_berkas', 'desc');
        return $this->db->get('berkas')->result();
    }
    public function get_all_pengajuan_ditolak()
    {
        $this->db->where('status_pengajuan', 'Ditolak');
        $this->db->join('pegawai', 'pegawai.nip = berkas.nip');
        $this->db->order_by('id_berkas', 'desc');
        return $this->db->get('berkas')->result();
    }
    public function get_all_pengajuan_diterima()
    {
        $this->db->where('status_pengajuan', 'Diterima');
        $this->db->join('pegawai', 'pegawai.nip = berkas.nip');
        $this->db->order_by('id_berkas', 'desc');
        return $this->db->get('berkas')->result();
    }
    public function cek_pengajuan($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->where('status_pengajuan', 'Diterima');
        $this->db->order_by('id_berkas', 'desc');
        return $this->db->get('berkas')->row();
    }
    public function tahun_pengajuan()
    {

        $x = date('Y');
        $xx = $x - 2;
        $this->db->select('*');
        $this->db->from('berkas');
        $this->db->join('pegawai', 'pegawai.nip = berkas.nip');
        $this->db->where('YEAR(date) ', $xx);
        $this->db->order_by('id_berkas', 'desc');
        return  $this->db->get()->result();
    }
    public function tahun_pengajuan_diterima()
    {

        $x = date('Y');
        $xx = $x - 2;
        $this->db->select('*');
        $this->db->from('berkas');
        $this->db->join('pegawai', 'pegawai.nip = berkas.nip');
        $this->db->where('YEAR(date) ', $xx);
        $this->db->where('status_pengajuan', 'Diterima');
        $this->db->order_by('id_berkas', 'desc');
        return  $this->db->get()->result();
    }
    public function tahun_pengajuan_belum_masuk()
    {
        $x = date('Y');
        $xx = $x - 2;
        $this->db->select('*');
        $this->db->from('berkas');
        $this->db->join('pegawai', 'pegawai.nip = berkas.nip');
        $this->db->where('YEAR(date) ', $xx);
        $this->db->where('status_pengajuan', 'Diterima');
        $this->db->order_by('id_berkas', 'desc');
        return  $this->db->get()->result();
    }
    public function get_all_pengajuan()
    {
        return $this->db->get('data_pengajuan')->result();
    }
    public function get_row_pengajuan($id_pengajuan)
    {
        $this->db->where('id_pengajuan', $id_pengajuan);
        return $this->db->get('data_pengajuan')->row();
    }
}/* End of file Pengajuan_m.php */
