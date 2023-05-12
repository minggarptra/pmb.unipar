<?php $this->load->view('admin/partials/header'); ?>


<div class="page-wrapper pendaftaran">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Pendaftaran</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
                <h5> <i class="bx bx-calendar-event text-info"></i> Tahun, <?= $ta->tahun.'/'.($ta->tahun+1)  ?></h5>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="card">
			<div class="card-body">
				<div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping">Cari Jurusan</span>
					<input type="text" name="search_text" id="search_text" class="form-control" placeholder="Masukkan Nama Jurusan" aria-label="Username" aria-describedby="addon-wrapping">
				</div>
			</div>
		</div>
		<hr />
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4" id="result">
			
		</div>

	</div>
</div>

<?php $this->load->view('admin/partials/footer'); ?>
