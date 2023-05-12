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
			<div class="col-md-4">
				<form id="inputform" enctype="multipart/form-data" method="post">
					<input type="hidden" id="kodedit" name="kodedit">
                    <div class="form-group">
						<label for="exampleInputUsername1">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
					</div>
					<div class="form-group">
						<label for="exampleInputUsername1">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Password</label>
						<input type="password" class="form-control" id="password" name="password"
							placeholder=" password">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Level</label>
						<select id="level" name="level" class="form-control">
							<option value="">Pilih Level</option>
							<option value="keuangan">Keuangan</option>
							<option value="pimpinan">Pimpinan</option>


						</select>
					</div>




					<button id="buttonku" name="buttonku" type="submit" class="btn btn-sm btn-primary mr-2"><i
							class="fa fa-save"> </i> Simpan</button><a id="clear" name="clear"
						class="btn btn-sm btn-info text-light mr-2"><i class="fa fa-repeat"></i> Clear</a>

				</form>
			</div>
			<div class="col-md-8 col-12">
				<div class="table-responsive px-4 pb-3 mt-5">
					<table id="datauser" class="table  table-hover table-bordered margin-top-10 table-responsive">
						<thead>
							<tr>
								<th>
									No
								</th>
                                <th>
									Nama
								</th>
								<th>
									Username
								</th>
								<th>
									Level
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


<script src="<?=base_url()?>assets/admin/jsku/usrmanajemen.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
