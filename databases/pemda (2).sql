-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2021 pada 02.05
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_peg` varchar(100) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `jam_masuk` varchar(100) NOT NULL,
  `jam_pulang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_peg`, `tanggal`, `jam_masuk`, `jam_pulang`) VALUES
(18, '1001', '2021-08-04', '08:14:50', '19:23:49'),
(19, '1001', '2021-08-06', '00:55:25', '00:55:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nip`, `password`, `level`) VALUES
(12, '1001', 'fae0b27c451c728867a567e8c1bb4e53', 'user'),
(14, '666', 'fae0b27c451c728867a567e8c1bb4e53', 'admin'),
(15, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `file` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `status_pengajuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `nip`, `file`, `date`, `status_pengajuan`) VALUES
(7, '666', '', '2021-01-01', 'Diterima'),
(8, '1', '', '2019-11-11', 'Diterima'),
(9, '1001', '', '2019-11-11', 'Diterima'),
(11, '1001', 'cv_fauziah.pdf', '2021-08-06', 'Ditolak'),
(12, '1001', 'cetak.pdf', '2021-08-06', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(10) NOT NULL,
  `nama_bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(2, 'Umum & Kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `item` varchar(120) NOT NULL,
  `qty` varchar(120) NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `item`, `qty`, `satuan`) VALUES
(1, 'Amplop Coklat C3', '0', 'Pack'),
(2, 'Amplop Coklat D (folio) Samson', '3', 'Pack'),
(3, 'Amplop jaya 95x152mm', '11', 'Pack'),
(4, 'Amplop Surat Putih (110 x 230 mm)', '1', 'Pack'),
(5, 'Ball Point Snowman V5 Hitam', '50', 'Pcs'),
(6, 'Ballpoint Boxy Uni Ball 105 (Biru)', '31', 'Pcs'),
(7, 'Ballpoint Boxy Uni Ball 105 (Hitam)', '37', 'Pcs'),
(8, 'Ballpoint Pilot G2 - 07 Hitam', '24', 'Pcs'),
(9, 'Ballpoint Pilot G2 - 07 Biru', '6', 'Pcs'),
(10, 'Battery Size AA 1,5V Alkaline (Panasonic)', '66', 'Psg'),
(11, 'Battery Size AAA  Alkaline (Panasonic)', '20', 'Psg'),
(12, 'Battery Tanggung Tipe C', '6', 'Psg'),
(13, 'Buku 1/2 Folio', '5', 'Pcs'),
(14, 'Buku Hard Cover Folio 100 lbr', '4', 'Pcs'),
(15, 'Buku Saku (Note Boke PCA-156-80)', '3', 'Pcs'),
(16, 'Catridge Canon 810', '2', 'Pcs'),
(17, 'Catridge Canon 811', '3', 'Pcs'),
(18, 'Clip Board Plastik / Mika', '4', 'Pcs'),
(19, 'Cutter L-500', '5', 'Pcs'),
(20, 'Double Tape 1\"', '6', 'Pcs'),
(21, 'Double Tape 2\"', '7', 'Pcs'),
(22, 'Double Tape Busa', '8', 'Pcs'),
(23, 'Gunting Besar', '9', 'Pcs'),
(24, 'Isi Cutter L-150', '7', 'Pack'),
(25, 'Isi Staples Besar No.3-1', '6', 'Pack'),
(26, 'Isi Staples Kecil No.10', '5', 'Pack'),
(27, 'Jumbo Box Down Bantex', '4', 'Pcs'),
(28, 'Kertas cover jilid', '3', 'Pack'),
(29, 'Kertas HVS A4', '2', 'Rim'),
(30, 'Kertas HVS F4', '21', 'Rim'),
(31, 'Kertas Karton Putih', '2', 'Pcs'),
(32, 'Kertas Sertifikat Linen Folio', '3', 'Pack'),
(33, 'Kertas 2 Ply', '4', 'Box'),
(34, 'Kertas 3 Ply', '5', 'Box'),
(35, 'Kwitansi Kecil', '4', 'Pcs'),
(36, 'Lakban Bening 2\"', '6', 'Pcs'),
(37, 'Lakban Coklat 2\"', '2', 'Pcs'),
(38, 'Lakban Hitam 2\"', '1', 'Pcs'),
(39, 'Lakban Kertas 2\" (Masking Tape)', '4', 'Pcs'),
(40, 'Lem Stik 22 Gr No.8211 (Glue Stick)', '5', 'Pcs'),
(41, 'Materai 6000', '6', 'Pcs'),
(42, 'Nota Kontan Kecil 1 Ply', '7', 'Pcs'),
(43, 'Otner Bantex Folio -7cm', '8', 'Pcs'),
(44, 'Paper Clip No.3', '6', 'Pack'),
(45, 'Penggaris 30 CM', '7', 'Pcs'),
(46, 'Pensil 2B', '5', 'Pcs'),
(47, 'Pita Printer LQ 2190 Original', '5', 'Pcs'),
(48, 'Pockets Sheets Protector ukuran A4', '2', 'Pcs'),
(49, 'Plastik cover jilid', '3', 'Pack'),
(50, 'Plastik Laminating (folio)', '0', 'Pack'),
(51, 'Plastik laminating KTP 250 micron', '2', 'Pack'),
(52, 'Post It 654', '3', 'Pcs'),
(53, 'Post It 655', '4', 'Pcs'),
(54, 'Post It Mark & Note', '6', 'Pcs'),
(55, 'Post IT Sign Here', '7', 'Pcs'),
(56, 'Push Pin', '8', 'Pack'),
(57, 'Spidol Board Marker Hitam', '9', 'Pcs'),
(58, 'Spidol Paint Marker Putih', '4', 'Pcs'),
(59, 'Spidol Permanent Hitam', '8', 'Pcs'),
(60, 'Spidol Snowman OPM Medium For OHP Marker', '75', 'Pcs'),
(61, 'Stabilo Warna Hijau', '4', 'Pcs'),
(62, 'Stabilo Warna Orange', '3', 'Pcs'),
(63, 'Stapler HD-10 kecil Joyko', '3', 'Pcs'),
(64, 'Stella Daily Fresh', '5', 'Pcs'),
(65, 'Stella Gantung', '17', 'Pcs'),
(66, 'Sterofoam', '1', 'Pcs'),
(67, 'Suspinsion file', '1', 'Pack'),
(68, 'Tas file', '1', 'Pcs'),
(69, 'Tinta E-Print Black 200 ml', '34', 'Btl'),
(70, 'Tissue Paseo Reffil isi 280 Sheet', '5', 'Pack'),
(71, 'Type X (Correction Pen)', '6', 'Pcs'),
(74, 'tes', '2', 'pack'),
(87, 'polpen', '2000', 'buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_order`
--

CREATE TABLE `data_order` (
  `id_order` int(10) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_bidang` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `qty_order` varchar(255) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_order`
--

INSERT INTO `data_order` (`id_order`, `id_keranjang`, `id_barang`, `id_bidang`, `user_id`, `qty_order`, `tanggal`) VALUES
(93, '1', '1', '2', 'eddy adha saputra', '4', '2021-08-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasangan`
--

CREATE TABLE `data_pasangan` (
  `id_pasangan` int(10) NOT NULL,
  `id_kar` varchar(20) NOT NULL,
  `nama_lengkap_pasangan` varchar(50) NOT NULL,
  `nama_panggilan_pasangan` varchar(25) NOT NULL,
  `tempat_pasangan` varchar(25) NOT NULL,
  `ttl_pasangan` varchar(20) NOT NULL,
  `no_ktp_pasangan` varchar(20) NOT NULL,
  `alamat_saat_ini_pasangan` varchar(255) NOT NULL,
  `pendidikan_pasangan` varchar(25) NOT NULL,
  `telpon_pasangan` varchar(25) NOT NULL,
  `agama_pasangan` varchar(25) NOT NULL,
  `warganegra_pasangan` varchar(25) NOT NULL,
  `suku_pasangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pasangan`
--

INSERT INTO `data_pasangan` (`id_pasangan`, `id_kar`, `nama_lengkap_pasangan`, `nama_panggilan_pasangan`, `tempat_pasangan`, `ttl_pasangan`, `no_ktp_pasangan`, `alamat_saat_ini_pasangan`, `pendidikan_pasangan`, `telpon_pasangan`, `agama_pasangan`, `warganegra_pasangan`, `suku_pasangan`) VALUES
(1, '1202005081', 'aluh ', 'aluh', 'tapin', '2020-06-20', '11111111111111', '', 'SMA/SMK/MA', '1212121212', 'Islam', 'ind', 'banjar'),
(4, '2199806251', 'Mawar', 'Mawar', 'Suato Tatakan', '1997-12-01', '630504450970002', 'Tatakan', 'SMA/SMK/MA', '081377908415', 'Islam', 'Indonesia', 'Dayak'),
(5, '1199503122', 'Laila Indriyani', 'Ila', 'Rantau', '1999-06-12', '630402260990002', 'Kupang, Rantau, Kalimantan Selatan', 'SMA/SMK/MA', '', 'Islam', 'Indonesia', 'Banjar'),
(6, '3199607191', 'Eddy Bernandus', 'Eddy', 'Malang', '1990-04-17', '630502240900001', 'Banjarmasin', 'S2', '085543198720', 'Kristen', 'Indonesia', 'Batak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_riwayat_pelatihan`
--

CREATE TABLE `data_riwayat_pelatihan` (
  `id_pelatihan` int(10) NOT NULL,
  `id_kar` varchar(20) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `penyelenggara` varchar(25) NOT NULL,
  `periode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_riwayat_pelatihan`
--

INSERT INTO `data_riwayat_pelatihan` (`id_pelatihan`, `id_kar`, `bidang`, `penyelenggara`, `periode`) VALUES
(2, '1202005081', 'jaringan', 'bnsp', '2019'),
(3, '2199806251', 'Komputer', 'BPNS', '2016'),
(4, '1199503122', 'Mekanik', 'Balai Tenaga Kerja', '2019'),
(5, '3199607191', 'Komputer', 'Kursus Kereta Kencana', '2016'),
(6, '3199607191', 'Public Speaking', 'Seminar Katolik', '2017'),
(7, '4199609131', 'Menjahit', 'Balai Desa Tatakan', '2015'),
(8, '4199609131', 'Komputer', 'Balai Tenaga Kerja', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `developer`
--

CREATE TABLE `developer` (
  `id_dev` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('super_admin','','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `developer`
--

INSERT INTO `developer` (`id_dev`, `username`, `password`, `level`) VALUES
(1, 'admin', 'd56b699830e77ba53855679cb1d252da', 'super_admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jab` int(10) NOT NULL,
  `nama_jab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `nama_jab`) VALUES
(5, 'Kepala Bidang'),
(6, 'Kepala Dinas'),
(7, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_status`
--

CREATE TABLE `order_status` (
  `id_peg` int(11) NOT NULL,
  `id_bidang` varchar(255) NOT NULL,
  `status` int(12) NOT NULL,
  `user` varchar(50) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_status`
--

INSERT INTO `order_status` (`id_peg`, `id_bidang`, `status`, `user`, `tanggal`, `ket`) VALUES
(1, '2', 1, 'eddy adha saputra', '2021-08-06', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `ttl` varchar(25) NOT NULL,
  `alamat_saat_ini` text NOT NULL,
  `alamat_permanen` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `bidang` varchar(20) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `mulai_bekerja` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `nama_panggilan`, `jk`, `tempat`, `ttl`, `alamat_saat_ini`, `alamat_permanen`, `no_telp`, `agama`, `no_ktp`, `hobi`, `email`, `jabatan`, `bidang`, `status_pegawai`, `mulai_bekerja`, `foto`) VALUES
(10, '1001', 'eddy adha saputra', 'eddy', 'Laki-Laki', 'banjarbaru', '1997-04-17', 'Tapin', 'Tapin', '085248665646', 'Islam', 1001, 'membaca', 'eddyyucca@gmail.com', '5', '2', 'Aktif', '2004-02-03', ''),
(12, '666', 'indra', 'indra', 'Laki-Laki', 'tapin', '1997-12-04', 'tapin', 'tapin', '081250653005', 'Islam', 666, 'Jalan-Jalan', 'indra@gmail.com', '6', '2', 'Aktif', '2021-01-01', ''),
(13, '1', 'juli arlianto', 'juli arlianto', 'Laki-Laki', 'banjarbaru', '1998-11-11', 'Banjar Baru Selatan', 'JL. pandu, guntung paikat, kost berkat utama no 67', '085248665646', 'Islam', 2147483647, 'membaca', 'eddyyucca2@gmail.com', '5', '2', 'Aktif', '2019-11-11', 'WhatsApp_Image_2021-07-31_at_09_31_25.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pen` int(10) NOT NULL,
  `id_kar` varchar(50) NOT NULL,
  `tingkat_pendidikan` varchar(50) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `kota_pendidikan` varchar(50) NOT NULL,
  `tahun_pendidikan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pen`, `id_kar`, `tingkat_pendidikan`, `nama_sekolah`, `nama_jurusan`, `kota_pendidikan`, `tahun_pendidikan`) VALUES
(2, '1202005081', 'TK', 'teka tadika mesra', '', 'tapin', '2018/2019'),
(3, '1202005081', 'SD', 'SD rantau', '', 'rantau', '2018/2019'),
(4, '1202005081', 'SMP/MTs', 'MTsN Tapin Selatan', 'Agama', 'Rantau', '2020/2021'),
(5, '1202005081', 'S1', 'UNISKA', 'TEKNIK INFORMATIKA', 'BANJARBARU', '2022/2022'),
(6, '1202005081', 'SMA/SMK/MA', 'SMKN 1 TAPIN SELATAN', 'TEKNIK KOMPUTER DAN JARIN', 'TAPIN', '2030/2032'),
(8, '2199806251', 'TK', 'TK Kencana', '', 'Rantau', '2004'),
(9, '2199806251', 'SD', 'SDN TATAKAN 1', '', 'Rantau', '2010'),
(10, '2199806251', 'SMP/MTs', 'MTsN 5 Tapin', '', 'Rantau', '2013'),
(11, '2199806251', 'SMA/SMK/MA', 'SMAN 1 Tapin', 'IPA', 'Rantau', '2016'),
(12, '2199806251', 'S1', 'Universitas Lambung Mangkurat', 'Tenik Elektro', 'Banjarbaru', '2019'),
(13, '1199503122', 'TK', 'TK Tunas Bangsa', '', 'Kotabaru', '2001'),
(14, '1199503122', 'SD', 'SD Pelita Harapan', '', 'Kotabaru', '2007'),
(15, '1199503122', 'SMP/MTs', 'SMPN 1 Kotabaru', '', 'Kotabaru', '2010'),
(16, '1199503122', 'SMA/SMK/MA', 'SMAN 3 Kotabaru', 'IPS', 'Kotabaru', '2013'),
(17, '1199503122', 'S1', 'Universitas Ahmad Yani', 'Pertambangan', 'Banjarbaru', '2018'),
(18, '3199607191', 'TK', 'TK Bunda Maria', '', 'Banjarmasin', '2002'),
(19, '3199607191', 'SD', 'SDN BANJARMASIN 2', '', 'Banjarmasin', '2008'),
(20, '3199607191', 'SMP/MTs', 'SMPN 2 Banjarmasin', '', 'Banjarmasin', '2011'),
(21, '3199607191', 'SMA/SMK/MA', 'SMAN 7 Banjarmasin', 'IPA', 'Banjarmasin', '2014'),
(22, '3199607191', 'S1', 'Universitas Indonesia', 'Pertambangan', 'Jakarta', '2018'),
(23, '4199609131', 'TK', 'TK Kencana', '', 'Rantau', '2002'),
(24, '4199609131', 'SD', 'SDN TATAKAN 1', '', 'Rantau', '2008'),
(25, '4199609131', 'SMP/MTs', 'MTsN 5 Tapin', '', 'Rantau', '2011'),
(26, '4199609131', 'SMA/SMK/MA', 'SMKN 1 Tapin Selatan', 'Perkebunan', 'Rantau', '2014'),
(27, '4199609131', 'S1', 'Universitas Lambung Mangkurat', 'Perkebunan', 'Banjarbaru', '2018');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_order`
--
ALTER TABLE `data_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indeks untuk tabel `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `data_order`
--
ALTER TABLE `data_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
