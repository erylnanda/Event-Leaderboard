<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('point/simpan_nilai'); ?>" method="post">
                            <div class="form-group">
                                <label for="id_lomba">Nama Lomba</label>
                                <input type="text" class="form-control text-capitalize" id="nama_lomba" name="nama_lomba" autocomplete="off" placeholder="<?= $lomba['nama_lomba'];  ?>" value="<?= $lomba['nama_lomba'];  ?>" disable>
                                <input type="hidden" class="form-control text-capitalize" id="id_lomba" name="id_lomba" autocomplete="off" value="<?= $lomba['id_lomba'];  ?>" disable>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="peserta">Nama Team</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nilai">Masukan Nilai</label>
                                </div>
                            </div>
                            <div class=" form-row">
                                <?php foreach ($peserta as $p) : ?>
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control" id="nama_peserta" name="nama_peserta[]" autocomplete="off"  value="<?= $p['nama_peserta'] ?>" disable>
                                    <input type="hidden" class="form-control" id="id_peserta" name="id_peserta[]" autocomplete="off" value="<?= $p['id_peserta'] ?>" disable>
                                </div>
                                <div class=" form-group col-md-2">
                                    <input type="number" class="form-control uang" min="0" max="100" id="nilai" name="nilai[]" autocomplete="off" value="0" required>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <a href="<?= base_url(); ?>point" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>