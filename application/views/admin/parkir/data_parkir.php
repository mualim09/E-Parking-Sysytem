<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Tabel Data Jabatan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/p_masuk') ?>" class="btn btn-primary">Parkir Masuk</a>
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
                            <th>Tanggal Keluar</th>
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
                                <td><?= $x->nama_jab; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/edit_jabatan/') . $x->id_jab; ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?= base_url('admin/hapus_jabatan/') . $x->id_jab; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>