<?php
  $setting = $this->db->get('settings')->row_array();  
  $user= $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= $this->Settings_model->general()["app_name"] ?><">
	<meta name="author" content="Brilliant">
	<meta http-equiv="x-pjax-version" content="v123">
	<link rel="icon" href="<?= base_url();  ?>assets/upload/images/fav/<?= $setting['favicon']; ?>" type="image/png" />
	<title><?= $this->Settings_model->general()["app_name"] ?></title>
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/vendor_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/vendor_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/master_style.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/skins/_all-skins.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/vendor_plugins/pace/pace.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">

	<link rel="stylesheet"
		href="<?=base_url()?>assets/admin/assets/datatables.net-bs/plugins/Buttons-1.5.6/css/buttons.bootstrap.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/vendor_components/select2/dist/css/select2.min.css">

	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/vendor_components/summernote/summernote-lite.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/admin/') ?>assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>assets/vendor_components/toastr/toastr.min.css">

</head>
<script src="<?= base_url() ?>assets/pjax/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/summernote/summernote.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/toastr/toastr.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js">
</script>



<script src="https://js.pusher.com/7.2/pusher.min.js"></script>


<script src="<?= base_url('assets/loginuser/') ?>jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">
	let base_url = '<?=base_url()?>';

</script>

<body id="badan" class="hold-transition  skin-purple sidebar-mini">
	<!-- Site wrapper -->

	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="../../index-2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>S</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>SPMB</b>Admin</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>


				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->

						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-wechat"></i>
								<span class="label label-success jumlahchat"></span>
							</a>
							<ul class="dropdown-menu scale-up">
								<li class="header">Anda punya <span class="jumlahchat"></span> Notif Chat</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu " id="notifku">


									</ul>
								</li>
								<li class="footer" id="clearnotifchat"><a href="#">Bersihkan</a></li>
							</ul>
						</li>
						<!-- Notifications: style can be found in dropdown.less -->
						<li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<span class="label label-warning jnadmin"></span>
							</a>
							<ul class="dropdown-menu scale-up">
								<li class="header">Anda punya <span class="jnadmin"></span> pemberitahuan</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu " id="notifadmin">


									</ul>
								</li>
								<li class="footer" id="clearnotif"><a href="#">Bersihkan</a></li>
							</ul>
						</li>
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?= base_url(); ?>assets/upload/images/profile/<?= $user['photo_profile'] ?>"
									class="user-image rounded" alt="User Image">
							</a>
							<ul class="dropdown-menu scale-up">
								<!-- User image -->
								<li class="user-header">
									<img src="<?= base_url(); ?>assets/upload/images/profile/<?= $user['photo_profile'] ?>"
										class="rounded float-left" alt="User Image">

									<p>
										<?= $user['nama'] ?>
										<small>Administrator</small>

									</p>
								</li>
								<!-- Menu Body -->

								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a data-pjax href="<?= base_url('admin-settings') ?>"
											class="btn btn-block btn-primary">Profile</a>
									</div>
									<div class="pull-right">
										<a href="#" id="ana" class="btn btn-block btn-danger">Sign out</a>
									</div>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel bg-success">
					<div class="image float-left mr-4">
						<img src="<?= base_url(); ?>assets/upload/images/profile/<?= $user['photo_profile'] ?>"
							class="rounded" alt="User Image">
					</div>
					<div class="info float-left ">
						<p>Tahun Akademik Aktif</p>
						<p><?= $ta->tahun.'/'.($ta->tahun+1)  ?></p>
					</div>

				</div>

				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu mt-5 " data-widget="tree">
					<li class="
					<?= ($this->uri->segment(1) == 'admin') ? 'active' : ''; ?>
					">
						<a href="<?= base_url('admin') ?>">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a>
					</li>
					<li class="
					<?= ($this->uri->segment(1) == 'tambah-mhs') ? 'active' : ''; ?>
					">
						<a href="<?= base_url('tambah-mhs') ?>">
							<i class="fa fa-users"></i> <span>Tambah Mahasiswa</span>
						</a>
					</li>
					<li class="
					<?= ($this->uri->segment(1) == 'konfirmasi-pembayaran') ? 'active' : ''; ?>
					">
						<a data-pjax href="<?= base_url('konfirmasi-pembayaran') ?>">
							<i class="fa fa-money"></i> <span>Konfirmasi Pembayaran</span>
						</a>
					</li>
					<li class="treeview 
					<?= ($this->uri->segment(1) == 'master-akun' || $this->uri->segment(1) == 'pendaftaran-list' || $this->uri->segment(1) == 'keuangan-list') ? 'active' : ''; ?>
					
					">
						<a href="#">
							<i class="fa fa-file"></i>
							<span>Master Data</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="
							<?= ($this->uri->segment(1) == 'master-akun') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('master-akun') ?>"><i class="fa fa-user"></i> Data Akun
									Registrasi</a></li>
							<li class="
							<?= ($this->uri->segment(1) == 'keuangan-list') ? 'active' : ''; ?>
							"><a data-pjax href="<?= base_url('keuangan-list') ?>"><i class="fa fa-money"></i> Data Keuangan</a></li>
							<li class="
							<?= ($this->uri->segment(1) == 'pendaftaran-list') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('pendaftaran-list') ?>"><i class="fa fa-user-plus"></i> Data
									Pendaftaran</a></li>


						</ul>
					</li>
					<?php
						if ($this->session->userdata('level') =='admin' || $this->session->userdata('level')  =='pimpinan' || $this->session->userdata('level')  =='keuangan') {
							# code...
						
					?>
					<li class="treeview 
					<?= ($this->uri->segment(1) == 'laporan-pendaftaran' || $this->uri->segment(1) == 'laporan-keuangan') ? 'active' : ''; ?>
					">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Laporan</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">

							<li class="
							<?= ($this->uri->segment(1) == 'laporan-pendaftaran') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('laporan-pendaftaran') ?>"><i class="fa fa-user-plus"></i>
									Laporan Pendaftaran</a>
							</li>
							<li class="
							<?= ($this->uri->segment(1) == 'laporan-keuangan') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('laporan-keuangan') ?>"><i class="fa fa-money"></i> Laporan
									Keuangan</a></li>

						</ul>
					</li>
					<?php } ?>
					<?php
						if ($this->session->userdata('level') =='admin' ) {
							# code...
						
					?>
					<li class="treeview 
					<?= ($this->uri->segment(1) == 'setting-prodi' || $this->uri->segment(1) == 'setting-ta' || $this->uri->segment(1) == 'setting-app') ? 'active' : ''; ?>
					">
						<a href="#">
							<i class="fa fa-gears"></i>
							<span>Setting Data</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">

							<li class="
							<?= ($this->uri->segment(1) == 'setting-prodi') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('setting-prodi') ?>"><i class="fa fa-institution"></i> Program
									Studi</a>
							</li>
							<li class="
							<?= ($this->uri->segment(1) == 'setting-ta') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('setting-ta') ?>"><i class="fa fa-calendar"></i> Tahun
									Akademik</a></li>

							<li class="
							<?= ($this->uri->segment(1) == 'setting-app') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('setting-app') ?>"><i class="fa fa-gear"></i> Aplikasi</a></li>
							<li class="
							<?= ($this->uri->segment(1) == 'setting-bg-hero') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('setting-bg-hero') ?>"><i class="fa fa-gear"></i> Background
									Hero</a></li>
							
									<li class="
							<?= ($this->uri->segment(1) == 'setting-norek') ? 'active' : ''; ?>"><a data-pjax
									href="<?= base_url('setting-norek') ?>"><i class="fa fa-gear"></i> No.Rekening</a></li>

						</ul>
					</li>

					<li class="
					<?= ($this->uri->segment(1) == 'berita-pmb') ? 'active' : ''; ?>
					">
						<a data-pjax href="<?= base_url('berita-pmb') ?>">
							<i class="fa  fa-newspaper-o"></i> <span>Berita PMB</span>
						</a>
					</li>

					<li>
						<a data-pjax href="<?= base_url('pesan-admin') ?>">
							<i class="fa fa-wechat"></i> <span>Pesan</span>

						</a>
					</li>

					<li>
						<a data-pjax href="<?= base_url('user-manajemen') ?>">
							<i class="fa fa-users"></i> <span>Konfigurasi User</span>
						</a>
					</li>
					<?php } ?>



				</ul>
			</section>
			<!-- /.sidebar -->

		</aside>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?=$judul?>
					<small><?=$subjudul?></small>
				</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="#"><?=$judul;?></a></li>
					<li class="breadcrumb-item active"><?=$subjudul?></li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<div id="pjax-container">
