<?php $this->load->view('auth/partial/header') ?>
<?php
  $setting = $this->db->get('settings')->row_array();
?>

<div class="forny-container bg-light">
	<div class="forny-inner">
		<div class="forny-form ">
			<div class="mb-8 text-center forny-logo">
				<a href="<?= base_url('') ?>"><img class="img-fluid w-50" src="<?= base_url();  ?>assets/upload/images/logo/<?= $setting['logo']; ?>"></a>
			</div>
			<div class="text-center">
				<h4>Login Akun</h4>
				<p class="mb-10">Gunakan Akun yang telah terdaftar.</p>
				<?php echo $this->session->flashdata('verification'); ?>

			</div>
			<form id="formlogin">
				<div class="form-group ">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
									<g transform="translate(0)">
										<path
											d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z"
											transform="translate(0 -100.445)" />
									</g>
								</svg>
							</span>
						</div>
						<input required class="form-control" id="email" name="email" type="email"
							placeholder="Email Address">
					</div>

				</div>


				<div class="form-group password-field">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
									<g transform="translate(0)">
										<g transform="translate(5.457 12.224)">
											<path
												d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z"
												transform="translate(-205.191 -276.673)" />
										</g>
										<path
											d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z"
											transform="translate(-70.11)" />
									</g>
								</svg>
							</span>
						</div>
						<input required class="form-control" id="password" name="password" type="password"
							placeholder="Password">
						<div class="input-group-append cursor-pointer">
							<span class="input-group-text">
								<svg id="iconshow" name="iconshow" onClick="showPass()"
									xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
									<g transform="translate(0 0)">
										<g transform="translate(0 0)">
											<path
												d="M23.609,117.568a15.656,15.656,0,0,0-5.045-4.859,12.823,12.823,0,0,0-6.38-1.811c-.062,0-.309,0-.371,0a12.823,12.823,0,0,0-6.38,1.811,15.656,15.656,0,0,0-5.045,4.859,2.464,2.464,0,0,0,0,2.658,15.656,15.656,0,0,0,5.045,4.859,12.822,12.822,0,0,0,6.38,1.811c.062,0,.309,0,.371,0a12.823,12.823,0,0,0,6.38-1.811,15.656,15.656,0,0,0,5.045-4.859A2.464,2.464,0,0,0,23.609,117.568Zm-17.74,6.489a14.622,14.622,0,0,1-4.712-4.538,1.155,1.155,0,0,1,0-1.245,14.621,14.621,0,0,1,4.712-4.538,12.747,12.747,0,0,1,1.586-.79,8.964,8.964,0,0,0,0,11.9A12.748,12.748,0,0,1,5.869,124.057ZM12,125.75c-3.213,0-5.827-3.074-5.827-6.853s2.614-6.853,5.827-6.853,5.827,3.074,5.827,6.853S15.211,125.75,12,125.75Zm10.841-6.23a14.621,14.621,0,0,1-4.712,4.538,12.737,12.737,0,0,1-1.585.788,8.964,8.964,0,0,0,0-11.9,12.74,12.74,0,0,1,1.587.791,14.622,14.622,0,0,1,4.712,4.538A1.155,1.155,0,0,1,22.839,119.52Z"
												transform="translate(0.002 -110.897)" />
										</g>
										<g transform="translate(9.565 5.565)">
											<path
												d="M205.24,202.8a2.435,2.435,0,1,0,2.435,2.435A2.438,2.438,0,0,0,205.24,202.8Zm0,3.917a1.482,1.482,0,1,1,1.482-1.482A1.483,1.483,0,0,1,205.24,206.721Z"
												transform="translate(-202.805 -202.804)" />
										</g>
									</g>
								</svg>
							</span>
						</div>

					</div>
				</div>
				<div class="row mt-6 mb-6">
					<div class="col-6 d-flex align-items-center">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="cb1">
							<label class="custom-control-label" for="cb1">Remember me
							</label>
						</div>
					</div>
					<div class="col-6 text-right">
						<a data-pjax href="<?= base_url('reset-password') ?>">Lupa Password?</a>
					</div>
				</div>
				<div>
					<button type="submit" class="btn btn-primary btn-block">
                    <span id="loadbtn" class=" spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                    Login</button>
				</div>

				<div class="text-center mt-10">
					Belum Punya Akun? <a data-pjax href="<?= base_url('register') ?>">Daftar disini</a>
				</div>
				<div class="text-center mt-10">
					Kirim Ulang Konfirmasi Email? <a data-pjax href="<?= base_url('re-confirm') ?>">Klik disini</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('auth/partial/footer') ?>
