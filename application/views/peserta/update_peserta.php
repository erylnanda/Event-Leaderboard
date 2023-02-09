<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-8 mt-3">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card">
                    <div class="card-body mb-3">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="row pb-5">
                                <div class="col-md-6 text-center mt-4">
                                    <img class="img-thumbnail" src="<?= base_url('upload/avatar/' .$peserta['foto']); ?>" alt="" width="200">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="nama">Nama Peserta</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $peserta['nama_peserta'] ?>" autocomplete="off">
                                        <input type="text" class="form-control" id="foto_lama" name="foto_lama" value="<?= $peserta['foto'] ?>" autocomplete="off" hidden>
                                        <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Pilih Gambar Profil</label>
                                        <input type="file" name="foto" id="foto" accept="image/png, image/jpeg, image/jpg, image/gif">
                                        <?php if (isset($error)) : ?>
                                            <div class="form-text text-danger"><?= $error ?></div>
                                        <?php endif; ?>
                                        <label>* Kosongkan bila tidak ingin diganti</label>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url(); ?>/peserta" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
    </section>
</div>