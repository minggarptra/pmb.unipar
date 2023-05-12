<?php $this->load->view('dashboard/partials/header'); ?>
<?php
  $setting = $this->db->get('settings')->row_array();
?>


<section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center ">
	<div class="container d-flex flex-column align-items-center position-relative " data-aos="zoom-out">
		<h1 class="text-dark fw-bold"><?= $title ?></h1>
		<h2><span class="fw-bold"><?= $slogan ?></span></h2>
		<h1 data-aos="fade-up" data-aos-delay="400"><em class="text-danger "> Tahun Akademik
				<?= $ta->tahun ?>/<?= $ta->tahun+1 ?></em></h1>

		<div class="d-flex mt-5">
			<a href="<?= base_url('register') ?>" class="btn-get-started scrollto">Daftar Sekarang</a>
			<a href="<?= $setting['video_profile'] ?>"
				class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Video
					Profile Kampus</span></a>
		</div>
		<div class="d-flex mt-5">
			<a href="https://youtu.be/LXyaqq1Jm2g"
				class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Video
					Alur Pendaftaran Offline</span></a>
		</div>
		
	</div>
</section>

<main id="main">


	<!-- ======= About Section ======= -->
	<section id="about" class="about">
		<div class="container" data-aos="fade-up">

			<div class="section-header mb-0	">
				<h2>Alur Pendaftaran</h2>
				
			</div>

			<div class="row g-4 g-lg-5 d-flex   justify-content-center" data-aos="fade-up" data-aos-delay="200">
				<div class="col-10 ">
					<div class="about-img">
						<img style="width:100%;" src="<?= base_url('assets/landing/') ?>/img/alurdaftar.png" class="img-fluid h-50" alt="">
					</div>
				</div>

				<div class="col-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

					<div class="accordion accordion-flush px-xl-5" id="faqlist">

						<div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-1">
								<strong>	1. Membuat Akun Pendaftaran</strong>
								</button>
							</h3>
							<div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									<li>Dalam membuat akun pendaftaran <strong>PMB</strong>, pastikan anda <strong>Menggunakan  <em class="text-danger">Alamat Email dan Nomor WHATSAPP yang valid</em>  </strong></li>
									<li>Anda Harus melakukan <strong>Konfirmasi Pendaftaran</strong> yang dikirimkan ke <strong>Inbox Email Anda</strong></li>
									
									
									
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-2">
									<strong>2. Login / Masuk ke Sistem PMB</strong>
								</button>
							</h3>
							<div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
								<li>Setelah Konfirmasi dilakukan maka anda dapat Login ke sistem PMB</li>
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-3">
									<strong>3. Mengisi Form Pendaftaran</strong>
								</button>
							</h3>
							<div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									<li>Anda dapat mengisikan form pendaftaran berupa data diri</li>
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-4">
									<strong>4. Mengupload Berkas Pendukung</strong>
								</button>
							</h3>
							<div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									Berkas pendukung yang akan di upload meliputi 
									<li>Scan Ijazah format / SKL <strong>PDF</strong></li>
									<li>Scan Kartu Keluarga <strong>PDF</strong></li>
									<li>Scan KTP <strong>PDF</strong></li>
									<li>Phase Foto </li>
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-5">
								 <strong>5. Melakukan Pembayaran</strong>
								</button>
							</h3>
							<div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									<li>Setelah melakukan pengisian form pendaftaran dan mengupload berkas pendukung maka anda akan menerima tagihan <strong>Pembayaran Pendaftaran</strong></li>
									<li>Pembayaran dilakukan dengan waktu maksimal <strong><em>1x24 Jam</em></strong></li>
									<li>Pembayarn dapat dilakukan melalui <strong>transfer bank</strong> Kemudian Upload <strong>Bukti Pembayaran</strong></li>
									<li>Tunggu Pembayaran Terkonfirmasi Admin</li>
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-6">
									<strong>6. Unduh Form Pendaftaran</strong>
								</button>
							</h3>
							<div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									<li>Setelah seluruh proses pendaftaran dilakuakan, Maka unduhlah Form Pendaftaran yang berisikan informasi data diri yang telah anda isi sebelumnya</li>
								</div>
							</div>
						</div><!-- # Faq item-->

						<!-- <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-5">
									<strong>5. Mengupload Berkas Pendukung</strong>
								</button>
							</h3>
							<div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									Berkas pendukung yang akan di upload meliputi 
									<li>Scan Ijazah format / SKL <strong>PDF</strong></li>
									<li>Scan Kartu Keluarga <strong>PDF</strong></li>
									<li>Scan KTP <strong>PDF</strong></li>
									<li>Phase Foto </li>
								</div>
							</div>
						</div># Faq item -->

					</div>

				</div>

			</div>

		</div>
	</section><!-- End About Section -->





	<!-- ======= Team Section ======= -->
	<section id="prodi" class="team bg-secondary">
		<div class="container" data-aos="fade-up">

			<div class="section-header">
				<h2 class="text-light">Program Studi</h2>
				<p>Pastikan memilih program studi yang tepat.</p>
			</div>

			<div class="row gy-5">

				<?php foreach ($jurusan as $key ) {
               ?>
				<div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
					<div class="team-member">
						<div class="member-img">
							<img src="<?= base_url() ?>assets/upload/images/jurusan/<?= $key->foto ?>" class="img-fluid"
								alt="">
						</div>
						<div class="member-info">
							<div class="social">

								<a target="blank" href="<?= $key->instagram ?>"><i class="bi bi-instagram"></i></a>

							</div>
							<div class="text-center mt-auto">
								<a data-pjax href="<?= base_url('prodi-detail/'.$key->slug) ?>"
									class=" btn btn-md bg-primary text-light">Detail</a>

							</div>
						</div>
					</div>
				</div><!-- End Prodi -->
				<?php } ?>



			</div>

		</div>
	</section><!-- End Team Section -->

	<!-- ======= Recent Blog Posts Section ======= -->
	<section id="recent-blog-posts" class="recent-blog-posts">

		<div class="container" data-aos="fade-up">

			<div class="section-header">
				<h2>Berita PMB</h2>
				<p>Berita seputar Penerimaan Mahasiswa Baru</p>
			</div>

			<div class="row d-flex justify-content-center">
				<?php foreach ($berita->result() as $data) {
         ?>
				<div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
					<div class="post-box">
						<div class="post-img"><img src="<?= base_url('assets/upload/images/kegiatan/').$data->foto?>" class="img-fluid" alt=""></div>
						<div class="meta">
							<span class="post-date"><?= date("D", strtotime($data->waktu)).','.date("d M Y", strtotime($data->waktu))  ?></span>
							<span class="post-author"> / <?= $data->author ?></span>
						</div>
						<h3 class="post-title"><?= $data->judul ?>
						</h3>
						
						<a data-pjax href="<?= base_url('berita-detail/'.$data->slug) ?>" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
								class="bi bi-arrow-right"></i></a>
					</div>
				</div>
				<?php } ?>


			</div>

		</div>

	</section><!-- End Recent Blog Posts Section -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact ">
		<div class="container">

			<div class="section-header ">
				<h2>Peta Lokasi</h2>
				<p><?= $slogan ?></p>
			</div>

		</div>

		<div class="map">
		<?= $setting['lokasi'] ?>
		</div><!-- End Google Maps -->


	</section><!-- End Contact Section -->

</main><!-- End #main -->


<?php $this->load->view('dashboard/partials/footer'); ?>
