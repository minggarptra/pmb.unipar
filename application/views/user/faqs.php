<?php $this->load->view('user/partials/header'); ?>
<div class="content-wrapper formdata " style="min-height: 705px;">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a data-pjax href="<?= base_url('user') ?>"><i
											class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Panduan Pendaftaran</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>
		<!-- Main content -->
		<section class="content">
			<div class="row justify-content-center">
				<div class="col-12  ">
					<div class="box pull-up ">
						<div class="box-body bg-img bg-primary-light"
							style="background-image: url(<?= base_url('assets/temauser/images') ?>/bg-5.png);"
							data-overlay-light="9">
							<div
								class="d-lg-flex align-items-center justify-content-center text-center  text-md-start ">
								<div
									class=" text-center text-md-start d-md-flex align-items-center mb-30  mb-lg-0 w-p100">
									<img src="<?= base_url('assets/temauser/images') ?>/svg-icon/color-svg/custom-14.svg"
										class="img-fluid max-w-150" alt="">
									<div class="ms-30">
										<h2 class="mb-10 text-secondary">Panduan Pendaftaran</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-12">
					<div class="box">
						<div class="box-body">
							<!-- Nav tabs -->
							<ul class="nav nav-pills rounded nav-justified">
								<li class="nav-item"> <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
										aria-expanded="false">Status Pendaftaran</a> </li>
								<!-- <li class="nav-item"> <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
										aria-expanded="false">Pembayaran</a> </li> -->
								<li class="nav-item"> <a href="#navpills-3" class="nav-link" data-bs-toggle="tab"
										aria-expanded="true">Isi Form Pendaftaran</a> </li>
								<li class="nav-item"> <a href="#navpills-4" class="nav-link" data-bs-toggle="tab"
										aria-expanded="true">Upload Berkas</a> </li>
								<li class="nav-item"> <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
										aria-expanded="false">Pembayaran</a> </li>
							</ul>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
					<div class="box">
						<div class="box-body">
							<!-- Tab panes -->
							<div class="tab-content">
								<div id="navpills-1" class="tab-pane active">
									<!-- Categroy 1 -->
									<div class=" tab-pane animation-fade active" id="category-1" role="tabpanel">
										<div class="panel-group panel-group-simple panel-group-continuous"
											id="accordion2" aria-multiselectable="true" role="tablist">
										
											<div class="panel">
												<div class="panel-heading" id="question-2" role="tab">
													<a class="panel-title" aria-controls="answer-2" aria-expanded="true"
														data-bs-toggle="collapse" href="#answer-2"
														data-parent="#accordion2">
														Bagaimana melihat status pendaftaran saya ?
													</a>
												</div>
												<div class="panel-collapse collapse show" id="answer-2"
													aria-labelledby="question-2" role="tabpanel"
													data-bs-parent="#category-1">
													<div class="panel-body">
														Status Pendaftaran anda dapat dilihat pada menu Dashboard, dan jika langkah pendaftaran sudah selesai maka status akan berubah menjadi <strong>Selesai</strong>, Anda dapat mendownload form pendaftaran jika semua langkah pendaftaran sudah selesai pada halaman <strong>Dashboard</strong> pada tampilan <strong><u>Download Form Pendaftaran</u></strong>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<!-- End Categroy 1 -->
								</div>
								<div id="navpills-2" class="tab-pane">
									<!-- Categroy 2 -->
									<div class="tab-pane animation-fade" id="category-2" role="tabpanel">
										<div class="panel-group panel-group-simple panel-group-continuous"
											id="accordion" aria-multiselectable="true" role="tablist">
									
											<div class="panel">
												<div class="panel-heading" id="question-5" role="tab">
													<a class="panel-title" aria-controls="answer-5" aria-expanded="true"
														data-bs-toggle="collapse" href="#answer-5"
														data-parent="#accordion">
														Bagaimana Melakukan Pembayaran pendaftaran ?
													</a>
												</div>
												<div class="panel-collapse collapse show" id="answer-5"
													aria-labelledby="question-5" role="tabpanel"
													data-bs-parent="#category-2">
													<div class="panel-body">
														Pada aplikasi ini anda harus melakukan pembayaran secara <strong>Online</strong> Melalui pilihan pembayaran bank yang tersedia, anda dapat mengakses pembayaran tagihan anda pada menu <strong>PEMBAYARAN</strong> , batas waktu pembayaran anda adalah 1x24 Jam setelah anda membuat akun pertama kali, Bayar sesuai nominal yang tertera pada aplikasi, Jika sudah selesai membayar maka <strong>Pembayaran</strong> akan terkonfirmasi secara <strong>OTOMATIS</strong>.
													</div>
												</div>
											</div>
											
										</div>
									</div>
									<!-- End Categroy 2 -->
								</div>
								<div id="navpills-3" class="tab-pane">
									<!-- Categroy 3 -->
									<div class="tab-pane animation-fade" id="category-3" role="tabpanel">
										<div class="panel-group panel-group-simple panel-group-continuous"
											id="accordion1" aria-multiselectable="true" role="tablist">
											<!-- Question 8 -->
											<div class="panel">
												<div class="panel-heading" id="question-8" role="tab">
													<a class="panel-title" aria-controls="answer-8" aria-expanded="true"
														data-bs-toggle="collapse" href="#answer-8"
														data-parent="#accordion1">
														Bagaimana mengisi form Pendaftaran ?
													</a>
												</div>
												<div class="panel-collapse collapse show" id="answer-8"
													aria-labelledby="question-8" role="tabpanel"
													data-bs-parent="#category-3">
													<div class="panel-body">
														Anda dapat mengisi <strong>Form Pendaftaran</strong> pada menu data pendaftaran, isilah sesuai dengan data anda secara benar. anda juga dapat mengedit data pendaftaran anda jika terdapat ketidak sesuaian data.
													</div>
												</div>
											</div>
										
										</div>
									</div>
									<!-- End Categroy 3 -->
								</div>
								<div id="navpills-4" class="tab-pane">
									<!-- Categroy 4 -->
									<div class="tab-pane animation-fade" id="category-4" role="tabpanel">
										<div class="panel-group panel-group-simple panel-group-continuous"
											id="accordion3" aria-multiselectable="true" role="tablist">
											<!-- Question 11 -->
											<div class="panel">
												<div class="panel-heading" id="question-11" role="tab">
													<a class="panel-title" aria-controls="answer-11"
														aria-expanded="true" data-bs-toggle="collapse" href="#answer-11"
														data-parent="#accordion3">
														Bagaimana cara upload berkas, dan berkas apa saja yang diperlukan ?
													</a>
												</div>
												<div class="panel-collapse collapse show" id="answer-11"
													aria-labelledby="question-11" role="tabpanel"
													data-bs-parent="#category-4">
													<div class="panel-body">
														Anda dapat memulai mengupload berkas pada menu <strong>Upload Berkas</strong> dan berkas yang diperlukan adalah 
                                                        <ul>
                                                            <li>Phase Photo</li>
                                                            <li>Scan Ijazah atau Surat Keterangan Lulus</li>
                                                            <li>Scan Kartu Keluarga</li>
                                                    
                                                    </ul>
													</div>
												</div>
											</div>
										
										</div>
									</div>
									<!-- End Categroy 4 -->
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
			<!-- /.row -->

		</section>
		<!-- /.content -->
	</div>
</div>
<?php $this->load->view('user/partials/footer'); ?>
