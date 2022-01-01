<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('jabatan_m');
        $this->load->model('atk_model');
        $this->load->model('pegawai_m');
        $this->load->model('pengajuan_m');
        $this->load->library('pagination');
        $this->load->library('cart');
        // $level_akun = $this->session->userdata('level');
        // if ($level_akun != "user") {

        //     return redirect('auth');
        // }
    }
    public function index()
    {
        $data['judul'] = 'Dashboard Pegawai';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $id_pegawai =  $this->session->userdata('id_pegawai');
        $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        $data['keranjang'] = $this->cart->contents();
        $this->load->view('template_user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template_user/footer');
    }

    public function data_pegawai()
    {
        $data['judul'] = 'Dashboard Pegawai';
        $data['data'] = $this->pegawai_m->get_all_pegawai();
        $data['keranjang'] = $this->cart->contents();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }


    // pengajuan gaji
    // -------------------- //
    // public function pengajuan($id_pegawai)
    // {
    //     //logika waktu pengajuan
    //     $tanggal_lahir = "s";
    //     $birthDate = new DateTime($tanggal_lahir);
    //     $today = new DateTime("today");
    //     if ($birthDate > $today) {
    //         exit("0 tahun 0 bulan 0 hari");
    //     }
    //     $y = $today->diff($birthDate)->y;
    //     $m = $today->diff($birthDate)->m;
    //     $d = $today->diff($birthDate)->d;
    //     return $y . " tahun " . $m . " bulan " . $d . " hari";
    //     //end logika

    //     $data['judul'] = 'Data Pegawai';
    //     $data['data'] = $this->pegawai_m->get_all_pegawai();

    //     $this->load->view('template/header', $data);
    //     $this->load->view('admin/pegawai/pegawai_baru', $data);
    //     $this->load->view('template/footer');
    // }

    public function pengajuan()
    {
        $data['judul'] = 'Upload SK Terakhir';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $id_pegawai =  $this->session->userdata('id_pegawai');
        $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        $nip =  $this->session->userdata('nip');
        $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);
        $data['pesan'] = false;
        $data['keranjang'] = $this->cart->contents();
        $this->load->view('template_user/header', $data);
        $this->load->view('user/pengajuan/pengajuan_gaji', $data);
        $this->load->view('template_user/footer');
    }
    public function history_pengajuan()
    {
        $data['keranjang'] = $this->cart->contents();
        $data['judul'] = 'Upload SK Terakhir';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $nip =  $this->session->userdata('nip');
        $data['data'] = $this->pegawai_m->get_all_pengajuan($nip);
        $data['pesan'] = false;
        $this->load->view('template_user/header', $data);
        $this->load->view('user/pengajuan/history_pengajuan', $data);
        $this->load->view('template_user/footer');
    }

    public function pengajuan_baru($nip)
    {
        $config['upload_path']   = './assets/file_pengajuan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        //$config['max_size']      = 100; 
        //$config['max_width']     = 1024; 
        //$config['max_height']    = 768;  

        $this->load->library('upload', $config);
        // script upload file 1
        $this->upload->do_upload('file');
        $x = $this->upload->data();
        $id_pegawai =  $this->session->userdata('id_pegawai');
        // $data_model = $this->pegawai_m->get_row_pegawai($id_pegawai);

        $data = array(
            'nip' => $nip,
            'file' => $x["file_name"],
            'date' => date('Y-m-d'),
            'status_pengajuan' => "Diperiksa"
        );
        $this->db->insert('berkas', $data);
        $data['judul'] = 'Upload SK Terakhir';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $id_pegawai =  $this->session->userdata('id_pegawai');
        $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        $nip =  $this->session->userdata('nip');
        $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);
        $data['pesan'] = false;
        $data['pesan'] = '<div class="alert alert-success" role="alert">Berkas Berhasil Di Upload !
            </div>';
        $data['keranjang'] = $this->cart->contents();
        $this->load->view('template_user/header', $data);
        $this->load->view('user/pengajuan/pengajuan_gaji', $data);
        $this->load->view('template_user/footer');
    }

    public function ubah_pengajuan($id_pegawai)
    {
        $data['judul'] = 'Data Pegawai';
        $data['data'] = $this->pegawai_m->get_all_pegawai();
        $data['keranjang'] = $this->cart->contents();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template/header', $data);
        $this->load->view('admin/pegawai/pegawai_baru', $data);
        $this->load->view('template/footer');
    }
    // pengajuan end
    // -------------------- //

    // passoword
    // ==========================

    public function ubah_password()
    {
        $data['judul'] = 'Ubah Password Pegawai';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $id_pegawai =  $this->session->userdata('id_pegawai');
        $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        $data['pesan'] = false;
        $data['keranjang'] = $this->cart->contents();
        $this->load->view('template_user/header', $data);
        $this->load->view('user/password/ubah_password', $data);
        $this->load->view('template_user/footer');
    }

    public function proses_ubah_password($nip)
    {
        $password = password_hash($this->input->post['password_lama'], PASSWORD_BCRYPT);
        // $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        var_dump($password);
        // $cek = $this->pegawai_m->cek_pass($password, $nip);

        //     if ($cek == true) {
        //         $data['judul'] = 'Ubah Password Pegawai';
        //         $data['keranjang'] = $this->cart->contents();
        //         $data['nama'] = $this->session->userdata('nama_lengkap');
        //         $id_pegawai =  $this->session->userdata('id_pegawai');
        //         $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        //         $data['pesan'] = '<div class="alert alert-success" role="alert">Password Berhasil Diubah !
        // </div>';
        //         $data_update = array(
        //             "password" => md5($this->input->post('password_baru'))
        //         );
        //         $this->db->where('nip', $nip);
        //         $this->db->update('akun', $data_update);
        //         $data['keranjang'] = $this->cart->contents();
        //         $this->load->view('template_user/header', $data);
        //         $this->load->view('user/password/ubah_password', $data);
        //         $this->load->view('template_user/footer');
        //     } else {
        //         $data['judul'] = 'Ubah Password Pegawai';
        //         $data['nama'] = $this->session->userdata('nama_lengkap');
        //         $data['keranjang'] = $this->cart->contents();
        //         $id_pegawai =  $this->session->userdata('id_pegawai');
        //         $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        //         $data['pesan'] = '<div class="alert alert-danger" role="alert">Password Salah !
        // </div>';

        //         $this->load->view('template_user/header', $data);
        //         $this->load->view('user/password/ubah_password', $data);
        //         $this->load->view('template_user/footer');
        // }
    }
    // end password

    // atk
    public function atk()

    {
        //page
        $config['base_url'] = site_url('user/atk'); //site url
        $config['total_rows'] = $this->db->count_all('data_barang'); //total row
        $config['per_page'] = 15;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['data'] = $this->atk_model->penomoran($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();


        //end


        $data['judul'] = 'Tabel Data ATK';
        $data['databarang'] = $this->atk_model->getDataBarang();
        $data['keranjang'] = $this->cart->contents();
        $data['nama'] = $this->session->userdata('nama_user');
        $this->load->view('template_user/header', $data);
        $this->load->view('user/atk/atk', $data);
        $this->load->view('template_user/footer');
    }

    public function cari()
    {
        $cari = $this->input->post('cari');

        $data['judul'] = 'Tabel Data ATK';
        $data['databarang'] = $this->atk_model->cari($cari);
        $data['keranjang'] = $this->cart->contents();
        $data['nama'] = $this->session->userdata('nama_user');
        $this->load->view('template_user/header', $data);
        $this->load->view('user/atk/cari', $data);
        $this->load->view('template_user/footer');
    }

    public function pencarian()
    {
        $data = array(
            'cari' => $this->input->post('cari')
        );
        $cari = $this->atk_model->cari($data);
    }

    public function order($id)
    {
        $data['judul'] = 'View Order';
        $data['data'] = $this->atk_model->getDataBarangById($id);
        $data['keranjang'] = $this->cart->contents();
        $data['nama'] = $this->session->userdata('nama_user');
        $this->load->view('template_user/header', $data);
        $this->load->view('user/atk/view_order', $data);
        $this->load->view('template_user/footer');
    }

    public function ProsesOrder($id)
    {
        $data_barang = array(
            'id' => $id,
            'price' => '',
            'item' => $this->input->post('item'),
            'name' => $this->session->userdata('nama_lengkap'),
            'qty' => $this->input->post('qty'),
            'bidang' => $this->session->userdata('bidang'),
            'satuan' =>  $this->input->post('satuan'),
            'tanggal' => date('Y-m-d')
        );
        $this->cart->insert($data_barang);

        var_dump($data_barang);
        redirect('user/atk');
    }

    public function keranjang()
    {
        $data['judul'] = 'View Order';

        $data['nama'] = $this->session->userdata('nama_user');
        $data['keranjang'] = $this->cart->contents();

        $this->load->view('template_user/header', $data);
        $this->load->view('user/atk/keranjang', $data);
        $this->load->view('template_user/footer');
    }

    public function hapus($rowid)
    {
        if ($rowid == "semua") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('user/keranjang');
    }

    public function insert()
    {
        $x = $this->db->get('data_order')->result();
        $id_x = count($x) + 1;
        $cart = $this->cart->contents();
        foreach ($cart as $item) {
            $data = array(
                'id_order' => '',
                'id_keranjang' => $id_x,
                'id_barang' => $item['id'],
                'qty_order' => $item['qty'],
                'id_bidang' => $item['bidang'],
                'user_id' => $item['name'],
                'tanggal' => $item['tanggal']
            );
            $this->atk_model->insert($data);
        }

        $keranjang = array(
            'id_peg' => $id_x,
            'id_bidang' => $item['bidang'],
            'user' => $item['name'],
            'status' => '3',
            'tanggal' => $item['tanggal']
        );
        $this->atk_model->insert_result($keranjang);
        $this->cart->destroy();
        redirect('user/atk/atk');
    }

    public function status()
    {
        $data['judul'] = 'Status Order';
        $data['nama'] = $this->session->userdata('nama_user');
        $bidang = $this->session->userdata('bidang');
        $data['data'] = $this->atk_model->status($bidang);
        $data['keranjang'] = $this->cart->contents();
        $this->load->view('template_user/header', $data);
        $this->load->view('user/atk/status', $data);
        $this->load->view('template_user/footer');
    }
    public function absensi()
    {
        $data['judul'] = 'Upload SK Terakhir';
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $id_pegawai =  $this->session->userdata('id_pegawai');
        $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
        $nip =  $this->session->userdata('nip');
        $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);
        $data['pesan'] = false;
        $data['keranjang'] = $this->cart->contents();
        $data['absen'] = $this->pegawai_m->data_absen($nip);
        $this->load->view('template_user/header', $data);
        $this->load->view('user/absensi/absensi', $data);
        $this->load->view('template_user/footer');
    }

    public function absen_masuk()
    {
        $nip =  $this->session->userdata('nip');
        $tanggal = date("Y-m-d");
        $cek = $this->pegawai_m->cek_absen($nip, $tanggal);
        if ($cek == true) {
            $data['pesan'] = "Anda Sudah Absen Masuk";
            $data['judul'] = 'Upload SK Terakhir';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $id_pegawai =  $this->session->userdata('id_pegawai');
            $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
            $nip =  $this->session->userdata('nip');
            $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);
            $data['keranjang'] = $this->cart->contents();
            $data['absen'] = $this->pegawai_m->data_absen($nip);
            $this->load->view('template_user/header', $data);
            $this->load->view('user/absensi/absensi', $data);
            $this->load->view('template_user/footer');
        } elseif ($cek == false) {
            $nip =  $this->session->userdata('nip');
            $data = array(
                "id_peg" => $nip,
                "tanggal" => date("Y-m-d"),
                "jam_masuk" => date("H:i:s"),
                "jam_pulang" => "-",
            );
            $this->db->insert('absen', $data);
            $data['pesan'] = "Anda Berhasil Absen Masuk";
            $data['judul'] = 'Upload SK Terakhir';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $id_pegawai =  $this->session->userdata('id_pegawai');
            $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
            $nip =  $this->session->userdata('nip');
            $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);

            $data['keranjang'] = $this->cart->contents();
            $data['absen'] = $this->pegawai_m->data_absen($nip);
            $this->load->view('template_user/header', $data);
            $this->load->view('user/absensi/absensi', $data);
            $this->load->view('template_user/footer');
        }
    }
    public function absen_pulang()
    {
        $nip =  $this->session->userdata('nip');
        $tanggal = date("Y-m-d");
        $cek = $this->pegawai_m->cek_absen($nip, $tanggal);
        $cek2 = $this->pegawai_m->cek_absen_pulang($nip, $tanggal);

        if ($cek == false) {
            $data['pesan'] = "Anda Sudah Absen Pulang";
            $data['judul'] = 'Upload SK Terakhir';
            $data['nama'] = $this->session->userdata('nama_lengkap');
            $id_pegawai =  $this->session->userdata('id_pegawai');
            $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
            $nip =  $this->session->userdata('nip');
            $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);

            $data['keranjang'] = $this->cart->contents();
            $data['absen'] = $this->pegawai_m->data_absen($nip);
            $this->load->view('template_user/header', $data);
            $this->load->view('user/absensi/absensi', $data);
            $this->load->view('template_user/footer');
        } elseif ($cek == true) {
            foreach ($cek2 as $x) {

                if ($x->jam_pulang == "-") {
                    $data = array(
                        "jam_pulang" => date("H:i:s"),
                    );
                    $this->db->where('tanggal', $tanggal);
                    $this->db->update('absen', $data);
                    $data['pesan'] = "Anda Berhasil Absen Pulang";
                    $data['judul'] = 'Upload SK Terakhir';
                    $data['nama'] = $this->session->userdata('nama_lengkap');
                    $id_pegawai =  $this->session->userdata('id_pegawai');
                    $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
                    $nip =  $this->session->userdata('nip');
                    $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);

                    $data['keranjang'] = $this->cart->contents();
                    $data['absen'] = $this->pegawai_m->data_absen($nip);
                    $this->load->view('template_user/header', $data);
                    $this->load->view('user/absensi/absensi', $data);
                    $this->load->view('template_user/footer');
                } else {

                    $data['pesan'] = "Anda Sudah Absen Pulang";
                    $data['judul'] = 'Upload SK Terakhir';
                    $data['nama'] = $this->session->userdata('nama_lengkap');
                    $id_pegawai =  $this->session->userdata('id_pegawai');
                    $data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
                    $nip =  $this->session->userdata('nip');
                    $data['waktu'] = $this->pengajuan_m->cek_pengajuan($nip);

                    $data['keranjang'] = $this->cart->contents();
                    $data['absen'] = $this->pegawai_m->data_absen($nip);
                    $this->load->view('template_user/header', $data);
                    $this->load->view('user/absensi/absensi', $data);
                    $this->load->view('template_user/footer');
                }
            }
        }
    }

    public function absen()
    {
        $id_peg  =  $this->session->userdata('nip');
        $data['judul'] = 'Absensi';
        $data['absen'] = $this->pegawai_m->absen($id_peg);
        $data['id_peg'] = $id_peg;
        $data['keranjang'] = $this->cart->contents();
        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template_user/header', $data);
        $this->load->view('user/absensi/view_absen', $data);
        $this->load->view('template_user/footer');
    }
    public function view_absen_tanggal()
    {
        $data['keranjang'] = $this->cart->contents();
        $id_peg = $this->input->post('id_peg');
        $data['id_peg'] = $id_peg;
        $date1 =  $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $data['judul'] = 'Absensi';
        $data['absen'] = $this->pegawai_m->cari_bulan_absen($date1, $date2, $id_peg);

        $data['nama'] = $this->session->userdata('nama_lengkap');
        $this->load->view('template_user/header', $data);
        $this->load->view('user/absensi/view_absen_tanggal', $data);
        $this->load->view('template_user/footer');
    }
}   

/* End of file User.php */
