<?php $this->load->view('admin/partials/header2'); ?>

<div class="row">
	<div class="col-xl-4 col-lg-5">

		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
			<a href="<?= base_url('pendaftaran-list') ?>" class="btn btn-block btn-social btn-bitbucket text-light"><i
										class="fa fa-arrow-left"></i> Kembali</a>
				<img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="
				<?php if ($detail->foto == null) {
					echo base_url('assets/noimage.jpg');
				} else {
					echo base_url('assets/upload/images/foto/'.$detail->foto);
				}
				 ?>
				" alt="User profile picture">

				<h3 class="profile-username text-center"><?= $detail->namalengkap ?></h3>

				<p class="text-muted text-center"><?= $detail->no_pendaftaran ?>.</p>



				<div class="row">
					<div class="col-12">
						<div class="profile-user-info">
							<p>Program studi </p>
							<h6 class="margin-bottom"><?= $detail->nama_prodi?></h6>
							<p>Tanggal Pendaftaran</p>
							<h6 class="margin-bottom">
								<?= date("D", strtotime($detail->tanggal_daftar)).','.date("d M Y", strtotime($detail->tanggal_daftar))  ?>
							</h6>
							<p>Alamat</p>
							<h6 class="margin-bottom"><?= $detail->alamat?></h6>
							<p class="margin-bottom">Download File</p>
							<div class="user-social-acount">
								<a href="<?= base_url('form-pendaftaran/'.$iduser) ?>" class="btn btn-block btn-social btn-bitbucket text-light"><i
										class="fa fa-download"></i> Download Form Pendaftaran</a>
								<a href="
								<?php if ($detail->ktp == null) {
								echo base_url('assets/noimage.jpg');
								} else {
									echo base_url('assets/upload/images/ktp/'.$detail->ktp);
								}
								?>
								" class="btn btn-block btn-social 
								<?php if ($detail->ktp == null) {
									echo 'btn-danger';
								} else {
									echo 'btn-bitbucket';
								}
								?>
								text-light" target="blank"><i class="fa fa-download"></i>Download KTP</a>
								<a href="
								<?php if ($detail->kk == null) {
								echo base_url('assets/noimage.jpg');
								} else {
									echo base_url('assets/upload/images/kk/'.$detail->kk);
								}
								?>
								" class="btn btn-block btn-social 
								<?php if ($detail->kk == null) {
									echo 'btn-danger';
								} else {
									echo 'btn-bitbucket';
								}
								?>
								text-light" target="blank"><i class="fa fa-download"></i>Download Kartu Keluarga</a>
								<a href="
								<?php if ($detail->akte_kelahiran == null) {
								echo base_url('assets/noimage.jpg');
								} else {
									echo base_url('assets/upload/images/akte_kelahiran/'.$detail->akte_kelahiran);
								}
								?>
								" class="btn btn-block btn-social 
								<?php if ($detail->akte_kelahiran == null) {
									echo 'btn-danger';
								} else {
									echo 'btn-bitbucket';
								}
								?>
								text-light" target="blank"><i class="fa fa-download"></i>Download Akte Kelahiran</a>
								<a href="
								<?php if ($detail->ijazah == null) {
								echo base_url('assets/noimage.jpg');
								} else {
									echo base_url('assets/upload/images/ijazah_sma_smk/'.$detail->ijazah);
								}
								?>
								" class="btn btn-block btn-social 
								<?php if ($detail->ijazah == null) {
									echo 'btn-danger';
								} else {
									echo 'btn-bitbucket';
								}
								?>
								
								text-light" target="blank"><i class="fa fa-download"></i> Download Ijazah SMA / SMK / Sederajat</a>
								
								<?php if ($pendaftar == '09') { ?>
									
									<a href="
									<?php if ($detail->ijazah_s1 == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/ijazah_s1/'.$detail->ijazah_s1);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->ijazah_s1 == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Ijazah S1</a>

									<a href="
									<?php if ($detail->transkrip_s1 == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/transkrip_s1/'.$detail->transkrip_s1);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->transkrip_s1 == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Transkrip Nilai S1</a>

								<?php } else { ?>

									<a href="
									<?php if ($detail->un == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/un/'.$detail->un);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->un == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Nilai UN</a>

									<a href="
									<?php if ($detail->ijazah_d1_d2_d3 == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/ijazah_d/'.$detail->ijazah_d1_d2_d3);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->ijazah_d1_d2_d3 == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Ijazah D1/D2/D3</a>

									<a href="
									<?php if ($detail->transkrip_d1_d2_d3 == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/ijazah_d/'.$detail->transkrip_d1_d2_d3);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->transkrip_d1_d2_d3 == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Transkrip/KHS D1/D2/D3</a>

									<a href="
									<?php if ($detail->sk == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/sk_pindah/'.$detail->sk);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->sk == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Surat Keterangan Pindah</a>

									<a href="
									<?php if ($detail->persyaratan_lain == null) {
									echo base_url('assets/noimage.jpg');
									} else {
										echo base_url('assets/upload/images/persyaratan_lain/'.$detail->persyaratan_lain);
									}
									?>
									" class="btn btn-block btn-social 
									<?php if ($detail->persyaratan_lain == null) {
										echo 'btn-danger';
									} else {
										echo 'btn-bitbucket';
									}
									?>
									text-light" target="blank"><i class="fa fa-download"></i> Download Persyaratan Lain</a>
									
								<?php } ?>
									
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
	<div class="col-xl-8 col-lg-7">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">

				<li><a class="active" href="#timeline" data-toggle="tab">Timeline</a></li>

				
			</ul>

			<div class="tab-content">

				<div class="active tab-pane" id="timeline">
					<!-- The timeline -->
					<ul class="timeline">
						<?php foreach ($aktifitas as $key ) { ?>
						<!-- timeline time label -->

							
						<li class="time-label">
							<span class="bg-green">
								<?= date("d M Y", strtotime($key->date))?>
							</span>
						</li>
						
						<li>
							<i class="ion ion-person bg-aqua"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i> <?= date("H:i:s", strtotime($key->date))?></span>

								<h3 class="timeline-header no-border"><?= $key->notifikasi ?></h3>
							</div>
						</li>
						
						<?php } ?>
						<li>
							<i class="fa fa-clock-o bg-gray"></i>
						</li>
					</ul>
				</div>
				<!-- /.tab-pane -->

				<!-- /.tab-pane -->

			
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>

<?php $this->load->view('admin/partials/footer2'); ?>
