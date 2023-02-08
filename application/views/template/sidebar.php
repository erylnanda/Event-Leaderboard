<div class="navbar-bg"></div>
<nav class="navbar main-navbar">
    <ul class="navbar-nav mr-3">
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i>
            <h5 class="mt-2 text-light d-inline ml-3"><?= $title; ?></h5>
        </a>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#logout">Logout</button>
    </ul>
</nav>
</div>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>dashboard" class="text-primary font-weight-bold" style="font-size: 16px;"><i class="fas fa-book-open"></i> Leaderboard</a>
            <?php if (strlen($nama) > 25) : ?>
                <p class="text-primary font-weight-bold mt-n3"><span class="badge badge-primary"> <i class="fas fa-store"></i> <?= substr($nama, 0, 23) . '..'; ?></span></p>
            <?php else : ?>
                <p class="text-primary font-weight-bold mt-n3"><span class="badge badge-primary"> <i class="fas fa-store"></i> <?= $nama ?></span></p>
            <?php endif ?>

        </div>
        <ul class="sidebar-menu">
            <li class="menu-header mt-4">Dashboard</li>
            <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url() ?>dashboard">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Lomba</li>
            <li <?= $this->uri->segment(1) == 'Peserta' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url(); ?>Peserta">
                    <i class="fas fa-user"></i>
                    <span>Data Peserta</span>
                </a>
            </li>
            <li <?= $this->uri->segment(1) == 'Lomba' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url(); ?>Lomba">
                    <i class="fas fa-list"></i>
                    <span>Daftar Lomba</span>
                </a>
            </li>

            <li class="menu-header">Profil Lomba</li>
            <li <?= $this->uri->segment(1) == 'profil' ? 'class="active"' : "" ?>>
                <a class="nav-link" href="<?= base_url() ?>profil">
                    <i class="fas fa-store"></i>
                    <span>Profil Lomba</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leaderboard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda Yakin Keluar Dari Leaderboard ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="<?= base_url() ?>auth/logout">Keluar</a>
            </div>
        </div>
    </div>
</div>