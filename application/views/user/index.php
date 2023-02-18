<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <a href="<?= base_url(); ?>user/tambah_user" class="btn btn-primary mb-3">
                    Tambah User
                </a>

                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded dt-responsive nowrap" id="tabel-kategori" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama User</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $p) : ?>
                            <tr>
                                <td class="text-capitalize text-center"><?= $p['namaUsaha']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url(); ?>user/ganti_password/<?= $p['id_username'] ?>" class="btn btn-sm btn-primary text-light"><i class="fas fa-edit"></i> | ganti pass</a>
                                    <!-- Button Update -->
                                    <a href="<?= base_url(); ?>user/update_user/<?= $p['id_username'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i> | edit</a>
                                    <!-- Button Hapus -->
                                    <a href="<?= base_url(); ?>user/hapus_user/<?= $p['id_username'] ?>" class="btn btn-sm btn-danger text-light tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>