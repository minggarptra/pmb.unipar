<?php $this->load->view('admin/partials/header2'); ?>

<div class="row">
	<div class="col-md-12 connectedSortable">
		<!-- PRODUCT LIST -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar Pesan Masuk</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>

				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="input-group mb-30">
					<input type="text" class="form-control" placeholder="Cari User" id="search">
					<span class="input-group-addon"><i class="fa fa-check"></i></span>
				</div>
				<ul class="products-list product-list-in-box " id="user_list">



					<!-- /.item -->
				</ul>
			</div>
			<!-- /.box-body -->

			<!-- /.box-footer -->
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/admin/jsku/chat.js"></script>

<?php $this->load->view('admin/partials/footer2'); ?>
