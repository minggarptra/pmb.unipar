<?php $this->load->view('admin/partials/header'); ?>
<?php
  $setting = $this->db->get('settings')->row();
  $tahun = $this->Settings_model->gettahun()["tahun"] ;
?>


<div class="page-wrapper detailpendaftaran">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Pendaftaran</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i
									class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('pendaftaran') ?>">
								Pendaftaran</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $nama_jurusan->jurusan ?></li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<h5> <i class="bx bx-calendar-event text-info"></i> Tahun, <?= $ta->tahun.'/'.($ta->tahun+1)  ?></h5>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h5><i class="bx bx-search-alt"></i> Filter Data Pendaftaran</h5>
					</div>
					<div class="card-body">

						<div class="row">

							<div class="col-md-6">
								<label for="inputState" class="form-label ">Pembayaran Pendaftaran :</label>
								<select id="inputState" class="form-select pembayaran">
									<option value="">Pilih...</option>
									<option value="Sudah Bayar">Sudah Bayar</option>
									<option value="Belum Bayar">Belum Bayar</option>
								</select>
							</div>

							<div class="col-md-6">
								<label for="inputState" class="form-label ">Berkas :</label>
								<select id="inputState" class="form-select berkas">
									<option value="">Pilih...</option>
									<option value="Sudah Lengkap">Sudah Lengkap</option>
									<option value="Belum Lengkap">Belum Lengkap</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 mt-3">
								<button class="btn btn-primary" id="cleardata"><i class="bx bx-refresh"></i>
									Clear</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md 3 mb-3">
				<div class="d-grid gap-3 ">
					<a  href="<?= base_url('statistik-detail/').$kodeprodi ?>" class="btn btn-info" type="button"><i class="bx bx-chart"></i> Statistik Pendaftaran</a>
					<a target="blank" href="<?= base_url('print-laporan-pendaftaran/').$kodeprodi ?>" class="btn btn-info" type="button"><i class="bx bx-download"></i> Laporan Pendaftaran</a>
				</div>
				
			</div>
		</div>


		<div class="card">
			<div class="card-header">
				<h5>Data Pendaftaran Prodi <?= $nama_jurusan->jurusan ?></h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datadaftar" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>
									No.
								</th>
								<th>
									No Pendaftaran
								</th>
								<th>
									Nama
								</th>
								<th>
									Sekolah
								</th>
								<th>
									Pembayaran Pendaftaran
								</th>
								<th>
									Status Berkas
								</th>

								<th>
									Download Berkas
								</th>
								<th>
									Detail
								</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$no=0;
							foreach ($pendaftaran as $value) {
							$no++;
							?>
							<tr>
								<td>
									<?= $no?>
								</td>
								<td>
									<?= $value->no_pendaftaran ?>
								</td>
								<td>
									<?= $value->nama_depan.' '.$value->nama_belakang ?>
								</td>
								<td>
									<?= $value->asalsekolah ?>
								</td>
								<td>
									<?php 
									$payment =$this->db->get_where('invoice',['camaba'=> $value->no_pendaftaran])->row();
									if($payment->pay_status == 'SETTLED'){
									?>Sudah Bayar<?php
									}
									else {
									?>Belum Bayar<?php	
									}
									?>
								</td>
								<td>
									<?php 
										$ijazah = $this->db->get_where('ijazah', ['user' => $value->id_user])->num_rows();    
										$kk = $this->db->get_where('kk', ['user' => $value->id_user])->num_rows();    
										$foto = $this->db->get_where('foto', ['user' => $value->id_user])->num_rows();    
								
										if ($ijazah < 1 || $kk < 1 || $foto < 1) {
															echo 'Belum Lengkap';
															
										} else {
															echo 'Sudah Lengkap';
								
										}
									?>
								</td>
								<td>
									<!-- Example split danger button -->


									<a class="badge bg-secondary text-white fs-6" role="button"
										data-bs-toggle="collapse"="collapse" href="#ui-basic<?=$value->no_pendaftaran?>"
										aria-expanded="false" aria-controls="ui-basic">
										<span class="menu-title">Download Berkas </span>
										<i class="bx bx-caret-down-square"></i>
									</a>
									<div class="collapse" id="ui-basic<?=$value->no_pendaftaran?>">
										<ul class="nav flex-column sub-menu">
											<li class="nav-item">
												<a href="<?= base_url('form-pendaftaran/'.$value->id_user.'') ?>"
													class="badge text-white bg-success mt-2" target="blank"><i
														class="far fa-file-alt menu-icon"></i>
													<span class="menu-title">Form Pendaftaran</span></a>
											</li>
											<?php 
												//ijazah
													$ijazah =$this->db->get_where('ijazah',['user'=> $value->id_user])->num_rows();

													if ($ijazah < 1) {
														echo '<li class="nav-item">
														<a  class="badge text-white bg-warning mt-2 active"
															href="#"><i
																class="far fa-file-alt menu-icon"></i>
															<span class="menu-title">Ijazah belum diupload</span></a>
													</li>';
													} else {
													$ijazah2 =$this->db->get_where('ijazah',['user'=> $value->id_user])->row();
													$fileijazah= $ijazah2->ijazah;
													echo '<li class="nav-item">
													<a target="blank" class="badge text-white bg-success mt-2 active"
														href="'.base_url('assets/upload/images/ijazah/'.$ijazah2->ijazah.'').'"><i
															class="far fa-file-alt menu-icon"></i>
														<span class="menu-title">Ijazah</span></a>
													</li>';	

													}
												?>

											<?php 
												// kartu keluarga
													$kk =$this->db->get_where('kk',['user'=> $value->id_user])->num_rows();

													if ($kk < 1) {
														echo '<li class="nav-item">
														<a  class="badge text-white bg-warning mt-2 active"
															href="#"><i
																class="far fa-file-alt menu-icon"></i>
															<span class="menu-title">kk belum diupload</span></a>
													</li>';
													} else {
													$kk2 =$this->db->get_where('kk',['user'=> $value->id_user])->row();
													$filekk= $kk2->kk;
													echo '<li class="nav-item">
													<a target="blank" class="badge text-white bg-success mt-2 active"
														href="'.base_url('assets/upload/images/kk/'.$kk2->kk.'').'"><i
															class="far fa-file-alt menu-icon"></i>
														<span class="menu-title">Kartu Keluarga</span></a>
													</li>';	

													}
												?>


											<?php 
												// Foto
													$foto =$this->db->get_where('foto',['user'=> $value->id_user])->num_rows();

													if ($foto < 1) {
														echo '<li class="nav-item">
														<a  class="badge text-white bg-warning mt-2 active"
															href="#"><i
																class="far fa-file-alt menu-icon"></i>
															<span class="menu-title">foto belum diupload</span></a>
													</li>';
													} else {
													$foto2 =$this->db->get_where('foto',['user'=> $value->id_user])->row();
													$filefoto= $foto2->foto;
													echo '<li class="nav-item">
													<a target="blank" class="badge text-white bg-success mt-2 active"
														href="'.base_url('assets/upload/images/foto/'.$foto2->foto.'').'"><i
															class="far fa-file-alt menu-icon"></i>
														<span class="menu-title">Foto</span></a>
													</li>';	

													}
												?>
										</ul>
									</div>

								</td>
								<td>
									<a class="badge bg-success text-white fs-6" target="blank"
										href="<?= base_url('form-pendaftaran/'.$value->id_user.'') ?>"><i
											class="bx bx-detail"></i>
										Detail Data</a>
								</td>

							</tr>

							<?php 
								
							} ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

<?php $this->load->view('admin/partials/footer'); ?>
<script>

</script>
