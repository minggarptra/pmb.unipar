<?php $this->load->view('user/partials/header'); ?>
<div class="content-wrapper upload" style="min-height: 705px;">
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
								<li class="breadcrumb-item" aria-current="page">Form Pendaftaran</li>
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
							<div class="d-lg-flex align-items-center justify-content-center ">
								<div
									class=" text-center text-md-start d-md-flex align-items-center mb-30  mb-lg-0 w-p100">
									<img src="<?= base_url('assets/temauser/images') ?>/svg-icon/color-svg/custom-14.svg"
										class="img-fluid max-w-150" alt="">
									<div class="ms-30">
										<h2 class="mb-10 text-secondary">Upload Berkas</h2>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<form action="asdf" class="validation-wizard wizard-circle">
			<!-- <input type="hidden" name="jurusan" id="jurusan" value="<?= $pendaftar->jurusan; ?>"> -->
			
			<!-- DROPZONE KTP -->
			<div class="box ">
				<div class="box-header">
					<h4 class="box-title">Upload Scan KTP <?php if ($tokenktp > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzonektp">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan KTP, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($tokenktp > 0) {
                            
                             ?>
						<style>
							#dropzonektp {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/ktp/'.$ktp.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('deletektp/'.$tokenktp.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i> Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE KARTU KELUARGA -->
			<div class="box ">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Kartu Keluarga <?php if ($tokenkk > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzonekk">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Kartu Keluarga , File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($tokenkk > 0) {
                            
                             ?>
						<style>
							#dropzonekk {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/kk/'.$kk.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('deletekk/'.$tokenkk.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i> Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE AKTE KELAHIRAN-->
			<div class="box " id="akte">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Akte Kelahiran <?php if ($token_akte_kelahiran > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzoneaktekelahiran">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Akte Kelahiran, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token_akte_kelahiran > 0) {
                            
                             ?>
						<style>
							#dropzoneaktekelahiran {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/akte_kelahiran/'.$akte_kelahiran.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_akte_kelahiran/'.$token_akte_kelahiran.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE IJAZAH SKL -->

			<div class="box " id="ijazah_sma_smk">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Ijazah SMA / SMK / Sederajat <?php if ($token > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzoneijazah">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Ijazah SMA / SMK / Sederajat (Legalisir), File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token > 0) {
                            
                             ?>
						<style>
							#dropzoneijazah {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/ijazah_sma_smk/'.$ijazah.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('deleteijazah/'.$token.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			

			<?php if ($pendaftar->jurusan == '09'){
				include('uploadfile_pascasarjana.php');
			} else {
				include('uploadfile_sarjana.php');
			} ?>

			</form>
		<!-- </div> -->
		<!-- </div> -->
		</section>
		<!-- /.content -->
	</div>
</div>

<?php $this->load->view('user/partials/footer'); ?>
 
