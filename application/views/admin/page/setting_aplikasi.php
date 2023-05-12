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
			<div class="col-md-6 col-12">
				<h4 class="card-title">Kelola Aplikasi</h4>

				<form id="inputform" enctype="multipart/form-data">
					<input type="hidden" id="kodedit" name="kodedit">

					<div class="form-group">
						<label for="exampleInputUsername1">Deskripsi</label>

						<textarea class="form-control summernote" id="desc" name="desc" placeholder="Deskripsi Singkat"
							data-msg="Masukkan Deskripsi" required>
                            </textarea>

					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Alamat</label>
						<input type="text" class="form-control " id="alamat" name="alamat" placeholder="Alamat"
							required>
						</input>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Logo</label>
						<input type="file" accept="image/*" class="form-control" id="logo" name="logo"
							placeholder="Logo">
					</div>
					<div class="form-group">
						<img class="img-fluid h-50 w-50 " alt="" id="imglogo">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Favicon</label>
						<input type="file" accept="image/*" class="form-control" id="favicon" name="favicon"
							placeholder="image">
					</div>
					<div class="form-group">
						<img class="img-fluid h-50 w-50 " alt="" id="imgfavicon">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Header Laporan</label>
						<input type="file" accept="image/*" class="form-control" id="h_laporan" name="h_laporan"
							placeholder="image">
					</div>
					<div class="form-group">
						<img class="img-fluid h-50 w-50" alt="" id="imglaporan">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Video Profile</label>
						<p class="text-primary">*Salin Url dari youtube atau website lainnya</p>
						<textarea rows="8" class="form-control" id="video" name="video"></textarea>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Lokasi</label>
						<p class="text-primary">*Salin Url iframe google maps</p>
						<textarea rows="8" class="form-control" id="lokasi" name="lokasi"></textarea>
					</div>
					
					<button id="buttonku" name="buttonku" class="btn btn-md  btn-primary mr-2"><i
							class="fa fa-save menu-icon"> </i> Simpan</button>

				</form>
			</div>
			<!-- /.col -->


			<div class="col-md-6 col-12">
				<h4 class="card-title">Kelola Aplikasi</h4>

				<form id="inputform2">
					<input type="hidden" id="kodedit2" name="kodedit2">

					<div class="form-group">
						<label for="title">Nama Aplikasi</label>
						<input type="text" autocomplete="off" name="app_name" id="app_name" class="form-control"
							required>
					</div>
					<div class="form-group">
						<label for="slogan">Nama Institusi</label>
						<input type="text" autocomplete="off" name="slogan" id="slogan" class="form-control" required ">
                            <small class=" text-muted">Akan muncul pada title home</small>
					</div>
					<div class="form-group">
						<label for="smtp_host">SMTP Host</label>
						<input type="text" autocomplete="off" name="host_mail" id="host_mail" class="form-control"
							required ">
                        </div>
                        <div class=" form-group">
						<label for="smtp_port">SMTP Port</label>
						<input type="text" autocomplete="off" name="port_mail" id="port_mail" class="form-control"
							required ">
                        </div>
                        <div class=" form-group">
						<label for="crypto_smtp">Crypto Mail</label>
						<input type="text" autocomplete="off" name="crypto_smtp" id="crypto_smtp" class="form-control" ">
                        </div>
                        <div class=" form-group">
						<label for="account_gmail">Akun Mail</label>
						<input type="email" autocomplete="off" autocomplete="FALSE" name="account_gmail"
							id="account_gmail" class="form-control" required ">
                        </div>
                        <div class=" form-group">
						<label for="pass_gmail">Password Mail</label>
						<input type="password" autocomplete="off" name="pass_gmail" id="pass_gmail" class="form-control"
							required">
					</div>

					<div class="form-group">
						<label for="whatsappv2">WhatsApp</label>
						<input type="number" autocomplete="off" name="whatsapp" id="whatsapp" class="form-control"
							required ">
                            <small class=" text-muted">Format angka 628xx. Contoh: 6281234567890</small>
					</div>

					<div class="form-group">
						<button id=" buttonku" name="buttonku" class="btn btn-md  btn-primary mr-2"><i class="fa fa-save menu-icon">
						</i> Simpan</button>
					</div>

				</form>
			</div>
			<!-- /.col -->

		</div>

		<!-- /.row -->
	</div>
	<!-- /.box-body -->
</div>

<script src="<?=base_url()?>assets/admin/jsku/setapp.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
