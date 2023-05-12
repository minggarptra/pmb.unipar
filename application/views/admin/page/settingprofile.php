<?php $this->load->view('admin/partials/header2'); ?>
<div class="row">
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">

					<div class="profile text-center">
						<h2>Foto Profile</h2>
				<form action="<?= base_url(); ?>admin-settings" method="post" enctype="multipart/form-data">

						<div class="form-group">
							
							<div class="input-group col-xs-12">
								<input type="file" name="poto" id="poto" class="form-control file-upload-info" 
									placeholder="Upload Image">
                                    <input type="hidden" name="aksi" value="foto">
								<span class="input-group-append">
									<button class="file-upload-browse btn btn-primary" type="submit">Ganti Foto</button>
								</span>
                                
							</div>
                            <small class="form-text text-danger pl-1"><?php echo form_error('poto'); ?></small>
						</div>
                        <img style="width: 10rem;" class="img-fluid img-thumbnail"
							src="<?= base_url(); ?>assets/upload/images/profile/<?= $user['photo_profile']; ?>" alt="Foto profil <?= $user['username']; ?>"
							srcset="">
					</div>
                </form>

				</div>
			</div>
		</div>
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">

                <form action="<?= base_url(); ?>admin-settings" method="post"
							enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Password Lama</label>
                      <input type="password" name="oldpassword" class="form-control" id="exampleInputName1" placeholder="Password lama">
                      <small class="form-text text-danger pl-1"><?php echo form_error('oldpassword'); ?></small>
                        <input type="hidden" name="aksi" value="passwordganti">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Password Baru</label>
                      <input type="password" name="newpassword" class="form-control" id="exampleInputEmail3" placeholder="Password baru">
                      <small class="form-text text-danger pl-1"><?php echo form_error('newpassword'); ?></small>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Ulangi Password Baru</label>
                      <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword4" placeholder="Konfirmasi Password baru">
                      <small class="form-text text-danger pl-1"><?php echo form_error('confirmpassword'); ?></small>

                    </div>
    
                    <button type="submit" class="btn btn-primary mr-2">Ganti Password</button>
                </form>
				</div>
			</div>
		</div>

	</div>


<?php $this->load->view('admin/partials/footer2'); ?>
