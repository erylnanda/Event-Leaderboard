<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <?php if ($user_id == 23) : ?>
                <a href="<?= base_url(); ?>point/reset_point" class="btn btn-danger mb-3">
                    Reset Semua Nilai
                </a>
                <?php endif; ?>
                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded dt-responsive nowrap" id="tabel-kategori" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Lomba</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lomba as $p) : ?>
                            <tr>
                                <td class="text-capitalize text-center"><?= $p['nama_lomba']; ?></td>
                                <td class="text-center">
                                    <!-- Button Update -->
                                    <?php if ($p['status'] == 0) : ?>
                                        <a href="<?= base_url(); ?>point/tambah_point/<?= $p['id_lomba'] ?>" class="btn btn-sm btn-primary text-light"><i class="fas fa-plus"></i> |  Masukan Nilai</a>
                                    <?php else : ?>
                                        <a href="<?= base_url(); ?>point/update_point/<?= $p['id_lomba'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"> |  Edit Nilai</i></a>
                                        <a href="<?= base_url(); ?>point/hapus_point/<?= $p['id_lomba'] ?>" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash"> |  Hapus Nilai</i></a>
                                    <?php endif ?>
                                    <!-- Button Hapus -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>