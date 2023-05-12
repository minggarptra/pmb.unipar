<?php $this->load->view('admin/partials/header2'); ?>

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><?= $subjudul ?></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<div class="col-md-12 col-12">


				<!-- Validation wizard -->
				<div class="box">

					<div class="box-body wizard-content">
						<form id="formmhs" >
							<!-- Step 1 -->
							<h2>Data Akun</h2>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="wfirstName2" class="form-label"> Email : <span
													class="danger">*</span> </label>
											<input name="email" type="email" class="form-control " />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="wlastName2" class="form-label"> Pilih Jurusan : <span
													class="danger">*</span> </label>
											<select class="form-control required" name="jurusan" id="jurusan" onchange="displayProdi(this.value)">
												<option value="">Pilih Jurusan</option>
												<?php foreach ($jurusan->result() as $value) {
							 ?>
												<option value="<?= $value->kode ?>"><?= $value->jurusan ?></option>
												<?php }
							
							?>

											</select>
										</div>
									</div>
								</div>



							</section>
							<hr>
							<h2>Data Pribadi</h2>
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
											<input name="nama_belakang" type="text" class="form-control required" >
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
											<label for="wphoneNumber2" class="form-label">Tanggal Lahir
												:</label>
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
											<select name="golongan_darah" class="form-control required">
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
											<select name="jenis_kelamin" class="form-control required">
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
											<select name="wn" class="form-control required">
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
											<select name="pekerjaan" class="form-control required">
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
											<select name="agama" class="form-control required">
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
											<input name="jumlah_saudara" type="number" class="form-control required"
												name="" id="">
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
							<hr>
							<!-- Step 2 -->
							<h2>Data Sekolah</h2>
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
											<select id="provinsi" name="provinsi" class=" form-control required"
												>
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
											<select id="kabupaten" name="kabupaten"
												class="select form-control required">

												<?php ?>
											</select>
										</div>
									</div>
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
							</section>
							<hr>
							<!-- Step 3 -->
							<h2>Data Orang Tua</h2>
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
											<select name="agama_ortu" class="form-control required">
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
											<select name="pekerjaan_ortu" class="form-control required">
												<option value="">Pilih Pekerjaan</option>
												<option value="pns">Pegawai Negeri</option>
												<option value="tnipolri">TNI/POLRI</option>
												<option value="wiraswasta">Wiraswasta</option>
												<option value="lainnya">lainnya</option>

											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Pendidikan Terakhir :</label>
											<select name="pendidikan_ortu" class="form-control required">
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
											<select name="penghasilan_ortu" class="form-control required">
												<option value="">Pilih Penghasilan</option>
												<option value="<1000000">
													< 1000000 </option> <option value="1000000-2500000">
														1000000-2500000
												</option>
												</option>
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
							<hr>
							<!-- Step 4 -->
							<h2>Konfirmasi Data Pendaftaran </h2>
							<section>
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
							<div class="row">
								<div class="col-md-12" id="kipk" style="visibility:hidden">
									<div class="form-group">
										<label class="form-label">No. KIP-K</label>
										<!-- <br><label class="form-label">*Wajib diisi apabila memilih jalur pendaftaran KIP KULIAH</label>
										<br><label class="form-label">*Isi 0 apabila memilih jalur pendaftaran MANDIRI</label> -->
										<input name="kipk" type="number" class="form-control"/>
									</div>
								</div>
							</div>
							</section>
							<!-- Step 5  -->
							<h2>Berkas</h2>
							<section>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="formFile" class="form-label">Bukti Pembayaran</label>
											<input class="form-control" accept="image/*" type="file" id="buktibayar"
												name="buktibayar" placeholder="gambar">
										</div>
									</div>

                                    <div class="col-lg-12">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan KTP</label>
											<input class="form-control" type="file" id="ktp"
												name="ktp" placeholder="ktp">
										</div>
									</div>

                                    <div class="col-lg-12">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan KK</label>
											<input class="form-control" type="file" id="kk"
												name="kk" placeholder="kk">
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label for="formFile" class="form-label">Upload Scan Akte Kelahiran</label>
											<input class="form-control" type="file" id="akte_kelahiran"
												name="akte_kelahiran" placeholder="akte_kelahiran">
										</div>
									</div>

                                    <div class="col-lg-12">
										<div class="form-group">
											<label for="formFile" class="form-label">Upload Scan Ijazah SMA / SMK / Sederajat</label>
											<input class="form-control" type="file" id="ijazah"
												name="ijazah" placeholder="ijazah">
										</div>
									</div>

									<div class="col-lg-12" id="ijazah_s1Div">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Ijazah S1</label>
											<input class="form-control" type="file" id="ijazah_s1"
												name="ijazah_s1" placeholder="ijazah_s1">
										</div>
									</div>

									<div class="col-lg-12" id="transkrip_s1Div">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Transkrip Nilai S1</label>
											<input class="form-control" type="file"
												name="transkrip_s1" placeholder="transkrip_s1" id="transkrip_s1">
										</div>
									</div>

									<div class="col-lg-12" id="unDiv">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Nilai UN</label>
											<input class="form-control" type="file" id="un"
												name="un" placeholder="un">
										</div>
									</div>
									<div class="col-lg-12" id="ijazah_dDiv">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Ijazah D1 / D2 / D3</label>
											<input class="form-control" type="file" id="ijazah_d"
												name="ijazah_d" placeholder="ijazah_d">
										</div>
									</div>
									<div class="col-lg-12" id="transkrip_dDiv">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Transkrip Nilai / KHS D1 / D2 / D3</label>
											<input class="form-control" type="file" id="transkrip_d"
												name="transkrip_d" placeholder="transkrip_d">
										</div>
									</div>
									<div class="col-lg-12" id="sk_pindahDiv">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Keterangan Pindah dari Perguruan Tinggi</label>
											<input class="form-control" type="file" id="sk_pindah"
												name="sk_pindah" placeholder="sk_pindah">
										</div>
									</div>
									<div class="col-lg-12" id="persyaratan_lainDiv">
										<div class="form-group">
											<label for="formFile" class="form-label">Scan Persyaratan Lain (Program Beasiswa)</label>
											<input class="form-control" type="file" id="persyaratan_lain"
												name="persyaratan_lain" placeholder="persyaratan_lain">
										</div>
									</div>
								</div>
							</section>
                            <button type="submit" class="btn btn-primary">
									<i class="fa fa-save"></i> Simpan
								</button>
						</form>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

				</section>
			</div>
		</div>
	</div>
