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
            <h4 class="card-title"> <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add">
          <i class="fa fa-plus-circle"></i> Tambah Berita
        </button></h4>
				<div class="table-responsive px-4 pb-3 mt-5">
					<table id="datakegiatan" class="table  table-hover table-bordered margin-top-10 table-responsive">
						<thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Berita</th>
                                <th>Judul Berita</th>
                                <th>Author</th>
                                <th>Action</th>

                            </tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-add" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
	<div style="width:100%;max-width:1400px;" class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Berita</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form enctype="multipart/form-data" id="inputform">
					<div class="card card-default">

						<!-- /.card-header -->
						<div class="card-body">

							<div class="row">
								<div class="col-md-8 order-last order-md-first">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Konten Berita</h3>

											
											<!-- /.card-tools -->
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="post_title">Judul Berita</label>
												<input id="post_title" name="post_title" class="form-control " type="text" placeholder="Berita Judul..." value="" required>

											</div>
											<div class="form-group">
												<label>Berita Isi</label>
												<textarea class="form-control " name="post_body" id="post_body"></textarea>
											</div>

										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Berita Info</h3>

											
											<!-- /.card-tools -->
										</div>
										<div class="card-body">

											
											<div class="form-group">
												<label class="form-label" for="post_thumbnail">Berita Thumbnail</label>
												<div class="custom-file">
													<input accept="image/*" type="file" id="post_thumbnail" name="post_thumbnail">

												</div>
											</div>

										</div>
									</div>
									<div class="row">
										<div class="card-body">

											<button type="submit" class="btn btn-primary btn-sm ms-5" id="btn-simpan "><i class="fa fa-save"></i> Simpan</button>
										</div>

									</div>
								</div>
							</div>

						</div>
						
					</div>


			</div>

			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div style="width:100%;max-width:1400px;" class="modal-dialog modal-lg ">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Berita</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- formnya disini -->
				<form id="editform" enctype="multipart/form-data">
					<div class="card card-default">
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-8 order-last order-md-first">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Konten Berita</h3>

											<!-- /.card-tools -->
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="post_title">Judul Berita</label>
												<input id="epost_title" name="epost_title" class="form-control" type="text" placeholder="Berita Judul..." value="" required>
												<input type="hidden" name="kodedit" id="kodedit" value="">

											</div>
											<div class="form-group">
												<label>Berita Isi</label>
												<textarea class="form-control" name="epost_body" id="epost_body"></textarea>
											</div>

										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card card-outline card-primary shadow-sm">
										<div class="card-header">
											<h3 class="card-title">Berita Info</h3>

											
											<!-- /.card-tools -->
										</div>
										<div class="card-body">

											
											<div class="form-group">
												<label class="form-label" for="post_thumbnail">Berita Foto</label>
												<div class="custom-file">
													<input accept="image/*" type="file" id="epost_thumbnail" name="epost_thumbnail">

												</div>
											</div>
											<img src="" alt="Foto Berita" id="foto" class="img-fluid w-100">

										</div>
									</div>
									<div class="row">
										<div class="card-body">

											<button type="submit" class="btn btn-primary btn-sm ms-5" id="btn-simpan "><i class="fa fa-save"></i> Simpan</button>
										</div>

									</div>
								</div>
							</div>

						</div>
						<!-- /.card-body -->
						
					</div>


			</div>

			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Hapus Kegiatan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-window-close"></i></button>
			</div>
			<form>
				<div class="modal-body">
					<input type="hidden" name="kode" id="textkode" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda yakin Menghapus Kegiatan ini?</p>
					</div>

				</div>
				<div class="modal-footer">

					<button class="btn_hapus btn btn-danger" id="btn_hapus"><i class="fas fa-trash"></i> Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?=base_url()?>assets/admin/jsku/berita.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
