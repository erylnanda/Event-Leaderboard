<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form class="user" method="POST" action="<?= base_url() ?>user/tambah_user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" autocomplete="off" value="<?= set_value('username');  ?>">
                                    <?= form_error('username', '<small class="form-text text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="namaUsaha" placeholder="Nama Lengkap" name="namaUsaha" autocomplete="off" value="<?= set_value('namaUsaha');  ?>">
                                    <?= form_error('namaUsaha', '<small class="form-text text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1" autocomplete="off">
                                        <?= form_error('password1', '<small class="form-text text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Konfirmasi Password" name="password2" autocomplete="off">
                                </div>
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