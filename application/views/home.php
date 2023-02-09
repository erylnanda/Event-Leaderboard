<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
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
					<div class="col-sm-4">
						<div class="leaderboard-card">
							<div class="leaderboard-card__top">
								<h3 class="text-center">2</h3>
							</div>
							<div class="leaderboard-card__body">
								<div class="text-center">
									<img src="<?= base_url('upload/avatar/' .$peserta[1]['foto']); ?>" class="circle-img mb-2" alt="User Img">
									<h5 class="mb-0"><?= $peserta[1]['nama_peserta']; ?></h5>
									<h5 class="mb-0"><?= $peserta[1]['total']; ?></h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="leaderboard-card leaderboard-card--first">
							<div class="leaderboard-card__top">
								<h3 class="text-center">1</h3>
							</div>
							<div class="leaderboard-card__body">
								<div class="text-center">
									<img src="<?= base_url('upload/avatar/' .$peserta[0]['foto']); ?>" class="circle-img mb-2" alt="User Img">
									<h5 class="mb-0"><?= $peserta[0]['nama_peserta']; ?></h5>
									<h5 class="mb-0"><?= $peserta[0]['total']; ?></h5>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="leaderboard-card">
							<div class="leaderboard-card__top">
								<h3 class="text-center">3</h3>
							</div>
							<div class="leaderboard-card__body">
								<div class="text-center">
									<img src="<?= base_url('upload/avatar/' .$peserta[2]['foto']); ?>" class="circle-img mb-2" alt="User Img">
									<h5 class="mb-0"><?= $peserta[2]['nama_peserta']; ?></h5>
									<h5 class="mb-0"><?= $peserta[2]['total']; ?></h5>
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
			</div>


			<h4>Semua Peserta</h4>

			<table class="table">
				<?php if ($peserta != null) : ?>
					<thead>
						<tr>
							<th>User</th>
							<th>Point</th>
							<th>Peringkat</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($peserta as $p): ?>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<img src="<?= base_url('upload/avatar/' .$p['foto']); ?>" class="circle-img circle-img--small mr-2" alt="User Img">
										<div class="user-info__basic">
											<h5 class="mb-0"><?= $p['nama_peserta']; ?></h5>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-baselin">
										<h4 class="mr-1"><?= $p['total']; ?></h4>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-baseline justify-content-center">
										<h4 class="mr-1"><?= $i; ?></h4>
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
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>