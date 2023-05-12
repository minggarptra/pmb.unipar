<?php $this->load->view('user/partials/header'); ?>
<div class="content-wrapper" style="min-height: 705px;">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">

					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a data-pjax href="<?= base_url('user') ?>"><i
											class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Setting Akun</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row justify-content-center">
				<div class="col-12  ">
					<div class="box pull-up ">
						<div class="box-body bg-img bg-primary-light"
							style="background-image: url(<?= base_url('assets/temauser/images') ?>/bg-5.png);"
							data-overlay-light="9">
							<div class="d-lg-flex align-items-center justify-content-center ">
								<div
									class=" text-center text-md-start d-md-flex align-items-center mb-30  mb-lg-0 w-p100">
									<img src="<?= base_url('assets/temauser/images') ?>/svg-icon/color-svg/custom-14.svg"
										class="img-fluid max-w-150" alt="">
									<div class="ms-30">
										<h2 class="mb-10 text-secondary">Setting Akun</h2>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h4 class="box-title">Kelola Password Akun Anda</h4>
					</div>
					<!-- /.box-header -->
					<form id="formprofile" >
						<div class="box-body">
							<div class="form-group">
								<label class="form-label">Password Lama</label>
								<div class="input-group mb-3 controls">
									<span class="input-group-text"><i class="fa  fa-lock"></i></span>
									<input name="oldpassword" id="oldpassword" type="password" class="form-control"
										placeholder="Password Lama">
									<input type="hidden" name="aksi" value="passwordganti">
								</div>
								
							</div>
							<div class="form-group">
								<label class="form-label">Password Baru</label>
								<div class="input-group mb-3">
									<span class="input-group-text"><i class="fa  fa-lock"></i></span>
									<input name="newpassword" id="newpassword" type="password" class="form-control"
										placeholder="Password Baru">
								</div>
								
							</div>
							<div class="form-group">
								<label class="form-label">Konfirmasi Password Baru</label>
								<div class="input-group mb-3">
									<span class="input-group-text"><i class="fa  fa-lock"></i></span>
									<input name="confirmpassword" id="confirmpassword" type="password" class="form-control"
										placeholder="Konfirmasi Password">
								</div>
							</div>

						</div>
						<!-- /.box-body -->
						<div class="box-footer">

							<button type="submit" class="btn btn-primary">
								<i class="ti-save-alt"></i> Save
							</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>




		</section>
		<!-- /.content -->
	</div>
</div>

<?php $this->load->view('user/partials/footer'); ?>
