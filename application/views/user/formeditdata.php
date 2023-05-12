<?php $this->load->view('user/partials/header'); ?>

<div class="content-wrapper formeditdata">
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
								<li class="breadcrumb-item" aria-current="page">Form Edit Data Pendaftaran</li>
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
										<h2 class="mb-10 text-secondary">Form Edit Data Pendaftaran</h2>
									</div>
								</div>
								<a data-pjax="" href="<?= base_url('data-pendaftaran') ?>"
									class="btn btn-info btn-md mb-5  text-white"> <i class="fa  fa-backward"></i>
									Kembali ke Data Pendaftaran</a>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Validation wizard -->
			<div class="box">

				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form id="editform" class="validation-wizard wizard-circle">
						<!-- Step 1 -->
						<h6>Data Pribadi</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wfirstName2" class="form-label"> Nama Depan : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->nama_depan ?>" name="nama_depan" type="text"
											class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlastName2" class="form-label"> Nama Belakang : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->nama_belakang ?>" name="nama_belakang"
											type="text" class="form-control" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> NIK : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->nik ?>" name="nik" type="number" class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> NISN : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->nisn ?>" name="nisn" type="number" class="form-control required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wphoneNumber2" class="form-label">Tanggal Lahir :</label>
										<input value="<?= $data_daftar->tanggal_lahir ?>" type="date"
											name="tanggal_lahir" class="form-control required">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Tempat Lahir : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->tempat_lahir ?>" name="tempat_lahir" type="text"
											class="form-control required" />
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="wdate2" class="form-label">Nomor Handphone :</label>
										<input value="<?= $data_daftar->nohp ?>" name="nohp" type="number"
											class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Golongan Darah : <span
												class="danger">*</span> </label>
										<select name="golongan_darah" class="form-select required">
											<option value="">Pilih golongan darah</option>
											<option value="A" <?php if( $data_daftar->gdarah == "A" ){
                                        echo 'selected';
                                      } ?>>A</option>
											<option value="B" <?php if( $data_daftar->gdarah == "B" ){
                                        echo 'selected';
                                      } ?>>B</option>
											<option value="AB" <?php if( $data_daftar->gdarah == "AB" ){
                                        echo 'selected';
                                      } ?>>AB</option>
											<option value="0" <?php if( $data_daftar->gdarah == "0" ){
                                        echo 'selected';
                                      } ?>>O</option>
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
											<option value="laki-laki" <?php if( $data_daftar->jk == "laki-laki" ){
                                        echo 'selected';
                                      } ?>>Laki - laki</option>
											<option value="perempuan" <?php if( $data_daftar->jk == "perempuan" ){
                                        echo 'selected';
                                      } ?>>Perempuan</option>

										</select>

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Warga Negara : <span
												class="danger">*</span> </label>
										<select name="wn" class="form-select required">
											<option value="">Pilih Warga negara</option>
											<option value="Indonesia" <?php if( $data_daftar->wn == "Indonesia" ){
                                        echo 'selected';
                                      } ?>>Indonesia</option>
											<option value="WNA" <?php if( $data_daftar->wn == "WNA" ){
                                        echo 'selected';
                                      } ?>>WNA</option>
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
											<option value="tidak bekerja" <?php if( $data_daftar->pekerjaan == "tidak bekerja" ){
                                        echo 'selected';
                                      } ?>>Tidak bekerja</option>
											<option value="bekerja" <?php if( $data_daftar->pekerjaan == "bekerja" ){
                                        echo 'selected';
                                      } ?>>Bekerja</option>

										</select>

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Agama : <span
												class="danger">*</span> </label>
										<select name="agama" class="form-select required">
											<option value="">Pilih Agama</option>
											<option value="Islam" <?php if( $data_daftar->agama == "Islam" ){
                                        echo 'selected';
                                      } ?>>Islam</option>
																<option value="Kristen" <?php if( $data_daftar->agama == "Kristen" ){
                                        echo 'selected';
                                      } ?>>Kristen</option>
																<option value="Hindu" <?php if( $data_daftar->agama == "Hindu" ){
                                        echo 'selected';
                                      } ?>>Hindu</option>
																<option value="Budha" <?php if( $data_daftar->agama == "Budha" ){
                                        echo 'selected';
                                      } ?>>Budha</option>

										</select>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Anak Ke : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->anak ?>" name="anak_ke" type="number" class="form-control required">

									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Jumlah Saudara : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->jsaudara ?>" name="jumlah_saudara" type="number" class="form-control required" name=""
											id="">
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-12">
									<div class="form-group">
										<!-- <label for="wfirstName2" class="form-label"> Ujuran Jas Almamater : <span
												class="danger">*</span> </label>
										<input name="nama_depan" type="text" class="form-control required" /> -->
										<label for="wlocation2" class="form-label"> Ukuran Jas Almamater : <span
												class="danger">*</span> </label>
										<select name="size_almet" class="form-select required">
											<option value="">Pilih Ukuran</option>
											<option value="S" <?php if($data_daftar->size_almet == "S") { echo 'selected'; } ?> > S </option>
											<option value="M" <?php if($data_daftar->size_almet == "M") { echo 'selected'; } ?> > M </option>
											<option value="L" <?php if($data_daftar->size_almet == "L") { echo 'selected'; } ?> > L </option>
											<option value="XL" <?php if($data_daftar->size_almet == "XL") { echo 'selected'; } ?> > XL </option>
											<option value="XXL" <?php if($data_daftar->size_almet == "XXL") { echo 'selected'; } ?> > XXL </option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Alamat Sesuai KTP : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->alamat ?>" name="alamat" type="text" class="form-control required" />

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wlocation2" class="form-label"> Alamat Tinggal di Jember (Kos/Tempat Saudara) : <span
												class="danger">*</span> </label>
										<input value="<?= $data_daftar->alamat_jember ?>" name="alamat_jember" type="text" class="form-control required" />
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
										<input value="<?= $data_daftar->asalsekolah ?>" name="asal_sekolah" type="text" class="form-control required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3" class="form-label">Tahun Lulus :</label>
										<input  value="<?= $data_daftar->tahunlulus ?>" name="tahun_lulus" type="year" class="form-control required" />
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="jobTitle3" class="form-label">Provinsi :</label>
										<select id="provinsi" name="provinsi" class=" form-select required" required="">
											<option class="text-capitalize" value="">Pilih Provinsi</option>
											<?php foreach ($provinsi as $row) {if($data_daftar->prov == $row->id){
                                             $selected= 'selected';
                                                }
                                                else{
                                                    $selected= '';
                                                }
                                                echo '<option  class="text-capitalize" value="' . $row->id . '"'. $selected .' >' . $row->name . '</option>';}?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3" class="form-label">Kabupaten / Kota :</label>
                                        <input type="hidden" name="idkab" id="idkab" value="<?= $data_daftar->kota ?>">
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
										<input value="<?= $data_daftar->npsn ?>" name="npsn" type="number" class="form-control required" />
									</div>
								</div>	
								<div class="col-md-6">
									<div class="form-group">
										<label for="webUrl3" class="form-label">Alamat Sekolah :</label>
										<input value="<?= $data_daftar->alamatsekolah ?>" name="alamat_sekolah" type="text" class="form-control required" />

									</div>
								</div>
							</div>
						</section>
						<!-- Step 3 -->
						<h6>Data Orang Tua</h6>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="wint1" class="form-label">Nama Ibu Kandung :</label>
										<input value="<?= $data_daftar->nama_ortu ?>" type="text" name="nama_ortu" class="form-control required" />
									</div>
									<div class="form-group">
										<label for="wintType1" class="form-label">Nomor Handphone :</label>
										<input value="<?= $data_daftar->nohp_ortu ?>" name="nohp_ortu" type="number" class="form-control required" />

									</div>
									<div class="form-group">
										<label for="wLocation1" class="form-label">Agama :</label>
										<select name="agama_ortu" class="form-select required">
											
											<option value="">Pilih Agama</option>
																<option value="Islam" <?php if( $data_daftar->agama_ortu == "Islam" ){
                                        echo 'selected';
                                      } ?>>Islam</option>
																<option value="Kristen" <?php if( $data_daftar->agama_ortu == "Kristen" ){
                                        echo 'selected';
                                      } ?>>Kristen</option>
																<option value="Hindu" <?php if( $data_daftar->agama_ortu == "Hindu" ){
                                        echo 'selected';
                                      } ?>>Hindu</option>
																<option value="Budha" <?php if( $data_daftar->agama_ortu == "Budha" ){
                                        echo 'selected';
                                      } ?>>Budha</option>

										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="wjobTitle4" class="form-label">Pekerjaan :</label>
										<select name="pekerjaan_ortu" class="form-select required">
											<option value="">Pilih Pekerjaan</option>
											<option value="pns" <?php if( $data_daftar->pekerjaan_ortu == "pns" ){
                                        echo 'selected';
                                      } ?>>Pegawai Negeri</option>
																<option value="tnipolri" <?php if( $data_daftar->pekerjaan_ortu == "tnipolri" ){
                                        echo 'selected';
                                      } ?>>TNI/POLRI</option>
																<option value="wiraswasta" <?php if( $data_daftar->pekerjaan_ortu == "wiraswasta" ){
                                        echo 'selected';
                                      } ?>>Wiraswasta</option>
																<option value="lainnya" <?php if( $data_daftar->pekerjaan_ortu == "lainnya" ){
                                        echo 'selected';
                                      } ?>>lainnya</option>

										</select>
									</div>
									<div class="form-group">
										<label class="form-label">Pendidikan Terakhir :</label>
										<select name="pendidikan_ortu" class="form-select required">
											<option value="">Pilih Pendidikan</option>

											<option value="SD" <?php if( $data_daftar->pendidikan_ortu == "SD" ){
                                        echo 'selected';
                                      } ?>>SD</option>
																<option value="SMP" <?php if( $data_daftar->pendidikan_ortu == "SMP" ){
                                        echo 'selected';
                                      } ?>>SMP</option>
																<option value="SMA/SMK" <?php if( $data_daftar->pendidikan_ortu == "SMA/SMK" ){
                                        echo 'selected';
                                      } ?>>SMA/SMK</option>
																<option value="DIPLOMA" <?php if( $data_daftar->pendidikan_ortu == "DIPLOMA" ){
                                        echo 'selected';
                                      } ?>>DIPLOMA</option>
																<option value="SARJANA" <?php if( $data_daftar->pendidikan_ortu == "SARJANA" ){
                                        echo 'selected';
                                      } ?>>SARJANA</option>
																<option value="LAINNYA" <?php if( $data_daftar->pendidikan_ortu == "LAINNYA" ){
                                        echo 'selected';
                                      } ?>>LAINNYA</option>

										</select>
									</div>

									<div class="form-group">
										<label class="form-label">Penghasilan :</label>
										<select name="penghasilan_ortu" class="form-select required">
											<option value="">Pilih Penghasilan</option>
											<option value="<1000000" <?php if( $data_daftar->penghasilan_ortu == "<1000000" ){ echo 'selected'; } ?> > < 1000000 </option> 
                                                                    <option value="1000000-2500000" <?php if( $data_daftar->penghasilan_ortu == "1000000-2500000" ){
                                        echo 'selected';
                                      } ?>>
																		1000000-2500000
																</option>
																<option value="250000-5000000" <?php if( $data_daftar->penghasilan_ortu == "250000-5000000" ){
                                        echo 'selected';
                                      } ?>>250000-5000000</option>
																<option value=">5000000" <?php if( $data_daftar->penghasilan_ortu == ">5000000" ){
                                        echo 'selected';
                                      } ?>> > 5000000 </option>


										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group ">
										<label class="form-label">Alamat</label>

										<input value="<?= $data_daftar->alamat_ortu ?>" name="alamat_ortu" type="text" class="form-control required" />

									</div>
								</div>

							</div>
						</section>
						<!-- Step 4 -->
						<h6>Konfirmasi Data Pendaftaran</h6>
						<section>
							<div class="row">
								<div class="col-lg-12">
									<div class="box">
										<div class="box-body ribbon-box">
											<div class="ribbon ribbon-dark">Pastikan data yang anda masukkan benar</div>
											<p class="mb-0">Pastikan nama, nomor handphone , dan Jurusan yang anda pilih
												sudah benar</p>
											<p></p>
										</div> <!-- end box-body-->
									</div>
								</div>
							</div>
							<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-label">Jalur Pendaftaran :</label>
											<select id="jalur_pendaftaran" onChange="showHide()" name="jalur_pendaftaran" class="form-select required">
												<option value="">Pilih Jalur Pendaftaran</option>
												
												<option value="KIP KULIAH" <?php if( $data_daftar->jalur_pendaftaran == "KIP KULIAH" ){
                                        echo 'selected';
                                      } ?> > KIP KULIAH</option> 
												<option value="MANDIRI" <?php if( $data_daftar->jalur_pendaftaran == "MANDIRI" ){
                                        echo 'selected';
                                      } ?> > MANDIRI</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label class="form-label">Sumber Informasi Pendaftaran</label>

											<input value="<?= $data_daftar->informasi ?>" name="informasi" type="text" class="form-control required" />

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="kipk">
										<div class="form-group">
											<label class="form-label">No. KIP-K</label>
											<!-- <br><label class="form-label">*Wajib diisi apabila memilih jalur pendaftaran KIP KULIAH</label>
											<br><label class="form-label">*Isi 0 apabila memilih jalur pendaftaran MANDIRI</label> -->
											<input value="<?= $data_daftar->kipk ?>" name="kipk" type="number" class="form-control"/>
										</div>
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

							</div>
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
