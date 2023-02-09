<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-7">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <a href="<?= base_url(); ?>Peserta/tambah_peserta" class="btn btn-primary mb-3">
                    Tambah Peserta
                </a>

                <table class="table table-bordered table-light shadow-sm p-3 mb-5 bg-white rounded dt-responsive nowrap" id="tabel-kategori" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Peserta</th>
                            <th scope="col" class="text-center">Foto</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peserta as $p) : ?>
                            <tr>
                                <td class="text-capitalize text-center"><?= $p['nama_peserta']; ?></td>
                                <td class="text-center"><img src="<?= base_url('upload/avatar/' .$p['foto']); ?>" class="circle-img circle-img--small mr-2" alt="User Img"></td>
                                <td class="text-center">
                                    <!-- Button Update -->
                                    <a href="<?= base_url(); ?>peserta/update_peserta/<?= $p['id_peserta'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-edit"></i></a>
                                    <!-- Button Hapus -->
                                    <a href="<?= base_url(); ?>peserta/hapus_peserta/<?= $p['id_peserta'] ?>" class="btn btn-sm btn-danger text-light tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>