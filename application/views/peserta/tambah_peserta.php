<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url(); ?>/peserta/tambah_peserta">
                            <div class="form-group">
                                <label for="nama">Nama Peserta</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" autocomplete="off">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                <label for="avatar">Pilih Gambar Profil</label>
					            <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg, image/jpg, image/gif">
                                <?php if (isset($error)) : ?>
                                    <div class="invalid-feedback"><?= $error ?></div>
                                <?php endif; ?>
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