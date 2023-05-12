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
								<li class="breadcrumb-item" aria-current="page">Upload Berkas</li>
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
										<h2 class="mb-10 text-secondary">Notifikasi anda</h2>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="box">
				<div class="box-header">
					<h4 class="box-title">Log - Notifikasi Anda</h4>
				</div>
				<div class="box-body">
					<div class="timeline5">
						<?php foreach ($notifikasi as $data) { ?>
						<div class="timeline__group">
							<span class="timeline__year"><?= date("Y", strtotime($data->date)) ?></span>
							<div class="timeline__box">
								<div class="timeline__date">
									<span class="timeline__day"><?= date("d", strtotime($data->date)) ?></span>
									<span class="timeline__month"><?= date("M", strtotime($data->date)) ?></span>
								</div>
								<div class="timeline__post">
									<div class="timeline__content">
										<p><?= $data->notifikasi ?></p>
										<div class="timeline-footer">
											<p class="text-end"><i class="fa  fa-clock-o"></i>
												<?= date("H:i:s", strtotime($data->date)) ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
               
			</div>

			<div class="card">
				
				<div class="card-body">
				<?= $pagination ?>
				</div>
                
			</div>





		</section>
		<!-- /.content -->
	</div>
</div>

<?php $this->load->view('user/partials/footer'); ?>
