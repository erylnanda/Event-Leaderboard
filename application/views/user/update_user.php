<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                    <form class="user" method="POST" action="">
                            <div class="form-group">
                            <label for="username">Username</label>
                                <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" autocomplete="off" value="<?= $user['username']; ?>">
                                    <?= form_error('username', '<small class="form-text text-danger pl-3">', '</small>') ?>
                            </div>
                            <label for="namaUsaha">Nama Lengkap</label>
                            <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="namaUsaha" placeholder="Nama Lengkap" name="namaUsaha" autocomplete="off" value="<?= $user['namaUsaha']; ?>">
                                    <?= form_error('namaUsaha', '<small class="form-text text-danger pl-3">', '</small>') ?>
                            </div>
                            <button class="btn btn-info btn-user btn-block" type="submit">
                                    SUBMIT
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>