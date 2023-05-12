<?php $this->load->view('admin/partials/header2'); ?>
<style>
	.outerDivFull {
		margin: 50px;
	}

	.switchToggle input[type=checkbox] {
		height: 0;
		width: 0;
		visibility: hidden;
		position: absolute;
	}

	.switchToggle label {
		cursor: pointer;
		text-indent: -9999px;
		width: 70px;
		max-width: 70px;
		height: 30px;
		background: #d1d1d1;
		display: block;
		border-radius: 100px;
		position: relative;
	}

	.switchToggle label:after {
		content: '';
		position: absolute;
		top: 2px;
		left: 2px;
		width: 26px;
		height: 26px;
		background: #fff;
		border-radius: 90px;
		transition: 0.3s;
	}

	.switchToggle input:checked+label,
	.switchToggle input:checked+input+label {
		background: #3e98d3;
	}

	.switchToggle input+label:before,
	.switchToggle input+input+label:before {
		content: 'Off';
		position: absolute;
		top: 5px;
		left: 35px;
		width: 26px;
		height: 26px;
		border-radius: 90px;
		transition: 0.3s;
		text-indent: 0;
		color: #fff;
	}

	.switchToggle input:checked+label:before,
	.switchToggle input:checked+input+label:before {
		content: 'Aktif';
		position: absolute;
		top: 5px;
		left: 10px;
		width: 26px;
		height: 26px;
		border-radius: 90px;
		transition: 0.3s;
		text-indent: 0;
		color: #fff;
	}

	.switchToggle input:checked+label:after,
	.switchToggle input:checked+input+label:after {
		left: calc(100% - 2px);
		transform: translateX(-100%);
	}

	.switchToggle label:active:after {
		width: 60px;
	}

	.toggle-switchArea {
		margin: 10px 0 10px 0;
	}

</style>

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
			<div class="col-md-4 col-12">
				<form id="inputform" method="post">
					<input type="hidden" id="kodedit" name="kodedit">
					<div class="form-group">
						<label for="exampleInputUsername1">Tahun</label>
						<select class="form-control" name="tahun" id="tahun">
							<option value="">Pilih Tahun</option>
							<?php
                                                
                                                $tg_awal= date('Y')+5;
                                                $tgl_akhir= date('Y');
                                                for ($i=$tgl_akhir; $i<=$tg_awal; $i++)
                                                {
                                                echo "
                                                <option value='$i'";
                                                
                                                echo">$i</option>";
                                                }
                                                ?>
						</select>
					</div>
					<div class="form-group">

						<label for="exampleInputEmail1">Awal pendaftaran</label>
						<input type="date" class="form-control" id="awal" name="awal" placeholder="Nama Jurusan">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Akhir Pendaftaran</label>
						<input type="date" class="form-control" id="akhir" name="akhir" placeholder="Foto Jurusan">
					</div>

					<button id="buttonku" name="buttonku" type="submit" class="btn btn-primary btn-sm mr-2"><i
							class="fa fa-save"> </i> Simpan</button>
					<a id="clear" name="clear" class="btn btn-sm btn-info mr-2 text-light"><i class="fa fa-repeat"></i> Clear</a>
				</form>
			</div>
			<!-- /.col -->


			<div class="col-md-8 col-12">
				<div class="table-responsive px-4 pb-3 mt-5">
					<table id="datatahun" class="table  table-hover table-bordered margin-top-10 table-responsive">
						<thead>
							<tr>
								<th>
									Tahun Akademik

								</th>
								<th>
									Awal Pendaftaran
								</th>
								<th>
									Akhir Pendaftaran
								</th>
								<th>
									Aktif
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
			<!-- /.col -->

		</div>

		<!-- /.row -->
	</div>
	<!-- /.box-body -->
</div>

<script src="<?=base_url()?>assets/admin/jsku/ta.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
