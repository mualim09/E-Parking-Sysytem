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
                    <form action="<?= base_url('admin/simpan_akun') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputItem">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="inputItem">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="no_pol">
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