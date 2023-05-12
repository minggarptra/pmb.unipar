<?php $this->load->view('admin/partials/header2'); ?>


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
				<form id="bgheroform" enctype="multipart/form-data" method="post">
					
					<div class="form-group">
						<label for="exampleInputEmail1">Background Hero</label>
						<input type="file" accept="image/*" class="form-control"  id="bghero" name="bghero" placeholder="image" >
					</div>
					<div class="form-group">
						<img class="img-fluid " alt="" id="bghero">
					</div>
					<button id="buttonku" name="buttonku" type="submit" class="btn btn-sm btn-primary mr-2"><i
							class="fa fa-save"> </i> Simpan</button> 

				</form>
			</div>
			<!-- /.col -->



			<!-- /.col -->

		</div>

		<!-- /.row -->
	</div>
	<!-- /.box-body -->
</div>

<script src="<?=base_url()?>assets/admin/jsku/bghero.js"></script>
<?php $this->load->view('admin/partials/footer2'); ?>
