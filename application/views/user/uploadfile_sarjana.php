<!-- DROPZONE Nilai UN-->
<div class="box " id="nilai_un" onChange="showDisplay()">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Legalisir Nilai Ujian Nasional <?php if ($token_un > 0) {
                            
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
					<div class="dropzone" id="dropzone_un">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Legalisir Nilai Ujian Nasional, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token_un > 0) {
                            
                             ?>
						<style>
							#dropzone_un {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/nilai_un/'.$un.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_un/'.$token_un.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE IJAZAH D1 / D2 / D3-->
			<div class="box " id="ijazah_d" onChange="showDisplay()">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Legalisir Ijazah D1/D2/D3 <?php if ($token_ijazah_d > 0) {
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
						<p><h5><b class="text-danger">*</b> Wajib Diisi Bagi Mahasiswa Jalur Transfer/Pindahan</h5></p>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzoneijazah_d">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Legalisir Ijazah D1/D2/D3, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token_ijazah_d > 0) {
                            
                             ?>
						<style>
							#dropzoneijazah_d {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/ijazah_d/'.$ijazah_d.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_ijazah_d/'.$token_ijazah_d.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE TRANSKRIP NILAI D1/D2/D3-->
			<div class="box " id="transkrip_d" onChange="showDisplay()">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Transkrip Nilai / KHS D1/D2/D3 <?php if ($token_transkrip_d > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
						<p><h5><b class="text-danger">*</b> Wajib Diisi Bagi Mahasiswa Jalur Transfer/Pindahan</h5></p>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzonetranskrip_d">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Transkrip Nilai / KHS D1/D2/D3, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token_transkrip_d > 0) {
                            
                             ?>
						<style>
							#dropzonetranskrip_d {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/transkrip_d/'.$transkrip_d.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_transkrip_d/'.$token_transkrip_d.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE SURAT KETERANGAN PINDAH-->
			<div class="box " id="sk_pindah" onChange="showDisplay()">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Surat Keterangan Pindah Asli dari Perguruan Tinggi <?php if ($token_sk_pindah > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
						<p><h5><b class="text-danger">*</b> Wajib Diisi Bagi Mahasiswa Jalur Pindahan</h5></p>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzonesk_pindah">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Surat Keterangan Pindah Asli dari Perguruan Tinggi, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token_sk_pindah > 0) {
                            
                             ?>
						<style>
							#dropzonesk_pindah {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/sk_pindah/'.$sk_pindah.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_sk_pindah/'.$token_sk_pindah.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- DROPZONE PERSYARATAN LAIN-->
			<div class="box " id="persyaratan_lain" onChange="showDisplay()">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Persyaratan Lain <?php if ($token_persyaratan_lain > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
						<p><h5><b class="text-danger">*</b> Wajib Diisi Bagi Mahasiswa Program Beasiswa</h5></p>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzonepersyaratan_lain">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Persyaratan Lain, File harus berexstensi .PDF</h3>
						</div>

					</div>
					<div class="">
						<?php if ($token_persyaratan_lain > 0) {
                            
                             ?>
						<style>
							#dropzonepersyaratan_lain {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/persyaratan_lain/'.$persyaratan_lain.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_persyaratan_lain/'.$token_persyaratan_lain.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i>Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>