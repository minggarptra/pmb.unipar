<?php
  $setting = $this->db->get('settings')->row_array();  
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	<meta property="og:title" content="SPMB Instidla">
	<meta property="og:url" content="<?= base_url() ?>" />
	<meta name="description" content=" SPMB  Institut Teknologi dan Bisnis Diniyyah Lampung">
	<meta name="author" content="muhamad brilliant">
	<meta property="og:image" content="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" />
	<meta http-equiv="x-pjax-version" content="v123">
	<link rel="icon" href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>">
	<title><?= $title ?></title>
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/temauser/main/css/vendors_css.css">
	<link rel="stylesheet" href="<?= base_url('assets/tema/') ?>plugins/notifications/css/lobibox.min.css" />
	<link href="<?= base_url('assets/tema/') ?>css/icons.css" rel="stylesheet">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<!-- Style-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/temauser/main/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/temauser/main/css/skin_color.css">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

	<div class="wrapper">

		<div id="pjax-container">

			<div id="loader"></div>
			<header class="main-header">
				<div class="d-flex align-items-center logo-box justify-content-start">
					<a href="#"
						class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent"
						data-toggle="push-menu" role="button">
						<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span
								class="path3"></span></span>
					</a>
					<!-- Logo -->
					<a href="<?= base_url('user') ?>" class="logo">
						<!-- logo-->
						<div class="logo-lg">
							<span class="light-logo"><img style="width: 8em;"
									src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>"
									alt="logo"></span>
							<span class="dark-logo"><img style="width: 8em;"
									src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>"
									alt="logo"></span>
						</div>
					</a>
				</div>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<div class="app-menu">
						<ul class="header-megamenu nav">
							<li class="btn-group nav-item d-md-none">
								<a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu"
									role="button">
									<span class="icon-Align-left"><span class="path1"></span><span
											class="path2"></span><span class="path3"></span></span>
								</a>
							</li>
							<li class="btn-group nav-item d-lg-inline-flex d-none">
								<a href="#" data-provide="fullscreen"
									class="waves-effect waves-light nav-link full-screen" title="Full Screen">
									<i class="icon-Expand-arrows"><span class="path1"></span><span
											class="path2"></span></i>
								</a>
							</li>

						</ul>
					</div>

					<div class="navbar-custom-menu r-side">
						<ul class="nav navbar-nav">

							<li class="btn-group d-lg-inline-flex d-none">
								<div class="app-menu">

								</div>
							</li>
							<!-- Notifications -->
							<li class="dropdown notifications-menu">
								<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown"
									title="Notifications">
									<i id="bell" class="icon-Notifications"><span class="path1"></span><span
											class="path2"></span></i>
								</a>
								<ul class="dropdown-menu animated bounceIn">

									<li class="header">
										<div class="p-20">
											<div class="flexbox">
												<div>
													<h4 class="mb-0 mt-0">Notifications</h4>
												</div>
												<div>
													<a id="clearNotif" href="#" class="text-danger">Clear All</a>
												</div>
											</div>
										</div>
									</li>

									<li>
										<!-- inner menu: contains the actual data -->
										<ul class="menu sm-scrol" id="notifku">


										</ul>
									</li>
									<li class="footer">
										<a data-pjax="" href="<?= base_url('notifikasi') ?>">Lihat Semua</a>
									</li>
								</ul>
							</li>

							<!-- User Account-->
							<li class="dropdown user user-menu">
								<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown"
									title="User">
									<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
								</a>
								<ul class="dropdown-menu animated flipInX">
									<li class="user-body">
										<a data-pjax class="dropdown-item" href="<?= base_url('setting-profile') ?>"><i
												class="ti-settings text-muted me-2"></i> Settings Akun</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i
												class="ti-lock text-muted me-2"></i> Logout</a>
									</li>
								</ul>
							</li>



						</ul>
					</div>
				</nav>
			</header>



			<aside class="main-sidebar ">
				<!-- sidebar-->
				<section class="sidebar position-relative">
					<div class="multinav">
						<div class="multinav-scroll" style="height: 100%;">
							<!-- sidebar menu-->
							<ul class="sidebar-menu" data-widget="tree">
								<li class="header">Home </li>
								<li class="<?= ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>">
									<a data-pjax href="<?= base_url('user') ?>">
										<i class="icon-Layout-4-blocks "><span class="path1"></span><span
												class="path2"></span></i>
										<span>Dashboard</span>

									</a>

								</li>
								<li class="header">Alur Pendaftaran </li>
								<!-- <li class="<?= ($this->uri->segment(1) == 'pembayaran') ? 'active' : ''; ?>">
									<a data-pjax href="<?= base_url('pembayaran') ?>">
										<i class="icon-Credit-card"><span class="path1"></span><span
												class="path2"></span></i>
										<span>1. Pembayaran</span>

									</a>

								</li> -->

								<li
									class="<?= ($this->uri->segment(1) == 'data-pendaftaran' || $this->uri->segment(1) == 'edit-data-pendaftaran') ? 'active' : ''; ?>">
									<a data-pjax href="<?= base_url('data-pendaftaran') ?>">
										<i class="icon-File"><span class="path1"></span><span class="path2"></span></i>
										<span>1. Data Pendaftaran</span>

									</a>

								</li>



								<li class="<?= ($this->uri->segment(1) == 'upload-berkas') ? 'active' : ''; ?>">
								<input type="hidden" name="jurusan" id="jurusan" value="<?= $prodi->jurusan; ?>">
								<?php if($prodi->jurusan == '09') { ?>	
									<a data-pjax href="<?= base_url('upload-berkas-pascasarjana') ?>">
								<?php }else{ ?>
									<a data-pjax href="<?= base_url('upload-berkas') ?>">
								<?php } ?>
										<i class="icon-Library"><span class="path1"></span><span
												class="path2"></span></i>
										<span>2. Upload Berkas</span>

									</a>

								</li>
								<li class="<?= ($this->uri->segment(1) == 'pembayaran') ? 'active' : ''; ?>">
									<a data-pjax href="<?= base_url('pembayaran') ?>">
										<i class="icon-Credit-card"><span class="path1"></span><span
												class="path2"></span></i>
										<span>3. Pembayaran</span>

									</a>

								</li>
								<li class="header">Live Support </li>


								<li class="<?= ($this->uri->segment(1) == 'messages') ? 'active' : ''; ?>">
									<a data-pjax href="<?= base_url('messages') ?>">
										<i class="icon-Chat1"><span class="path1"></span><span class="path2"></span></i>
										<span>Chat Admin</span>

									</a>

								</li>


								<li class="<?= ($this->uri->segment(1) == 'faqs') ? 'active' : ''; ?>">
									<a data-pjax href="<?= base_url('faqs') ?>">
										<i class="icon-Bulb"><span class="path1"></span><span class="path2"></span></i>
										<span>Panduan Pendaftaran</span>

									</a>

								</li>


							</ul>
						</div>
					</div>
				</section>
				<div class="sidebar-footer  bg-gradient-info">

					<a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
						data-original-title="Logout"><span class="icon-Lock-overturning"><span
								class="path1"></span><span class="path2"></span></span></a>
				</div>
			</aside>
