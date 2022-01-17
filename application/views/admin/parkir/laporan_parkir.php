<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold ">Tabel Data Jabatan</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">

                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>No Polisi</th>
                            <th>Jenis Kendaraan</th>
                            <th>Bertemu Dengan</th>
                            <th>Kepentingan</th>
                            <th>Tanggal Masuk</th>
                            <th>Foto Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Foto Keluar</th>
                            <th>Identitas</th>
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

                                <td><?php if ($x->tgl_keluar == false) {
                                        echo "Belum Keluar";
                                    } else {
                                        echo $x->tgl_keluar;
                                    } ?></td>
                                <td><?php if ($x->cam_keluar == false) {
                                        echo "Belum Keluar";
                                    } else { ?>
                                        <img src="<?= base_url('assets/foto/' . $x->cam_keluar) ?>" width="100" height="100">

                                    <?php      } ?>
                                </td>
                                <td><img src="<?= base_url('assets/foto/' . $x->k_identitas) ?>" width="100" height="100"></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    window.print()
</script>