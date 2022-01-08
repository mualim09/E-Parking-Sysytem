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
                    <form action="<?= base_url('admin/proses_input_p_masuk')  ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputItem">Nama Tamu</label>
                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Nama Tamu">
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Nomor Polisi</label>
                            <input type="text" class="form-control" id="no_pol" name="no_pol" placeholder="Nomor Polisi">
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Jenis Kendaraan</label>
                            <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" placeholder="Jenis Kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Bertamu Dengan</label>
                            <input type="text" class="form-control" id="bertamu_dengan" name="bertamu_dengan" placeholder="Bertamu Dengan">
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Kepentingan</label>
                            <input type="text" class="form-control" id="kepentingan" name="kepentingan" placeholder="Kepentingan">
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Foto Masuk</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" name="cam_masuk" id="cam_masuk">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Foto Identitas</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" name="k_identitas" id="k_identitas">
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