<?php $this->load->view('user/partials/header'); 
$setting = $this->db->get('settings')->row_array();
$norek = $this->db->get('norek')->row();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper  pembayaran">
	<div class="container-full ">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">

					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a data-pjax href="<?= base_url('user') ?>"><i
											class="fa  fa-home"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Form Pembayaran</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="invoice printableArea ">
			<div class="row justify-content-center">
				<div class="col-12 d-none d-md-block  ">
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
										<h2 class="mb-10 text-secondary">Inovice Pembayaran</h2>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-6 ">
					<?php if($order['pay_status']=='SETTLED'){?>
					<img class="no-print" src="<?= base_url('assets/temauser/paysukses.png')?>" alt="" srcset="">

					<?php }else{ ?>
					<div class="row">
						
						<div class="col-12 mt-5">

							<div class="page-body no-print">
							<img class="no-print" src="<?= base_url('assets/temauser/belumpay.png')?>" alt="" srcset="">
								<div class="page-body no-print">
									<h5><strong>Cara Membayar : </strong></h5>
									<li>Transfer Ke rekening Tujuan </li>
									<li>Upload Bukti Pembayaran</li>
									<li>Menunggu Konfirmasi Admin </li>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-12 no-print">
							<div class="bb-1 clearFix">
								<div class="text-end pb-15">

									<button id="print2" class="btn btn-warning" type="button"> <span><i
												class="fa fa-print"></i>
											Print</span> </button>
								</div>
							</div>
						</div>

						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>Status Pembayaran</span></h5>
								<div class="pull-right text-end">
									<h5>
										<?php if($order['pay_status']=='SETTLED'){ echo 'Sudah dibayar';}else{echo 'Belum dibayar'; }  ?>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>Jumlah Pembayaran</span></h5>
								<div class="pull-right text-end">
									<h5>
										<strong> Rp.<?= number_format($order['total_all'],0,",","."); ?> </strong>
									</h5>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>No Rekening</span></h5>
								<div class="pull-right text-end">
									<h5> <strong><?= $norek->norek ?></strong>
									</h5>
								</div>

							</div>

						</div>
						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>Bank</span></h5>
								<div class="pull-right text-end">
									<h5> <strong><?= $norek->bank ?></strong>
									</h5>
								</div>

							</div>

						</div>
						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>Atas Nama</span></h5>
								<div class="pull-right text-end">
									<h5> <strong><?= $norek->atasnama ?></strong>
									</h5>
								</div>

							</div>

						</div>
						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>Prihal</span></h5>
								<div class="pull-right text-end">
									<h5>Pendaftaran <strong><?= $jurusan->jurusan ?></strong>
									</h5>
								</div>

							</div>

						</div>
						<div class="col-12">
							<div class="page-header">
								<h5 class="d-inline"><span>Upload Bukti Pembayaran</span></h5>
							</div>
							<div class="page-body no-print">
								<?php if($order['pay_status']=='SETTLED'){}else{ ?>
								<form id="formpembayaran" enctype="multipart/form-data">
									<input type="hidden" id="kodedit" name="kodedit">

									<div class="form-group">
										<label for="exampleInputEmail1">Bukti Pembayaran</label>
										<input type="file" accept="image/*" class="form-control" id="buktibayar"
											name="buktibayar" placeholder="image">

									</div>

									<button id="buttonku" name="buttonku" type="submit"
										class="btn btn-md  btn-primary mr-2"><i class="fa fa-upload"> </i>
										Upload</button>


								</form>
								<?php } ?>
								<div class="form-group mt-5">
									<img class="img-fluid h-100 w-100" alt="" id="imgbayar">
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>

		</section>
		<!-- /.content -->
	</div>
</div>

<?php $this->load->view('user/partials/footer'); ?>
