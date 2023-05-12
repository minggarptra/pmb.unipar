<?php $this->load->view('dashboard/partials/header'); ?>

<main id="main">
	<!-- ======= Breadcrumbs ======= -->
	<div class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Detail Berita PMB</h2>
				<ol>
					<li><a href="<?= base_url() ?>">Home</a></li>
					<li><a data-pjax href="<?= base_url('berita-pmb-list') ?>">Berita PMB</a></li>
					<li><?= $detail->slug ?></li>
				</ol>
			</div>

		</div>
	</div><!-- End Breadcrumbs -->

	<!-- ======= Blog Details Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row g-5">

				<div class="col-lg-8">

					<article class="blog-details">

						<div class="post-img">
							<img src="<?= base_url() ?>assets/upload/images/kegiatan/<?= $detail->foto ?>" alt=""
								class="img-fluid w-100">
						</div>

						<h2 class="title"><?= $detail->judul ?></h2>

						<div class="meta-top">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
										href="blog-details.html"><?= $detail->nama ?></a></li>
								<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
										href="blog-details.html"><time
											datetime="2020-01-01"><?= date("D", strtotime($detail->waktu)).','.date("d M Y", strtotime($detail->waktu))  ?></time></a>
								</li>

							</ul>
						</div><!-- End meta top -->

						<div class="content">
							<?php echo $detail->isi; ?>

						</div><!-- End post content -->

						<div class="meta-bottom">

						</div><!-- End meta bottom -->

					</article><!-- End blog post -->


				</div>

				<div class="col-lg-4">

					<div class="sidebar">
						<div class="sidebar-item recent-posts">
							<h3 class="sidebar-title">Berita Terbaru</h3>

							<div class="mt-3">

								<?php foreach ($berita->result() as $data) {
         ?>
								<div class="post-item mt-3">
									<img src="<?= base_url() ?>assets/upload/images/kegiatan/<?= $data->foto ?>" alt=""
										class="flex-shrink-0">
									<div>
										<h4><a data-pjax
												href="<?= base_url('berita-detail/'.$data->slug) ?>"><?= $data->judul ?></a>
										</h4>
										<time
											datetime="2020-01-01"><?= date("D", strtotime($data->waktu)).','.date("d M Y", strtotime($data->waktu))  ?></time>
									</div>
								</div><!-- End recent post item-->

								<?php } ?>




							</div>

						</div><!-- End sidebar recent posts-->

                        <div class="sidebar-item recent-posts">
							<h3 class="sidebar-title">Program Studi</h3>

							<div class="mt-3">

                            <?php foreach ($jurusan as $key ) {
                            ?>
								<div class="post-item mt-3">
									<img src="<?= base_url() ?>assets/upload/images/jurusan/<?= $key->foto ?>" alt="" class="flex-shrink-0">
									<div>
										<h4><a data-pjax href="<?= base_url('prodi-detail/'.$key->slug) ?>"><?= $key->jurusan ?></a></h4>
									</div>
								</div><!-- End recent post item-->
                            <?php
                            }
                            ?>

							</div>

						</div><!-- End sidebar recent posts-->



					</div><!-- End Blog Sidebar -->

				</div>
			</div>

		</div>
	</section><!-- End Blog Details Section -->

</main>

<?php $this->load->view('dashboard/partials/footer'); ?>
