<?php $this->load->view('admin/partials/header2'); ?>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Filter Data</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
    <form action="print-laporan-keuangan" method="POST" target="blank">
		<div class="row">
			<div class="col-md-2 col-12">
				<div class="form-group">
					<label><i class="fa fa-calendar"></i> Tahun Akademik</label>
					<select id="tahun_filter" name="tahun_filter" class="form-control" style="width:100% !important">
						<option value="all">Semua Tahun</option>
						<?php foreach ($tahun  as $m) :?>
						<option value="<?=$m->tahun ?>" <?php
						if ($m->aktif == 1) {
							echo	'selected' ;
						}
						?>><?=$m->tahun?>/<?=$m->tahun+1?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-md-2 col-12">
				<div class="form-group">
					<label><i class="fa fa-home"></i> Program Studi</label>
					<select id="jurusan_filter" name="jurusan_filter" class=" form-control " style="width:100% !important">
						<option value="all">Semua Program Studi</option>
						<?php foreach ($jurusan as $m) :?>
						<option value="<?=$m->kode?>"><?=$m->jurusan?></option>
						<?php endforeach; ?>
					</select>
				</div>

			</div>

			<div class="col-md-2 col-12">
				<div class="form-group">
					<label><i class="fa fa-calendar"></i> Tanggal Awal</label>
					<input type="text" id="min" name="min" class=" form-control ">
				</div>
			</div>
			<div class="col-md-2 col-12">
				<div class="form-group">
					<label><i class="fa fa-calendar"></i> Tanggal Akhir</label>
					<input type="text" id="max" name="max" class=" form-control ">
				</div>
			</div>

			<div class="col-md-4 col-12">
				<div>
					<button type="submit" id="printpendaftaran" class="btn btn-md bg-maroon pull-left text-light" type="button"> <span><i
								class="fa fa-print"></i> Print Laporan</span>
					</button>

					<button type="button" onclick="reload_ajax()" class="btn  btn-md bg-maroon pull-left "><i
							class="fa fa-refresh fa-spin"></i> Reload</button>
				</div>
			</div>
			<!-- /.col -->
            
		</div>
        </form>
		<!-- /.row -->
	</div>
	<!-- /.box-body -->
</div>

<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=$subjudul?></h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive px-4 pb-3 mt-5" style="border: 0">

			<table id="listdaftar" class="table  table-hover table-bordered margin-top-10 table-responsive">
				<thead>
					<tr>
						<th width="25">No.</th>
						<th>No Pendaftaran</th>
						<th>Nama Lengkap</th>
						<th>Program Studi</th>
						<th>Tanggal Daftar</th>
						<th>Jumlah Bayar</th>
						<th>Status Pembayaran</th>

					</tr>
				</thead>
				<tfoot>
					<tr>
						<th width="25">No.</th>
						<th>No Pendaftaran</th>
						<th>Nama Lengkap</th>
						<th>Program Studi</th>
						<th>Tanggal Daftar</th>
						<th>Jumlah Bayar</th>
						<th>Status Pembayaran</th>

					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.box-body -->
</div>
<script src="<?=base_url()?>assets/admin/jsku/laporankeuangan.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		let tahun = $('#tahun_filter').val();
		let jurusan = $('#jurusan_filter').val();
		let src = '<?=base_url()?>pendaftaran/datalaporankeuangan';
		let url;
		let src2 = src + '/' + jurusan + '/' + tahun;
		url = $(this).prop('checked') === true ? src : src2;
		table.ajax.url(url).load();
		$('#min').val("");
		$('#max').val("");




		$('#jurusan_filter').on('change', function () {
			let jurusan = $(this).val();
			let tahun = $('#tahun_filter').val();
			let src = '<?=base_url()?>pendaftaran/datalaporankeuangan';
			let url;
			$('#min').val("");
			$('#max').val("");


			if (jurusan !== 'all' || tahun !== 'all') {
				let src2 = src + '/' + jurusan + '/' + tahun;
				url = $(this).prop('checked') === true ? src : src2;
			} else {
				url = src;
			}
			table.ajax.url(url).load();
		});

		$('#tahun_filter').on('change', function () {
			$('#min').val("");
			$('#max').val("");

			let tahun = $(this).val();
			let jurusan = $('#jurusan_filter').val();
			let src = '<?=base_url()?>pendaftaran/datalaporankeuangan';
			let url;

			if (tahun !== 'all' || jurusan != 'all') {
				let src2 = src + '/' + jurusan + '/' + tahun;
				url = $(this).prop('checked') === true ? src : src2;
			} else {
				url = src;
			}
			table.ajax.url(url).load();
		});


		$('#min').on('change', function () {
			var maxi;
			let min = $(this).val();
			let tahun = $('#tahun_filter').val();
			let max = $('#max').val();
			if (max == '') {
				var maxi = 'kosong';
			} else {
				var maxi = max;
			}

			let jurusan = $('#jurusan_filter').val();
			let src = '<?=base_url()?>pendaftaran/datalaporankeuangan';
			let url;

			if (tahun !== 'all' || jurusan != 'all' || min != '') {
				let src2 = src + '/' + jurusan + '/' + tahun + '/' + min + '/' + maxi;
				url = $(this).prop('checked') === true ? src : src2;
			} else {
				url = src;
			}
			table.ajax.url(url).load();
		});


		$('#max').on('change', function () {
			var mini;
			let max = $(this).val();
			let tahun = $('#tahun_filter').val();
			let min = $('#min').val();
			let jurusan = $('#jurusan_filter').val();
			let src = '<?=base_url()?>pendaftaran/datalaporankeuangan';
			let url;

			if (min == '') {
				var mini = 'kosong';
			} else {
				var mini = min;
			}


			if (tahun !== 'all' || jurusan != 'all' || max != '') {
				let src2 = src + '/' + jurusan + '/' + tahun + '/' + mini + '/' + max;
				url = $(this).prop('checked') === true ? src : src2;
			} else {
				url = src;
			}
			table.ajax.url(url).load();
		});



	});

</script>

<?php $this->load->view('admin/partials/footer2'); ?>
