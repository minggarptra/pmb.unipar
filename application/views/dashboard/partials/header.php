<?php
  $setting = $this->db->get('settings')->row_array();
  $general = $this->db->get('general')->row_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	<meta property="og:title" content="<?= $title ?> <?= $general['slogan']; ?>">
	<meta property="og:url" content="<?= base_url() ?>" />
	<meta name="description" content="<?= $title ?>  <?= $general['slogan']; ?>">
	<meta name="author" content="muhamad brilliant">
	<meta property="og:image" content="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" />
	<title><?= $title ?>  <?= $general['slogan']; ?></title>
	<meta content="SPMB, PMB , KAMPUS, UNIVERSITAS, DINIYYAH, LAMPUNG" name="keywords">
	<meta http-equiv="x-pjax-version" content="v123">
	<!-- Favicons -->
	<link href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" rel="icon">
	<link href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
		rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link href="<?= base_url('assets/landing/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/landing/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/landing/') ?>vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= base_url('assets/landing/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/landing/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/landing/') ?>css/variables.css" rel="stylesheet">
	<link href="<?= base_url('assets/landing/') ?>css/main.css" rel="stylesheet">
	<style>
	.hero-fullscreen {
  width: 100%;
  min-height: 100vh;
  background: url("<?= base_url('assets/upload/images/bghero/'.$setting['bghero']) ?>") center center;
  background-size: cover;
  position: relative;
  padding: 120px 0 60px;
}
	</style>

</head>


<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top" data-scrollto-offset="0">
		<div class="container-fluid d-flex align-items-center justify-content-between">

			<a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
				<!-- Uncomment the line below if you also wish to use an image logo -->
				<!-- <img src="<?= base_url('assets/landing/') ?>img/logo.png" alt=""> -->
				<h1><img class="img-fluid w-100 "
					src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>"></h1>
			</a>

			<nav id="navbar" class="navbar">
				<ul>

					<li><a lass="nav-link scrollto" href="<?= base_url('') ?>"><span>Home</span> </a>
						
					</li>

					<li><a class="nav-link scrollto" href="<?= base_url('') ?>#about">Alur Pendaftaran</a></li>
          <li class="dropdown"><a href="#"><span>Program Studi</span> <i
								class="bi bi-chevron-down dropdown-indicator"></i></a>
						<ul>
              <?php foreach ($jurusan as $key ) {
               ?>
							<li><a data-pjax href="<?= base_url('prodi-detail/'.$key->slug) ?>"><?= $key->jurusan ?></a></li>
              <?php } ?>
						</ul>
					</li>
					
					<li><a data-pjax href="<?= base_url('berita-pmb-list') ?>">Berita PMB</a></li>
					
					<li><a  class="nav-link scrollto" href="<?= base_url('') ?>#contact">Lokasi kampus</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle d-none"></i>
			</nav><!-- .navbar -->

			<a class="btn-getstarted scrollto" href="<?= base_url('register') ?>">DAFTAR SEKARANG</a>

		</div>
	</header><!-- End Header -->

<div id="pjax-container">
<!-- <div id="preloader"></div> -->



