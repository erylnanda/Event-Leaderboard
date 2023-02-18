<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nama">Nama Lomba</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" autocomplete="off" value="<?= $lomba['nama_lomba']; ?>">
                                <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label for="panitia">Kategori Produk</label>
                                <select class="form-control" id="panitia" name="panitia">
                                    <option value="<?= $lomba['panitia_id'] ?>" selected><?= $lomba['namaUsaha'] ?></option>
                                    <?php foreach ($user as $p) : ?>
                                        <option value="<?= $p['id_username'] ?>"><?= $p['namaUsaha'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('panitia', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <a href="<?= base_url(); ?>/lomba" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>