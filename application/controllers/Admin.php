<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('parkir_m');
        $this->load->model('akun_model');


        $level_akun = $this->session->userdata('level');
        if ($level_akun != "admin") {
            return redirect('auth');
        }
    }

    public function index()
    {
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = false;
        $data['judul'] = 'Dashboard';

        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function data_akun()
    {
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->akun_model->data_akun();
        $data['judul'] = 'Dashboard';

        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/data_akun', $data);
        $this->load->view('template/footer', $data);
    }
    // parkir
    // -------------------- //
    public function p_masuk()
    {
        $data['judul'] = 'Data Parkir Masuk';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->parkir_m->get_all_parkir();
        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/data_parkir', $data);
        $this->load->view('template/footer');
    }
    public function akun()
    {
        $data['judul'] = 'Data Parkir Masuk';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->parkir_m->get_all_parkir();
        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/akun', $data);
        $this->load->view('template/footer');
    }
    public function simpan_akun()
    {
        $data = array(

            'username' =>  $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        );


        $this->db->insert('akun', $data);
        return redirect('admin/akun');
    }
    public function laporan_parkir()
    {
        $data['judul'] = 'Data Parkir';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->parkir_m->get_all_parkir();
        // $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/laporan_parkir', $data);
        // $this->load->view('template/footer');
    }
    public function parkir_keluar($id_parkir)
    {
        $data['data'] = $this->parkir_m->get_row($id_parkir);
        $data['judul'] = 'Data Parkir Masuk';
        $data['nama'] = $this->session->userdata('nama_lengkap');

        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/parkir_keluar', $data);
        $this->load->view('template/footer');
    }
    public function proses_update_p_keluar($id_parkir)
    {
        $config['upload_path']   = './assets/foto/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size']      = 100; 
        //$config['max_width']     = 1024; 
        //$config['max_height']    = 768;  

        $this->load->library('upload', $config);
        // script upload file 1
        $this->upload->do_upload('cam_keluar');
        $file1 = $this->upload->data();


        $data = array(

            'tgl_keluar' => date('Y-m-d'),
            'cam_keluar' => $file1["orig_name"],
        );
        $this->db->where('id_parkir', $id_parkir);
        $this->db->update('parkir', $data);
        return redirect('admin/p_masuk');
    }
    public function p_masuk_keluar()
    {
        $data['judul'] = 'Data Parkir Masuk';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->parkir_m->get_all_parkir();
        $this->load->view('template/header', $data);
        $this->load->view('admin/parkir/data_parkir', $data);
        $this->load->view('template/footer');
    }
    public function tambah_parkir()
    {
        $data['judul'] = 'Parkir Masuk';
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
            $data['judul'] = 'Parkir Keluar';
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

    public function proses_input_p_masuk()
    {
        $this->form_validation->set_rules('nama_tamu', 'parkir', 'required');
        $this->form_validation->set_rules('no_pol', 'No polisi', 'required');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('bertamu_dengan', 'Bertemu Dengan', 'required');
        $this->form_validation->set_rules('kepentingan', 'Bertemu Dengan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Parkir Masuk';
            $this->load->view('template/header', $data);
            $this->load->view('admin/parkir/input_parkir', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']   = './assets/foto/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_size']      = 100; 
            //$config['max_width']     = 1024; 
            //$config['max_height']    = 768;  

            $this->load->library('upload', $config);
            // script upload file 1
            $this->upload->do_upload('cam_masuk');
            $file1 = $this->upload->data();

            $this->upload->do_upload('k_identitas');
            $file2 = $this->upload->data();
            $data = array(
                'nama_tamu' => $this->input->post('nama_tamu'),
                'no_pol' => $this->input->post('no_pol'),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
                'bertamu_dengan' => $this->input->post('bertamu_dengan'),
                'kepentingan' => $this->input->post('kepentingan'),
                'nama_tamu' => $this->input->post('nama_tamu'),
                'tgl_masuk' => date('Y-m-d'),
                'cam_masuk' => $file1["orig_name"],
                'cam_keluar' => "",
                'k_identitas' => $file2["orig_name"],
            );
            $this->db->insert('parkir', $data);
            return redirect('admin/p_masuk');
        }
    }

    public function hapus_parkir($id_parkir)
    {
        $this->db->where('id_parkir', $id_parkir);
        $this->db->delete('parkir');
        return redirect('admin/p_masuk');
    }
    public function hapus_akun($id_akun)
    {
        $this->db->where('id_akun', $id_akun);
        $this->db->delete('akun');
        return redirect('admin/data_akun');
    }
}

/* End of file Admin.php */
