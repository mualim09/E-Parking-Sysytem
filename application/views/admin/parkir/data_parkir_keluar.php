<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Tabel Data Jabatan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/tambah_parkir') ?>" class="btn btn-primary">Parkir Masuk</a>
                    <hr>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>No Polisi</th>
                            <th>Jenis Kendaraan</th>
                            <th>Bertemu Dengan</th>
                            <th>Kepentingan</th>
                            <th>Tanggal Masuk</th>
                            <th>Masuk</th>
                            <th>Identitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_tamu; ?></td>
                                <td><?= $x->no_pol; ?></td>
                                <td><?= $x->jenis_kendaraan; ?></td>
                                <td><?= $x->bertamu_dengan; ?></td>
                                <td><?= $x->kepentingan; ?></td>
                                <td><?= $x->tgl_masuk; ?></td>
                                <td><img src="<?= base_url('assets/foto/' . $x->cam_masuk) ?>" width="100" height="100"></td>
                                <td><img src="<?= base_url('assets/foto/' . $x->k_identitas) ?>" width="100" height="100"></td>
                                <td>
                                    <a href=" <?= base_url('admin/edit_jabatan/') . $x->id_parkir; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?= base_url('admin/hapus_parkir/') . $x->id_parkir; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>