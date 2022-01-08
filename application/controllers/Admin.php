<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('parkir_m');


        // $level_akun = $this->session->userdata('level');
        // if ($level_akun != "admin") {
        //     return redirect('auth');
        // }
    }

    public function index()
    {
        $data['level_akun'] = 'kepala_gs';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = false;
        $data['judul'] = 'Dashboard';

        // $data['jml_pegawai'] = $this->pegawai_m->jumlah_pegawai();
        // $data['jml_bidang'] = $this->pegawai_m->jumlah_bidang();
        // $data['jml_absen'] = $this->pegawai_m->jumlah_absen();
        // $bulan1 = "1";
        // $bulan = "08";
        // $data['bulan1'] = $this->pegawai_m->jumlah_absen_bulan("01");
        // $data['bulan2'] = $this->pegawai_m->jumlah_absen_bulan("02");
        // $data['bulan3'] = $this->pegawai_m->jumlah_absen_bulan("03");
        // $data['bulan4'] = $this->pegawai_m->jumlah_absen_bulan("04");
        // $data['bulan5'] = $this->pegawai_m->jumlah_absen_bulan("05");
        // $data['bulan6'] = $this->pegawai_m->jumlah_absen_bulan("06");
        // $data['bulan7'] = $this->pegawai_m->jumlah_absen_bulan("07");
        // $data['bulan8'] = $this->pegawai_m->jumlah_absen_bulan("08");
        // $data['bulan9'] = $this->pegawai_m->jumlah_absen_bulan("09");
        // $data['bulan10'] = $this->pegawai_m->jumlah_absen_bulan("10");
        // $data['bulan11'] = $this->pegawai_m->jumlah_absen_bulan("11");
        // $data['bulan12'] = $this->pegawai_m->jumlah_absen_bulan("12");

        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }
    // parkir
    // -------------------- //
    public function p_masuk()
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->parkir_m->get_all_parkir();
        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/data_parkir', $data);
        $this->load->view('template/footer');
    }
    public function tambah_parkir()
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/input_parkir', $data);
        $this->load->view('template/footer');
    }
    public function edit_parkir($id_bidang)
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->parkir_m->get_row_parkir($id_bidang);

        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/edit_parkir', $data);
        $this->load->view('template/footer');
    }

    public function proses_update_jab($id_bidang)
    {
        $this->form_validation->set_rules('nama_jab', 'Bidang', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $this->parkir_m->get_row_jab($id_bidang);
            $data['judul'] = 'Data Bidang';
            $this->load->view('template/header', $data);
            $this->load->view('admin/parkir/edit_parkir', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nama_jab' => $this->input->post('nama_jab')
            );
            $this->db->where('id_bidang', $id_bidang);
            $this->db->update('parkir', $data);
            return redirect('admin/parkir');
        }
    }

    public function proses_input_jab()
    {
        $this->form_validation->set_rules('nama_jab', 'parkir', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data Bidang';
            $this->load->view('template/header', $data);
            $this->load->view('admin/parkir/input_parkir', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nama_jab' => $this->input->post('nama_jab')
            );
            $this->db->insert('parkir', $data);
            return redirect('admin/parkir');
        }
    }

    public function hapus_parkir($id_jab)
    {
        $this->db->where('id_jab', $id_jab);
        $this->db->delete('parkir');
        return redirect('admin/parkir');
    }
}

/* End of file Admin.php */
