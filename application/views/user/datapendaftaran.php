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
								<li class="breadcrumb-item" aria-current="page">Form Data Pendaftaran</li>
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
										<h2 class="mb-10 text-secondary">Data Pendaftaran Anda</h2>
									</div>
								</div>
								<a data-pjax="" href="<?= base_url('edit-data-pendaftaran') ?>"
									class="btn btn-info btn-md mb-5  text-white"> <i class="fa fa-edit"></i> Edit Data
									Pendaftaran</a>

							</div>
						</div>
					</div>
				</div>
			</div>




			<div class="row">
				<div class="col-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home8"
										role="tab" aria-selected="true"><span><i
												class="fa fa-user-circle me-15"></i>Data
											Pribadi</span></a> </li>
								<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile8"
										role="tab" aria-selected="false"><span><i
												class="fa fa-institution me-15"></i>Data
											Sekolah</span></a> </li>
								<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages8"
										role="tab" aria-selected="false"><span><i class="fa fa-users me-15"></i>Data
											Orang
											Tua</span></a> </li>
								<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages9"
										role="tab" aria-selected="false"><span><i class="fa fa-users me-15"></i>Data
											Konfirmasi Pendaftaran</span></a> </li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content tabcontent-border">
								<div class="tab-pane active" id="home8" role="tabpanel">
									<div class="p-15">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr>
														<td width="200">Nama Depan</td>
														<td> <?= $data_daftar->nama_depan ?> </td>
													</tr>
													<tr>
														<td>Nama Belakang</td>
														<td> <?= $data_daftar->nama_belakang ?> </td>
													</tr>
													<tr>
														<td width="200">NIK</td>
														<td> <?= $data_daftar->nik ?> </td>
													</tr>
													<tr>
														<td>NISN</td>
														<td> <?= $data_daftar->nisn ?> </td>
													</tr>
													<tr>
														<td>Program Studi</td>
														<td> <?php foreach ($jurusan->result_array()  as  $value) {
									                if( $value['kode'] == $user['jurusan'] ){
                                                        echo $value['jurusan'];
                                                        } 
                                                    } ?>
														</td>
													</tr>
													<tr>
														<td>Tanggal Lahir</td>
														<td> <?= $data_daftar->tanggal_lahir ?> </td>
													</tr>
													<tr>
														<td>Nomor HP</td>
														<td> <?= $data_daftar->nohp ?> </td>
													</tr>

													<tr>
														<td>Golongan Darah</td>
														<td> <?= $data_daftar->gdarah ?> </td>
													</tr>

													<tr>
														<td>Jenis Kelamin</td>
														<td> <?= $data_daftar->jk ?> </td>
													</tr>

													<tr>
														<td>Warga Negara</td>
														<td> <?= $data_daftar->wn ?> </td>
													</tr>

													<tr>
														<td>Pekerjaan</td>
														<td> <?= $data_daftar->pekerjaan ?> </td>
													</tr>

													<tr>
														<td>Agama</td>
														<td> <?= $data_daftar->agama ?> </td>
													</tr>

													<tr>
														<td>Anak ke</td>
														<td> <?= $data_daftar->anak ?> </td>
													</tr>

													<tr>
														<td>Jumlah Saudara</td>
														<td> <?= $data_daftar->jsaudara ?> </td>
													</tr>

													<tr>
														<td>Ukuran Jas Almamater</td>
														<td> <?= $data_daftar->size_almet ?> </td>
													</tr>

													<tr>
														<td>Alamat Sesuai KTP</td>
														<td> <?= $data_daftar->alamat ?> </td>
													</tr>

													<tr>
														<td>Alamat Tinggal di Jember (Kos/Tempat Saudara)</td>
														<td> <?= $data_daftar->alamat_jember ?> </td>
													</tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="profile8" role="tabpanel">
									<div class="p-15">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr>
														<td width="200">Asal Sekolah</td>
														<td> <?= $data_daftar->asalsekolah ?> </td>
													</tr>
													<tr>
														<td>Tahun Lulus</td>
														<td> <?= $data_daftar->tahunlulus ?> </td>
													</tr>
													<tr>
														<td>Provinsi</td>
														<td>
															<?php
														foreach ($provinsi as $row) {
															if($data_daftar->prov == $row->id){
																echo $row->name;
															}
														}
           						 					?>
														</td>
													</tr>
													<tr>
														<td>Kabupaten / Kota</td>
														<td> <?= $data_daftar->kota ?> </td>
													</tr>
													<tr>
														<td>NPSN</td>
														<td> <?= $data_daftar->npsn ?> </td>
													</tr>
													<tr>
														<td>Alamat Sekolah</td>
														<td> <?= $data_daftar->alamatsekolah ?> </td>
													</tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="messages8" role="tabpanel">
									<div class="p-15">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr>
														<td width="200">Nama Ibu Kandung</td>
														<td> <?= $data_daftar->nama_ortu ?> </td>
													</tr>
													<tr>
														<td>Nomor Handphone</td>
														<td> <?= $data_daftar->nohp_ortu ?> </td>
													</tr>
													<tr>
														<td>Agama</td>
														<td> <?= $data_daftar->agama_ortu ?>
														</td>
													</tr>
													<tr>
														<td>Pekerjaan</td>
														<td> <?= $data_daftar->pekerjaan_ortu ?> </td>
													</tr>
													<tr>
														<td>Pendidikan Terakhir</td>
														<td> <?= $data_daftar->pendidikan_ortu ?> </td>
													</tr>

													<tr>
														<td>Penghasilan</td>
														<td> <?= $data_daftar->penghasilan_ortu ?> </td>
													</tr>

													<tr>
														<td>Alamat</td>
														<td> <?= $data_daftar->alamat_ortu ?> </td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="messages9" role="tabpanel">
									<div class="p-15">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr>
														<td width="200">Jalur Pendaftaran</td>
														<td> <?= $data_daftar->jalur_pendaftaran ?> </td>
													</tr>
													<tr>
														<td>Sumber Informasi</td>
														<td> <?= $data_daftar->informasi ?> </td>
													</tr>
													<tr>
														<td>No. KIP-K</td>
														<td> 
															<?php if ($data_daftar->kipk == '0') { 
																echo "-";
															}else {
																echo $data_daftar->kipk;
															} ?>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
</div>
	<?php $this->load->view('user/partials/footer'); ?>

	<!-- 192.168.5.197 -->
