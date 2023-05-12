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
				<div class="table-responsive px-4 pb-3 mt-5">
					<table id="datajurusan" class="table  table-hover table-bordered margin-top-10 table-responsive">
						<thead>
							<tr>
								<th>
									Kode Jurusan
								</th>
								<th>
									Nama Jurusan
								</th>
								<th>
									Biaya Pendaftaran
								</th>
								<th>
									Foto
								</th>
								<th>
									Action
								</th>

							</tr>
						</thead>
						<tbody>


						</tbody>
					</table>


				</div>
			</div>
		</div>

		

		<!-- /.row -->
	</div>
	<!-- /.box-body -->
</div>

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Form Kelola <?= $subjudul ?></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="row ">
			<div class="col-md-12 col-12 p-10">
				<form id="inputform" enctype="multipart/form-data" method="post">
					<input type="hidden" id="kodedit" name="kodedit">
					<div class="form-group">
						<label for="exampleInputUsername1">Kode</label>
						<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Prodi">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Prodi</label>
						<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama Prodi">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Link Instagram</label>
						<input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Deskripsi</label>

						<textarea class="form-control summernote" id="desc" name="desc" placeholder="Deskripsi Singkat"
							data-msg="Masukkan Deskripsi" required>
                            </textarea>

					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Biaya Pendaftaran</label>
						<input type="number" class="form-control" id="biaya" name="biaya"
							placeholder="Biaya Pendaftaran">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Thumbnail Prodi</label>
						<input type="file" accept="image/*" class="form-control" id="jurusan_thumbnail"
							name="jurusan_thumbnail" placeholder="Foto Jurusan">
					</div>
					<div class="form-group">
						<img class="img-fluid " alt="" id="fotojurusan">
					</div>
					<button id="buttonku" name="buttonku" type="submit" class="btn btn-sm btn-primary mr-2"><i
							class="fa fa-save"> </i> Simpan</button> <a id="clear" name="clear"
						class="btn btn-sm btn-info text-light mr-2"><i class="fa fa-repeat"></i> Clear</a>

				</form>
			</div>
			<!-- /.col -->



			<!-- /.col -->

		</div>

		<!-- /.row -->
	</div>
	<!-- /.box-body -->
</div>

<script src="<?=base_url()?>assets/admin/jsku/prodi.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
