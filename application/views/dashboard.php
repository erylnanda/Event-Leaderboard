<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <section class="section">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary text-light font-weight-bold">
          <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Jumla Peserta</h4>
            </div>
            <div class="card-body">
              <?php if ($total_peserta == 0) : ?>
                0 Orang
              <?php else : ?>
                <?= $total_peserta; ?> Orang
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-list"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Jumlah Lomba</h4>
            </div>
            <div class="card-body">
              <?php if ($total_lomba == 0) : ?>
                0 Cabang
              <?php else : ?>
                <?= $total_lomba; ?> Cabang
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>