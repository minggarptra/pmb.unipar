<!-- DROPZONE IJAZAH S1 -->
<div class="box ">
				<div class="box-header">
					<h4 class="box-title">Upload Scan Legalisir Ijazah S1 <?php if ($token_ijazah_s1 > 0) {
                            
                            ?>
						<i class="fa fa-check-circle text-success"></i>
						<?php 
                            }else{

                              ?>

						<i class="fa fa-question-circle text-danger"></i>
						<?php  
                            }
                            
                            ?></h4>
				</div>
				<div class="box-body">
					<div class="dropzone" id="dropzoneijazah_s1">

						<div class="dz-message">
							<h3> Klik atau Drop Untuk Mengupload Scan Legalisir Ijazah S1, File harus berexstensi .PDF</h3>
						</div>
					</div>
					<div class="">
						<?php if ($token_ijazah_s1 > 0) {
                            
                             ?>
						<style>
							#dropzoneijazah_s1 {
								pointer-events: none;
								cursor: default;
							}

						</style>
						<a href="<?= base_url('assets/upload/images/ijazah_s1/'.$ijazah_s1.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-share-square"></i>Lihat</a>
						<a href="<?= base_url('delete_ijazah_s1/'.$token_ijazah_s1.'') ?>"
							class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
								class="fa fa-trash"></i> Hapus</a>
						<?php } ?>
					</div>
				</div>
			</div>

<!-- DROPZONE TRANSKRIP NILAI S1-->
<div class="box ">
	<div class="box-header">
		<h4 class="box-title">Upload Scan Transkrip Nilai S1 <?php if ($token_transkrip_s1 > 0) {?>
		<i class="fa fa-check-circle text-success"></i>
		<?php 
        }else{
		?>

		<i class="fa fa-question-circle text-danger"></i>
		<?php
		}
		?></h4>
	</div>
	<div class="box-body">
		<div class="dropzone" id="dropzonetranskrip_s1">

			<div class="dz-message">
				<h3> Klik atau Drop Untuk Mengupload Transkrip Nilai S1, File harus berexstensi .PDF</h3>
			</div>

		</div>
		<div class="">
			<?php if ($token_transkrip_s1 > 0) {
			?>
			<style>
			#dropzonetranskrip_s1 {
			pointer-events: none;
			cursor: default;
			}

			</style>
			<a href="<?= base_url('assets/upload/images/transkrip_s1/'.$transkrip_s1.'') ?>"
				class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
				class="fa fa-share-square"></i>Lihat</a>
			<a href="<?= base_url('delete_transkrip_s1/'.$token_transkrip_s1.'') ?>"
				class="btn btn-primary btn-sm  text-capitalize mt-2 " style="background-color:#4B49AC ;"><i
				class="fa fa-trash"></i>Hapus</a>
			<?php } ?>
		</div>
	</div>
</div>