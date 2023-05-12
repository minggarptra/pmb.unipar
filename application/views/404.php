<?php
  $setting = $this->db->get('settings')->row_array();  
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" type="image/png" />
	<!-- loader-->
	<link href="<?= base_url('assets/tema') ?>/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets/tema') ?>/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/tema') ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/tema') ?>/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets/tema') ?>/css/icons.css" rel="stylesheet">
	<title><?= $this->Settings_model->general()["app_name"]; ?></title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
	
		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="card py-5">
					<div class="row g-0">
						<div class="col col-xl-5 text-center text-md-start">
							<div class="card-body p-4">
								<h1 class="display-1"><span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">4</span></h1>
								<h2 class="font-weight-bold display-4">Halaman Tidak ditemukan</h2>
								<p>Kamu telah mencari keujung dunia.
									<br>Halaman yang kamu cari tetap tidak ditemukan.
									<br>Jangan Khawatir , Kembalilah ke rumah</p>
								<div class="mt-5"> <button onclick="history.back()" class="btn btn-primary btn-lg px-md-5 radius-30">Kembali</button>
									
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<img src="<?= base_url('assets/tema') ?>/404.png" class="img-fluid" alt="">
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		
	</div>
	<!-- end wrapper -->
	<!-- Bootstrap JS -->
	<script src="<?= base_url('assets/tema') ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>