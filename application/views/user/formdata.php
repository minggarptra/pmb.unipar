<?php $this->load->view('user/partials/header'); ?>

<div class="content-wrapper formdata">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">

					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('user') ?>"><i
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
										<h2 class="mb-10 text-secondary">Form Pendaftaran Mahasiswa Baru</h2>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Validation wizard -->
			<div class="box">
				<
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="asdf" class="validation-wizard wizard-circle">
						<!-- Step 1 -->
						<h6>Data Pribadi</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2" class="form-label"> Nama Depan : <span
												class="danger">*</span> </label>
										<input name="nama_depan" type="text" class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2" class="form-label"> Nama Belakang : <span
												class="danger">*</span> </label>
										<input name="nama_belakang" type="text" class="form-control" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> NIK : <span
												class="danger">*</span> </label>
										<input name="nik" type="number" class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> NISN : <span
												class="danger">*</span> </label>
										<input name="nisn" type="number" class="form-control required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wphoneNumber2" class="form-label">Tanggal Lahir :</label>
										<input type="date" name="tanggal_lahir" class="form-control required">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Tempat Lahir : <span
												class="danger">*</span> </label>
										<input name="tempat_lahir" type="text" class="form-control required" />
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="wdate2" class="form-label">Nomor Handphone :</label>
										<input name="nohp" type="number" class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Golongan Darah : <span
												class="danger">*</span> </label>
										<select name="golongan_darah" class="form-select required">
											<option value="">Pilih golongan darah</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="AB">AB</option>
											<option value="0">O</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Jenis Kelamin : <span
												class="danger">*</span> </label>
										<select name="jenis_kelamin" class="form-select required">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="laki-laki">Laki - laki</option>
											<option value="perempuan">Perempuan</option>

										</select>

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Warga Negara : <span
												class="danger">*</span> </label>
										<select name="wn" class="form-select required">
											<option value="">Pilih Warga negara</option>
											<option value="Indonesia">Indonesia</option>
											<option value="WNA">WNA</option>

										</select>
									</div>
								</div>
							</div>

							<div class="row">
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Pekerjaan : <span
												class="danger">*</span> </label>
										<select name="pekerjaan" class="form-select required">
											<option value="">Pilih Pekerjaan</option>
											<option value="tidak bekerja">Tidak bekerja</option>
											<option value="bekerja">Bekerja</option>
										</select>

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Agama : <span
												class="danger">*</span> </label>
										<select name="agama" class="form-select required">
											<option value="">Pilih Agama</option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>

										</select>
									</div>
								</div>
							</div>

							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Anak Ke : <span
												class="danger">*</span> </label>
										<input name="anak_ke" type="number" class="form-control required">

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Jumlah Saudara : <span
												class="danger">*</span> </label>
										<input name="jumlah_saudara" type="number" class="form-control required" name=""
											id="">
									</div>
								</div>
							</div>

								<div class="col-md-12">
									<div class="form-group">
										<!-- <label for="wfirstName2" class="form-label"> Ujuran Jas Almamater : <span
												class="danger">*</span> </label>
										<input name="nama_depan" type="text" class="form-control required" /> -->
										<label for="wlocation2" class="form-label"> Ukuran Jas Almamater : <span
												class="danger">*</span> </label>
										<select name="size_almet" class="form-select required">
											<option value="">Pilih Ukuran</option>
											<option value="S">S</option>
											<option value="M">M<Main></Main></option>
											<option value="L">L</option>
											<option value="XL">XL</option>
											<option value="XXL">XXL</option>
										</select>
									</div>
								</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Alamat Sesuai KTP : <span
												class="danger">*</span> </label>
										<input name="alamat" type="text" class="form-control required" />

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Alamat Tinggal di Jember (Kos/Tempat Saudara) : <span
												class="danger">*</span> </label>
										<input name="alamat_jember" type="text" class="form-control required" />

									</div>
								</div>
							</div>
						</section>
						<!-- Step 2 -->
						<h6>Data Sekolah</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="jobTitle3" class="form-label">Asal Sekolah :</label>
										<input name="asal_sekolah" type="text" class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3" class="form-label">Tahun Lulus :</label>
										<input name="tahun_lulus" type="month" class="form-control required" />
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="jobTitle3" class="form-label">Provinsi :</label>
										<select id="provinsi" name="provinsi" class=" form-select required" required="">
											<option value="">Pilih Provinsi</option>
											<?php
                                                                            foreach ($provinsi as $row) {
                                                                                echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                                                            }
                                                                ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3" class="form-label">Kabupaten / Kota :</label>
										<select id="kabupaten" name="kabupaten" class="select form-select required">

											<?php ?>
										</select>
									</div>
								</div>
							</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jobTitle3" class="form-label">NPSN :</label>
									<input name="npsn" type="number" class="form-control required" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="webUrl3" class="form-label">Alamat Sekolah :</label>
									<input name="alamat_sekolah" type="text" class="form-control required" />

								</div>
							</div>
						</div>
							<!-- </div> -->
						</section>
						<!-- Step 3 -->
						<h6>Data Orang Tua</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wint1" class="form-label">Nama Ibu Kandung :</label>
										<input type="text" name="nama_ortu" class="form-control required" />
									</div>
									<div class="form-group">
										<label for="wintType1" class="form-label">Nomor Handphone :</label>
										<input name="nohp_ortu" type="number" class="form-control required" />

									</div>
									<div class="form-group">
										<label for="wLocation1" class="form-label">Agama :</label>
										<select name="agama_ortu" class="form-select required">
											<option value="">Pilih Agama</option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>

										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wjobTitle4" class="form-label">Pekerjaan :</label>
										<select name="pekerjaan_ortu" class="form-select required">
											<option value="">Pilih Pekerjaan</option>
											<option value="pns">Pegawai Negeri</option>
											<option value="tnipolri">TNI/POLRI</option>
											<option value="wiraswasta">Wiraswasta</option>
											<option value="lainnya">lainnya</option>

										</select>
									</div>
									<div class="form-group">
										<label class="form-label">Pendidikan Terakhir :</label>
										<select name="pendidikan_ortu" class="form-select required">
											<option value="">Pilih Pendidikan</option>

											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA/SMK">SMA/SMK</option>
											<option value="DIPLOMA">DIPLOMA</option>
											<option value="SARJANA">SARJANA</option>
											<option value="LAINNYA">LAINNYA</option>

										</select>
									</div>

									<div class="form-group">
										<label class="form-label">Penghasilan :</label>
										<select name="penghasilan_ortu" class="form-select required">
											<option value="">Pilih Penghasilan</option>
											<option value="<1000000"> < 1000000 </option> 
											<option value="1000000-2500000">1000000-2500000</option>											</option>
											<option value="250000-5000000">2500000-5000000</option>
											<option value=">5000000"> > 5000000 </option>


										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group ">
										<label class="form-label">Alamat</label>

										<input name="alamat_ortu" type="text" class="form-control required" />

									</div>
								</div>

							</div>
						</section>
						<!-- Step 4 -->
						<h6>Konfirmasi Data Pendaftaran</h6>
						<section>
							<!-- <div class="row"> -->
								<div class="col-lg-12">
									<div class="box">
										<div class="box-body ribbon-box">
											<div class="ribbon ribbon-dark">Pastikan data yang anda masukkan benar</div>
											<p class="mb-0">Pastikan nama, nomor handphone , dan Jurusan yang anda pilih
												sudah benar</p>
											<p></p>
										</div> <!-- end box-body-->
									</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-label">Jalur Pendaftaran :</label>
											<select id="jalur_pendaftaran" onChange="showHide()" name="jalur_pendaftaran" class="form-select required">
												<option value="">Pilih Jalur Pendaftaran</option>
												<option value="KIP KULIAH">KIP KULIAH</option> 
												<option value="MANDIRI">MANDIRI</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="form-label">Sumber Informasi Pendaftaran</label>

											<input name="informasi" type="text" class="form-control required" />

										</div>
									</div>
								</div>
							
								<div class="col-md-12" id="kipk" style="visibility:hidden">
									<div class="form-group">
										<label class="form-label">No. KIP-K</label>
										<!-- <br><label class="form-label">*Wajib diisi apabila memilih jalur pendaftaran KIP KULIAH</label>
										<br><label class="form-label">*Isi 0 apabila memilih jalur pendaftaran MANDIRI</label> -->
										<input name="kipk" type="number" class="form-control"/>
									</div>
								</div>

									<div class="form-group">
										<label class="form-label">Apakah data anda sudah sesuai, dan benar ? :</label>
										<select name="konfirmasi" class="form-select required">
											<option value="">Pilih Konfirmasi</option>
											<option value="<1000000"> Ya, Sudah Benar</option>



										</select>
									</div>
								</div>

							<!-- </div> -->
						</section>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</section>
		<!-- /.content -->
	</div>
</div>

<?php $this->load->view('user/partials/footer'); ?>


