<?php $this->load->view('user/partials/header'); ?>


<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row align-items-end">
			
				<div class="col-xl-9 col-12">
					<div class="box bg-primary-light pull-up">
						<div class="box-body p-xl-0">
							<div class="row align-items-center">
								<div class="col-12 col-lg-3"><img
										src="<?php echo base_url() ?>assets/temauser/images/svg-icon/color-svg/custom-14.svg"
										alt=""></div>
								<div class="col-12 col-lg-9">
									<h2>Hello <?= $user->name ?>, Welcome !</h2>
									<p class="text-dark mb-0 fs-16">
										Anda telah mendaftar di Prodi <strong><u><?= $jurusan->jurusan ?> </u></strong> dengan Nomor Pendaftaran <strong><u><?= $user->no_pendaftaran ?></u></strong>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-12">
					<div class="box bg-transparent no-shadow">
						<div class="box-body p-xl-0 text-center">
							<h3 class="px-30 mb-20">Tahapan<br> Pendaftaran?</h3>
							<a data-pjax href="<?= base_url('faqs') ?>" type="button" class="waves-effect waves-light w-p100 btn btn-primary"><i
									class="fa  fa-hand-o-right	me-15"></i> Panduan Pendaftaran</a>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-12">
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title">Alur Pendaftaran </h4>
							
						</div>
					</div>
				</div>
				<!-- <div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up"
						style="background-image: url(<?php echo base_url() ?>assets/temauser/images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">
										<?php if ($steppembayaran==1) { ?>
										<span class="badge badge-success me-15">Selesai</span>
										<?php } else { ?>
										<span class="badge badge-warning-light me-15">Belum Selesai</span>
										<span class="badge badge-warning-light me-5"><i class="fa fa-lock"></i></span>
										<?php } ?>
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i
												class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										<a data-pjax class="dropdown-item" href="<?= base_url('pembayaran') ?>"><i class="fa  fa-arrow-circle-o-right"></i> Lihat Form
												Pembayaran</a>
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">1. Melakukan Pembayaran</h4>
								<p class="text-fade mb-0 fs-12">Melakukan Pembayaran Pendaftaran</p>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up"
						style="background-image: url(<?php echo base_url() ?>assets/temauser/images/svg-icon/color-svg/st-2.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">
										<?php if ($stepdaftar==1) { ?>
										<span class="badge badge-success me-15">Selesai</span>
										<?php } else { ?>
										<span class="badge badge-warning-light me-15">Belum Selesai</span>
										<span class="badge badge-warning-light me-5"><i class="fa fa-lock"></i></span>
										<?php } ?>

									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i
												class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										<a data-pjax class="dropdown-item" href="<?= base_url('data-pendaftaran') ?>"><i class="fa fa-arrow-circle-o-right"></i> Lihat Form
												Pendaftaran</a>
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">1. Mengisi Form Pendaftaran</h4>
								<p class="text-fade mb-0 fs-12">Mengisi Form Pendaftaran</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up"
						style="background-image: url(<?php echo base_url() ?>assets/temauser/images/svg-icon/color-svg/st-3.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">
									<?php if ($stepberkas==1) { ?>
										<span class="badge badge-success me-15">Selesai</span>
										<?php } else { ?>
										<span class="badge badge-warning-light me-15">Belum Selesai</span>
										<span class="badge badge-warning-light me-5"><i class="fa fa-lock"></i></span>
										<?php } ?>
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i
												class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										
										<input type="hidden" name="jurusan" id="jurusan" value="<?= $jurusan->kode; ?>">
										<?php if($jurusan->kode == '09') { ?>
											<a data-pjax class="dropdown-item" href="<?= base_url('upload-berkas-pascasarjana') ?>"><i class="fa  fa-arrow-circle-o-right"></i> Lihat Berkas</a>
										<?php } else { ?>
											<a data-pjax class="dropdown-item" href="<?= base_url('upload-berkas') ?>"><i class="fa  fa-arrow-circle-o-right"></i> Lihat Berkas</a>
										<?php } ?>
										
										<!-- <a data-pjax class="dropdown-item" href="<?= base_url('upload-berkas') ?>"><i class="fa  fa-arrow-circle-o-right"></i> Lihat Berkas</a> -->
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">2. Mengupload Berkas Pendaftaran</h4>
								<p class="text-fade mb-0 fs-12">Berkas Persyaratan Pendaftar</p>
								<!-- <input type="hidden" name="jurusan" id="jurusan" value="<?= $pendaftar->jurusan; ?>"> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up"
						style="background-image: url(<?php echo base_url() ?>assets/temauser/images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">
										<?php if ($steppembayaran==1) { ?>
										<span class="badge badge-success me-15">Selesai</span>
										<?php } else { ?>
										<span class="badge badge-warning-light me-15">Belum Selesai</span>
										<span class="badge badge-warning-light me-5"><i class="fa fa-lock"></i></span>
										<?php } ?>
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i
												class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										<a data-pjax class="dropdown-item" href="<?= base_url('pembayaran') ?>"><i class="fa  fa-arrow-circle-o-right"></i> Lihat Form
												Pembayaran</a>
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">3. Melakukan Pembayaran</h4>
								<p class="text-fade mb-0 fs-12">Melakukan Pembayaran Pendaftaran</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up"
						style="background-image: url(<?php echo base_url() ?>assets/temauser/images/svg-icon/color-svg/st-4.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pe-2 justify-content-between">
									<div class="d-flex">
										<?php if ($stepberkas==1 && $stepdaftar==1 && $steppembayaran==1) { ?>
										<span class="badge badge-success me-15">Selesai</span>
										<?php } else { ?>
										<span class="badge badge-warning-light me-15">Lengkapi seluruh langkah</span>
										<span class="badge badge-warning-light me-5"><i class="fa fa-lock"></i></span>
										<?php } ?>
									</div>
									<div class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i
												class="fa fa-caret-down"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
										<?php if ($stepberkas==1 && $stepdaftar==1 && $steppembayaran==1) { ?>
											<a class="dropdown-item" href="<?= base_url('print-pendaftaran') ?>"><i class="fa  fa-cloud-download"></i>
												Download Form Berkas Pendaftaran</a>
											<!-- <a class="dropdown-item" href="<?= base_url('print-formdomisili') ?>"><i class="fa  fa-cloud-download"></i>
												Download Form Domisili</a>
											<a class="dropdown-item" href="<?= base_url('print-formpernyataan') ?>"><i class="fa  fa-cloud-download"></i>
												Download Form Pernyataan</a> -->
										<?php } ?>
											
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">4. Pendaftaran Telah Selesai </h4>
								<!-- <div class="dropdown"> -->
									<p class="text-fade mb-0 fs-12">Download Form Pendaftaran </p>
								<!-- </div> -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>
		<!-- /.content -->
	</div>
</div>

<?php $this->load->view('user/partials/footer'); ?>
