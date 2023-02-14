<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
	<meta http-equiv="refresh" content="5" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/home/css/style.css">
</head>
<body>
	<section class="main-content">
		<div class="container">
			<h1><?= $title; ?></h1>
			<br>
			<br>

			<div class="row">
				<?php if ($peserta != null) : ?>
					<div class="col-sm-12">
                        <div class="leaderboard-card leaderboard-card--first">
                            <div class="leaderboard-card__top">
                                <h3 class="text-center">Detail Point</h3>
                            </div>
                            <div class="leaderboard-card__body">
                                <div class="text-center">
                                    <img src="<?= base_url('upload/avatar/' .$peserta['foto']); ?>" class="circle-img mb-2" alt="User Img">
                                    <h5 class="mb-0"><?= $peserta['nama_peserta']; ?></h5>
                                    <h5 class="mb-0"><?= $total[0]['total']; ?></h5>
                                </div>
                            </div>
                        </div>
					</div>
				<?php else : ?>
					<div class="jumbotron">
						<div class="container">
							<h1 class="display-4">Empty Data</h1>
							<p class="lead">Tidak ada Point/Peserta yang di-input</p>
							<hr class="my-4">
							<p>Login untuk input data</p>
							<p class="lead">
								<a class="btn btn-primary btn-lg" href="<?= base_url('auth'); ?>" role="button">Login</a>
							</p>
						</div>
					</div>
				<?php endif; ?>
                <div class="col mb-4">
                <a href="<?= base_url(); ?>" class="btn btn-danger">Kembali</a>
                </div>
			</div>


			<h4>Detail Point Peserta</h4>

			<table class="table">
				<?php if ($point != null) : ?>
					<thead>
						<tr>
							<th>Lomba</th>
							<th>Point</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($point as $p): ?>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="user-info__basic">
											<h5 class="mb-0"><?= $p['nama_lomba']; ?></h5>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-baseline justify-content-center">
										<h4 class="mr-1"><?= $p['nilai']; ?></h4>
									</div>
								</td>
								<?php $i++; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				<?php else : ?>
					<div class="jumbotron">
						<div class="container">
							<h1 class="display-4">Empty Data</h1>
							<p class="lead">Tidak ada Point/Peserta yang di-input</p>
							<hr class="my-4">
							<p>Login untuk input data</p>
							<p class="lead">
								<a class="btn btn-primary btn-lg" href="<?= base_url('auth'); ?>" role="button">Login</a>
							</p>
						</div>
					</div>
				<?php endif; ?>
			</table>
            <a href="<?= base_url(); ?>" class="btn btn-danger">Kembali</a>
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>