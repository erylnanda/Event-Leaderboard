<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>/peserta/tambah_peserta" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Peserta</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" autocomplete="off">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="foto">Pilih Gambar Profil</label> 
                                    <input type="file" name="foto" id="foto" accept="image/png, image/jpeg, image/jpg, image/gif">
                                    <?php if (isset($error)) : ?>
                                        <div class="form-text text-danger"><?= $error ?></div>
                                    <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label small>Kosong kan foto bila tidak ingin diisi</label>
                            </div>
                            <a href="<?= base_url(); ?>/peserta" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>