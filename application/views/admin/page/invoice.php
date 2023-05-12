<?php $this->load->view('admin/partials/header2'); ?>


<section class="invoice printableArea">
	<!-- title row -->
	<div class="row">
		<div class="col-12">
        <a href="<?= base_url('keuangan-list') ?>" class="btn btn-block btn-social btn-bitbucket text-light no-print"><i
										class="fa fa-arrow-left"></i> Kembali</a>
			<h2 class="page-header">
				INVOICE PENDAFTARAN
				<small class="pull-right">Tanggal: <?= date("d M Y", strtotime($invoice->date_input))?></small>
			</h2>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-6 invoice-col">
			From
			<address>
				<strong class="text-red"><?= $invoice->name ?></strong><br>
				<?= $invoice->camaba ?><br>
				
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-6 invoice-col text-right">
			To
			<address>
				<strong class="text-blue"><?= $this->Settings_model->general()["slogan"] ?></strong><br>
				<?= $this->Settings_model->getSetting()["address"] ?><br>
				
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-12 invoice-col">
			<div class="invoice-details row no-margin">
				<div class="col-md-6 col-lg-3"><b>Invoice </b>#<?= $invoice->invoice_code ?></div>
				<div class="col-md-6 col-lg-3"><b>Dibayar Pada:</b> <?= date("d M Y", strtotime($invoice->date_input))?></div>
				
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- Table row -->
	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Description</th>
						
						<th class="text-right">Total</th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td>1</td>
						<td>Pembayaran Pendaftaran Program Studi <?= $invoice->prodi ?></td>
						<td class="text-right">Rp.<?= $invoice->total_all ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<div class="row">
		<!-- accepted payments column -->
		
		<!-- /.col -->
		<div class="col-12 col-sm-12 ">
			<p class="lead float-right"><b>Status</b><span class="text-danger  "> <?= $invoice->statusbayar ?></span></p>

			

		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<div class="col-12">
			<button id="print" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span>
			</button>
            <a target="blank" href="<?= base_url('assets/upload/images/buktipembayaran/'.$invoice->bukti) ?>" class="btn btn-success pull-right text-light"><i class="fa fa-credit-card"></i> Cek Bukti Pembayaran
          </a>
          
			
		</div>
	</div>
</section>

<script src="<?= base_url('assets/admin/') ?>/assets/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js"></script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("section.printableArea").printArea(options);
        });
    });
    </script>

<?php $this->load->view('admin/partials/footer2'); ?>
