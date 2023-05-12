<?php $this->load->view('user/partials/header'); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/temauser/app.min.css">
<div class="content-wrapper chatdata mt-5" >
	<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('user') ?>"><i
											class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Chat Admin</li>
							</ol>
						</nav>
					</div>
				</div>

			</div>
		</div>

		<!-- Main content -->
		<section class="content">
        <div class="user-chat  overflow-hidden">
            <div class="">

                <!-- start chat conversation section -->
                <div class="overflow-hidden position-relative">
                    <div class="p-3 p-lg-4 border-bottom user-chat-topbar">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-8">
                                <div class="d-flex align-items-center">
                                    <div class="d-block d-lg-none me-2 ms-0">
                                        <a href="javascript: void(0);"
                                            class="user-chat-remove text-muted font-size-16 p-2"><i
                                                class="ri-arrow-left-s-line"></i></a>
                                    </div>
                                    <div class="me-3 ms-0">
                                        <img src="<?= base_url('assets/upload/images/profile/').$foto_admin->photo_profile ?>"
                                            class="rounded-circle avatar-sm" alt="">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-0 text-truncate">Chat Admin <i
                                                class="fa fa-circle font-size-10 text-success d-inline-block ms-1"></i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-4">
                               
                            </div>
                        </div>
                    </div>
                    <!-- end chat user head -->

                    <!-- start chat conversation -->
                    <div class="chat-conversation bg-gradient-success p-3 p-lg-4" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: -24px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                                    <div id="scrolbotom" class="simplebar-content-wrapper"
                                        style="height: 100%; overflow: hidden scroll; padding-right: 20px; padding-bottom: 0px;">
                                        <div class="simplebar-content" style="padding: 24px;">
                                            <ul id="isichat" class="list-unstyled mb-0">
                                        
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 1176px;"></div>
                        </div>
                       
                    </div>
                    <!-- end chat conversation end -->

                    <!-- start chat input section -->
                    <div class="chat-input-section p-3 p-lg-4 border-top mb-0">

                        <div class="row g-0">
                            <form id="chatform" class="d-flex">
                            <div class="col">
                                <input type="text"id="pesan" name="pesan" class="form-control form-control-lg bg-light border-light"
                                    placeholder="Enter Message...">
                            </div>
                            <div class="col-auto">
                                <div class="chat-input-links ms-md-2 me-md-0">
                                    <ul class="list-inline mb-0">
                                       
                                        <li class="list-inline-item">
                                            <button type="submit" id="btnkirim"
                                                class="btn btn-primary btn-md chat-send waves-effect waves-light">
                                                <i class="fa fa-send fs-2"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- end chat input section -->
                </div>
                <!-- end chat conversation section -->

              
            </div>
            <!-- End User chat -->

           
        </div>
        

		</section>
		<!-- /.content -->
	</div>
</div>
<?php $this->load->view('user/partials/footer'); ?>
