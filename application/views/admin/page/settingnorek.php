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

				<form id="inputnorek">
					<input type="hidden" id="kodedit2" name="kodedit2">

					<div class="form-group">
						<label for="title">Nomor Rekening</label>
						<input type="text" autocomplete="off" name="norek" id="norek" class="form-control"
							required>
					</div>
                    <div class="form-group">
						<label for="title">Nama Bank</label>
						<input type="text" autocomplete="off" name="bank" id="bank" class="form-control"
							required>
					</div>
                    <div class="form-group">
						<label for="title">Atas Nama</label>
						<input type="text" autocomplete="off" name="atasnama" id="atasnama" class="form-control"
							required>
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

<script src="<?=base_url()?>assets/admin/jsku/norek.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
