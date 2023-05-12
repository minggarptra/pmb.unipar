<?php
  $setting = $this->db->get('settings')->row_array();
  $general = $this->db->get('general')->row_array();
?>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

	<div class="footer-content">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6">
					<div class="footer-info">
						<h3 class="w-50 bg-light    "><img class="img-fluid w-100"
								src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>"></h3>
						<p>
							<?= $setting['address']; ?> <br>

							<strong>Telp/whatsapp:</strong> <?= $general['whatsapp']; ?><br>
							<strong>Email:</strong> <?= $general['account_gmail']; ?><br>
						</p>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 footer-links">
					<h4>Link</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('') ?>#">Home</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('') ?>#about">Alur Pendaftaran</a>
						</li>
						<li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('') ?>#prodi">Program Studi</a>
						</li>
						<li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('') ?>#contact">Lokasi Kampus</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Program Studi</h4>
					<ul>
					<?php foreach ($jurusan as $key ) {
               ?>
						<li><i class="bi bi-chevron-right"></i> <a data-pjax href="<?= base_url('prodi-detail/'.$key->slug) ?>"><?= $key->jurusan ?></a></li>
						<?php } ?>
						
					</ul>
				</div>

				<div class="col-lg-4 col-md-6 footer-newsletter">
					<h4>Bergabung Bersama Kami</h4>
					<p>Daftar Sekarang</p>
					<a class="btn scrollto text-light bg-primary " href="<?= base_url('register') ?>">DAFTAR
						SEKARANG</a>

				</div>

			</div>
		</div>
	</div>

	<div class="footer-legal text-center">
		<div
			class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

			<div class="d-flex flex-column align-items-center align-items-lg-start">
				<div class="copyright">
					&copy; Copyright <strong><span><?= $general['slogan']; ?></span></strong>. All Rights Reserved
				</div>

			</div>

			<div class="social-links order-first order-lg-last mb-3 mb-lg-0">
				<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
				<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
				<a target="blank" href="https://www.instagram.com/kampusinstidla/?hl=id" class="instagram"><i class="bi bi-instagram"></i></a>
				<a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
				<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
			</div>

		</div>
	</div>

</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<!-- Vendor JS Files -->
<script src="<?= base_url('assets/landing/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>/vendor/aos/aos.js"></script>
<script src="<?= base_url('assets/landing/') ?>/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>/vendor/php-email-form/validate.js"></script>

<script src="<?= base_url() ?>assets/pjax/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/pjax/js/jquery.pjax.js"></script>
<script src="<?= base_url() ?>assets/pjax/js/dash.js"></script>
<script src="<?= base_url('assets/landing/') ?>/js/main.js"></script>
</div>
</body>

</html>
