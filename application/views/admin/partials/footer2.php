
	</section>
			<!-- /.content -->
</div>
		<!-- /.content-wrapper -->

<footer class="main-footer">
	<div class="pull-right d-none d-sm-inline-block">
		<b>Version</b> 1.0
	</div>Copyright &copy; <?= date('Y') ?> <?= $this->Settings_model->general()["app_name"] ?>. 
</footer>


</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<!-- popper -->
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/popper/dist/popper.min.js"></script>
<!-- Bootstrap 4.0-->
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/PACE/pace.min.js"></script>
<!-- SlimScroll -->
<!-- FastClick -->
<script src="<?= base_url('assets/admin/') ?>assets/vendor_components/fastclick/lib/fastclick.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Datatables Buttons -->
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script src="<?= base_url();  ?>assets/tema/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

<script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/assets/datatables.net-bs/plugins/Buttons-1.5.6/js/buttons.colVis.min.js"></script>

<script src="<?= base_url('assets/admin/') ?>js/template.js"></script>

<script src="<?= base_url() ?>assets/pjax/js/jquery.pjax.js"></script>
<script src="<?= base_url() ?>assets/pjax/js/admindash.js"></script>
<script src="<?= base_url('assets/admin/') ?>jsku/dashboard.js"></script>

			<script type="text/javascript">
				$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
					return {
						"iStart": oSettings._iDisplayStart,
						"iEnd": oSettings.fnDisplayEnd(),
						"iLength": oSettings._iDisplayLength,
						"iTotal": oSettings.fnRecordsTotal(),
						"iFilteredTotal": oSettings.fnRecordsDisplay(),
						"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
						"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
					};
				};

				

				function reload_ajax() {
					table.ajax.reload(null, false);
				}

				toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "3000",
                "timeOut": "3000",
                "extendedTimeOut": "0",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
                <?php if($this->session->flashdata('success')){ ?>
                    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
                    
                <?php }elseif($this->session->flashdata('failed')){ ?>

                    toastr.warning("<?php echo $this->session->flashdata('failed'); ?>");

                <?php } ?>


				
			</script>
			<script>
				function showHide() {
					let historyjalurDaftar = document.getElementById('jalur_pendaftaran')

					if(historyjalurDaftar.value == 'MANDIRI') {
						// document.getElementById('kipk').style.display = 'none'
						document.getElementById('kipk').style.visibility = 'hidden';
						document.getElementById('kipk').required = false;
					// }if(historyjalurDaftar.value == '') {
					// 	document.getElementById('kipk').style.display = 'none'
					}else {
						// document.getElementById('kipk').style.display = 'block';
						document.getElementById('kipk').style.visibility = 'visible';
						document.getElementById('kipk').required = true;
					}
					// var status = document.getElementById("jalur_pendaftaran");
					// if(status.value=="MANDIRI"){
					// 	document.getElementById("kipk") style.visibility="hidden";
					// }else{
					// 	document.getElementById("kipk") style.visibility="visible";
					// }
				}
			</script>
			<script>
				function showHide() {
					let historyjalurDaftar = document.getElementById('jalur_pendaftaran')

					if(historyjalurDaftar.value == 'MANDIRI') {
						// document.getElementById('kipk').style.display = 'none'
						document.getElementById('kipk').style.visibility = 'hidden';
						document.getElementById('kipk').required = false;
					// }if(historyjalurDaftar.value == '') {
					// 	document.getElementById('kipk').style.display = 'none'
					}else {
						// document.getElementById('kipk').style.display = 'block';
						document.getElementById('kipk').style.visibility = 'visible';
						document.getElementById('kipk').required = true;
					}

					// let historyprodiPilihan = document.getElementById('jurusan')

					// if(historyprodiPilihan.value == '09') {
					// 	document.getElementById('')
					// }
					// var status = document.getElementById("jalur_pendaftaran");
					// if(status.value=="MANDIRI"){
					// 	document.getElementById("kipk") style.visibility="hidden";
					// }else{
					// 	document.getElementById("kipk") style.visibility="visible";
					// }
				}
			</script>

	</div>
</body>



</html>
