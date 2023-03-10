<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <a href="<?= base_url(); ?>lomba/tambah_lomba" class="btn btn-primary mb-3">
                    Tambah Cabang Lomba
                </a>

                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded dt-responsive nowrap" id="tabel-kategori" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Lomba</th>
                            <th scope="col" class="text-center">Nama Panitia</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lomba as $p) : ?>
                            <tr>
                                <td class="text-capitalize text-center"><?= $p['nama_lomba']; ?></td>
                                <td class="text-capitalize text-center"><?= $p['namaUsaha']; ?></td>
                                <td class="text-center">
                                    <!-- Button Update -->
                                    <a href="<?= base_url(); ?>lomba/update_lomba/<?= $p['id_lomba'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                    <!-- Button Hapus -->
                                    <a href="<?= base_url(); ?>lomba/hapus_lomba/<?= $p['id_lomba'] ?>" class="btn btn-sm btn-danger text-light tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>