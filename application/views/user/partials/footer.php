	
	<?php
        $foto_admins = $this->db->get_where('admin',['id'=> 1])->row();
	
	?>
	</div>

	<script src="<?= base_url() ?>assets/pjax/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/temauser/main/js/vendors.min.js"></script>
	<script src="<?php echo base_url() ?>assets/temauser/assets/vendor_components/dropzone/dropzone.js"></script>
	<script src="<?php echo base_url() ?>assets/temauser/assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
    <script src="<?php echo base_url() ?>assets/temauser/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/temauser/assets/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js">
	</script>
	<script src="<?= base_url('assets/loginuser/') ?>jquery.validate.min.js"></script>
	<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/tema/') ?>plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?= base_url('assets/tema/') ?>plugins/notifications/js/notifications.min.js"></script>
	<script src="<?php echo base_url() ?>assets/temauser/main/js/template.js"></script>
	<script src="<?php echo base_url() ?>assets/temauser/assets/icons/feather-icons/feather.min.js"></script>	
	<!-- EduAdmin App -->
	<script src="<?= base_url() ?>assets/pjax/js/jquery.pjax.js"></script>
	<script src="<?= base_url() ?>assets/pjax/js/scripts.js"></script>
	<script>var base_url = '<?php echo base_url() ?>';</script>
	<script>var user = '<?= $this->session->userdata('id')?>';</script>
	<script>var fotoadmin = '<?= $foto_admins->photo_profile ?>';</script>
	
	<script src="<?= base_url() ?>assets/js/user.js"></script>
	<script src="<?= base_url() ?>assets/js/chat.js"></script>

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

<!-- <script>
		function showDisplay() {
			let historyjurusan = document.getElementById('jurusan')

			if(historyjurusan.value == 09) {
				// Hidden Nilai UN
					
				document.getElementById('nilai_un').required = false;
				// Hidden Ijazah D1 / D2 / D3
				document.getElementById('ijazah_d').style.visibility = 'none';
				document.getElementById('ijazah_d').required = false;
				// Hidden Transkrip Nilai D1/D2/D3
				document.getElementById('transkrip_d').style.visibility = 'none';
				document.getElementById('transkrip_d').required = false;
				// Hidden SK Pindah
				document.getElementById('sk_pindah').style.visibility = 'none';
				document.getElementById('sk_pindah').required = false;
				// Hidden Persyaratan Lain
				document.getElementById('persyaratan_lain').style.visibility = 'none';
				document.getElementById('persyaratan_lain').required = false;
				// Visible Ijazah S1
				document.getElementById('ijazah_s1').style.visibility = 'hidden';
				document.getElementById('persyaratan_lain').required = true;
				// Visible Transkrip S1
				document.getElementById('transkrip_s1').style.visibility = 'hidden';
				document.getElementById('transkrip_s1').required = true;

			// }if(historyjalurDaftar.value == '') {
			// 	document.getElementById('kipk').style.display = 'none'
			}else {
				// document.getElementById('kipk').style.display = 'block';
				// Visible Nilai UN
				document.getElementById('nilai_un').style.visibility = 'hidden';
				document.getElementById('nilai_un').required = true;
				// Visible Ijazah D1 / D2 / D3
				document.getElementById('ijazah_d').style.visibility = 'hidden';
				document.getElementById('ijazah_d').required = true;
				// Visible Transkrip Nilai D1/D2/D3
				document.getElementById('transkrip_d').style.visibility = 'hidden';
				document.getElementById('transkrip_d').required = true;
				// Visible SK Pindah
				document.getElementById('sk_pindah').style.visibility = 'hidden';
				document.getElementById('sk_pindah').required = true;
				// Visible Persyaratan Lain
				document.getElementById('persyaratan_lain').style.visibility = 'hidden';
				document.getElementById('persyaratan_lain').required = true;
				// Hidden Ijazah S1
				document.getElementById('ijazah_s1').style.visibility = 'none';
				document.getElementById('persyaratan_lain').required = false;
				// Hidden Transkrip S1
				document.getElementById('transkrip_s1').style.visibility = 'none';
				document.getElementById('transkrip_s1').required = false;
			}
			// var status = document.getElementById("jalur_pendaftaran");
			// if(status.value=="MANDIRI"){
			// 	document.getElementById("kipk") style.visibility="hidden";
			// }else{
			// 	document.getElementById("kipk") style.visibility="visible";
			// }
		}
	</script> -->

	<!-- <script>
		// $(document).ready(function () {
		// 	$('#jurusan').change(function () {
 		// var kode_jurusan = $('#jurusan').val(); //ambil value kode dari jurusan
		//  if (kode_jurusan == 09) {
		// 	$('#nilai_un').hide();
		// 	$('#ijazah_d').hide();
		// 	$('#transkrip_d').hide();
		// 	$('#sk_pindah').hide();
		// 	$('#persyaratan_lain').hide();
		//  } else {
		// 	$('#ijazah_s1').hide();
		// 	$('#transkrip_s1').hide();
		//  }
		// }}

		// Conditionally show price
		(function ($) {
			// window.on('load', function() {
		window.onload = function() {

		if ($("#jurusan").val() == 09) {
			$('#nilai_un').hide();
			$('#ijazah_d').hide();
			$('#transkrip_d').hide();
			$('#sk_pindah').hide();
			$('#persyaratan_lain').hide();
		}else{
			$('#ijazah_s1').hide();
			$('#transkrip_s1').hide();
		}

		$("#jurusan").change(function() {
		if ($(this).val() == 09) {
			$('#nilai_un').hide();
			$('#ijazah_d').hide();
			$('#transkrip_d').hide();
			$('#sk_pindah').hide();
			$('#persyaratan_lain').hide();
		} else {
			$('#ijazah_s1').hide();
			$('#transkrip_s1').hide();
		}
		});
		}})(jQuery);
	</script> -->

	<!-- <script>
		$("jurusan").change(function() {
		// $(document).ready(function () {
			if ($("#jurusan").val() == 09) {
				$('#nilai_un').hide();
				$('#nilai_un').hide();
				$('#ijazah_d').hide();
				$('#transkrip_d').hide();
				$('#sk_pindah').hide();
				$('#persyaratan_lain').hide();
			}else {
				$('#ijazah_s1').hide();
				$('#transkrip_s1').hide();
			}
		});
	</script> -->

	</div>
</body>
</html>
