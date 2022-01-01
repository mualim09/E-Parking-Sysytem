<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('jabatan_m');
        $this->load->model('pegawai_m');
        $this->load->model('bidang_m');
        $this->load->model('pengajuan_m');

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

        $data['jml_pegawai'] = $this->pegawai_m->jumlah_pegawai();
        $data['jml_bidang'] = $this->pegawai_m->jumlah_bidang();
        $data['jml_absen'] = $this->pegawai_m->jumlah_absen();
        $bulan1 = "1";
        $bulan = "08";
        $data['bulan1'] = $this->pegawai_m->jumlah_absen_bulan("01");
        $data['bulan2'] = $this->pegawai_m->jumlah_absen_bulan("02");
        $data['bulan3'] = $this->pegawai_m->jumlah_absen_bulan("03");
        $data['bulan4'] = $this->pegawai_m->jumlah_absen_bulan("04");
        $data['bulan5'] = $this->pegawai_m->jumlah_absen_bulan("05");
        $data['bulan6'] = $this->pegawai_m->jumlah_absen_bulan("06");
        $data['bulan7'] = $this->pegawai_m->jumlah_absen_bulan("07");
        $data['bulan8'] = $this->pegawai_m->jumlah_absen_bulan("08");
        $data['bulan9'] = $this->pegawai_m->jumlah_absen_bulan("09");
        $data['bulan10'] = $this->pegawai_m->jumlah_absen_bulan("10");
        $data['bulan11'] = $this->pegawai_m->jumlah_absen_bulan("11");
        $data['bulan12'] = $this->pegawai_m->jumlah_absen_bulan("12");

        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }
    // jabatan
    // -------------------- //
    public function jabatan()
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->jabatan_m->get_all_jab();
        $this->load->view('template/header', $data);
        $this->load->view('admin/jabatan/data_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_jabatan()
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/jabatan/input_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function edit_jabatan($id_bidang)
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->jabatan_m->get_row_jab($id_bidang);

        $this->load->view('template/header', $data);
        $this->load->view('admin/jabatan/edit_jabatan', $data);
        $this->load->view('template/footer');
    }

    public function proses_update_jab($id_bidang)
    {
        $this->form_validation->set_rules('nama_jab', 'Bidang', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $this->jabatan_m->get_row_jab($id_bidang);
            $data['judul'] = 'Data Bidang';
            $this->load->view('template/header', $data);
            $this->load->view('admin/jabatan/edit_jabatan', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nama_jab' => $this->input->post('nama_jab')
            );
            $this->db->where('id_bidang', $id_bidang);
            $this->db->update('jabatan', $data);
            return redirect('admin/jabatan');
        }
    }

    public function proses_input_jab()
    {
        $this->form_validation->set_rules('nama_jab', 'Jabatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data Bidang';
            $this->load->view('template/header', $data);
            $this->load->view('admin/jabatan/input_jabatan', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nama_jab' => $this->input->post('nama_jab')
            );
            $this->db->insert('jabatan', $data);
            return redirect('admin/jabatan');
        }
    }

    public function hapus_jabatan($id_jab)
    {
        $this->db->where('id_jab', $id_jab);
        $this->db->delete('jabatan');
        return redirect('admin/jabatan');
    }

    // jabatan end
    // -------------------- //

    // bidang
    // -------------------- //
    public function bidang()
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->bidang_m->get_all_bidang();
        $this->load->view('template/header', $data);
        $this->load->view('admin/bidang/data_bidang', $data);
        $this->load->view('template/footer');
    }
    public function tambah_bidang()
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/bidang/input_bidang', $data);
        $this->load->view('template/footer');
    }
    public function edit_bidang($id_bidang)
    {
        $data['judul'] = 'Data Bidang';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->bidang_m->get_row_bidang($id_bidang);

        $this->load->view('template/header', $data);
        $this->load->view('admin/bidang/edit_bidang', $data);
        $this->load->view('template/footer');
    }

    public function proses_update_bidang($id_bidang)
    {
        $this->form_validation->set_rules('nama_bidang', 'Bidang', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $this->bidang_m->get_row_bidang($id_bidang);
            $data['judul'] = 'Data Bidang';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $this->load->view('template/header', $data);
            $this->load->view('admin/bidang/edit_bidang', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nama_bidang' => $this->input->post('nama_bidang')
            );
            $this->db->where('id_bidang', $id_bidang);
            $this->db->update('bidang', $data);
            return redirect('admin/bidang');
        }
    }
    public function proses_input_bidang()
    {
        $this->form_validation->set_rules('nama_bidang', 'Bidang', 'required');
        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Data Bidang';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $this->load->view('template/header', $data);
            $this->load->view('admin/bidang/input_bidang', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'nama_bidang' => $this->input->post('nama_bidang')
            );
            $this->db->insert('bidang', $data);
            return redirect('admin/bidang');
        }
    }
    public function hapus_bidang($id_bidang)
    {
        $this->db->where('id_bidang', $id_bidang);
        $this->db->delete('bidang');
        return redirect('admin/bidang');
    }

    // bidang end
    // -------------------- //


    // Pegawai
    // -------------------- //
    public function pegawai()
    {
        $data['judul'] = 'Data Pegawai';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->pegawai_m->get_all_pegawai();

        $this->load->view('template/header', $data);
        $this->load->view('admin/pegawai/data_pegawai', $data);
        $this->load->view('template/footer');
    }
    public function cetak_pegawai()
    {
        $data['judul'] = 'Data Pegawai';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->pegawai_m->get_all_pegawai();

        // $this->load->view('template/header', $data);
        $this->load->view('admin/pegawai/cetak_data_pegawai', $data);
        // $this->load->view('template/footer');
    }


    public function tambah_pegawai_baru()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[pegawai.nip]');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat_saat_ini', 'Alamat Saat Ini', 'required');
        $this->form_validation->set_rules('alamat_permanen', 'Alamat Permanen', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('mulai_bekerja', 'Mulai Bekerja', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('bidang', 'Bidang', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data Pegawai';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $data['bidang'] = $this->bidang_m->get_all_bidang();
            $data['jabatan'] = $this->jabatan_m->get_all_jab();

            $this->load->view('template/header', $data);
            $this->load->view('admin/pegawai/input_pegawai', $data);
            $this->load->view('template/footer');
        } else {

            $nip = $this->input->post('nip');
            $config['upload_path']   = './assets/foto_profil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_space'] = TRUE;
            //$config['max_size']      = 100; 
            //$config['max_width']     = 1024; 
            //$config['max_height']    = 768;  

            $this->load->library('upload', $config);
            // script upload file 1
            $this->upload->do_upload('foto');
            $x = $this->upload->data();



            $data = array(
                'nip' => $this->input->post('nip'),
                'no_ktp' => $this->input->post('no_ktp'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'jk' => $this->input->post('jk'),
                'tempat' => $this->input->post('tempat'),
                'ttl' => $this->input->post('ttl'),
                'alamat_saat_ini' => $this->input->post('alamat_saat_ini'),
                'alamat_permanen' => $this->input->post('alamat_permanen'),
                'no_telp' => $this->input->post('no_telp'),
                'agama' => $this->input->post('agama'),
                'jabatan' => $this->input->post('jabatan'),
                'bidang' => $this->input->post('bidang'),
                'hobi' => $this->input->post('hobi'),
                'email' => $this->input->post('email'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'foto' =>  $x["orig_name"],
                'status_pegawai' => "Aktif"
            );
            $akun = array(
                'nip' => $this->input->post('nip'),
                'password' => md5($nip),
                'level' => "user",
            );

            $file = array(
                'nip' => $this->input->post('nip'),
                'date' => $this->input->post('mulai_bekerja'),
                'status_pengajuan' => "Diterima"
            );

            $this->db->insert('pegawai', $data);
            $this->db->insert('akun', $akun);
            $this->db->insert('berkas', $file);
            return redirect('admin/pegawai');
        }
    }

    public function jadikan_admin($nip)
    {
        $data = array(
            "level" => "admin"
        );
        $this->db->where('nip', $nip);
        $this->db->update('akun', $data);
        return redirect('admin/pegawai');
    }
    public function jadikan_user($nip)
    {
        $data = array(
            "level" => "user"
        );
        $this->db->where('nip', $nip);
        $this->db->update('akun', $data);
        return redirect('admin/pegawai');
    }

    public function view_pegawai($id_pegawai)
    {
        $data['judul'] = 'Data_pegawai';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);

        $this->load->view('template/header', $data);
        $this->load->view('admin/pegawai/view_pegawai', $data);
        $this->load->view('template/footer');
    }

    public function update_pegawai($id_pegawai)
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat_saat_ini', 'Alamat Saat Ini', 'required');
        $this->form_validation->set_rules('alamat_permanen', 'Alamat Permanen', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mulai_bekerja', 'Mulai Bekerja', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('bidang', 'Bidang', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Data Pegawai';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $data['bidang'] = $this->bidang_m->get_all_bidang();
            $data['jabatan'] = $this->jabatan_m->get_all_jab();
            $data['x'] = $this->pegawai_m->get_row_pegawai($id_pegawai);

            $this->load->view('template/header', $data);
            $this->load->view('admin/pegawai/edit_pegawai', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']   = './assets/foto_profil/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_space'] = TRUE;
            //$config['max_size']      = 100; 
            //$config['max_width']     = 1024; 
            //$config['max_height']    = 768;  

            $this->load->library('upload', $config);
            // script upload file 1
            $y =   $this->upload->do_upload('foto');
            $x = $this->upload->data();

            $data = array(
                'nip' => $this->input->post('nip'),
                'no_ktp' => $this->input->post('no_ktp'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'jk' => $this->input->post('jk'),
                'tempat' => $this->input->post('tempat'),
                'ttl' => $this->input->post('ttl'),
                'alamat_saat_ini' => $this->input->post('alamat_saat_ini'),
                'alamat_permanen' => $this->input->post('alamat_permanen'),
                'no_telp' => $this->input->post('no_telp'),
                'agama' => $this->input->post('agama'),
                'jabatan' => $this->input->post('jabatan'),
                'bidang' => $this->input->post('bidang'),
                'hobi' => $this->input->post('hobi'),
                'email' => $this->input->post('email'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'foto' =>  $x["orig_name"],
                'status_pegawai' => "Aktif"
            );

            $akun = array(
                'nip' => $this->input->post('nip'),
                'level' => "user"
            );

            $akun_model = $this->pegawai_m->get_row_pegawai2($id_pegawai);

            $this->db->where('id_akun', $akun_model->nip);
            $this->db->update('akun', $akun);

            $this->db->where('id_pegawai', $id_pegawai);
            $this->db->update('pegawai', $data);
            return redirect('admin/pegawai');
        }
    }
    public function delete_pegawai($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('pegawai');

        $this->db->where('nip', $nip);
        $this->db->delete('akun');
        return redirect('admin/pegawai');
    }

    // Pegawai end
    // -------------------- //

    // menerima pengajuan  
    // -------------------- //
    public function cek_pengajuan()
    {
        $data['judul'] = 'Data Pengajuan';
        $data['data'] = $this->pengajuan_m->get_all_pengajuan_baru();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/pengajuan_baru', $data);
        $this->load->view('template/footer');
    }
    public function semua_pengajuan_ditolak()
    {
        $data['judul'] = 'Data Pengajuan Ditolak';
        $data['data'] = $this->pengajuan_m->get_all_pengajuan_ditolak();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/pengajuan_ditolak', $data);
        $this->load->view('template/footer');
    }
    public function cetak_semua_pengajuan_ditolak()
    {
        $data['judul'] = 'Data Pengajuan Ditolak';
        $data['data'] = $this->pengajuan_m->get_all_pengajuan_ditolak();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        // $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/cetak_pengajuan_ditolak', $data);
        // $this->load->view('template/footer');
    }
    public function semua_pengajuan_diterima()
    {
        $data['judul'] = 'Data Pengajuan Ditolak';
        $data['data'] = $this->pengajuan_m->get_all_pengajuan_diterima();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/pengajuan_diterima', $data);
        $this->load->view('template/footer');
    }
    public function cetak_semua_pengajuan_diterima()
    {
        $data['judul'] = 'Data Pengajuan Ditolak';
        $data['data'] = $this->pengajuan_m->get_all_pengajuan_diterima();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        // $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/cetak_pengajuan_diterima', $data);
        // $this->load->view('template/footer');
    }
    public function pengajuan_tahun()
    {
        $tahun = date('Y');
        $data['judul'] = 'Data Pengajuan Tahun ' . $tahun;
        $data['data'] = $this->pengajuan_m->tahun_pengajuan();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/cari_pengajuan', $data);
        $this->load->view('template/footer');
    }
    public function belum_pengajuan()
    {
        $tahun = date('Y');
        $data['judul'] = 'Data Pengajuan Tahun ' . $tahun;
        $data['data'] = $this->pengajuan_m->tahun_pengajuan_belum_masuk();
        $data['peg'] = $this->pegawai_m->get_all_pegawai();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/pengajuan/belum_pengajuan', $data);
        $this->load->view('template/footer');
    }

    public function pengajuan_diterima($id_berkas)
    {
        $data = array(
            "status_pengajuan" => "Diterima"
        );

        $this->db->where('id_berkas', $id_berkas);
        $this->db->update('berkas', $data);
        return redirect('admin/cek_pengajuan');
    }
    public function pengajuan_ditolak($id_berkas)
    {
        $data = array(
            "status_pengajuan" => "Ditolak"
        );

        $this->db->where('id_berkas', $id_berkas);
        $this->db->update('berkas', $data);
        return redirect('admin/cek_pengajuan');
    }
    public function proses_pengajuan($id_pengajuan)
    {
        $data = array();

        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan', $data);
        return redirect('data_pengajuan');
    }
    //end menerima pengajuan
    public function absen($id_peg)
    {

        $data['judul'] = 'Absensi';
        $data['absen'] = $this->pegawai_m->absen($id_peg);
        $data['id_peg'] = $id_peg;
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/absen/view_absen', $data);
        $this->load->view('template/footer');
    }
    public function view_absen_tanggal()
    {
        $id_peg = $this->input->post('id_peg');
        $data['id_peg'] = $id_peg;
        $date1 =  $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $data['id_peg'] = $this->input->post('id_peg');
        $data['date1'] =  $this->input->post('date1');
        $data['date2'] = $this->input->post('date2');

        $data['judul'] = 'Absensi';
        $data['absen'] = $this->pegawai_m->cari_bulan_absen($date1, $date2, $id_peg);

        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/absen/view_absen_tanggal', $data);
        $this->load->view('template/footer');
    }
    public function cetak_view_absen_tanggal()
    {
        $id_peg = $this->input->post('id_peg');
        $id_pegawai = $this->input->post('id_peg');
        $date1 =  $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $data['id_peg'] = $this->input->post('id_peg');
        $data['id_peg'] = $this->input->post('id_peg');
        $data['date1'] =  $this->input->post('date1');
        $data['date2'] = $this->input->post('date2');
        $data['data_peg'] = $this->pegawai_m->get_row_pegawai_nip($id_pegawai);
        $data['judul'] = 'Absensi';
        $data['absen'] = $this->pegawai_m->cari_bulan_absen($date1, $date2, $id_peg);

        $data['nama'] = $this->session->userdata('nama_lengkap');
        // $this->load->view('template/header', $data);
        $this->load->view('admin/absen/cetak_view_absen_tanggal', $data);
        // $this->load->view('template/footer');
    }
}

/* End of file Admin.php */