</div>



<script>
	$(document).ready(function () {

		$('#provinsi').change(function () {
			var provinsi_id = $('#provinsi').val(); //ambil value id dari provinsi
			if (provinsi_id != '') {
				$.ajax({
					url: '<?= base_url() ?>mhs/get_kabupaten',
					method: 'POST',
					data: {
						provinsi_id: provinsi_id
					},
					success: function (data) {
						$('#kabupaten').html(data)
					}
				});
			}
		});



        $.validator.setDefaults({
    submitHandler: function (form) {
        
        var formData = new FormData($(form)[0]);
        $.ajax({
           
            type: "POST",
            url: "<?= base_url() ?>mhs/simpan",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {
                if (response == "error") {
                    toastr.warning('Data gagal disimpan');
                    
                }  if (response === "emailregist") {
                    Swal({
                  "title": "Gagal",
                  "text": "Email sudah terdaftar",
                  "type": "error"
                });

                   
                }

                else if (response === "hpregist") {
                    Swal({
                  "title": "Gagal",
                  "text": "Nomor HP sudah terdaftar",
                  "type": "error"
                });

                    

                }
                
                else if (response == "success") {


                    Swal.fire({
                        title: "Data Berhasil disimpan",
                        imageUrl: "<?= base_url('assets/loginuser/succesrest.jpg') ?>",
                        imageWidth: 550,
                        imageHeight: 225,
                        imageAlt: "Eagle Image",
                        reverseButtons: true,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke',
                        allowOutsideClick: false
                    }).then((result) => {
                        if(result.value){
                            location.href="<?= base_url('admin') ?>";
                        }
                    });
                }

                console.log(response)
            },

            error: function (response) {
                Swal.fire({
                    type: 'error',
                    title: 'OOPS!!',
                    text: 'Server Error!'
                });
            }
        });
    }
});
$('#formmhs').validate({
    rules: {
        email: {
            required: true,
            email:true,
        },
        nohp: {
            required: true,
            minlength:10,
            maxlength:14
        },
        buktibayar: {
            required: true,

            accept: "image/*"
        },
        ktp: {
            required: true,

            accept: "application/pdf"
        },
        kk: {
            required: true,

            accept: "application/pdf"
        },
		akte_kelahiran: {
            required: true,

            accept: "application/pdf"
        },
        ijazah: {
            required: true,

            accept: "application/pdf"
        },
		un: {
            required: false,

            accept: "application/pdf"
        },
		ijazah_d: {
            required: false,

            accept: "application/pdf"
        },
		transkrip_d: {
            required: false,

            accept: "application/pdf"
        },
		sk_pindah: {
            required: false,

            accept: "application/pdf"
        },
		persyaratan_lain: {
            required: false,

            accept: "application/pdf"
        },
		ijazah_s1: {
            required: false,

            accept: "application/pdf"
        },
		transkrip_s1: {
            required: false,

            accept: "application/pdf"
        },

    },
    messages: {
        nama: {
            required: 'Input nama file',
        },
        bukti: {
            
            accept: "Hanya menerima inputan gambar"
        },
        ktp: {
            
            accept: "Hanya menerima inputan pdf"
        },
        kk: {
            accept: "Hanya menerima Pdf"
        },
		akte_kelahiran: {
            accept: "Hanya menerima Pdf"
        },
        ijazah: {
            accept: "Hanya menerima Pdf"
        },
		un: {
            accept: "Hanya menerima Pdf"
        },
		ijazah_d: {
            accept: "Hanya menerima Pdf"
        },
		transkrip_d: {
            accept: "Hanya menerima Pdf"
        },
		sk_pindah: {
            accept: "Hanya menerima Pdf"
        },
        persyaratan_lain: {
            accept: "Hanya menerima Pdf"
        },
		ijazah_s1: {
            accept: "Hanya menerima Pdf"
        },
		transkrip_s1: {
            accept: "Hanya menerima Pdf"
        },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});
	})

</script>
<script>
		function showHide() {
			let historyjalurDaftar = document.getElementById('jalur_pendaftaran')

			if(historyjalurDaftar.value == 'MANDIRI') {
				// document.getElementById('kipk').style.display = 'none'
				document.getElementById('kipk').style.visibility = 'hidden';
				document.getElementById('kipk').required = false;
			// }if(historyjalurDaftar.value == '') {
			// 	document.getElementById('kipk').style.display = 'none'
			}else {
				// document.getElementById('kipk').style.display = 'block';
				document.getElementById('kipk').style.visibility = 'visible';
				document.getElementById('kipk').required = true;
			}
			// var status = document.getElementById("jalur_pendaftaran");
			// if(status.value=="MANDIRI"){
			// 	document.getElementById("kipk") style.visibility="hidden";
			// }else{
			// 	document.getElementById("kipk") style.visibility="visible";
			// }
		}
		// function displayProdi(answer) {
		// 	document.getElementById('noQuestion').style.display = "none";
		// 	if (answer == '09') {    
		// 		document.getElementById(answer + 'Prodi').style.display = "block";
		// 	} else if (answer == "no") {  
		// 		document.getElementById('yesProdi').style.display = "none";
		// 	}

		// }
	</script>
	<script>
		$("#jurusan").change(function(){
			if($(this).val() == '09') {
				$('#ijazah_s1Div').show();
				$('#ijazah_s1').attr('required', '');
				$('#transkrip_s1Div').show();
				$('#transkrip_s1').attr('required', '');
				$('#unDiv').hide();
				$('#un').removeAttr('required');
				$('#ijazah_dDiv').hide();
				$('#transkrip_dDiv').hide();
				$('#sk_pindahDiv').hide();
				$('#persyaratan_lainDiv').hide();
			}else {
				$('#ijazah_s1Div').hide();
				$('#ijazah_s1').removeAttr('required');
				$('#transkrip_s1Div').hide();
				$('#transkrip_s1').removeAttr('required');
				$('#unDiv').show();
				$('#un').attr('required', '');
				$('#ijazah_dDiv').show();
				$('#transkrip_dDiv').show();
				$('#sk_pindahDiv').show();
				$('#persyaratan_lainDiv').show();
			}
		})
	</script>

<?php $this->load->view('admin/partials/footer2'); ?>
