<!-- Main Content -->
<div class="main-content">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <section class="section">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary text-light font-weight-bold">
            Rp.
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Jumla Peserta - <span class="text-primary"><?= $bulan ?></span></h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-shopping-bag"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 style="font-size: 12px;">Jumlah Lomba - <span class="text-primary"><?= $bulan ?></span></h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>