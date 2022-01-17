<!-- Begin Page Content -->
<div class="container col-8">

    <!-- Page Heading -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin') ?>"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('admin/proses_update_p_keluar/' . $data->id_parkir)  ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputItem">Nama Tamu</label>
                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="<?= $data->nama_tamu ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Nomor Polisi</label>
                            <input type="text" class="form-control" id="no_pol" name="no_pol" placeholder="<?= $data->no_pol ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Foto Keluar</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" name="cam_keluar" id="cam_keluar">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>